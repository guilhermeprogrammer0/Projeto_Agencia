<?php
session_start();
require_once "functions.php";
require_once "conexao.php";
require_once "protecao.php";
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
    <title>Reservas</title>
</head>

<body>
<div class="btn-menu">
        <i class="fa-solid fa-bars fa-3x" id="btn-menu"></i>
    </div>
    <nav id="menu">
        <ul class="menu">
        <div class="img-logo">
                <img src="../Imagens/logo.jpeg">
            </div>
            <li><a href="../index.html">Início</a></li>
            <li><a href="../pacotes.html">Pacotes</a></li>
            <li class="active"><a href="reservas.php">Reservas</a></li>
            <li><a href="../curiosidades.html">Curiosidades</a></li>
            <li><a href="../sobre.html">Sobre</a></li>
        </ul>
    </nav>
    

    <div class="texto-reserva">
        <h2 id="txt">Confirmar Reserva</h2>
</div>

    <main class="formulario cards">
    <form action="confirmar.php" method="POST">
    <div class="row">
    <div class="col">
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Comprador</h5>
    <p class="card-text"><?php echo $_SESSION['comprador'];?></p>
    <h5 class="card-title">Destino</h5>
    <p class="card-text"><?php echo $_SESSION['destino'];?></p>
    <h5 class="card-title">Quantidade de Passagens</h5>
    <p class="card-text"><?php echo $_SESSION['qtd_passa'];?></p>
    <div class="botoes"><a href="voltar.php" class="btn btn-danger">Cancelar</a>
    <input type="submit" name="confirmar" class="btn btn-primary" value="Confirmar"></div>
    
  </div>
</div>
    </div>
    </form>
    </main>
    <div class="alert alert-primary escondida" role="alert">
            <h2> Reserva realizada com sucesso!<h2>
            <a href="reservas.php"><button type="button" class="btn btn-primary btn2">Fazer mais reservas</button></a>
            <a href="voltar.php"><button type="button" class="btn btn-danger btn2 ">Voltar ao Início</button></a>
            </div>

<?php
    $sql_numero = "SELECT * from dados_pessoais";
    $sql_numero2 = mysqli_query($conexao,$sql_numero);
    $num_linhas = mysqli_num_rows($sql_numero2);
    $sql_numero_reserva = "SELECT * from reservas";
    $sql_numero_reserva_2 = mysqli_query($conexao,$sql_numero_reserva);
    $num_linhas2 = mysqli_num_rows($sql_numero_reserva_2);
    if($_POST['confirmar']){
        Relizar_Reserva($conexao,$num_linhas,$num_linhas2);
        session_unset();
    }
    
    ?>











<script src="../js/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
</body>

</html>