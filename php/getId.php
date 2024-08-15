<?php
session_start();
$_SESSION['selecionadoDestino'] = $_REQUEST['id_destino'];
header("location:comprarReserva.php");
?>