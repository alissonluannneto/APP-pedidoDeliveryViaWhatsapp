<?php 
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <link rel="icon" href="IMG/fivecon">
    <title>LOGIN ADM</title>

    

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <?php 
      unset($_SESSION['usuarioNome'], 
            $_SESSION['usuarioId']);
    ?>
    <form class="form-signin" method="POST" action="valida_login.php" >
      <img rel="canonical" src="IMG/aquaplus.png">
  
  <h1 class="h3 mb-3 font-weight-normal">BEM-VINDO</h1>
  <label for="inputEmail" class="sr-only">EMAIL </label>
  <input type="text" name="usuario" class="form-control" placeholder="Usuário" required autofocus>
  <label for="inputPassword" class="sr-only">SENHA</label>
  <input type="password" name="senha" class="form-control" placeholder="Senha" required>
  
  <button class="btn btn-lg btn-primary btn-block" type="submit">ENTRAR</button> <br>
  <p class="text-center text-danger" >
    <?php 
       if(isset($_SESSION['loginErro'])){
         echo $_SESSION['loginErro'];
         unset($_SESSION['loginErro']);
       }
    ?>
 </p>
  <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
</form>
 
</body>
</html>
