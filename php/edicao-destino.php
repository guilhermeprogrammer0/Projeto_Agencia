<?php
require_once "functions.php";
require_once "conexao.php";

Editar_Destino($conexao,$_POST['id_destino'],$_POST['nome'],$_POST['preco'],$_POST['descricao'],$_POST['foto']);
header("location:lista_destinos.php");
?>