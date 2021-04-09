<?php 
session_start();
$id = $_POST['id'];
$nome = $_POST['nome'];
$pre = $_POST['preco'];
$qtd = $_POST['quantidade'];
$valorxqtd = ($pre * $qtd);
 
  if(!isset($_SESSION['carrinho'])){ 
    $_SESSION['carrinho'] = array(); 
  } //adiciona produto 

      
        $_SESSION['carrinho'][$id] = $qtd; 
        header("Location: index.php");
      
   //$_SESSION['carrinho'][$id] = $nome.",".$pre.",".$qtd.",".$valorxqtd; 
      
  //unset($_SESSION['carrinho']);
  
    /*if($_GET['acao'] == 'del'){ 
      $id = intval($_GET['id']); 
      if(isset($_SESSION['carrinho'][$id])){ 
        unset($_SESSION['carrinho'][$id]); 
      } 
    } *///ALTERAR QUANTIDADE 

    
    
    /*var_dump($_SESSION['carrinho']);
          
 
          
         echo "<a href='vendas.php'>VOLTAR</a><br>";

         require("conexao.php");
                $total = 0;
                foreach($_SESSION['carrinho'] as $id => $qtd){
                        $sql   = "SELECT *  FROM produtos WHERE id= '$id'";
                        $qr    = mysqli_query($conectar,$sql) or die(mysql_error());
                        $ln    = mysqli_fetch_assoc($qr);
                        $nome  = $ln['nome'];
                        $preco = number_format($ln['preco'], 2, ',', '.');
                        $sub   = number_format($ln['preco'] * $qtd, 2, ',', '.');
                        $total += $ln['preco'] * $qtd;
                         echo "
              <tr>       
                <td>'.$nome.'</td>
                <td><input type=text size=3 name=prod['.$id.'] value='.$qtd.' /></td>
                <td>R$ '.$preco.'</td>
                <td>R$ '.$sub.'</td>
                <td><a href=?acao=del&id='.$id.'>Remove</a></td>
                </tr><br>";
                }
                $total = number_format($total, 2, ',', '.');
                echo "<tr>                         
              <td colspan='4'>Total</td>
              <td>R$ '.$total.'</td>
                    </tr>";*/

?>
