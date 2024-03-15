<?php
session_start();

if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
    require 'conexao.php';

    $login = addslashes($_POST['login']);
    $senha = addslashes($_POST['senha']);
    
    // Verifica a conexão com o banco de dados
   
        $sql = "SELECT * FROM usuarios WHERE email = :login AND senha = :senha";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":login", $login);
        $stmt->bindValue(":senha", $senha);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $dado = $stmt->fetch();
            $_SESSION['id'] = $dado['id'];
            $_SESSION['email'] = $dado['email'];

            // Verificando se as credenciais do banco de dados esto chegando
            echo "ID da sessão: " . $_SESSION['id'] . "<br>";
            echo "Email da sessão: " . $_SESSION['email'] . "<br>";

            header("Location: index.php");
            exit();
        } else {
            header("Location: login.php");
            exit();
        }  
} else {
    header("Location: login.php");
    exit();
}

