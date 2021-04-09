<?php
session_start();
  include_once("seguranca.php");
  include_once("conexao.php");
  $id = $_GET['id'];
  //Executa consulta
  $result = mysqli_query($conectar,"UPDATE pedido SET status = 'Concluido' WHERE pedido.id = '$id' ");
  $resultado = mysqli_fetch_assoc($result);
  $id_produto = $resultado['id'];
  mysqli_close($conectar);
  header('Location: lista_pedido.php');
?>
