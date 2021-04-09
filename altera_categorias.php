<?php 
session_start();
$id = $_POST["id"];
$nomeCategoria = $_POST['nome_categoria'];

	
	include_once("conexao.php");
	$Insertsql = "UPDATE categorias SET nome = '$nomeCategoria' WHERE id='$id'";
	$sql = mysqli_query($conectar,$Insertsql);  
	mysqli_close($conectar);
	echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:8080/1-login/lista_categorias.php'>
					<script type=\"text/javascript\">
						alert(\"categoria editado com Sucesso.\");
					</script>
				";



?>