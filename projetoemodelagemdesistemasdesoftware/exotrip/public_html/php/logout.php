<?php
header("Content-Type: application/json; charset=utf-8");
require '../../lib/autoload.php';

$mysqli = new Mysql_i();

try {

	if(!$mysqli->conectar()){
		throw new Exception("Não foi possível se conectar ao banco de dados");
	}

	if(UsuarioLogado::get()){
		UsuarioLogado::deslogar();
	}

	$response = [
		"success" => true
	];

}catch(Exception $e){
	
	$response = ["success" => false];

}finally{
	if($mysqli->getLink()){
		$mysqli->close();
	}

	echo json_encode($response);
}