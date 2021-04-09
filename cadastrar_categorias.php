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
  <div class="card-header">
    <h1 class="text-center text-uppercase" style="text-decoration: underline">
    Cadastrar categorias</h1>
  </div>
  <div class="card-body">
    <form class="form-signin" method="POST" action="salva_categoria.php" >
    <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">NOME</label>
    <div class="col-sm-10">
      <input type="text" required="required" class="form-control" name="nome_categoria" placeholder="NOME">
    </div>
  </div> 
  <div class="form-group row">
    <div class="col-sm-5">
      <button type="submit" class="btn btn-success btn-lg">salvar</button>
    </div>
  </div>
  <p class="alert-danger" role="alert" >
  <?php 
       if(isset($_SESSION['loginErro'])){
         echo $_SESSION['loginErro'];
         unset($_SESSION['loginErro']);
       }
    ?>
</p>
  
  </form>
</div>
</div>

</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>