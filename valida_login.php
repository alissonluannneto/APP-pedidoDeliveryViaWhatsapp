<?php 
session_start();
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

include_once("conexao.php");

$result = mysqli_query($conectar,"SELECT * FROM usuarios WHERE login= '$usuario' AND senha= '$senha' LIMIT 1");

$resultado = mysqli_fetch_assoc($result);

//echo "Usuário: ".$resultado['nome'];
if(empty($resultado)){
	//mensagem de erro
	$_SESSION['loginErro'] = "Usuário ou senha Inválida";

	//manda o usuario para a tela de login
	header("Location: login.php");
}else{

	$_SESSION['usuarioNome'] = $resultado['nome'];
	$_SESSION['usuarioId'] = $resultado['id'];
	header("Location: administrativo.php");
}
mysqli_close($conectar);
?>