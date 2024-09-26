<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ae27920976.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_media.css">
    <link rel="shortcut icon" href="../Imagens/logo-novo.png" type="image/x-icon">
    <title>Cadastrar usuário administrador</title>
</head>

<body>
   <header>
    <h1>Menu Administrativo</h1>
    </header>
    <main class="formulario tabela mensagem-adm ">
    <section class="texto-login">
        <h1>Cadastrar</h1>
    </section>
    <section class="formulario-login pagina-login-adm">
    <?php
    require_once "conexao.php";
    $sql_contar = "SELECT usuario from administrativo";
    $sql = $conexao->query($sql_contar);
    if($sql->num_rows<=4){
        ?>
    <form action="acoes.php" method="POST">
  <div class="mb-3 form-login">
    <label for="usuario" class="form-label">Usuário</label>
    <input type="text" class="form-control campos-login campos-login-adm" id="usuario" name="usuario" required>
    <div id="usuario" class="form-text">Pode ser e-mail ou cpf</div>
  </div>
  <div class="mb-3 form-login">
    <label for="senha" class="form-label">Senha</label>
    <input type="password" class="form-control campos-login campos-login-adm" id="senha" name="senha" required>
    <span id="mostrar">Mostrar Senha</span>
  </div>

  <div class="mb-3 botoes-login">
  <input type="reset" class="btn btnLimpar" value="Limpar">
    <input type="submit" name="cadastrar_usuario_adm" class="btn btnSucesso" value="Cadastrar">
</div>
<div class="mb-3 form-login">
</p><a class="link-offset-2 link-underline link-underline-opacity-0" href="login_menuadm.php">Voltar </a>
</div>
</form>
<?php
    }
    else{
       ?>
        <script>
            let mensagem_adm = document.querySelector(".mensagem-adm");
            mensagem_adm.classList.add("avisoQtdCadastros");
        </script>
       <h3 id="mensagem-adm">A base de dados atingiu o limite máximo de cadastros permitidos, que é de 4. </h3>
       <div class="mb-3 form-login">
       </p><a class="link-offset-2 link-underline link-underline-opacity-0" href="login_menuadm.php">Voltar </a>
    </div>
       <?php
    }

?>

    </section>
</main>

      <script src="../js/senha.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
</body>
</html>