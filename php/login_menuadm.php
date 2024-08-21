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
    <title>Entrar</title>
</head>

<body>
   <header>
    <h1>Menu Administrativo</h1>
    </header>
    <main class="formulario tabela">
    <section class="texto-login">
        <h1>Entrar</h1>
    </section>
    <section class="formulario-login ">
    <form action="acoes.php" method="POST">
  <div class="mb-3 form-login">
    <label for="usuario" class="form-label">Usuário</label>
    <input type="email" class="form-control campos-login" id="usuario" name="usuario" required>
    <div id="usuario" class="form-text">Somente administradores possui um usuário</div>
  </div>
  <div class="mb-3 form-login">
    <label for="senha" class="form-label">Senha</label>
    <input type="password" class="form-control campos-login" id="senha" name="senha" required>
    <span id="mostrar">Mostrar Senha</span>
  </div>

  <div class="mb-3 botoes-login">
  <input type="reset" class="btn btn-danger" value="Limpar Campos">
    <input type="submit" name="logar_adm" class="btn btn-primary" value="Entrar">
</div>
</form>

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