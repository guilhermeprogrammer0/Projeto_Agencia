<?php
require_once "conexao.php";
require_once "functions.php";
if($_POST['cadastrar_destino']){
    cadastro_cliente($conexao,$_POST['nome'],$_POST['cpf'],$_POST['sexo'],$_POST['data_nascimento'],$_POST['telefone'],$_POST['email'],$_POST['senha'],$_POST['cidade'],$_POST['cep'],$_POST['estado'],$_POST['logradouro'],$_POST['bairro'],$_POST['numero']);
}
if($_POST['logar_usuario']){
    login_usuario($conexao,$_POST['email'],$_POST['senha']);
}
if($_POST['logar_adm']){
    login_adm($conexao,$_POST['usuario'],$_POST['senha']);
}
if($_POST['cadastrar_destinos']){
    cadastrar_destinos($conexao,$_POST['nome'],$_POST['preco'],$_POST['descricao'],$_POST['foto']);
}
if($_POST['editar_destino']){
    editar_destino($conexao,$_POST['id_destino'],$_POST['nome'],$_POST['preco'],$_POST['descricao'],$_POST['foto']);
    header("location:lista_destinos.php");
    }
if($_REQUEST['id_destino_excluir']){
    excluir_destino($conexao,$_REQUEST['id_destino_excluir']);
}

?>