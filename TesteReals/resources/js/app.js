import './bootstrap';

import inputmask from 'inputmask';

// mascara para o campo cpf
document.addEventListener("DOMContentLoaded", function(){

    var cpfmask = new Inputmask("999.999.999-99");
    cpfmask.mask(document.querySelectorAll('.cpf'));

})
