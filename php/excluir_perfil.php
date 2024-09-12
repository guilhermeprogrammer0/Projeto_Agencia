<?php
require_once "conexao.php";
require_once "functions.php";
$sql_excluir_perfil = "DELETE FROM clientes WHERE id = ?";
$stmt_excluir_perfil = $conexao->prepare($sql_excluir_perfil);
$stmt_excluir_perfil->bind_param("i",$_SESSION['id_usuario']);
if($stmt_excluir_perfil->execute()){
    ?>
    <script>
        alert("Perfil excluido com sucesso!");
        window.location.href="login_usuario.php";
    </script>
    <?php
     $stmt_excluir_perfil->close();
}
unset($_SESSION['id_usuario']);
unset($_SESSION['nome_usuario']);
?>