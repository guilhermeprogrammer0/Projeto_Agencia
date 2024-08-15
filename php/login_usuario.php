<?php
 require_once "functions.php";
 error_reporting(0);
?>
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
    <link rel="shortcut icon" href="../Imagens/logo.jpeg" type="image/x-icon">
    <title>Entrar ou Cadastrar - se</title>
</head>

<body>
<div class="btn-menu">
        <i class="fa-solid fa-bars fa-3x" id="btn-menu"></i>
    </div>
    <nav id="menu">
        <ul class="menu">
        <div class="img-logo">
        <img src="../Imagens/logo-novo.png" class="img-logo-png">
            </div>
            <li><a href="../index.html">Início</a></li>
            <li><a href="../pacotes.html">Pacotes</a></li>
            <li class="active"><a href="login_usuario.php">Reservas</a></li>
            <li><a href="../curiosidades.html">Curiosidades</a></li>
            <li><a href="../sobre.html">Sobre</a></li>
        </ul>
    </nav>
    
    <main class="formulario tabela">
    <section class="texto-login txt-login-usuario">
        <h1>Entrar</h1>
    </section>
    <section class="formulario-login">
    <form action="login_usuario.php" method="POST">
  <div class="mb-3 form-login">
    <label for="email" class="form-label">E-mail</label>
    <input type="email" class="form-control campos-login" id="email" name="email" required>
  </div>
  <div class="mb-3 form-login">
    <label for="senha" class="form-label">Senha</label>
    <input type="password" class="form-control campos-login" id="senha" name="senha" required>
    <span id="mostrar">Mostrar Senha</span>
  </div>

  <div class="mb-3 botoes-login">
  <input type="reset" class="btn btn-danger" value="Limpar Campos">
    <input type="submit" name="entrar" class="btn btn-primary" value="Entrar">
</div>

<div class="mb-3 botoes-login">
<a class="link-offset-2 link-underline link-underline-opacity-0" href="cadastro_cliente.php">Cadastre - se </a>
</div>
</form>

    </section>
</main>
<?php
    require_once "conexao.php";
    if($_POST['entrar']){
        Login_Usuario($conexao,$_POST['email'],$_POST['senha']);
    }

?>

<footer class="footer">
        <div class="redes">
            <h3>Redes</h3>
            <div class="icones"><i class="fa-brands fa-whatsapp "></i>16998246382</div>
            <div class="icones"><i class="fa-brands fa-instagram"></i>@vf-agencia</div>
        </div>
        <div class="contato">
            <h3>Contato</h3>
            <div class="icones"><i class="fa-solid fa-phone "></i>1632510000</div>
            <div class="icones"><i class="fa-solid fa-phone"></i>16998246382</div>
        </div>
        <div class="maps">
            <h3>Localização Agência Física</h3>
            <div><iframe class="mapa"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5254.790280890376!2d-48.23503745159915!3d-21.362410432421147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94b90f98dc6d8c33%3A0xe227d4367f6ea2ee!2sPra%C3%A7a%20Silvio%20Vaz%20de%20Arruda!5e0!3m2!1spt-BR!2sbr!4v1684801257283!5m2!1spt-BR!2sbr"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe></div>
        </div>
    </footer>
      <script src="../js/senha.js"></script>
      <script src="../js/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
</body>
</html>