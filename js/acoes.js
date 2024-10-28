function cancelarReserva(id){
    let confirmar = confirm("Deseja mesmo excluir sua reserva?");
    if(confirmar === true)window.location.href = `acoes.php?id_reserva_excluir=${id}`;
}