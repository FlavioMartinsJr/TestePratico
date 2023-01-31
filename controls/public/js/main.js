const codigo = document.querySelector('#codigo'); 
const id = document.querySelector('#id'); 
const nome = document.querySelector('#nomeAlterar'); 
const nascimento = document.querySelector('#dataNascimentoAlterar'); 
const email = document.querySelector('#emailAlterar'); 
const senha = document.querySelector('#senhaAlterar'); 
const downloadPdf = document.querySelector("#download-pdf");

function verificarUsuario(valorId,valorNome,valorNascimento,valorEmail,valorSenha){
    id.value=valorId;
    nome.value=valorNome;
    nascimento.value=valorNascimento;
    email.value=valorEmail;
    senha.value=valorSenha;
}
function autenticarUsuario(valor){
    codigo.value=valor;
}
const atribuirUsuarios = async () =>{
    const usuariosContados = document.querySelector('#contUser');
    const usuariosEncontrados = document.querySelector('#usuariosEncontrados');
    usuariosEncontrados.innerHTML = await usuariosContados.innerHTML;
}
downloadPdf.addEventListener("click", () => {
    let element = document.createElement("a");
    element.href = "./documentacao.pdf";
    element.download = "documentacao.pdf";
    document.documentElement.appendChild(element);
    element.click();
    document.documentElement.removeChild(element);
});
atribuirUsuarios();