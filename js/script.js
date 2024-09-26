let menu = document.querySelector("#menu");
let btn_menu = document.querySelector("#btn-menu");
btn_menu.addEventListener('click',()=>{menu.classList.toggle("ativo")});

function excluir_conta(id){
    let confirmar  = confirm("Deseja mesmo excluir sua conta?");
    if(confirmar == true){
        window.location.href = `acoes.php?id_cliente_excluir=${id}`;
    }
}
