<?php
header("Content-Type: application/json; charset=utf-8");
require '../../lib/autoload.php';

$mysqli = new Mysql_i();

try {

	if(!$mysqli->conectar()){
		throw new Exception("Não foi possível se conectar ao banco de dados");
	}	

	UsuarioLogado::setConexao($mysqli);

	if(!isset($_POST['post']) || empty($_POST['post'])){
		throw new Exception("Não foi possível realizar a operação desejada!");
	}

	parse_str($_POST['post'], $post);

	if(empty($post['nome'])){
		throw new Exception("Preencha o campo nome");
	}

	if(strlen($post['nome']) <= 2){
		throw new Exception("Preencha um nome válido");
	}

	if(empty($post['email'])){
		throw new Exception("Preencha o campo e-mail");
	}	

	if(empty($post['senha'])){
		throw new Exception("Preencha o campo senha");
	}
	if(empty($post['confirmarSenha'])){
		throw new Exception("Preencha o campo confirmar senha");
	}
	if($post['senha'] <> $post['confirmarSenha']){
		throw new Exception("O campo confirmar senha deve ser idêntico ao campo senha");
	}

	$usuario = new Usuario();
	$usuario
		->setConexao($mysqli)
		->setNome($post['nome'])
		->setEmail($post['email'])
		->setSenha(Bcrypt::hash(trim($post['senha'])));
	
	if(!$usuario->novo()){
		throw new Exception($usuario->getMensagemErro());
	}

	$response = ["success" => true];

}catch (Exception $e) {
	$response = ["success" => false, "error" => $e->getMessage()];
}finally{
	echo json_encode($response);
}
?>