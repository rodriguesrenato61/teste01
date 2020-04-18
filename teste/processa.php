<?php
/*
$result = mysqli_query($conn, "SELECT * FROM tabela");
 
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
$arquivo = 'arquivo.json';
file_put_contents($arquivo, json_encode($data, true)); // ele cria o arquivo.json fisicamente
 
echo json_encode($data, true);
*/
	$host = "localhost";
	$dbname = "mercado2";
	$user = "root";
	$password = "";
	
	$pdo = new PDO("mysql:host=".$host.";dbname=".$dbname, $user, $password);
	
	$sql = $pdo->prepare("SELECT * FROM vw_produtos");
	$sql->execute();
	
	while($row = $sql->fetch()){
		$produtos[] = array(
			"codigo" => $row['codigo'],
			"produto" => $row['produto'],
			"preco" => $row['pvenda'],
			"categoria" => $row['categoria'],
			"estoque" => $row['estoque'] 
		);
	}
	
	$arquivo = "arquivo.json";
	
	header("Content-Description: Php Generated Data");
	header("Content-Type: application/json");
	header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
	header("Expires: 0");
	header("Cache-Control: no-cache, must-revalidate, post-check=0, pre-check=0");
	header("Pragma: no-cache");
            
	echo json_encode($produtos);
	
	

?>
