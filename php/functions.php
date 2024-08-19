<?php
session_start();
function Cadastro_pessoais($conexao,$nome,$cpf,$sexo,$data_nascimento,$telefone,$email,$senha,$cidade,$cep,$estado,$logradouro,$bairro,$numero){
    $sql_verificar = "SELECT cpf, email from dados_pessoais WHERE cpf = ? OR email = ?";
    $stmt_verificar = $conexao->prepare($sql_verificar);
    $stmt_verificar->bind_param("ss",$cpf,$email);
    $resposta_verificacao = $stmt_verificar->execute()->get_result();
    if($resposta_verificacao->num_rows>0){
        ?>
        <script> alert('Você já possui cadastro no site, entre com seu e-mail e senha.'); 
        window.location.href = 'login_usuario.php';
    </script>
    <?php
    }
    else{
    $sql = "INSERT INTO dados_pessoais values (default,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt_cadastrar = $conexao->prepare($sql_cadastrar);
    $stmt_cadastrar->bind_param("sssssssssssss",$nome,$cpf,$sexo,$data_nascimento,$telefone,$email,$senha,$cidade,$cep,$estado,$logradouro,$bairro,$numero);
    if($stmt_cadastrar->execute()){?>
        <script> window.location.href="escolhaReservas.php" </script><?php
         $sql = "SELECT id , nome from dados_pessoais";
         $sql_query = $conexao->query($sql);
         $row = $sql_query->fetch_array();
             $_SESSION['id_usuario'] = $row['id'];
             $_SESSION['nome_usuario'] = $row['nome'];
    }
    else{
        ?>
       <script>alert('ERRO');</script><?php 
    }
    $stmt_cadastrar->close();
}
}
function Cadastro_reservas($conexao,$destino,$qtd_passa,$valor_total){
    $sql_reservas = "INSERT INTO reservas values (default,?,?,?)";
    $stmt_reservas = $conexao->prepare($sql_reservas);
    $stmt_reservas->bind_param("sid",$destino,$qtd_passa,$valor_total);
    if($stmt_reservas->execute()){
        $sql_mostrarId = "SELECT id_reserva from reservas ORDER BY id_reserva DESC LIMIT 1";
        $sql_idReserva = $conexao->query($sql_mostrarId);
        $row = $sql_idReserva->fetch_array();
        $_SESSION['id_reserva'] = $row['id_reserva'];
    }
    else{
        ?>
       <script>alert('ERRO');</script><?php 
    }
    $stmt_reservas->close();

}
function Reservar($conexao,$id_comprador,$id_reserva){
    $sql_reservar = "INSERT INTO reservas_realizadas values (default,?,?)";
    $stmt_reservar = $conexao->prepare($sql_reservar);
    $stmt_reservar->bind_param("ii",$id_comprador,$id_reserva);
    if($stmt_reservar->execute()){
        header("location:reserva_realizada.php");
        $stmt_reservar->close();
    }
     else{
         ?>
        <script>alert('ERRO');</script><?php 
     }
}
function Login_Usuario($conexao,$email,$senha){
    $sql_logar = "SELECT id, nome, email, senha from dados_pessoais WHERE email = ? AND senha = ?";
    $stmt_logar = $conexao->prepare($sql_logar);
    $stmt_logar->bind_param("ss",$email,$senha);
    $stmt_logar->execute();
    $resultado = $stmt_logar->get_result();
    $num_rows = $resultado->num_rows;
    if($num_rows>0){
            $row = $resultado->fetch_array();
            $_SESSION['id_usuario'] = $row['id'];
            $_SESSION['nome_usuario'] = $row['nome'];
        header("location:escolhaReservas.php");
    }
    else{
        ?> <script>alert('Login e/ou senha Inválidos.');</script><?php 
    }
    $stmt_logar->close();
}
//ADMINISTRATIVO
function Login_Adm($conexao,$usuario,$senha){
    $sql_logar = "SELECT  * from administrativo WHERE usuario = ? AND senha = ?";
    $stmt_logar = $conexao->prepare($sql_logar);
    $stmt_logar->bind_param("ss",$usuario,$senha);
    $stmt_logar->execute();
    $resultado = $stmt_logar->get_result();
    $num_rows = $resultado->num_rows;
    if($num_rows>0){
        $row = $resultado->fetch_array();
            $_SESSION['id_adm'] = $row['id_adm'];
        header("location:menu_adm.php");
    }
    else{
        ?> <script>alert('Login e/ou senha Inválidos');</script><?php 
    }
    $stmt_logar->close();
}
function Cadastrar_Destinos($conexao,$nome,$preco,$descricao,$foto){
     $files = $_FILES['foto'];
     $name = $files['name'];
     $tmp_name = $files['tmp_name'];
     $extensao = pathinfo($name,PATHINFO_EXTENSION);
     $novo_nome = uniqid() . '.' .$extensao;
     move_uploaded_file($tmp_name, '../Upload/'.$novo_nome);
    $sql_cadastrar = "INSERT INTO destinos  VALUES(default,?,?,?,?)";
    $stmt_cadastrar = $conexao->prepare($sql_cadastrar);
    $stmt_cadastrar->bind_param("sdss",$nome,$preco,$descricao,$novo_nome);
    if ($stmt_cadastrar->execute()) {
?>
<script>alert('Cadastro feito com Sucesso!');</script>
<?php
    } else {
?>
<script>alert('Erro! Tente Novamente mais tarde!');</script>
<?php
    }
    $stmt_cadastrar->close();
}
function Editar_Destino($conexao,$id_destino,$nome,$preco,$descricao,$foto){
    $files = $_FILES['foto'];
    $name = $files['name'];
    $tmp_name = $files['tmp_name'];
    $extensao = pathinfo($name,PATHINFO_EXTENSION);
    $novo_nome = uniqid() . '.' .$extensao;
    move_uploaded_file($tmp_name, '../Upload/'.$novo_nome);
    $tamArquivo = $files['size'];
    $temFoto = false;
    if($tamArquivo==0){
        $sql_editarDestino = "UPDATE destinos set nome= ?,preco=?,descricao=? WHERE id_destino=?";
        $temFoto = false;
    }
    else{
        $sql_editarDestino = "UPDATE destinos set nome=?,preco=?,descricao=?, foto=? WHERE id_destino=?";
        $temFoto = true;
    }
    $stmt_editarDestino = $conexao->prepare($sql_editarDestino);
    if($temFoto==true){
        $stmt_editarDestino->bind_param("sdssi",$nome,$preco,$descricao,$novo_nome,$id_destino);
    }
    else{
        $stmt_editarDestino->bind_param("sdsi",$nome,$preco,$descricao,$id_destino);
    }
    
    if($stmt_editarDestino->execute()){
        ?><script>alert("Destino editado com sucesso!");</script>
        <?php
    }
    else{
        ?><script>alert("Erro ao editar destino!");</script>
        <?php
    }
    $stmt_editarDestino->close();

}



?>