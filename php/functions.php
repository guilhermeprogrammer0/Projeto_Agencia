<?php
function Cadastro_pessoais($conexao,$nome,$cpf,$sexo,$data_nascimento,$telefone,$email,$cidade,$cep,$estado,$logradouro,$bairro,$numero){
    $sql = "INSERT INTO dados_pessoais values (default,'$nome','$cpf','$sexo','$data_nascimento','$telefone','$email','$cidade','$cep','$estado','$logradouro','$bairro','$numero')";
    $sql_cadastrar = mysqli_query($conexao,$sql);
    if($sql_cadastrar){?>
        <script> window.location.href="reservas2.php" </script><?php
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
        ?>
        <script>
            var formulario = document.querySelector(".formulario");
            formulario.style.display =  'none';
            var texto_reserva = document.querySelector(".texto-reserva");
            texto_reserva.style.display = 'none';
            var escondida = document.querySelector(".escondida");
            escondida.classList.remove("escondida");
                </script><?php
     }
     else{
         ?>
        <script>alert('ERRO');</script><?php 
     }
}
?>