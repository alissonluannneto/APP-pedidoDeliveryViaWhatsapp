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
    <link href="css/starter-template.css" rel="stylesheet">
<!-- navbar navbar-expand-md navbar-dark bg-dark bg-primary-->
<!-- navbar navbar-dark bg-primary navbar-expand-md fixed-top-->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">ZAPLIMPEZA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="administrativo.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastrar</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="administrativo.php">produtos</a>
          <a class="dropdown-item" href="cadastrar_categorias.php">categorias</a>
          <a class="dropdown-item" href="cadastrar_sub_categorias.php">sub categorias</a>
          <a class="dropdown-item" href="sair.php">sair</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Listar</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="lista_categorias.php">categorias</a>
          <a class="dropdown-item" href="lista_subcategorias.php">subcategorias</a>
          <a class="dropdown-item" href="lista_produtos.php">produtos</a>
          <a class="dropdown-item" href="index.php">site vendas</a>
          <a class="dropdown-item" href="lista_pedido.php">pedidos</a>
          <a class="dropdown-item" href="sair.php">sair</a>
        </div>
      </li>
    </ul>
     <form class="form-inline mt-2 mt-md-0" action="login.php">
        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Área administrativa</button>
      </form>
  </div>
</nav>
