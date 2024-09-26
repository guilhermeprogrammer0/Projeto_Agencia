<?php
require_once "conexao.php";
require_once "functions.php";
excluir_usuario_adm($conexao,$_SESSION['id_adm']);
unset($_SESSION['id_adm']);
?>