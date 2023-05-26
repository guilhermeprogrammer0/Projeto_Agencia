<?php
session_start();
function Cadastro_pessoais($conexao,$nome,$cpf,$sexo,$data_nascimento,$telefone,$email,$cidade,$cep,$estado,$logradouro,$bairro,$numero){
    $sql = "INSERT INTO dados_pessoais values (default,'$nome','$cpf','$sexo','$data_nascimento','$telefone','$email','$cidade','$cep','$estado','$logradouro','$bairro','$numero')";
    $sql_cadastrar = mysqli_query($conexao,$sql);
    if($sql_cadastrar){?>
        <script> window.location.href="reservas2.php" </script><?php
         $sql = "SELECT id from dados_pessoais";
         $sql_query = mysqli_query($conexao,$sql);
         while($row = mysqli_fetch_array($sql_query)){
             $_SESSION['id_comprador'] = $row['id'];
         }
    }
    else{
        ?>
       <script>alert('ERRO');</script><?php 
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
?>