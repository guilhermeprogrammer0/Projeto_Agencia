<?php
session_start();
function Cadastro_pessoais($conexao,$nome,$cpf,$sexo,$data_nascimento,$telefone,$email,$senha,$cidade,$cep,$estado,$logradouro,$bairro,$numero){
    $sql_verificar = "SELECT cpf, email from dados_pessoais WHERE cpf = '$cpf' OR email = '$email'";
    $sql_verificado = mysqli_query($conexao,$sql_verificar);
    $qtd_linhas = mysqli_num_rows($sql_verificado);
    if($qtd_linhas>0){
        ?>
        <script> alert('Você já possui cadastro no site, entre com seu e-mail e senha.'); 
        window.location.href = 'login_usuario.php';
    </script>
    <?php
    }
    else{
    $sql = "INSERT INTO dados_pessoais values (default,'$nome','$cpf','$sexo','$data_nascimento','$telefone','$email','$senha','$cidade','$cep','$estado','$logradouro','$bairro','$numero')";
    $sql_cadastrar = mysqli_query($conexao,$sql);
    if($sql_cadastrar){?>
        <script> window.location.href="reservas2.php" </script><?php
         $sql = "SELECT id , nome from dados_pessoais";
         $sql_query = mysqli_query($conexao,$sql);
         while($row = mysqli_fetch_array($sql_query)){
             $_SESSION['id_usuario'] = $row['id'];
             $_SESSION['nome_usuario'] = $row['nome'];
         }
    }
    else{
        ?>
       <script>alert('ERRO');</script><?php 
    }
}
}
function Cadastro_reservas($conexao,$destino,$pacotes,$qtd_passa){
    $sql = "INSERT INTO reservas values (default,'$destino','$pacotes','$qtd_passa')";
    $sql_cadastrar = mysqli_query($conexao,$sql);
    if($sql_cadastrar){
       header("location:confirmar.php");
       $sql = "SELECT id_reserva from reservas";
       $sql_query = mysqli_query($conexao,$sql);
       while($row = mysqli_fetch_array($sql_query)){
           $_SESSION['id_reserva'] = $row['id_reserva'];
       }
    }
    else{
        ?>
       <script>alert('ERRO');</script><?php 
    }

}
function Relizar_Reserva($conexao,$id_comprador,$id_reserva){
    $sql = "INSERT INTO reserva_realizada values (default,'$id_comprador','$id_reserva')";
    $sql_cadastrar = mysqli_query($conexao,$sql);
    if($sql_cadastrar){
        header("location:reserva_realizada.php");
    }
     else{
         ?>
        <script>alert('ERRO');</script><?php 
     }
}
function Login_Adm($conexao,$usuario,$senha){
    $sql_logar = "SELECT  * from administrativo WHERE usuario = '$usuario' AND senha = '$senha'";
    $sql_logado = mysqli_query($conexao,$sql_logar);
    $qtd_linha = mysqli_num_rows($sql_logado);
    if($qtd_linha>0){
        while($row = mysqli_fetch_array($sql_logado)){
            $_SESSION['id_adm'] = $row['id_adm'];
        }
        header("location:menu_adm.php");
    }
    else{
        ?> <script>alert('Login e/ou senha Inválidos');</script><?php 
    }
}
function Login_Usuario($conexao,$email,$senha){
    $sql_logar = "SELECT id, nome, email, senha from dados_pessoais WHERE email = '$email' AND senha = '$senha'";
    $sql_logado = mysqli_query($conexao,$sql_logar);
    $qtd_linha = mysqli_num_rows($sql_logado);
    if($qtd_linha>0){
        while($row = mysqli_fetch_array($sql_logado)){
            $_SESSION['id_usuario'] = $row['id'];
            $_SESSION['nome_usuario'] = $row['nome'];
        }
        header("location:reservas2.php");
    }
    else{
        ?> <script>alert('Login e/ou senha Inválidos.');</script><?php 
    }
}
function Exclusao($conexao, $id){
    $sql_excluir = "DELETE FROM reservas WHERE id_reserva = '$id'";
    $sql_excluido = mysqli_query($conexao,$sql_excluir);
}
?>