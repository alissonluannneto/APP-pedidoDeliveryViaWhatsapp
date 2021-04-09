<?php 

session_start();


if($_GET['acao'] == 'del'){ 
      $id = intval($_GET['id']); 
      if(isset($_SESSION['carrinho'][$id])){ 
        unset($_SESSION['carrinho'][$id]); 
      } 
    }
    echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;https://aquaplusdelivery.com/'>
			<script type=\"text/javascript\">
				alert(\"Produto removido!.\");
			</script>
		";
    //header("Location: vendas.php");
?>