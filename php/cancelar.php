<?php
require_once "conexao.php";
require_once "functions.php";
Exclusao($conexao,$_SESSION['id_reserva']);
unset($_SESSION['id_usuario']);
header("location:../index.html");


?>