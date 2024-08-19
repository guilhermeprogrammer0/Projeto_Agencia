<?php
require_once "conexao.php";
require_once "functions.php";

$sql_excluir = "DELETE FROM destinos WHERE id_destino = ?";
$stmt_excluir = $conexao->prepare($sql_excluir);
$stmt_excluir->bind_param("i",$_REQUEST['id_destino']);
header("location:lista_destinos.php");




?>