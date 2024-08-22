<?php
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
    <title>Reservas</title>
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
            <li><a href="../sobre.html">Sobre</a></li>
            <div class="divMudartema"><i class="btnMudarTema fa-solid  fa-2x" id="btnMudarTema"> </i></div>
        </ul>
    </nav>
    

    <div class="texto-reserva">
        <h2 id="txt">Cadastrar - se</h2>
</div>
  
    <main class="formulario">
        <form action="acoes.php"  method="post">
        <section class="texto-form">
        <h2>Dados Pessoais</h2>
    </section>
        <div class="row">
    <div class="col">
    <label for="nome" class="form-label">Nome Completo</label>
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
  <input type="text" class="form-control" id="tel" placeholder="(xx) xxxxx-xxxx" name="telefone"  required>
    </div>
    <div class="col">
    <label for="email" class="form-label">E-mail</label>
  <input type="email" class="form-control" id="email" name="email"  required>
  <span id="passwordHelpInline" class="form-text">
      Será usado para fazer futuras reservas
    </span>
    </div>
    <div class="col">
    <label for="senha" class="form-label">Senha</label>
  <input type="password" class="form-control" id="senha" name="senha"  required>
  <span id="passwordHelpInline" class="form-text">
  Será usado para fazer futuras reservas
    </span>
    </div>
    </div>
    <section class="texto-form">
        <h2>Endereço
        </h2>
    </section>
    <div class="row">
    <div class="col">
    <label for="cep" class="form-label">CEP</label>
  <input type="text" class="form-control " id="cep" placeholder="14840000" name="cep"  required>
    <span id="passwordHelpInline" class="form-text avisoCep">
    </span>
    </div>
    <div class="col">
    <label for="cidade" class="form-label">Cidade</label>
  <input type="text" class="form-control camposEndereco" id="cidade" name="cidade"  required>
    </div>
    <div class="col">
    <label for="estado" class="form-label">Estado</label>
    <select class="form-select camposEndereco" id="estado" name="estado">
  <option selected>Selecione</option>
  <option value="AC">AC</option>
  <option value="AL">AL</option>
  <option value="AP">AP</option>
  <option value="AM">AM</option>
  <option value="BA">BA</option>
  <option value="CE">CE</option>
  <option value="DF">DF</option>
  <option value="ES">ES</option>
  <option value="GO">GO</option>
  <option value="MA">MA</option>
  <option value="MT">MT</option>
  <option value="MS">MS</option>
  <option value="MG">MG</option>
  <option value="PA">PA</option>
  <option value="PB">PB</option>
  <option value="PR">PR</option>
  <option value="PE">PE</option>
  <option value="PI">PI</option>
  <option value="RJ">RJ</option>
  <option value="RN">RN</option>
  <option value="RS">RS</option>
  <option value="RO">RO</option>
  <option value="RR">RR</option>
  <option value="SC">SC</option>
  <option value="SP">SP</option>
  <option value="SE">SE</option>
  <option value="TO">TO</option>
</select>
    </div>
    </div>
    <div class="row">
    <div class="col">
    <label for="logradouro" class="form-label camposEndereco">Logradouro</label>
  <input type="text" class="form-control camposEndereco" id="logradouro" placeholder="Rua/Avenida" name="logradouro"  required>
    </div>
    <div class="col">
    <label for="bairro" class="form-label">Bairro</label>
  <input type="text" class="form-control camposEndereco" id="bairro" name="bairro"  required>
    </div>
    <div class="col">
    <label for="numero" class="form-label numero ">Número</label>
  <input type="text" class="form-control camposEndereco" id="numero" name="numero"  required>
    </div>
    </div>

<div class="container">
<a href="login_usuario.php"><input type="button" class="btn btn-danger " value="Cancelar"> </a>
    <input type="submit" class="btn btn-primary" value="Enviar" name="cadastrar_cliente">
</div>
</form></main>

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
      
      <script src="../js/api-cep.js"></script>
      <script src="../js/darkMode.js"></script>
      <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
</body>

</html>