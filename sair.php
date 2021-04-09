<?php
session_start();
session_destroy();

 //remove todas as informações globais
 unset($_SESSION['usuarioNome'], 
            $_SESSION['usuarioId'],$_SESSION['carrinho']);
 // manda o usuario para a tela de login
 header("Location: login.php");
?>