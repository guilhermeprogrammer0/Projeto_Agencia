<?php
session_start();
unset($_SESSION['id_usuario']);
unset($_SESSION['nome_usuario']);
header("location:../index.html");
?>
