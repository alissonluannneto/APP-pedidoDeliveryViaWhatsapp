<?php 
$id = $_GET['id'];
$id_c = $_GET['id_c'];
include_once("conexao.php");

$resultado=mysqli_query($conectar,"SELECT * FROM teste_pedido WHERE id_compra LIKE '$id' ");

$resultadoNOME=mysqli_query($conectar,"SELECT nome, telefone, endereco FROM clientes  WHERE id LIKE '$id_c'  LIMIT 1");
$resultnNOME = mysqli_fetch_assoc($resultadoNOME);
//$texto = $result['pedido']; // texto que será impresso
$nome = $resultnNOME['nome'];
$enderco = $resultnNOME['endereco'];
$telefone = $resultnNOME['telefone'];



# Incluindo a biblioteca
include('pdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,utf8_decode('Orçamento do Pedido'),0,0,"C");
$pdf->Ln(15);

$pdf->SetFont("Arial","I",10);
//$pdf->Cell(50,7,"Nome Cliente",1,0,"C");
$pdf->SetFillColor(202,220,255);
$pdf->Cell(190,7,"PEDIDO",1,0,"C");
$pdf->Ln();
$pdf->Cell(50,14,"Cliente",1,0,"C");
$pdf->Cell(140,14,utf8_decode("$nome"),1,0,"C");
$pdf->Ln(16);

$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,utf8_decode('Resumo do pedido'),0,0,"C");
$pdf->Ln(15);

$pdf->SetFont("Arial","I",10);
$pdf->Cell(20,7,"Codigo",1,0,"C");
$pdf->Cell(120,7,"Produto",1,0,"C");
$pdf->Cell(30,7,"Quantidade",1,0,"C");
$pdf->Cell(20,7,"sub.total.",1,0,"C");
$pdf->Ln();
$total = 0;
while($linhas = mysqli_fetch_array($resultado)){ 
	    $pdf->Cell(20,7,utf8_decode($linhas['codigo_produto']),1,0,"C");
		$pdf->Cell(120,7,utf8_decode($linhas['nome_produto']),1,0,"C");
		$pdf->Cell(30,7,number_format($linhas['quatidade'], 2, ',', '.'),1,0,"C");
		$pdf->Cell(20,7,number_format($linhas['subtotal'], 2, ',', '.'),1,0,"C");
		$pdf->Ln();
		$total += $linhas['subtotal'];
		 

}
$total = number_format("$total", 2, ',', '.');
$pdf->Cell(35,7,"Total",1,0,"C");
$pdf->Cell(35,7,"R$:$total",1,0,"C");
$pdf->Ln(15);
$pdf->Cell(190,7,utf8_decode("ENDEREÇO DE ENTREGA"),1,0,"C");
$pdf->Ln();
$pdf->Cell(190,15,utf8_decode("Celular: $telefone  $enderco"),1,1,"C");
$pdf->Ln();

$pdf->Output();

/*# Criando a instancia do Objeto
$pdf = new Mpdf();

$html = "<h2>Usando a biblioteca MPDF.</h2>";

$pdf->SetDisplayMode('fullpage');
$pdf->SetFooter('wifiaqui.com.br');   
$pdf->WriteHTML("css/print.css",1);
$pdf->WriteHTML($html);

# Gerando o PDF direto no Navegador
$pdf->Output();*/
?>