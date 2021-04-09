<?php
  
  /*
  não usa mais!
  include_once("conexao.php");
  $id = $_GET['id'];
  //Executa consulta
  $result = mysqli_query($conectar,"SELECT * FROM produtos WHERE id = '$id' LIMIT 1");
  $resultado = mysqli_fetch_assoc($result);
  $foto = $resultado['nome_foto'];
  $nome = $resultado['nome'];
  $descricao = $resultado['descricao'];
  $preco = $resultado['preco'];
  $valor = 0;

  $pedido="%F0%9F%94%94%20*Novo%20Pedido%20via%20zapdalimpeza.com*%0d%0a%0d%0a*Cliente%3a*%20".$nome."%20luann%20((82)%2099143-1836%20-%20alissonluann91%40gmail.com)%0d%0a%0d%0a*Endere%C3%A7o%3a*%20Avenida%20Doutor%20Durval%20de%20G%C3%B3es%20Monteiro%2c%20yyy%20(www)%20-%20CEP%2057082-160%20-%20Bairro%20Santa%20L%C3%BAcia%20-%20Macei%C3%B3%20-%20AL%20(wqwwq)%0d%0a%0d%0a*Itens*%20%0d%0a2x%20%C3%81GUA%20SANIT%C3%81RIA%201LT%0d%0a%0d%0a*Valor%20dos%20Itens%3a*%207%2c98%0d%0a*Valor%20Total%3a*%207%2c98%0d%0a%0d%0a*Tipo%20Entrega%3a*%20Entregar%20no%20endere%C3%A7o%0d%0a*Forma%20de%20Pagamento%3a*%20Dinheiro%0d%0a*Troco%3a*%2060%2c00";
  

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
     <link rel="icon" href="img/fivecon">
    <title>vendas</title>
<script >
    function somarValores(){
        var n1 = parseInt(document.getElementById("txt1").value);
        var n2 = parseInt(1);
        var result = n1 + n2;
        var valorInicial;
        var preco = parseFloat(document.getElementById("precoOriginal").innerHTML);
		var precoFinal = preco * result;
		var arredondando = parseFloat(precoFinal.toFixed(2));
        document.getElementById('txt1').value = result;
        document.getElementById('preco').innerHTML = arredondando;
        
        
        ;
        
    }
    function subtrairValores(){
        var n1 = parseInt(document.getElementById("txt1").value);
        var preco = parseFloat(document.getElementById("precoOriginal").innerHTML);
        if(n1> 1){
	        var n2 = parseInt(1);
	        var result = n1 - n2;
	        document.getElementById('txt1').value = result;

			var precoFinal = parseFloat(preco) * parseInt(result);
			var arredondando = parseFloat(precoFinal.toFixed(2));
	        document.getElementById('txt1').value = result;
	        document.getElementById('preco').innerHTML = arredondando;
        }else{
        	 document.getElementById('txt1').value = n1;
        }
        
        
    }
</script>

  

    
  </head>
  <body>
    <?php include_once("navBar.php"); ?>
<main role="main" class="container">

<form class="form-signin" method="POST">
  <div class="starter-template">
    <h1>Detalhe do produtos</h1>
</div>
		    <div class="row no-gutters">
			  <div class="col-6 col-sm-6 col-md-4">
					<figure class="figure">
					  <img src="<?php echo "foto/$foto"; ?>" width='200px' height='200px'class="rounded float-left">
					  
					</figure>
			  </div>
			  <div class="col-6 col-md-8">
			  	<h5><?php echo $nome; ?></h5>
			  	<p><?php echo $descricao; ?></p>
			  	<p><h5 class="text-danger "> R$:<span id="precoOriginal"><?php echo $preco; ?></span></h5></p>
			  	<p><h5 class="text-danger "> TOTAL R$:<span id="preco"><?php echo $preco; ?></span></h5></p>
			  </div>
			  <div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <button class="btn btn-outline-secondary" onclick="subtrairValores()" type="button">-</button>
			  </div>
			  <input type="text" class="form-control text-center" placeholder="" aria-label="" aria-describedby="basic-addon1" id="txt1" value="1">
			  <div class="input-group-prepend">
			    <button class="btn btn-outline-secondary" onclick="somarValores()" type="button">+</button>
			  </div>

			</div>
					
				    <div class="col-6 col-md-4">
				     <a  class="btn btn-secondary btn-lg btn-block">Voltar</a>
				    </div>
				    <div class="col-6 col-md-4">
				      <a  class="btn btn-primary btn-lg btn-block">Adicionar</a>
				    </div>
				  
				
				
		</div>
    <div>
    	
    </div>
  
</form>

</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>
?>