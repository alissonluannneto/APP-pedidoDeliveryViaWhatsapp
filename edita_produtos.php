<?php
  session_start();
  include_once("seguranca.php");
  include_once("conexao.php");
  $id = $_GET['id'];
  //Executa consulta
  $result = mysqli_query($conectar,"SELECT * FROM produtos WHERE id = '$id' LIMIT 1");
  $resultado = mysqli_fetch_assoc($result);
  $id_produto = $resultado['id'];
  $foto = $resultado['nome_foto'];

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
                     Editar produtos</h1>
              </div>
          <div class="card-body">
              <form class="form-signin" method="POST" action="altera_produtos.php" enctype="multipart/form-data">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Nome</label>
                      <div class="col-sm-10">
                        <input type="text" required="required" class="form-control" name="nome" placeholder="digite o nome do produto" value="<?php echo $resultado['nome']; ?>">
                      </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Codigo</label>
                    <div class="col-sm-10">
                      <input type="text" required="required" class="form-control" name="codigo" placeholder="digite o nome do produto" value="<?php echo $resultado['codigo']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 control-label">  
                          Foto do Produto Antiga
                    </label>
                    <div class="col-sm-1">
                        <img src="<?php echo "foto/$foto"; ?>" width="100" height="100">
                         <input type="hidden" name="img_antiga" value='<?php echo $foto ?>'>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">selecionar a foto</label>
                    <div class="col-sm-10">
                       <input type="file"   class="form-control-file" name="arquivo">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Preço</label>
                    <div class="col-sm-10">
                        <input type="number" required="required" step="0.01" class="form-control" name="preco" placeholder="R$: 9,99" value="<?php echo $resultado['preco']; ?>">
                    </div>
                </div>
                <?php $categoria_id = $resultado['id_sub_categoria']; ?>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">subcategoria</label>
                    <div class="col-sm-10">
                        <select class="form-control"  required="required" name="categoria_id">
                                <option>Selecione</option>
                                <?php
                                include_once("conexao.php");
                                $result = mysqli_query($conectar,"SELECT * FROM subcategorias");
                                while($dados = mysqli_fetch_assoc($result)){
                                    $id_categoria = $dados['id'];
                                ?>
                                    <option value="<?php echo $dados["id"]; ?>"<?php if($id_categoria == $categoria_id){ echo 'selected'; } ?>
                                      ><?php echo $dados["nome"];?></option>
                                    <?php
                                }
                                mysqli_close($conectar);
                                ?>
                        </select>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Descrição Curta</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" required="required" name="descricao_curta" maxlength="61" rows="3" placeholder="Descreva um breve comentario sobre o produto" ><?php echo $resultado['desc_curta']; ?></textarea>
                    </div>
                </div>
                
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Status:</label>
                <?php if ($resultado['status'] == "Disponivel"){
                    
                   echo " <div class='form-check form-check-inline'>
                      <input class='form-check-input' type='radio' name='inlineRadioOptions' id='inlineRadio1' value='Disponivel' checked>
                      <label class='form-check-label' for='inlineRadio1'>Disponivel</label>
                    </div>
            
                    <div class='form-check form-check-inline'>
                      <input class='form-check-input' type='radio' name='inlineRadioOptions' id='inlineRadio2' value='Indispoível'>
                      <label class='form-check-label' for='inlineRadio2'>Indispoível</label>
                    </div>";
                
                }else {
                     echo " <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='inlineRadioOptions' id='inlineRadio1' value='Disponivel' >
                                <label class='form-check-label' for='inlineRadio1'>Disponivel</label>
                            </div>
            
                            <div class='form-check form-check-inline'>
                              <input class='form-check-input' type='radio' name='inlineRadioOptions' id='inlineRadio2' value='Indispoível'checked>
                              <label class='form-check-label' for='inlineRadio2'>Indispoível</label>
                            </div>";
                } ?>
                </div>
                    
                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Descrição</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" required="required" name="descricao" rows="3" placeholder="Descreva um breve comentario sobre o produto" ><?php echo $resultado['descricao']; ?></textarea>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $id_produto;?>">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <a href='lista_produtos.php'><button type='button' class='btn  btn-secondary btn-lg'>Voltar</button></a>
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
