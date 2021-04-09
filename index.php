<?php
  session_start();
  //include_once("seguranca.php");
  include_once("conexao.php");
  //Consultar os produtos conforme a categoria
  $resultado_prod_baix=mysqli_query($conectar,"SELECT p.id, p.nome, p.codigo, p.preco, p.id_sub_categoria, p.descricao, p.desc_curta, p.nome_foto, p.status, s.nome as sub, s.id as idsubcategoria FROM produtos p ,subcategorias s WHERE p.id_sub_categoria = s.id ORDER BY s.nome");
  $linhas_prod_baix=mysqli_num_rows($resultado_prod_baix);
  
  $res =mysqli_query($conectar,"SELECT p.id_sub_categoria, s.nome as sub FROM produtos p ,subcategorias s WHERE p.id_sub_categoria = s.id group by s.id ORDER by s.nome");
  $result_categorias = mysqli_num_rows($res);
  
  
  mysqli_close($conectar);
    
  if(!isset($_SESSION['carrinho'])){ 
    $_SESSION['carrinho'] = array(); 
  } 
  


?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
     <link rel="icon" href="IMG/fivecon">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



    <script >

    function atualizarModal(nome,foto,texto,preco,id,status){
       document.getElementById('titulo').innerHTML = nome;
        document.getElementById('image').src= foto; 
        document.getElementById('texto').innerHTML = texto;
        document.getElementById('valor').innerHTML = preco;
        document.getElementById('valorORIGINAL').value =preco;
        document.getElementById('inputPreco').value = preco;
        document.getElementById('inputNome').value = nome;
        document.getElementById('idProduto').value = id;
        document.getElementById('status').innerHTML = "Produto " + status + " no momento!";
        document.getElementById('status').value = status;
        var verificaStatus = document.getElementById('status').value ;
         
        if( verificaStatus == "Indispoível"){
       
            document.getElementById('adicionar').disabled=true;
            document.getElementById('btnMenos').disabled=true;
            document.getElementById('btnMais').disabled=true;
            document.getElementById('txt1').disabled=true;
            document.getElementById('status').style.display = 'block';
            
        }else{
            document.getElementById('adicionar').disabled=false;
            document.getElementById('btnMenos').disabled=false;
            document.getElementById('btnMais').disabled=false;
            document.getElementById('txt1').disabled=false;
            document.getElementById('status').style.display = 'none';
        }
        
        
    }
    function verificaDados(text){
        var teste = text;
        alert( " "+teste);
    }

    function somarValores(){
        var n1 = parseInt(document.getElementById("txt1").value);
        var n2 = parseInt(1);
        var result = n1 + n2;
        var preco = parseFloat(document.getElementById("valorORIGINAL").value);
        var precoFinal = preco * result;
        var arredondando = parseFloat(precoFinal.toFixed(2));
        document.getElementById('txt1').value = result;
        document.getElementById('valor').innerHTML = arredondando;
        
        
    }
    function subtrairValores(){
        var n1 = parseInt(document.getElementById("txt1").value);
        var preco = parseFloat(document.getElementById("valorORIGINAL").value);
        if(n1> 1){
          var n2 = parseInt(1);
          var result = n1 - n2;
         //document.getElementById('txt1').value = result;

          var precoFinal = parseFloat(preco) * parseInt(result);
          var arredondando = parseFloat(precoFinal.toFixed(2));
          document.getElementById('txt1').value = result;
          document.getElementById('valor').innerHTML = arredondando;
        }else{
           document.getElementById('txt1').value = n1;
        }
         
    }
    function toggleFAB(fab){
      if(document.querySelector(fab).classList.contains('show')){
        document.querySelector(fab).classList.remove('show');
      }else{
        document.querySelector(fab).classList.add('show');
      }
    }

document.querySelector('.fab .main').addEventListener('click', function(){
  toggleFAB('.fab');
});

document.querySelectorAll('.fab ul li button').forEach((item)=>{
  item.addEventListener('click', function(){
    toggleFAB('.fab');
  });
});

