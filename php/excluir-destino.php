<?php
require_once "conexao.php";
require_once "functions.php";

$sql_excluir = "DELETE FROM destinos WHERE id_destino = $_REQUEST[id_destino]";
$sql_excluido = mysqli_query($conexao,$sql_excluir);
header("location:lista_destinos.php");




?>