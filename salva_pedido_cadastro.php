<?php 
session_start();
include_once("conexao.php");
$nome = $_POST['nome'];
$numero = $_POST['numero'];
$endereco = $_POST['endereco'];
$pontoReferencia = $_POST['pontoReferencia'];
$bairro = $_POST['bairro'];
$numeroCasa = $_POST['numeroCasa'];
$forma_de_pagamento = $_POST['forma_pg'];
$id_compra = uniqid(NULL, true);
$idcli = $_SESSION['idCliente'];
$status = "Pendente";
if ($endereco != $_SESSION['endereco']) {
  $result = mysqli_query($conectar,"UPDATE clientes SET endereco = '$endereco', ponto_referencia = '$pontoReferencia', bairro = '$bairro', numero_casa = '$numeroCasa' WHERE id='$idcli'");
}

$result = mysqli_query($conectar,"SELECT * FROM clientes WHERE telefone= '$numero' LIMIT 1");
$resultado = mysqli_fetch_assoc($result);
$idcliente = $resultado['id'];
date_default_timezone_set('America/Sao_Paulo');
$data = date('d/m/Y \à\s H:i:s');

$textopedido ="";
$textopedidoGuarda ="";
 $total = 0;
foreach($_SESSION['carrinho'] as $id => $qtd){
    $sql   = "SELECT *  FROM produtos WHERE id= '$id'";
    $qr    = mysqli_query($conectar,$sql) or die(mysql_error());
    $ln    = mysqli_fetch_assoc($qr);
    $nome  = $ln['nome'];
    $codigo = $ln['codigo'];
    $preco1 = $ln['preco'];
    $sub1 = $ln['preco'] * $qtd;
    $preco = number_format($ln['preco'], 2, ',', '.');
    $sub   = number_format($ln['preco'] * $qtd, 2, ',', '.');
    $textopedidoGuarda .= " ($codigo) - $nome - $qtd"."x - R$:"."$sub ";
    $textopedido .= " ($codigo) - $nome - $qtd"."x - R$:"."$sub "."%0d%0a%0d
    
%0a";
    $total += $ln['preco'] * $qtd;   
    mysqli_query($conectar,"INSERT INTO teste_pedido(id_compra, id_cliente, codigo_produto, nome_produto, quatidade, preco, subtotal, data) VALUES ('$id_compra','$idcliente', '$codigo','$nome','$qtd','$preco1','$sub1','$data')");
}
//mysqli_close($conectar);
//<a href="https://api.whatsapp.com/send?phone=5582991431836&text=jww">text</a>

$resulti = mysqli_query($conectar,"INSERT INTO pedido( id_cliente, chave_pedido, pedido, data, status) VALUES ('$idcliente','$id_compra','$textopedidoGuarda','$data','$status')");

$total = number_format($total, 2, ',', '.');

$texto="

%F0%9F%94%94%20*Novo%20Pedido%20via%20 ZAP DELIVERY*%0d%0a%0d

%0a*Cliente%3a*%20 ".$resultado['nome']." %20 ".$resultado['telefone']."%0d%0a%0d%0a*Endere%C3%A7o%3a*"." ".$resultado['endereco']."%0d%0a%0d

%0a*Ponto referencia:*"." ".$resultado['ponto_referencia']."%0d%0a%0d%0a*Bairro:*"." ".$resultado['bairro']."%0d%0a%0d%0a*Nº*"." ".$resultado['numero_casa']."%0d%0a%0d%0a*Itens:* %0d%0a%0d%0a*(codigo) - produto - Qtd - subtotal*%0d%0a%0d

%0a".$textopedido."%0d%0a%0d%0a*Forma de pagamento%3a*%20 ".$forma_de_pagamento."%0d%0a%0d%0a*Valor

%20Total%3a* ".$total."%0d%0a%0d%0a*Clica em viar para finalizar pedido ===>*";

unset($_SESSION['carrinho']);
if(!isset($_SESSION['carrinho'])){ 
    $_SESSION['carrinho'] = array(); 
  } 
 // header("Location: https://api.whatsapp.com/send?phone=5582991431836&text=".$texto);
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
<link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script type="text/javascript">
  window.setTimeout(function(){
   document.getElementById("whatsapp").click();
}, 1);

  </script>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
  </head>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Você finalizou seu pedido</h5>
      </div>
      <div class="modal-body" style="display:none">
        <p>Envie seu pedido pelo whatsapp, aqui.</p>
      </div>
      <div class="modal-footer" style="display:none">
        <a  href="https://api.whatsapp.com/send?phone=5582991431836&text=<?php echo $texto?>" class="btn btn-success btn-lg btn-block" style="color: white;" id="whatsapp"> ENVIAR</a>
      </div>
      <div class="modal-body">
        <p>Já enviou seu pedido?</p>
      </div>
      <div class="modal-footer">
        <a  href="index.php" class="btn btn-danger btn-lg btn-block" style="color: white;" id="whatsapp">CONFIRME AQUI!</a>
      </div>
    </div>

  </div>
   