function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (i>=13) {
         document.getElementById("botao").disabled = false;
  }

  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
      
  }
  
}

function verificaCaracteres(documento){
  var i = documento.value.length;
  if (i<=13) {
         document.getElementById("botao").disabled = true;
      }
}
  
    
</script>
    
    
   <title>vendas</title>

  <style type="text/css">
  .testa {
  display: block;
  position:relative;
  left:50%;
  top:20%;
  transform: translate(-50%, -10%);
}
    .pull-right {
    float: right !important;
}
  .circle {
  /*background-color: #aaa;*/
  border-radius: 20%;
  width: 100px;
  height: 100px;
  overflow: hidden;
  position: relative;
}

.circle img {
  position: absolute;
  bottom: 0;
  width: 100%;
}

body{
  font-family: sans-serif;
}

.fab{
  position: fixed;
  bottom:10px;
  right:10px;
}

.fab button{
  cursor: pointer;
  width: 48px;
  height: 48px;
  border-radius: 30px;
  background-color: #F9A825;
  border: none;
  box-shadow: 0 1px 5px rgba(0,0,0,.4);
  font-size: 24px;
  color: white;
    
  -webkit-transition: .2s ease-out;
  -moz-transition: .2s ease-out;
  transition: .2s ease-out;
  
}

.fab button:focus{
  outline: none;
}

.fab button.main{
  position: absolute;
  width: 50px;
  height: 50px;
  border-radius: 30px;
  background-color: #400191;
  right: 0;
  bottom: 0;
  z-index: 20;
}

.fab button.main:before{
  content: '⏚';
}

.fab ul{
  position:absolute;
  bottom: 0;
  right: 0;
  padding:0;
  padding-right:5px;
  margin:0;
  list-style:none;
  z-index:10;
  
  -webkit-transition: .2s ease-out;
  -moz-transition: .2s ease-out;
  transition: .2s ease-out;
}

.fab ul li{
  display: flex;
  justify-content: flex-start;
  position: relative;
  margin-bottom: -10%;
  opacity: 0;
  
  -webkit-transition: .3s ease-out;
  -moz-transition: .3s ease-out;
  transition: .3s ease-out;
}

.fab ul li label{
  margin-right:10px;
  white-space: nowrap;
  display: block;
  margin-top: 10px;
  padding: 5px 8px;
  background-color: white;
  box-shadow: 0 1px 3px rgba(0,0,0,.2);
  border-radius:3px;
  height: 18px;
  font-size: 16px;
  pointer-events: none;
  opacity:0;
  
  -webkit-transition: .2s ease-out;
  -moz-transition: .2s ease-out;
  transition: .2s ease-out;
}

.fab button.main:active,
.fab button.main:focus{
  outline: none;
  background-color: #7716ff;
  box-shadow: 0 3px 8px rgba(0,0,0,.5);
 }
 
.fab button.main:active:before,
.fab button.main:focus:before{
  content: '↑';
}

.fab button.main:active + ul,
.fab button.main:focus + ul{
  bottom: 70px;
}

.fab button.main:active + ul li,
.fab button.main:focus + ul li{
  margin-bottom: 10px;
  opacity: 1;
}

.fab button.main:active + ul li:hover label,
.fab button.main:focus + ul li:hover label{
  opacity: 1;
}

div.scrollmenu {
    
    overflow: auto;
    white-space: nowrap;
    

  }

  div.scrollmenu a {
    display: inline-block;
    
    text-align: center;
    
    text-decoration: none;

  }

  div.scrollmenu a:hover {
    
  }
</style>

    
  </head>
  <body style=" background-image: url(fundo03.jpg); ">
    <?php include_once("navBarVendas.php"); ?>
    <br>
