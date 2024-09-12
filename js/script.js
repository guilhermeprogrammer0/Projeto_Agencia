let menu = document.querySelector("#menu");
let btn_menu = document.querySelector("#btn-menu");
btn_menu.addEventListener('click',()=>{menu.classList.toggle("ativo")});

//Confirmação exclusão perfil
function exclusaoPerfil(){
    let confirmar  = confirm("Deseja mesmo excluir sua conta?");
    if(confirmar == true){
       window.location.href="../php/excluir_perfil.php";
    }
}