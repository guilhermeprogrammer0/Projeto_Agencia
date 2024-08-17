function Editar(id){
    window.location.href = `editar-destino.php?id_destino=${id}`;
}
function Excluir(id){
    let confirmar = confirm("Deseja mesmo excluir?");
    if(confirmar === true)window.location.href = `excluir-destino.php?id_destino=${id}`;
}