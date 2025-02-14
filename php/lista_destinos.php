<?php
 require_once "functions.php";
 require_once "protecao_adm.php";
 require_once "functions.php";
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
    <title>Lista Destinos</title>
</head>

<body>
   <header>
    <h1>Menu Administrativo</h1>
    </header>
    <p id="boa-vinda-adm"><?php echo "Olá, " .  $_SESSION['nome_adm'] . "!";?></p>
    <main class="formulario tabela table-cadastrados">    
<table class="table table-striped">
  <thead class="thead-light">
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Preço</th>
      <th scope="col">Descrição</th>
      <th scope="col">Edição</th>
      <th scope="col">Exclusão</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    require_once "conexao.php";
    $sql = "SELECT * from destinos ORDER BY nome";
    $sql_select = $conexao->query($sql);
    while($linha = $sql_select->fetch_array()){?>
    <tr>
    <td> <?php echo $linha['nome'];?></td>
    <td> <?php echo $linha['preco'];?></td>
    <td> <?php echo $linha['descricao'];?></td>
    <form action="editar-destino.php" method = "POST">
      <input type="hidden" name="id_destino" value="<?php echo $linha['id_destino'];?>">
    <td> <button type="submit" class="btn btnEditar btnAcoes"> Editar </button></td>
    </form>
    <form action="acoes.php" method="POST" onsubmit="return confirm('Deseja mesmo excluir?')">
      <input type="hidden" name="id_destino" value="<?php echo $linha['id_destino'];?>">
    <td> <button type="submit" name="btnExcluirDestino" class="btn btnExcluir btnAcoes"> Excluir </button></td>
    </form>
    </tr>
    
    <?php } ?>
  </tbody>
    </table>
    </main>
    <div class="mb-3 btnVoltar">
    <a href="menu_adm.php"><button  class="btn">Voltar</button> </a>
</div>


      <script src="../js/script.js"></script>
      <script src="../js/acoesAdm.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
</body>
</html>