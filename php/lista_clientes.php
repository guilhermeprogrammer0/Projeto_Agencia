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
    <title>Lista de clientes</title>
</head>

<body>
   <header>
    <h1>Menu Administrativo</h1>
    <a href="logout_adm.php"> <div class="divSair"><button class="btnSair"> Sair</button></div> </a>
    </header>
      <p id="boa-vinda-adm"><?php echo "Olá, " .  $_SESSION['nome_adm'] . "!";?></p>
      <section class="texto">
    </section>
    <main class="clientes-principal-adm">  
      <section class="c-lista-clientes-adm">
      <h2>Lista de Clientes</h2>
<table class="table table-striped tabela-clientes">
  <thead class="thead-light ">
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Data Nascimento</th>
      <th scope="col">Telefone</th>
      <th scope="col">E-mail</th>
      <th scope="col">Cidade</th>
    </tr>
  </thead>
  <tbody class="tabela-clientes">
  <?php 
    require_once "conexao.php";
     $sql = "SELECT id,nome,cpf,data_nascimento,telefone,email,cep,cidade,estado,logradouro,bairro,numero from clientes";
    $sql_select = $conexao->query($sql);
    $qtd_cadastrados = $sql_select->num_rows;
    while($linha = $sql_select->fetch_array()){?>
    <tr>
    <td> <?php echo $linha['nome'];?></td>
    <td> <?php echo $linha['cpf'];?></td>
    <td> <?php echo $linha['data_nascimento'];?></td>
    <td> <?php echo $linha['telefone'];?></td>
    <td> <?php echo $linha['email'];?></td>
    <td> <?php echo $linha['cidade'];?></td>
    </tr>
    <?php } ?>
  </tbody>
    </table>
    <h3 id="txt-qtd">Quantidade de clientes: <strong><?php echo $qtd_cadastrados; ?> </strong></h3>
    </section>
    </main>
    <div class="btnVoltar">  
    <a href="menu_adm.php" class="btn"> Voltar </button> </a>
    </div>
    <script src="../js/acoesAdm.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
</body>
</html>