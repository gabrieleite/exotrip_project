<?php
header("Content-Type: application/json; charset=utf-8");
require '../../lib/autoload.php';

$data = [];
$mysqli = new Mysql_i();

try{

	if(empty($_POST['post'])){
		throw new Exception("Preencher corretamente os campos de usuário e senha");
	}

	parse_str($_POST['post'],$post);

	if(empty($post['email'])){
		throw new Exception("Digite o e-mail");
	}

	if(empty($post['senha'])){
		throw new Exception("Digite a senha");
	}

	if(!$mysqli->conectar()){
		throw new Exception("Não foi possível se conectar ao banco de dados");
	}

	if(!UsuarioLogado::logar($post['email'], $post['senha'])){
		throw new Exception(UsuarioLogado::getError());
	}

	$response = ["success" => true];

}catch (Exception $e) {
	$response = ["success" => false, "error" => $e->getMessage()];
}finally{
	if($mysqli->getLink()){
		$mysqli->close();
	}
	echo json_encode($response);
}