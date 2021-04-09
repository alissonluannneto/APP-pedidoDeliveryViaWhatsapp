<?php
  session_start();
  include_once("seguranca.php");

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
    <title>Administrativo</title>

  

    
  </head>
  <body>
    <?php include_once("navBar.php"); ?>
<main role="main" class="container">

<div class="card">
  <div class="card-header ">
  <h1 class="text-center text-uppercase" style="text-decoration: underline">Cadastrar produtos</h1>
  </div>
  <div class="card-body ">
<form class="form-signin" method="POST" action="salva_produto.php" enctype="multipart/form-data">
    <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Nome</label>
    <div class="col-sm-10">
      <input type="text" required="required" class="form-control" name="nome" placeholder="digite o nome do produto">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Codigo</label>
    <div class="col-sm-10">
      <input type="text" required="required" class="form-control" name="codigo" placeholder="codigo do produto">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">selecionar a foto</label>
    <div class="col-sm-10">
       <input type="file"  required="required" class="form-control-file" name="arquivo">
    </div>
  </div>
   <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Preço</label>
    <div class="col-sm-10">
      <input type="number" required="required" step="0.01" class="form-control" name="preco" placeholder="R$: 9,99">
    </div>
  </div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">subcategoria</label>
    <div class="col-sm-10">
  <select class="form-control"  required="required" name="categoria_id">
          <option>Selecione</option>
          <?php 
           include_once("conexao.php");
            $result = mysqli_query($conectar,"SELECT * FROM subcategorias");
            while($dados = mysqli_fetch_assoc($result)){
              ?>
                <option  required="required" value="<?php echo $dados["id"]; ?>"><?php echo $dados["nome"];?></option>
              <?php
            }
            mysqli_close($conectar);
          ?>
        </select>
  </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Descrição curta</label>
    <div class="col-sm-10">
      <textarea class="form-control" required="required" name="descricao_curta" maxlength="61" rows="3" placeholder="comentario sobre o produto com 61 caracteres" ></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Status:</label>
    <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Dinheiro" checked>
              <label class="form-check-label" for="inlineRadio1">Disponivel</label>
            </div>
        
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Cartão">
              <label class="form-check-label" for="inlineRadio2">Esgotado</label>
            </div>
  </div>
  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Descrição longa</label>
    <div class="col-sm-10">
      <textarea class="form-control" required="required" name="descricao" rows="3" placeholder="Descreva um breve comentario sobre o produto" ></textarea>
    </div>
  </div>

  
  <div class="form-group row">
    <div class="col-sm-5">
      <button type="submit" class="btn btn-success btn-lg ">salvar</button>
    </div>
  </div>
</form>
</div>
</div>

</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>
