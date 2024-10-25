<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */


    // ...

    public function store(Request $request)
    {
        $validatedUser = $request->validate([
            'name' => 'required|min:5|max:100|string',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|max:20|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/',
        ], [
            'name.required' => 'Informe o nome do usuário.',
            'name.min' => 'Insira no mínimo 5 caracteres para prosseguir!',
            'name.max' => 'O limite máximo do nome é de 100 caracteres!',
            'email.required' => 'Insira um email.',
            'email.email' => 'O formato do email está inválido.',
            'email.max' => 'O limite máximo do email é de 255 caracteres!',
            'email.unique' => 'Esse email já está sendo utilizado. Por favor, escolha outro.',
            'password.required' => 'Digite uma senha!',
            'password.min' => 'A senha deve ter entre 8 e 20 caracteres.',
            'password.max' => 'A senha deve ter entre 8 e 20 caracteres.',
            'password.regex' => 'A senha deve conter letras e números, e não deve conter espaços, caracteres especiais ou emojis.',
        ]);

        try {
            $validatedUser['password'] = Hash::make($validatedUser['password']);

            User::create($validatedUser);

            session()->flash('status', 'Usuário criado com sucesso!');
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Ocorreu um erro ao adicionar o usuário. Por favor, tente novamente.');
            return redirect()->back()->withInput();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        return view('users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validatedUser = $request->validate([
            'name' => 'required|min:5|max:100|string',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|max:20',
        ], [
            'name.required' => 'Informe o nome do usuário.',
            'name.min' => 'Insira no mínimo 5 caracteres para prosseguir!',
            'name.max' => 'O limite máximo do nome é de 100 caracteres!',
            'email.required' => 'Insira um email.',
            'email.email' => 'O formato do email está inválido.',
            'email.max' => 'O limite máximo do email é de 255 caracteres!',
            'email.unique' => 'Esse email já está sendo utilizado. Por favor, escolha outro.',
            'password.min' => 'A senha deve ter entre 8 e 20 caracteres.',
            'password.max' => 'A senha deve ter entre 8 e 20 caracteres.',
        ]);

        try {
            if ($request->filled('password')) {
                $validatedUser['password'] = bcrypt($request->password);
            } else {
                unset($validatedUser['password']);
            }

            $user->update($validatedUser);

            session()->flash('status', 'Usuário editado com sucesso!');
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Ocorreu um erro ao editar o usuário. Por favor, tente novamente.');
            return redirect()->back()->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
