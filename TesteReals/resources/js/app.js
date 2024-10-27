import './bootstrap';

import inputmask from 'inputmask';

document.addEventListener("DOMContentLoaded", function(){

    var cpfmask = new Inputmask("999.999.999-99");
    cpfmask.mask(document.querySelectorAll('.cpf'));

})
