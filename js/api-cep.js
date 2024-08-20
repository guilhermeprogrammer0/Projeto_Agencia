let cidade = document.getElementById("cidade");
let estado = document.getElementById("estado");
let logradouro = document.getElementById("logradouro");
let bairro = document.getElementById("bairro");

function atribuirEndereco(data){
    cidade.value = data.localidade;
    estado.value = data.uf;
    logradouro.value = data.logradouro;
    bairro.value = data.bairro;
}
const camposEndereco = document.querySelectorAll(".camposEndereco");
function desabilitarCampos(){
		camposEndereco.forEach((campo)=>{
    campo.disabled = true;
})
}
function limparCampos(){
	 cidade.value = '';
    estado.value = '';
    logradouro.value = '';
    bairro.value = '';
}
let cep = document.getElementById("cep");

cep.addEventListener("blur",()=>{
    desabilitarCampos();
})

let avisoCep = document.querySelector(".avisoCep");
cep.addEventListener("change",buscarEnderecos);
async function buscarEnderecos(){
    const valorCep = cep.value;
	if(valorCep.length<8 || valorCep.length>8){
		avisoCep.style.display = "block";
		avisoCep.innerHTML = "São 8 caracteres";
		limparCampos();
	}
	else{
		avisoCep.style.display = "none";	
	}
    try{  
        const response = await fetch(`https://viacep.com.br/ws/${valorCep}/json/`);
        if(!response.ok){
            throw new Error("Erro ao buscar o CEP!")
        }
        const data = await response.json();
        camposEndereco.forEach((campo)=>{
            campo.disabled = false;
        })
		if(data.erro){
        desabilitarCampos();
		avisoCep.style.display = "block";
		avisoCep.innerHTML = "CEP inválido";
		limparCampos();
    }
	else{
	atribuirEndereco(data);
	avisoCep.innerHTML = "CEP inválido";
	}
    }
    catch(erro){
            console.log(erro);
    }
	
}