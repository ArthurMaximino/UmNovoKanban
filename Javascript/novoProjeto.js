//Um event listener para possibilitar acionar o botão Criar apenas quando o campo de nome for válido

document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById("validaBotao").disabled = true;
document.getElementById("Formulario").addEventListener("keyup", function(event) {
    if ((document.getElementById("verificaCampo").value == null) || (document.getElementById("verificaCampo").value == ""))
{
console.log("Yahoo!");
document.getElementById("validaBotao").disabled = true;
}
else 
{
    console.log("Wait!");
document.getElementById("validaBotao").disabled = false;
}
})});