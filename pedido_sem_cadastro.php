<?php 

session_start();
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
     <link rel="icon" href="img/fivecon">
    <title>pedido</title>

  

    
  </head>
  <body style=" background-image: url(fundo03.jpg); ">
    <?php include_once("navBarVendas.php"); ?>
<main role="main" class="container">

  <div class="card">
  <div class="card-header">
    <h1>Endereço <img src="entrega.png"></h1>
    </div>
    <div class="card-body">
    <?php 
    	echo "<div class='alert alert-danger alert-dismissible'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong>Usuário sem cadastrado!</strong> Por favor cadastre-se agora com ponto de referência!.
       </div>";
    ?>

    <form class="form-signin" method="POST" action="salva_pedido.php" >
    <div class="form-group">
    <label for="exampleFormControlInput1">Nome</label>
    <input type="text" required="required" class="form-control" placeholder="nome completo" name="nome">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">celular:</label>
    <input type="text" required="required" class="form-control" placeholder="Ex. 82991918181" value="<?php echo$_GET['numero']?>" name="numero">
  </div>
  

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Endereço:</label>
    <textarea class="form-control" required="required" rows="3" name="endereco"></textarea>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Nº:</label>
    <input type="text" required="required" class="form-control" placeholder="Ex. Apat. 22 ou Bloco 11 ou 22"  name="numeroCasa">
  </div>
  
   <div class="form-group">
    <label for="exampleFormControlInput1">Bairro:</label>
    <input type="text" required="required" class="form-control" placeholder="Ex. Ponta verde"  name="bairro">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Ponto de referência:</label>
    <input type="text" required="required" class="form-control" placeholder="Ex. proxímo ao restaurante janga"  name="pontoReferencia">
  </div>
  
     <div class="form-group">
        <label for="exampleFormControlSelect1">Selecione a forma de pagamento:</label>
        <select class="form-control" id="inlineRadio1" name="inlineRadioOptions">
          <option value="Dinheiro">Dinheiro</option>
          <option value="Cartão">Cartão Débito/Crédito</option>
          <option value="Link pag seguro">Link pag seguro</option>
        </select>
      </div>
   
    
  </div>
</div>
  <hr>
  <div class="card">
  <div class="card-header">
  <h3>Resumo do Pedido <img src="shopping-cart_icon-icons.com_72552.ico"></h3>
</div>
<div class="card-body ">
  <div class="row">
          <table class="table table-responsive">
          <thead class="thead-dark">
            <tr>
            <th></th>
            <th>Nome</th>
            <th>Qtd</th>
            <th>preço</th>
            <th>Subtotal  </th>
            </tr>
          </thead>
          <tbody class="text-center" style="background: #fff">
<?php 
  if(count($_SESSION['carrinho']) == 0){
          echo '
        <tr>
          <td colspan="5">Não há produto no carrinho.</td>
        </tr>
      ';
          } else {
               require("conexao.php");
                $total = 0;
                foreach($_SESSION['carrinho'] as $id => $qtd){
                        $sql   = "SELECT *  FROM produtos WHERE id= '$id'";
                        $qr    = mysqli_query($conectar,$sql) or die(mysql_error());
                        $ln    = mysqli_fetch_assoc($qr);
                        $nomeProduto  = $ln['nome'];
                        $nome  = 'foto/'.$ln['nome_foto'];
                        $preco = number_format($ln['preco'], 2, ',', '.');
                        $sub   = number_format($ln['preco'] * $qtd, 2, ',', '.');
                        $total += $ln['preco'] * $qtd;
                         echo "
              <tr>   
              <td><img  src='$nome' class='circle' width=100 height=100</td>
              <td>$nomeProduto</td>
                <td>$qtd</td>
                <td>R$$preco</td>
                <td>R$$sub</td>
                </tr><br>";
                }
                $total = number_format($total, 2, ',', '.');
                echo "<tr>                         
              <td colspan='4'><strong>Total: R$ $total </strong></td>
                    </tr>";
          }
          ?>
          </tbody>
        </table>
      </div>
      </div>
      </div>
      <br>
  <div class="form-group row">
    <div class="col-sm-5">
      <button type="submit" class="btn btn-success btn-lg btn-block"><img src="comprar.png"> CONFIRMAR PEDIDO</button>
    </div>
  </div>
  </form>

</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>