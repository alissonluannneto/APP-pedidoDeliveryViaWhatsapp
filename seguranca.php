<?php
//tira os espaços em branco das variaves
 ob_start();
 if(($_SESSION['usuarioNome'] == "") || ($_SESSION['usuarioId'] == "")){

 	 unset($_SESSION['usuarioNome'], 
            $_SESSION['usuarioId']);
 	 
 	//mensagem erro
 	$_SESSION['loginErro'] = "Área restrita para usuários cadastrados";
 	//manda o usuario para atela de login
 	header("Location: login.php");
 }
?>