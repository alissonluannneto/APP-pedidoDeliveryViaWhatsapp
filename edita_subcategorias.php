<?php
session_start();
  include_once("seguranca.php");
  include_once("conexao.php");
  $id = $_GET['id'];
  //Executa consulta
  $result = mysqli_query($conectar,"SELECT * FROM subcategorias WHERE id = '$id' LIMIT 1");
  $resultado = mysqli_fetch_assoc($result);
  $id_produto = $resultado['id'];
  mysqli_close($conectar);
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
                   <h1 class="text-center text-uppercase">
                       Edita subcategorias</h1>
                </div>
                <div class="card-body">
                    <form class="form-signin" method="POST" action="altera_subcategorias.php" >
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">NOME</label>
                          <div class="col-sm-10">
                            <input type="text" required="required" class="form-control" name="nome_subcategoria" placeholder="NOME" value="<?php echo $resultado['nome']; ?>">
                          </div>
                        </div> 
                        <input type="hidden" name="id" value="<?php echo $id_produto;?>">
                        <div class="form-group row">
                          <div class="col-sm-6">
                            <a href='lista_subcategorias.php'><button type='button' class='btn  btn-secondary btn-lg'>Voltar</button></a>
                            <button type="submit" class="btn btn-warning btn-lg">Editar</button>
                          </div>
                        </div>
                  </form>
                </div>
          </div>
      </main><!-- /.container -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
  </body>
</html>