
let cidade = document.getElementById("cidade");
let estado = document.getElementById("estado");
let logradouro = document.getElementById("logradouro");
let bairro = document.getElementById("bairro");

function atribuirEndereco(data){
    if(data.error){
        alert("CEP INVÁLIDO!");
        logradouro.value = '';
        bairro.value= '';
        cidade.value = '';
        estado.value = '';
    }
    cidade.value = data.localidade;
    estado.value = data.uf;
    logradouro.value = data.logradouro;
    bairro.value = data.bairro;
}
const camposEndereco = document.querySelectorAll(".camposEndereco");
let cep = document.getElementById("cep");
camposEndereco.forEach((campo)=>{
    campo.disabled = true;
})
cep.addEventListener("blur",()=>{
    cidade.value = '';
    estado.value = '';
    logradouro.value = '';
    bairro.value = '';
    camposEndereco.forEach((campo)=>{
        campo.disabled = true;
    })
})
cep.addEventListener("change",buscarEnderecos);
async function buscarEnderecos(){
    const valorCep = cep.value;
    try{  
        const response = await fetch(`https://viacep.com.br/ws/${valorCep}/json/`);
        if(!response.ok){
            throw new Error("Erro ao buscar o CEP!")
        }
        const data = await response.json();
        camposEndereco.forEach((campo)=>{
            campo.disabled = false;
        })
        atribuirEndereco(data);

    }
    catch(erro){
            console.log(erro);
    }
}