<?php
require_once "functions.php";
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
    <link rel="shortcut icon" href="../Imagens/logo-novo.png" type="image/x-icon">
    <title>Escolha de Reservas</title>
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
            <li><a href="login_usuario.php">Reservas</a></li>
            <li><a href="../sobre.html">Sobre</a></li>
            <li class="active"><a href="perfil.php">Perfil</a></li>
            <li><a href="minhasReservas.php">Minhas reservas</a></li>
            <a href="logout.php"> <div class="divSair"><button class="btnSair"> Sair</button></div> </a>
            <div class="divMudartema"><i class="btnMudarTema fa-solid  fa-2x" id="btnMudarTema"> </i></div>
</ul>
        <h5>Olá, <?php echo $_SESSION['nome_usuario']; ?>!</h5>
       
    </nav>
    <section class="anuncio">
<h1> Descubra Seu Destino dos Sonhos: Ofertas Exclusivas e Locais Imperdíveis em Viagens! </h1>
</section>
    <div class="texto-reserva">
        <h2 id="txt">Realizar Reserva</h2>
</div>
  
    <main class="formulario reservasDisponiveis">
        <section id="aparecer">
<section class="texto-form">
        <h2>Reservar</h2>
    </section>
    <div class="destinosAreservar">
        <?php 
        require_once "conexao.php";
        $sql = "SELECT * from destinos";
        $sql_destinos_exibidos = $conexao->query($sql);
        while($linha = $sql_destinos_exibidos->fetch_array()){
            $img = "../Upload/" . $linha['foto'];
        ?>
 <div class="card" style="width: 18rem;">
  <img src="<?php echo $img;?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $linha['nome'];?></h5>
    <p class="card-title"> Valor por passagem: R$ <?php echo number_format($linha['preco'],2,',','.');?></p>
    <p class="card-title">Descrição: <?php echo $linha['descricao'];?></p>
    <button class="btn btnReservar" id="reservar" onclick="getId(<?php echo $linha['id_destino'];?>)">Reservar </button> 
  </div>
</div>
<?php }?>
    </div>
</section>
</main>


<footer class="footer reserva-realizada">
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

<script src="../js/reserva.js"></script>
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