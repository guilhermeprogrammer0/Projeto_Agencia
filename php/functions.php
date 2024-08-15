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
        <script> window.location.href="escolhaReservas.php" </script><?php
         $sql = "SELECT id , nome from dados_pessoais";
         $sql_query = mysqli_query($conexao,$sql);
         $row = mysqli_fetch_array($sql);
             $_SESSION['id_usuario'] = $row['id'];
             $_SESSION['nome_usuario'] = $row['nome'];
    }
    else{
        ?>
       <script>alert('ERRO');</script><?php 
    }
}
}
function Cadastro_reservas($conexao,$destino,$qtd_passa,$valor_total){
    $sql = "INSERT INTO reservas values (default,'$destino','$qtd_passa','$valor_total')";
    $sql_cadastrar = mysqli_query($conexao,$sql);
    if($sql_cadastrar){
        $sql_mostrarId = "SELECT id_reserva from reservas ORDER BY id_reserva DESC LIMIT 1";
        $sql_idReserva = mysqli_query($conexao,$sql_mostrarId);
        $row = mysqli_fetch_array($sql_idReserva);
        $_SESSION['id_reserva'] = $row['id_reserva'];
    }
    else{
        ?>
       <script>alert('ERRO');</script><?php 
    }

}
function Reservar($conexao,$id_comprador,$id_reserva){
    $sql_reservar = "INSERT INTO reservas_realizadas values (default,'$id_comprador','$id_reserva')";
    $sql_reservado = mysqli_query($conexao,$sql_reservar);
    if($sql_reservado){
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
    $row = mysqli_fetch_array($sql_logado);
    if($qtd_linha>0){
            $_SESSION['id_adm'] = $row['id_adm'];
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
    $row = mysqli_fetch_array($sql_logado);
    if($qtd_linha>0){
            $_SESSION['id_usuario'] = $row['id'];
            $_SESSION['nome_usuario'] = $row['nome'];
        header("location:escolhaReservas.php");
    }
    else{
        ?> <script>alert('Login e/ou senha Inválidos.');</script><?php 
    }
}
function Exclusao($conexao, $id){
    $sql_excluir = "DELETE FROM reservas WHERE id_reserva = '$id'";
    $sql_excluido = mysqli_query($conexao,$sql_excluir);
}

function Cadastrar_Destinos($conexao,$nome,$preco,$foto){
    $extensao = strtolower(substr($_FILES['foto']['name'],-4));
    $foto = md5(time()) . $extensao;
    $diretorio = "../Upload/";
    move_uploaded_file($_FILES['foto']['tmp_name'],$diretorio.$foto);
    $sql_cadastrar = "INSERT INTO destinos VALUES(default,'$nome','$preco','$foto')";
    $sql_cadastro = mysqli_query($conexao, $sql_cadastrar);
    if ($sql_cadastro) {
?>
<script>alert('Cadastro feito com Sucesso!');</script>
<?php
    } else {
?>
<script>alert('Erro! Tente Novamente mais tarde!');</script>
<?php
    }
}



?>