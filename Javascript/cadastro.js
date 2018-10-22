
document.getElementById("botaoCadastro").disabled = true;
//Escondendo mensagem de e-mail inválida
var x = document.getElementById("verificaEmail1");
x.hidden = true;
//Escondendo mensagem de senha inválida
var y = document.getElementById("verificaSenha");
y.hidden = true;
//Escondendo mensagem de ajuda de senha
var z = document.getElementById("ajudaSenha");
z.hidden = true;
//Escondendo mensagem de pergunta de segurança
var w = document.getElementById("ajudaPergunta");
w.hidden = true;

//Flags para saber se o campo e-mail e senha estão preenchidos corretamente
var confirmaEmail = false;
var confirmaSenha = false;


//Apresentando ajuda de senha ao selecionar o "botão" de ajuda
function apresentaAjudaSenha(){
    
    if (z.hidden === true){
        z.hidden = false;
    }
    else{
        z.hidden = true;
    }   
};
//Apresentando ajuda para a pergunta de segurança ao selecionar o "botão" de ajuda
function apresentaAjudaPergunta(){
    if (w.hidden === true){
        w.hidden = false;
    }
    else{
        w.hidden = true;
    }   
};
//Função com expressão regular para verificar a autenticidade do e-mail
document.getElementById("campoEmail").oninput = function() {autenticidadeEmail()};
function autenticidadeEmail(){
    var re = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/g;
    var emailField = document.getElementById("campoEmail").value;
    str = emailField;
    var found = re.test(str);
    if (!found)
    {
        x.hidden = false;
        confirmaEmail = false;
    }
    else 
    {
        x.hidden = true;
        confirmaEmail = true;
    }
}

//Função com expressão regular para verificar a autenticidade da senha
document.getElementById("campoSenha").oninput = function() {autenticidadeSenha()};
function autenticidadeSenha(){
    var re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/g;
    var passwordField = document.getElementById("campoSenha").value;
    str = passwordField;
    var found = re.test(str);
    if (!found)
    {
        y.hidden = false;
        confirmaSenha = false;
    }
    else 
    {
        y.hidden = true;
        confirmaSenha = true;
    }
}

//Um event listener para possibilitar acionar o botão Cadastrar apenas quando todos os campos forem válidos
    document.getElementById("formulario").addEventListener("keyup", function() {
        if ((!confirmaEmail) || (!confirmaSenha) || (document.getElementById("esteNome").value == null || document.getElementById("esteNome").value == "") || (document.getElementById("umaPergunta").value == null || document.getElementById("umaPergunta").value == "") || (document.getElementById("estaResposta").value == null || document.getElementById("estaResposta").value == ""))
{
    document.getElementById("botaoCadastro").disabled = true;
}
else 
{
    document.getElementById("botaoCadastro").disabled = false;
}
});
