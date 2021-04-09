<?php 
session_start();
$nome = $_POST['nome'];
$idcategoria = $_POST['subcategoria_id'];

include_once("conexao.php");

$Insertsql = "INSERT INTO subcategorias(nome,idcategoria) VALUES ('$nome','$idcategoria')";
$sql = mysqli_query($conectar,$Insertsql);  
mysqli_close($conectar);
header("Location: cadastrar_sub_categorias.php");
?>