<?php
  session_start();
  include_once("seguranca.php");

  include_once("conexao.php");
  $resultado=mysqli_query($conectar,"SELECT * FROM categorias ORDER BY 'id'");
  $linhas=mysqli_num_rows($resultado);
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
     <h1 class="text-center text-uppercase" >
     Lista de categorias</h1>
  </div>
<div class="card-body">
<div class="row">
  <div class="col-md-12">
    <table class="table">
    <thead>
      <tr>
      <th>ID</th>
      <th>Nome</th>
      <th></th>
      </tr>
    </thead>
    <tbody>
      <?php 
        while($linhas = mysqli_fetch_array($resultado)){
          echo "<tr>";
            echo "<td>".$linhas['id']."</td>";
            echo "<td>".$linhas['nome']."</td>";
            ?>
            <td> 
            
            <a href='edita_categorias.php?&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn  btn-warning'>Editar</button></a>   
            
            <?php
          echo "</tr>";
        }
      ?>
    </tbody>
    </table>
  </div>
  </div>
</div>
</div>

</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>
