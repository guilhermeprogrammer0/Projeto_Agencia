<?php
 require_once "functions.php";
 require_once "protecao_adm.php";
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
    <title>Menu Administratvo</title>
</head>

<body>
   <header>
    <h1>Menu Administrativo</h1>
    </header>
    <main class="formulario tabela table-cadastrados">    
<table class="table table-striped">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Destino</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Valor Total</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    require_once "conexao.php";
     $sql = "SELECT RR.id_realizada, D.nome, R.destino, R.qtd_passa,  R.valor_total from dados_pessoais as D inner join reservas_realizadas as RR  ON
    (D.id = RR.id_comprador) inner join reservas as R ON
    (R.id_reserva = RR.id_reserva) ORDER BY D.nome, R.valor_total";
    $sql_select = mysqli_query($conexao,$sql);
    $qtd_cadastrados = mysqli_num_rows($sql_select);
    while($row = mysqli_fetch_array($sql_select)){?>
    <tr>
    <td> <?php echo $row['id_realizada'];?></td>
    <td> <?php echo $row['nome'];?></td>
    <td> <?php echo $row['destino'];?></td>
    <td> <?php echo $row['qtd_passa'];?></td>
    <td> <?php echo "R$". number_format($row['valor_total'],2,',','.');?></td>
    </tr>
    <?php } ?>
  </tbody>
    </table>
    </main>
    <h3 id="txt-qtd">Quantidade de Reservas: <strong><?php echo $qtd_cadastrados; ?> </strong></h3>
    <div class="mb-3 botoes-login">
    <a href="logout_adm.php"><button  class="btn btn-danger btn-danger-menu">Sair </button> </a>
    <a href="cadastro_destinos.php"><button  class="btn btn-primary btn-danger-menu">Cadastrar Destinos </button> </a>
</div>


      <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
</body>
</html>