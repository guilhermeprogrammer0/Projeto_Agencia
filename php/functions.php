<?php
session_start();
error_reporting(0);
function cadastro_cliente($conexao,$nome,$cpf,$sexo,$data_nascimento,$telefone,$email,$senha,$cidade,$cep,$estado,$logradouro,$bairro,$numero){
    $sql_verificar = "SELECT cpf, email from clientes WHERE cpf = ? OR email = ?";
    $stmt_verificar = $conexao->prepare($sql_verificar);
    $stmt_verificar->bind_param("ss",$cpf,$email);
    $stmt_verificar->execute();
    $resposta_verificacao = $stmt_verificar->get_result();
    if($resposta_verificacao->num_rows>0){
        ?>
        <script> alert('Você já possui cadastro no site, entre com seu e-mail e senha.'); 
        window.location.href = 'login_usuario.php';
    </script>
    <?php
    }
    else{
    $sql_cadastrar = "INSERT INTO clientes values (default,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt_cadastrar = $conexao->prepare($sql_cadastrar);
    $stmt_cadastrar->bind_param("sssssssssssss",$nome,$cpf,$sexo,$data_nascimento,$telefone,$email,$senha,$cidade,$cep,$estado,$logradouro,$bairro,$numero);
    if($stmt_cadastrar->execute()){?>
        <script> window.location.href="escolhaReservas.php" </script><?php
         $sql = "SELECT id , nome from clientes ORDER BY id DESC LIMIT 1";
         $sql_query = $conexao->query($sql);
         $row = $sql_query->fetch_array();
             $_SESSION['id_usuario'] = $row['id'];
             $_SESSION['nome_usuario'] = $row['nome'];
    }
    else{
        ?>
       <script>alert('Erro ao Cadastrar');
        window.location.href = 'cadastro_cliente.php';
       </script><?php 
    }
    $stmt_cadastrar->close();
}
}
function cadastro_reservas($conexao,$destino,$qtd_passa,$valor_total,$id_cliente){
    $sql_reservas = "INSERT INTO reservas values (default,?,?,?,?)";
    $stmt_reservas = $conexao->prepare($sql_reservas);
    $stmt_reservas->bind_param("sidi",$destino,$qtd_passa,$valor_total,$id_cliente);
    if($stmt_reservas->execute()){
        ?>
        <script>
         window.location.href = 'reserva_realizada.php';
        </script><?php 
    }
    else{
        ?>
       <script>alert('Erro ao fazer a reserva');
        window.location.href = 'escolhaReservas.php';
       </script><?php 
    }
    $stmt_reservas->close();

}
function login_usuario($conexao,$email,$senha){
    $sql_logar = "SELECT id, nome, email, senha from clientes WHERE email = ? AND senha = ?";
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
        ?> <script>alert('Login e/ou senha inválidos.');
        window.location.href = 'login_usuario.php';
        </script><?php 
    }
    $stmt_logar->close();
}
function editar_perfil($conexao,$id,$nome,$cpf,$sexo,$data_nascimento,$telefone,$email,$senha,$cidade,$cep,$estado,$logradouro,$bairro,$numero){
    $sql_verificar = "SELECT cpf, email from clientes WHERE (cpf = ? OR email = ?) AND id != ?";
    $stmt_verificar = $conexao->prepare($sql_verificar);
    $stmt_verificar->bind_param("ssi",$cpf,$email,$id);
    $stmt_verificar->execute();
    $resposta_verificacao = $stmt_verificar->get_result();
    $linha = $resposta_verificacao->fetch_array();
    if($resposta_verificacao->num_rows==0)
    {
        $sql_editar = "UPDATE clientes set nome = ?,cpf = ?,sexo = ?,data_nascimento = ?,telefone = ?,email = ?,senha = ?,cidade = ?,cep = ?,estado = ?,logradouro = ?,bairro = ?,numero = ? WHERE id = ?";
        $stmt_editar_perfil = $conexao->prepare($sql_editar);
        $stmt_editar_perfil->bind_param("sssssssssssssi",$nome,$cpf,$sexo,$data_nascimento,$telefone,$email,$senha,$cidade,$cep,$estado,$logradouro,$bairro,$numero,$id);
        if($stmt_editar_perfil->execute()){
            ?>
            <script>alert("Edição realizada com sucesso");
                window.location.href="perfil.php";
            </script>
            <?php
        }
        else{
            ?>
            <script>alert("Erro ao editar! Tente novamente.");
            </script>
            <?php
        }
    }
    else{
        ?>
        <script> alert('E-mail e/ou cpf indisponíveis indisponível para uso!'); 
        window.location.href = 'editar_perfil.php';
    </script>
    <?php
}
    }
