<?php
require_once "conexao.php";
require_once "functions.php";
if(isset($_SESSION['id_adm'])){
excluir_usuario_adm($conexao,$_SESSION['id_adm']);
unset($_SESSION['id_adm']);
}
header("login_menuadm.php");

?>