<?php 
session_start();

$nome = $_POST['nome'];
$codigo = $_POST['codigo'];
$preco = $_POST['preco'];
$subcategoriaID = $_POST['categoria_id'];
$descricao = $_POST['descricao'];
$descricao_curta = $_POST['descricao_curta'];
$foto = $_FILES['arquivo']['name'];

if(empty($nome) || empty($preco) || empty($subcategoriaID) || empty($descricao) || empty($foto) ){
	//mensagem de erro
	$_SESSION['loginErro'] = "Preencha todos os dados!";

	//manda o usuario para a tela de login
	header("Location: administrativo.php");
}else{

	// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = 'foto/';
 
// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
 
// Array com as extensões permitidas
$_UP['extensoes'] = array('jpg', 'png', 'gif','jpeg');
 
// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
$_UP['renomeia'] = false;
 
// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
 
// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {

	echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://zapdalimpeza.com/lista_produtos.php'>
		<script type=\"text/javascript\">
			alert(\"Não foi possivel fazer o upload, erro:\");
		</script>
	";
}
 
// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
 
// Faz a verificação da extensão do arquivo
$extensao = explode('.', $_FILES['arquivo']['name']);
$nome_final = $extensao[0];
$extensao = end($extensao);

if (array_search($extensao, $_UP['extensoes']) === false) {
echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://zapdalimpeza.com/lista_produtos.php'>
		<script type=\"text/javascript\">
			alert(\"A imagem não foi cadastrada for favor, envie arquivos com as seguintes extensões: png, jpg, jpeg e gif.\");
		</script>
	";
}
 
// Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://zapdalimpeza.com/lista_produtos.php'>
		<script type=\"text/javascript\">
			alert(\"O arquivo enviado é muito grande, envie arquivos de até 2mb\");
		</script>
	";
}
 
// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
else {
// Primeiro verifica se deve trocar o nome do arquivo
if ($_UP['renomeia'] == true) {
// Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
$nome_final = time().'.jpg';
} else {
// Mantém o nome original do arquivo
$nome_final = $nome_final.time().'.jpg';
}
 
// Depois verifica se é possível mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {

	include_once("conexao.php");
	$Insertsql = "INSERT INTO produtos( nome, codigo, preco, id_sub_categoria, descricao, desc_curta, nome_foto) VALUES ('$nome','$codigo','$preco','$subcategoriaID','$descricao','$descricao_curta','$nome_final')";
	$sql = mysqli_query($conectar,$Insertsql);  
	mysqli_close($conectar);
// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=https://zapdalimpeza.com/lista_produtos.php'>
			<script type=\"text/javascript\">
				alert(\"Produto cadatrado com Sucesso.\");
			</script>
		";	
} else {
// Não foi possível fazer o upload, provavelmente a pasta está incorreta
echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;https://zapdalimpeza.com/lista_produtos.php'>
			<script type=\"text/javascript\">
				alert(\"Produto não foi cadatrado com Sucesso.\");
			</script>
		";
}
}
}




?>