<main role="main" >

  <div class="container text-center">
  </div>
  <br>
  <div >
    <div class="container-fluid">

      <div class="scrollmenu">
      
        <?php 
          $ativo ="sim";
          
          while ( $NomeCategotia = mysqli_fetch_array($res)) {
            if($ativo == "sim" ){?>
    
            <a  href='#<?php echo $NomeCategotia['sub']; ?>'><button type='button' class='btn  btn-success '><?php echo $NomeCategotia['sub'];
              ?></button></a>
             <?php $ativo ="nao";  }else{?>
           
          
              <a  href='#<?php echo $NomeCategotia['sub']; ?>'><button type='button' class='btn  btn-success'><?php echo $NomeCategotia['sub'];
              ?></button></a>
           

           <?php }?>
          <?php } ?>
    </div>
      
            
      
      <?php
      while($linhas_prod = mysqli_fetch_array($resultado_prod_baix)){
        $imagem = 'foto/'.$linhas_prod['nome_foto']; 
        $nomeProd = $linhas_prod['nome']; ?>
        <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
       <?php  if($categoria != $linhas_prod['sub']){
          $categoria = $linhas_prod['sub']; ?>
             <br>
             <h3 class="alert alert-primary" id="<?php echo $categoria?>" class='text-uppercase' style=' text-align: center;'>
                 <?php echo $categoria; ?>
            </h3>
            <br>
                  
       <?php  }
        ?> 
        

        <div class="card" style="height: 12rem; " >
          <div class="card-body">
        <a onclick="atualizarModal('<?php echo $linhas_prod['nome']?>','<?php echo $imagem?>','<?php echo $linhas_prod['descricao']?>','<?php echo $linhas_prod['preco']?>','<?php echo $linhas_prod['id']?>','<?php echo $linhas_prod['status']?>')" data-toggle="modal" data-target=".bd-example-modal-lg" style="text-decoration:none;color: inherit;">
        
        <div class="row no-gutters" >
            <div class="col-8 col-sm-6 col-md-8">
              <!-- <div class="card-body"> -->
                  <p class="text-left "><strong class="text-uppercase"><?php echo $linhas_prod['nome'];?> </strong><br><?php echo $linhas_prod['desc_curta']; ?><br>
                    <strong style="color: red" >R$ <?php echo $linhas_prod['preco']; ?></strong><br>
                    </strong> <?php if($linhas_prod['status'] == "Disponivel"){
                     echo "<strong style='color: green'>Disponivel</strong>";
                    }else{
                     echo " 
                       <strong style='color: red'>Indisponível!</strong> ";
                        $pegaStatus= "Indisponível";
                       
                    }?>
                    </p>
             <!-- </div> -->
            </div>
            
            <div class="col-4 col-md-4">
              <img class=" circle float-right" src="<?php echo $imagem; ?>" alt="Generic placeholder image" >
            </div>
            
        </div>
        </a>
        </div>
      </div>
        </div>
        
        <?php
      }
      ?>
<form method="POST" action="carrinho.php"  >
      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-dialog" role="document">
        
 <!-- Inicio! quando seleciona o produto e escolhe a quantidade -->       
<div class="modal-content">
      <div class="modal-header">
        <input type="hidden" id="valorORIGINAL">
        <input type="hidden" id="idProduto" name="id">
        <h5 class="modal-title" id="titulo" ></h5>
        <input type="hidden" name="nome" id="inputNome">
        <h5 class="modal-title text-success" >R$:<span class="text-success " id="valor"> 
        </span></h5>
        <input type="hidden" name="preco" id="inputPreco">
      </div>
      <div class="modal-body">

      <div class="row">
            <div class="col-sm-12">
                 
            <p id="status" class="alert alert-danger font-weight-normal text-justify"> </p>
                
              
              
                <div class="text-center">
                  <img id="image" src="<?php echo "foto/$imagem"; ?>" width='150px' height='150px' >
                </div>
                
                  <p id="texto" class=" font-weight-normal text-justify"> </p>
                
              <br>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <button  class="btn btn-outline-secondary" id ="btnMenos" onclick="subtrairValores()" type="button">-</button>
                </div>
                <input  type="number" class="form-control text-center" placeholder=""  aria-label="" aria-describedby="basic-addon1" id="txt1" value="1" name="quantidade" readonly>
                <div class="input-group-prepend">
                  <button class="btn btn-outline-secondary" id = "btnMais" onclick="somarValores()" type="button">+</button>
                </div>
              </div>
            </div>
          </div>
          
      </div>

      <div class="col-sm-12">
                <div class="row">
                  <div class="col-6 col-sm-6">
                    <button type="button" class="btn btn-secondary btn-lg btn-block" data-dismiss="modal">Fechar</button>
                 </div>
                  <div class="col-6 col-sm-6">
                      <button id="adicionar" type="submit" class="btn btn-primary btn-lg btn-block" >Adicionar </button>
                  </div>

              </div>
         </div><br>

       
  </div>
  <!-- fim! quando seleciona o produto e escolhe a quantidade -->    
