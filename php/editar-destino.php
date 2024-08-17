<?php
require_once "functions.php";
require_once "protecao_adm.php";
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
    <link rel="shortcut icon" href="../Imagens/logo-novo.png" type="image/x-icon">
    <title>Edição de Destinos</title>
</head>

<body>

<div class="texto-reserva">
        <h2 id="txt">Inserir Destinos</h2>
</div>
    <main class="formulario cadastroReservas">
        <form action="edicao-destino.php"  method="post" enctype="multipart/form-data">
            <?php
            require_once "conexao.php";
            $id_destino = $_REQUEST['id_destino'];
            $sql = "SELECT * from destinos WHERE id_destino=$id_destino";
            $sql_select = mysqli_query($conexao,$sql);
            $row = mysqli_fetch_array($sql_select)?>
        <section class="texto-form">
        <h2>Destinos</h2>
    </section>
    <div class="mb-3">
    <input type="hidden" class="form-control"  id="id_destino" name="id_destino" value="<?php echo $row['id_destino'];?>" required>
    </div>
        <div class="mb-3">
    <label for="destino" class="form-label">Destino </label>
    <input type="text" class="form-control"  id="nome" name="nome" value="<?php echo $row['nome'];?>" required>
    </div>
    <div class="mb-3">
    <label for="preco" class="form-label">Valor</label>
  <input type="text" class="form-control"  id="preco" name="preco"  value="<?php echo $row['preco'];?>"required>
    </div>
    <label for="descricao" class="form-label">Descricao</label>
  <input type="text" class="form-control"  id="descricao" name="descricao"  value="<?php echo $row['descricao'];?>" required>
    </div>
    <div class="mb-3">
    <label for="foto" class="form-label">Imagem</label>
  <input type="file" class="form-control"  id="imagem" name="foto">
    </div>

<div class="container">
<a href="menu_adm.php"><input type="button" class="btn btn-danger " value="Voltar"> </a>
<input type="submit" class="btn btn-primary" value="Enviar" name="enviar">
</div>
</form></main>
    <?php
    require_once "conexao.php";
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