<?php

session_start();
$numero = $_POST['telefone'];

include_once("conexao.php");

$result = mysqli_query($conectar,"SELECT * FROM clientes WHERE telefone= '$numero' LIMIT 1");
$resultado = mysqli_fetch_assoc($result);
if(empty($resultado)){
	
	header("Location: pedido_sem_cadastro.php?&numero=$numero");
}else{
    $_SESSION['idCliente'] = $resultado['id'];
	$_SESSION['Nome'] = $resultado['nome'];
	$_SESSION['endereco'] = $resultado['endereco'];
	$_SESSION['pontoReferencia'] = $resultado['ponto_referencia'];
	$_SESSION['bairro'] = $resultado['bairro'];
	$_SESSION['numeroCasa'] = $resultado['numero_casa'];
	header("Location: pedido_com_cadastro.php?&numero=$numero");
}
mysqli_close($conectar);
?>