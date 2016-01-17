function validaVazio(campo){

    if (campo.id == "mensagem") alert("TEXTAREA");

    aux = (!(campo.val().trim() == ""));
    campo.removeClass("campo_valido", "campo_invalido");

    if (aux)
        campo.addClass("campo_valido");
    else
        campo.addClass("campo_invalido");

    return aux;
}

function validaEmail(campo){
    var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    aux = filtro.test(campo.val());

    if (aux)
        campo.addClass("campo_valido");
    else
        campo.addClass("campo_invalido");

    return aux;
}

function validaTelefone(campo){
    aux = (!(campo.cleanVal().trim() == ""));

    campo.removeClass("campo_valido", "campo_invalido");

    if (aux)
        campo.addClass("campo_valido");
    else
        campo.addClass("campo_invalido");
    return aux;
}

//Valida campos antes de dar submit em formulário
function validaCampos(seletor){
    validated = true;
    $(seletor).each(function(){
        if(this.id == "email")
            validated = (!validaEmail($(this)) ? false : validated);
        else if (this.id == "telefone")
            validated = (!validaTelefone($(this)) ? false : validated);
        else
            validated = (!validaVazio($(this)) ? false : validated);
    });
    return validated;
}

function realTimeValidator(seletor, telefone){
    $(seletor).on("keyup", function(){
        if (this.id == "telefone")
            validaTelefone($(this));
        else if (this.id == "email")
            validaEmail($(this));
        else
            validaVazio($(this));
    });
    if (telefone != null)
    {
        //DEFININDO VALOR DA MÁSCARA
        $(telefone).mask('(00) 0000-00009');
         $(telefone).blur(function(event) {
           if($(telefone).val().length == 15){ // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
              $(telefone).mask('(00) 00000-0009');
           } else {
              $(telefone).mask('(00) 0000-00009');
           }
        });
    }
}
