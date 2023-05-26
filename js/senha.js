let mostrar = document.querySelector("#mostrar");
let senha = document.querySelector("#senha");
mostrar.addEventListener('click',()=>{
    if(senha.getAttribute("type")=="password"){
        senha.setAttribute("type","text");
        mostrar.innerHTML = "Ocultar Senha";
    }
    else {
        senha.setAttribute("type","password");
        mostrar.innerHTML = "Mostrar Senha";
    }
});
