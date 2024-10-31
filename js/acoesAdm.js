function Editar(id){
    window.location.href = `editar-destino.php?id_destino=${id}`;
}
function Excluir(id){
    let confirmar = confirm("Deseja mesmo excluir?");
    if(confirmar === true)window.location.href = `acoes.php?id_destino_excluir=${id}`;
}
function excluir_conta_adm(){
    let confirmar  = confirm("Deseja mesmo excluir seu usuário?");
    if(confirmar === true){
        window.location.href = 'excluir_usuario_adm.php';
    }
    }
