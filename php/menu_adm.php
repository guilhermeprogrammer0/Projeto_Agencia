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
    <title>Menu Administratvo</title>
</head>

<body>
   <header>
    <h1>Menu Administrativo</h1>
    <a href="logout_adm.php"> <div class="divSair"><button class="btnSair"> Sair</button></div> </a>
    </header>
      <p id="boa-vinda-adm"><?php echo "Olá, " .  $_SESSION['nome_adm'] . "!";?></p>
      <section class="texto">
      
       
    </section>
    <main class="principal-adm">  
    <section class="gerenciamento-adm">
    <h2>Gerenciamento</h2>
      <ul class="menu-adm">
        <li><strong>Gerenciamento dos destinos</strong></li>
        <li><a href="cadastro_destinos.php">Cadastrar Destinos</a></li>
        <li><a href="lista_destinos.php">Lista de Destinos</a></li>
        <li><strong>Clientes</strong></li>
        <li><a href="lista_clientes.php">Lista de clientes</a></li>
        <li><strong>Gerenciamento do perfil</strong></li>
        <li><a href="editar_dados_adm.php">Editar dados do perfil</a></li>
        <li><p onclick="excluir_conta_adm()">Excluir usuário</p></li>
      </ul>
</section>  
      <section class="lista-clientes-adm">
      <h2>Reserva dos Clientes</h2>
<table class="table table-striped">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Destino</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Realização</th>
      <th scope="col">Viagem</th>
      <th scope="col">Valor Total</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    require_once "conexao.php";
     $sql = "SELECT R.id_reserva, IF(R.id_cliente IS NULL, 'Cliente removido', C.nome) as nome_cliente, IF(R.id_destino IS NULL, 'Destino indisponível', D.nome) as nome_destino, R.qtd_passa, DATE_FORMAT(R.data_realizou,'%d/%m/%Y') as data_realizou, DATE_FORMAT(R.data_viagem,'%d/%m/%Y') as data_viagem,  R.valor_total FROM clientes as C RIGHT JOIN reservas as R  ON
    (R.id_cliente =  C.id) LEFT JOIN destinos as D ON
    (R.id_destino = D.id_destino)
    ORDER BY nome_cliente, nome_destino";
    $sql_select = $conexao->query($sql);
    $qtd_cadastrados = $sql_select->num_rows;
    while($linha = $sql_select->fetch_array()){?>
    <tr>
    <td> <?php echo $linha['id_reserva'];?></td>
    <td> <?php echo $linha['nome_cliente'];?></td>
    <td> <?php echo $linha['nome_destino'];?></td>
    <td> <?php echo $linha['qtd_passa'];?></td>
    <td> <?php echo $linha['data_realizou'];?></td>
    <td> <?php echo $linha['data_viagem'];?></td>
    <td> <?php echo "R$". number_format($linha['valor_total'],2,',','.');?></td>
    </tr>
    <?php } ?>
  </tbody>
    </table>
    <h3 id="txt-qtd">Quantidade de Reservas: <strong><?php echo $qtd_cadastrados; ?> </strong></h3>
    </section>
    </main>
    <script src="../js/acoesAdm.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
</body>
</html>