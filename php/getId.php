<?php
session_start();
$_SESSION['selecionadoDestino'] = $_RESQUEST['id'];
header("location:reserva-finalizar.php");
?>