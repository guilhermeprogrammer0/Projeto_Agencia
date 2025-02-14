<?php
require_once "conexao.php";
require_once "functions.php";
if($_POST['cadastrar_cliente']){
    $data_atual = new DateTime();
    $data_nascimento = new DateTime($_POST['data_nascimento']);
    if($data_nascimento>= $data_atual){
        ?> <script>alert("Escolha uma data de nascimento válida!");
        window.location.href = "cadastro_cliente.php";
        </script>
        <?php
    }
    else{
    cadastro_cliente($conexao,$_POST['nome'],$_POST['cpf'],$_POST['sexo'],$_POST['data_nascimento'],$_POST['telefone'],$_POST['email'],$_POST['senha'],$_POST['cidade'],$_POST['cep'],$_POST['estado'],$_POST['logradouro'],$_POST['bairro'],$_POST['numero']);
    }
}
if($_POST['logar_usuario']){
    login_usuario($conexao,$_POST['email'],$_POST['senha']);
}
if($_POST['editar_perfil']){
    editar_perfil($conexao,$_POST['id'],$_POST['nome'],$_POST['cpf'],$_POST['sexo'],$_POST['data_nascimento'],$_POST['telefone'],$_POST['email'],$_POST['senha'],$_POST['cidade'],$_POST['cep'],$_POST['estado'],$_POST['logradouro'],$_POST['bairro'],$_POST['numero']);
}
if(isset($_POST['btnExcluirCliente'])){
    excluir_perfil($conexao,$_POST['id']);
    unset($_SESSION['id_usuario']);
    unset($_SESSION['nome_usuario']);
}
if($_REQUEST['id_reserva_excluir']){
    excluir_reserva($conexao,$_REQUEST['id_reserva_excluir']);
}
if($_POST['cadastrar_usuario_adm']){
    cadastrar_administrador($conexao,$_POST['nome'], $_POST['usuario'],$_POST['senha']);
}
if($_POST['editar_usuario_adm']){
    editar_usuario_adm($conexao,$_POST['nome'],$_POST['usuario'],$_POST['senha'],$_POST['id_adm']);
}
if($_POST['logar_adm']){
    login_adm($conexao,$_POST['usuario'],$_POST['senha']);
}
if($_POST['cadastrar_destinos']){
    cadastrar_destinos($conexao,$_POST['nome'],$_POST['preco'],$_POST['descricao'],$_POST['foto']);
}
if($_POST['editar_destino']){
    editar_destino($conexao,$_POST['id_destino'],$_POST['nome'],$_POST['preco'],$_POST['descricao'],$_POST['foto']);
    }
if(isset($_POST['btnExcluirDestino'])){
    excluir_destino($conexao,$_POST['id_destino']);
}

?>