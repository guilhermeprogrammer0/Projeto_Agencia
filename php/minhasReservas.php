<?php
    require_once "functions.php";
    require_once "conexao.php";
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
    <link rel="shortcut icon" href="../Imagens/logo-novo.png" type="image/x-icon">
    <title>Minhas Reservas</title>
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
            <li><a href="perfil.php">Perfil</a></li>
            <li class="active"><a href="minhasReservas.php">Minhas reservas</a></li>
            <a href="logout.php"> <div class="divSair"><button class="btnSair"> Sair</button></div> </a>
            <div class="divMudartema"><i class="btnMudarTema fa-solid  fa-2x" id="btnMudarTema"> </i></div>
        </ul>
    </nav>
    <main class="minhasReservas">
    <?php 
    $idCliente = $_SESSION['id_usuario'];
    require_once "conexao.php";
     $sql = "SELECT R.id_reserva, R.destino, R.qtd_passa, R.data_viagem, R.data_realizou,  R.valor_total FROM clientes as C INNER JOIN reservas as R  ON
    (C.id = R.id_cliente)
    WHERE C.id = $idCliente
    ORDER BY R.destino, R.valor_total";
    $sql_select = $conexao->query($sql);
    $qtd_reservas = $sql_select->num_rows;
    if($qtd_reservas==0){
        ?>
        <section class="respostaMinhasReservas"><div class="alert alert-primary" role="alert"><h1>Você ainda não possui nenhuma reserva</h1></div></section>
        <?php
    }
    else{
   while($linha = $sql_select->fetch_array()){
    $data_viagem = new DateTime($linha['data_viagem']);
    $data_realizou = new DateTime($linha['data_realizou']);
    $dataAtual = new DateTime();
    ?>
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Destino: <?php echo $linha['destino']; ?></h5>
    <p class="card-text">Quantidade Passagens: <?php echo $linha['qtd_passa']; ?></p>
<p class="card-text">Data da viagem: <?php echo $data_viagem->format("d/m/Y");?></p>
    <p class="card-text">Data da realização: <?php echo $data_realizou->format("d/m/Y");?></p>
    <p class="card-text">Valor total: R$<?php echo  number_format($linha['valor_total'],2,',','.'); ?></p>
    <?php if($data_viagem > $dataAtual){?>
    <button class="btn btnExcluir" onclick="cancelarReserva(<?php echo $linha['id_reserva'];?>)">Cancelar Reserva</button>
    <?php 
    }
    else{?>
        <p class="btn btnSucesso" href="#"> Concluída </p> <?php
    }
    ?>
  </div>
</div>
<?php }}?>

</main>
<div class="btnVoltar">  
    <a href="escolhaReservas.php" class="btn btnVoltarCliente"> Voltar </button> </a>
    </div>

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
    <script src="../js/acoes.js"></script>
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