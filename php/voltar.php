<?php
session_start();
unset($_SESSION['comprador']);
header("location:../index.html");


?>