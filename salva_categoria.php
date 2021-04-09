<?php 
session_start();
$nomeCategoria = $_POST['nome_categoria'];


if(empty($nomeCategoria)){
	//mensagem de erro
	$_SESSION['loginErro'] = "Nome da categoria vazio!";

	//manda o usuario para a tela de login
	header("Location: cadastrar_categorias.php");
}else{
	
	include_once("conexao.php");
	$Insertsql = "INSERT INTO categorias(nome) VALUES ('$nomeCategoria')";
	$sql = mysqli_query($conectar,$Insertsql);  
	mysqli_close($conectar);
	header("Location: lista_categorias.php");
}


?>
