<?php
if(!isset($_SESSION['id_usuario'])){
    unset($_SESSION['id_usuario']);
    header("location:../index.html");
}
