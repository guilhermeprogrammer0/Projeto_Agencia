<?php
 session_start();
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
        <form action="reservas.php"  method="post">
        <section class="texto-form">
        <h2>Dados Pessoais</h2>
    </section>
        <div class="row">
    <div class="col">
    <label for="nome" class="form-label">Nome</label>
  <input type="text" class="form-control"  id="nome" name="nome" required>
    </div>
     <div class="col">
     <label for="cpf" class="form-label">CPF</label>
  <input type="text" class="form-control" id="cpf" placeholder="xxx.xxx.xxx-xx" name="cpf"  required >
    </div>
    </div>
    <div class="row">
    <div class="col sexo-col">
     <label for="sexo" class="form-label sexo">Sexo</label>
     <input class="form-check-input" type="radio" name="sexo" id="sexo" value="M" required>
  <label class="form-check-label" for="sexo">
   Masculino
  </label>
  <input class="form-check-input" type="radio" name="sexo" id="sexo" value="F">
  <label class="form-check-label" for="sexo">
   Feminino
  </label>
    </div>
    <div class="col">
    <label for="data" class="form-label">Data de Nascimento</label>
  <input type="date" class="form-control" id="data" name="data_nascimento"  required>
    </div>
    
    </div>
    <section class="texto-form">
        <h2>Contato</h2>
    </section>
    <div class="row">
    <div class="col">
    <label for="tel" class="form-label">Telefone-Celular</label>
  <input type="text" class="form-control" id="tel" placeholder="DDXXXXXXXXX" name="telefone"  required>
    </div>
    <div class="col">
    <label for="email" class="form-label">E-mail</label>
  <input type="email" class="form-control" id="email" name="email"  required>
    </div>
    </div>
    <section class="texto-form">
        <h2>Endereço
        </h2>
    </section>
    <div class="row">
    <div class="col">
    <label for="cidade" class="form-label">Cidade</label>
  <input type="text" class="form-control" id="cidade" name="cidade"  required>
    </div>
    <div class="col">
    <label for="cep" class="form-label">CEP</label>
  <input type="text" class="form-control" id="cep" placeholder="xxxxxx-xx" name="cep"  required>
    </div>
    <div class="col">
    <label for="estado" class="form-label">Estado</label>
    <select class="form-select" name="estado">
  <option selected>Selecione</option>
  <option value="Acre">Acre</option>
  <option value="Alagoas">Alagoas</option>
  <option value="Amapá">Amapá</option>
  <option value="Amazonas">Amazonas</option>
  <option value="Bahia">Bahia</option>
  <option value="Ceará">Ceará</option>
  <option value="Espírito Santo">Espírito Santo</option>
  <option value="Goiás">Goiás</option>
  <option value="Maranhão">Maranhão</option>
  <option value="Mato Grosso">Mato Grosso</option>
  <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
  <option value="Minas Gerais">Minas Gerais</option>
  <option value="Pará">Pará</option>
  <option value="Paraíba">Paraíba</option>
  <option value="Paraná">Paraná</option>
  <option value="Pernambuco">Pernambuco</option>
  <option value="Piauí">Piauí</option>
  <option value="Rio de Janeiro">Rio de Janeiro</option>
  <option value="Rio Grande do Norte">Rio Grande do Norte</option>
  <option value="Rio Grande do Sul">Rio Grande do Sul</option>
  <option value="Rondônia">Rondônia</option>
  <option value="Roraima">Roraima</option>
  <option value="Santa Catarina">Santa Catarina</option>
  <option value="São Paulo">São Paulo</option>
  <option value="Sergipe">Sergipe</option>
  <option value="Tocantins">Tocantins</option>
  <option value="Distrito Federal">Distrito Federal</option>
</select>
    </div>
    </div>
    <div class="row">
    <div class="col">
    <label for="logra" class="form-label">Logradouro</label>
  <input type="text" class="form-control" id="logra" placeholder="Rua/Avenida" name="logradouro"  required>
    </div>
    <div class="col">
    <label for="bairro" class="form-label">Bairro</label>
  <input type="text" class="form-control" id="bairro" name="bairro"  required>
    </div>
    <div class="col">
    <label for="numero" class="form-label numero">Número</label>
  <input type="text" class="form-control" id="numero" name="numero"  required>
    </div>
    </div>

<div class="container">
    <input type="reset" class="btn btn-danger " value="Cancelar">
    <input type="submit" class="btn btn-primary" value="Enviar" name="enviar">
</div>
</form></main>

    <?php
    error_reporting(0);
    require_once "conexao.php";
    require_once "functions.php";
    if($_POST['enviar']){
        Cadastro_pessoais($conexao,$_POST['nome'],$_POST['cpf'],$_POST['sexo'],$_POST['data_nascimento'],$_POST['telefone'],$_POST['email'],$_POST['cidade'],$_POST['cep'],$_POST['estado'],$_POST['logradouro'],$_POST['bairro'],$_POST['numero']);
        $_SESSION['comprador'] = $_POST['nome'];
    } ?>
      
















      <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
</body>

</html>