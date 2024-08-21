<?php
require_once "conexao.php";
require_once "functions.php";
if($_POST['cadastrar_destino']){
    Cadastro_pessoais($conexao,$_POST['nome'],$_POST['cpf'],$_POST['sexo'],$_POST['data_nascimento'],$_POST['telefone'],$_POST['email'],$_POST['senha'],$_POST['cidade'],$_POST['cep'],$_POST['estado'],$_POST['logradouro'],$_POST['bairro'],$_POST['numero']);
}
if($_POST['logar_usuario']){
    Login_Usuario($conexao,$_POST['email'],$_POST['senha']);
}
if($_POST['cadastrar_destinos']){
    Cadastrar_Destinos($conexao,$_POST['nome'],$_POST['preco'],$_POST['descricao'],$_POST['foto']);
}
if($_POST['logar_adm']){
    Login_Adm($conexao,$_POST['usuario'],$_POST['senha']);
}
if($_REQUEST['id_destino_excluir']){
    Excluir_Destino($conexao,$_REQUEST['id_destino_excluir']);
}
if($_POST['editar_destino']){
Editar_Destino($conexao,$_POST['id_destino'],$_POST['nome'],$_POST['preco'],$_POST['descricao'],$_POST['foto']);
header("location:lista_destinos.php");
}
?>