</div>
</div>
</div>
</form>

        <div class="fab">
          <button data-toggle="modal" data-target="#modalExemplo" >

            <img src="shopping-cart_icon-icons.com_72552.ico" class="testa" width="28" height= "28" >

          </button>
        </div>
    </div>
    
    <!-- Modal grande -->

<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Relatorio do carrinho</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          
        </button>
      </div>
      <div class="modal-body ">
      
    <?php if(count($_SESSION['carrinho']) != 0){
          echo" 
          <div class='alert alert-warning' role='alert'>
          <p>Arraste para o lado para  <strong>editar</strong> ou <strong>remover</strong></p>
          </div>
          ";
          }?>
         
          <table class="table table-responsive">
          <thead>
            <tr>
            <th>Nome</th>
            <th>Qtd</th>
            <th>preço</th>
            <th>Sub</th>
            </tr>
          </thead>
          <tbody>
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
                        $id = $ln['id'];
                        $nome  = $ln['nome'];
                        $foto = "foto/".$ln['nome_foto'];
                        $descricao =  $ln['desc_curta'];
                        $preco2 =$ln['preco'];
                        $preco = number_format($ln['preco'], 2, ',', '.');
                        $sub   = number_format($ln['preco'] * $qtd, 2, ',', '.');
                        $total += $ln['preco'] * $qtd;
                         echo "
              <tr>  
              
               <td><img  src='$foto' width='60' height='60'</td>
                <td>$nome</td>
                <td>$qtd</td>
                <td>$preco</td>
                <td>$sub</td>
                <!--
                <td><a href=#?acao=del&id=$id><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='black' width='36px' height='36px'><path d='M0 0h24v24H0z' fill='none'/><path d='M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 11h-4v4h-2v-4H7v-2h4V7h2v4h4v2z'/></svg></a></td> -->
                
                <td><a onclick ='atualizarModal(\"$nome\",\"$foto\",\"selecione a quantidade que deseja alterar!!\",\"$preco2\",\"$id\",\"Disponível\")' data-toggle='modal' data-target='.bd-example-modal-lg' data-dismiss='modal'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='black' width='28px' height='28px'><path d='M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z'/><path d='M0 0h24v24H0z' fill='none'/></svg></a></td> 
              
               <td> <a href=carrinho_diminue.php?acao=del&id=$id><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='black' width='28px' height='28px'><path d='M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z'/><path d='M0 0h24v24H0z' fill='none'/></svg></a></td></td>
                
                </tr><br>";
                }
                $total = number_format($total, 2, ',', '.');
                echo "<tr>                         
              <td colspan='2'><p class='alert alert-secondary'>Total: R$ $total</p></td>
             
                    </tr>
                     ";
          }
        ?>
        </tbody>
        </table>
      </div><!-- termina modal corpo-->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <?php 
        if (count($_SESSION['carrinho']) != 0) {
            echo "
            <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalZap' data-dismiss='modal'>Finalizar Compra</button>
            ";
        }
        
        ?>
      </div>
    </div>
  </div>
</div>
    
  </div>
  
<div class="modal" tabindex="-1" role="dialog" id="modalZap">
  <div class="modal-dialog" role="document">
    <form  method="POST" action="finaliza_pedido.php" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Finalizando compras</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Digite seu Whatsapp com o DDD</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" name="telefone" placeholder="Ex. 82991918181" maxlength="12" min="1"  required inputmode="numeric">
          </div>
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary"  id="botao">Finalizar</button>
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