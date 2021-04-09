<?php 
session_start();
$id = $_POST["id"];
$nomeSubCategoria = $_POST['nome_subcategoria'];

	
	include_once("conexao.php");
	$Insertsql = "UPDATE subcategorias SET nome = '$nomeSubCategoria' WHERE id='$id'";
	$sql = mysqli_query($conectar,$Insertsql);  
	mysqli_close($conectar);
	echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://aquaplusdelivery.com/lista_subcategorias.php'>
					<script type=\"text/javascript\">
						alert(\"Subcategoria editado com Sucesso.\");
					</script>
				";



?>