function excluir_perfil($conexao,$id){
    $sql_desassociar = "UPDATE reservas set id_cliente = NULL WHERE id_cliente = ?";
    $stmt_desassociar = $conexao->prepare($sql_desassociar);
    $stmt_desassociar->bind_param("i",$id);
    if($stmt_desassociar->execute()){
        $sql_excluir_perfil = "DELETE from clientes WHERE id = ?";
        $stmt_excluir_perfil = $conexao->prepare($sql_excluir_perfil);
        $stmt_excluir_perfil->bind_param("i",$id);
        if($stmt_excluir_perfil->execute()){
            ?>
            <script>alert("Conta excluida com sucesso!")
                window.location.href = "login_usuario.php";
            </script>
            <?php
        }
        else{
            ?>
            <script>alert("Erro ao excluir sua conta!")
            </script>
            <?php
        }
        $stmt_excluir_perfil->close();
    }
    $stmt_desassociar->close();

}
//ADMINISTRATIVO
function cadastrar_administrador($conexao,$usuario,$senha){
    $sql_verificar = "SELECT usuario from administrativo WHERE usuario = ?";
    $stmt_verificar = $conexao->prepare($sql_verificar);
    $stmt_verificar->bind_param("s",$usuario);
    $stmt_verificar->execute();
    $resposta = $stmt_verificar->get_result();
    if($resposta->num_rows>0){
        ?>
        <script>alert("Já existe esse usuário na base de dados! Tente outro");</script>
        <?php
    }
    else{
        $sql_cadastrar_adm = "INSERT INTO administrativo values (default,?,?)";
        $stmt_cadastrar_adm = $conexao->prepare($sql_cadastrar_adm);
        $stmt_cadastrar_adm->bind_param("ss",$usuario,$senha);
        if($stmt_cadastrar_adm->execute()){
            ?>
            <script>alert("Usuário administrador criado com sucesso!");
                window.location.href="login_menuadm.php";
            </script>
            <?php
        }
        else{
            ?>
            <script>alert("Erro! Tente novamente!");
                window.location.href="cadastro_usuario_adm.php";
            </script>
            <?php
        }
    }
}
function login_adm($conexao,$usuario,$senha){
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
        ?> <script>alert('Login e/ou senha inválidos');
        window.location.href = 'login_menuadm.php';
        </script><?php 
    }
    $stmt_logar->close();
}
function cadastrar_destinos($conexao,$nome,$preco,$descricao,$foto){
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
<script>alert('Cadastro feito com Sucesso!');
    window.location.href = "lista_destinos.php";
</script>
<?php
    } else {
?>
<script>alert('Erro! Tente Novamente!');
    window.location.href = 'cadastro_destinos.php';
</script>
<?php
    }
    $stmt_cadastrar->close();
}
function editar_destino($conexao,$id_destino,$nome,$preco,$descricao,$foto){
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
        ?><script>alert("Erro ao editar destino!");
        window.location.href = 'lista_destinos.php';
        </script>
        <?php
    }
    $stmt_editarDestino->close();

}
function excluir_destino($conexao,$id_destino_excluir){
$sql_excluir = "DELETE FROM destinos WHERE id_destino = ?";
$stmt_excluir = $conexao->prepare($sql_excluir);
$stmt_excluir->bind_param("i",$id_destino_excluir);
$stmt_excluir->execute();
header("location:lista_destinos.php");
$stmt_excluir->close();

}



?>