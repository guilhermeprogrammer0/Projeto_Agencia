<?php
 session_start();
 require_once "protecao.php";
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
    <title>Reservas Parte 2</title>
</head>

<body>
<div class="btn-menu">
        <i class="fa-solid fa-bars fa-3x" id="btn-menu"></i>
    </div>
    <nav id="menu">
        <ul class="menu">
        <div class="img-logo">
                <img src="Imagens/logo.jpeg">
            </div>
            <li><a href="../index.html">Início</a></li>
            <li><a href="../pacotes.html">Pacotes</a></li>
            <li class="active"><a href="reservas.php">Reservas</a></li>
            <li><a href="#">Curiosidades</a></li>
            <li><a href="#">Sobre</a></li>
        </ul>
    </nav>
    

    <div class="texto-reserva">
        <h2>Realizar Reserva</h2>
</div>
  
    <main class="formulario">
        <form action="reservas2.php" method="post">
        <section id="aparecer">
<section class="texto-form">
        <h2>Reservar</h2>
    </section>
    <div class="row">
    <div class="col">
    <label for="destino" class="form-label">Destino</label  required>
    <select class="form-select selects" name="destino">
        <?php 
         require_once "conexao.php";
        $sql_destinos = "SELECT * from destinos";
        $sql_destinos_exibidos = mysqli_query($conexao,$sql_destinos);
        ?>
  <option selected>Selecione</option>
  <?php
    while($row = mysqli_fetch_array($sql_destinos_exibidos)){
        ?>
        <option value="<?php echo $row['nome'];?>"> <?php echo $row['nome'];?> </option><?php
    }
  ?>
  
</select>
    </div>
    <div class="col">
    <label for="pacote" class="form-label">Pacotes</label>
    <select class="form-select selects" name="pacotes"  required>
  <option selected>Selecione</option>
  <option value="1">3 dias e 2 noites</option>
  <option value="2">4 dias e 3 noites</option>
  <option value="3">7 dias e 6 noites</option>
</select>
    </div>
    <div class="col">
    <label for="qtd_passagem" class="form-label">Quantidade de Passagens</label>
  <input type="text" class="form-control qtd_passa" id="qtd_passagem" name="qtd_passa"  required>
</div>
</div></section>

<div class="container">
    <input type="reset" class="btn btn-danger " value="Cancelar">
    <input type="submit" class="btn btn-primary" value="Finalizar" name="enviar">
</div>

</form></main>
    <?php
    error_reporting(0);
    require_once "functions.php";
    if($_POST['enviar']){
        Cadastro_reservas($conexao,$_POST['destino'],$_POST['pacotes'],$_POST['qtd_passa']);
        $_SESSION['destino'] = $_POST['destino'];
        $_SESSION['qtd_passa'] = $_POST['qtd_passa'];
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