<?php
session_start();

// Verifica se a sessão 'id' está definida
if (isset($_SESSION['id'])) {
    $user = $_SESSION['email'];
    $id = $_SESSION['id'];
} else {
    header("Location:login.php");
}
echo $user;
print_r("<br>");
echo $id;

