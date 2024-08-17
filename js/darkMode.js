let temaAtual = localStorage.getItem("temaAtual");
let btnMudarTema = document.getElementById("btnMudarTema");
let body = document.body;
if(temaAtual =="escuro"){
    body.classList.add("dark");
    btnMudarTema.classList.add("fa-sun")
}
else{
    btnMudarTema.classList.add("fa-moon")
}

function verificarIcone(){
    if(btnMudarTema.classList.contains("fa-moon")){
        btnMudarTema.classList.remove("fa-moon");
        btnMudarTema.classList.add("fa-sun");
    }
    else if(btnMudarTema.classList.contains("fa-sun")){
        btnMudarTema.classList.remove("fa-sun");
        btnMudarTema.classList.add("fa-moon");
    }
}
btnMudarTema.addEventListener("click",()=>{
    body.classList.toggle("dark");
    verificarIcone();
    if(temaAtual=="escuro"){
        localStorage.setItem("temaAtual","claro")
    }
    else{
        localStorage.setItem("temaAtual","escuro")
    }
    
    
   
    btnMudarTema.classList.add("fa-sun");
})



