<?php
header("Content-Type: application/json; charset=utf-8");
require '../../lib/autoload.php';

$mysqli = new Mysql_i();

try{

	if(!$mysqli->conectar()){
		throw new Exception("Não foi possível se conectar ao banco de dados");
	}	

	UsuarioLogado::setConexao($mysqli);

	if(!UsuarioLogado::get()){
		throw new Exception("Não foi possível recuperar o usuario logado");
	}

	if(!isset($_POST['post']) || empty($_POST['post'])){
		throw new Exception("Não foi possível realizar a operação desejada!");
	}

	parse_str($_POST['post'], $post);

	if(empty($post["destino"])){
		throw new Exception("Selecione o destino");
	}

	if(empty($post["checkin"])){
		throw new Exception("Selecione a data de check-in");
	}

	if(empty($post["checkout"])){
		throw new Exception("Selecione a data de check-out");
	}

	if($post["checkin"] > $post["checkout"]){
		throw new Exception("A data do check-in não pode ser maior que a data do check-out");
	}

	if(empty($post["qtdAdultos"])){
		throw new Exception("Selecione a quantidade de adultos");
	}

	if(empty($post["qtdCriancas"])){
		throw new Exception("Selecione a quantidade de crianças");
	}

	if(empty($post["qtQuartos"])){
		throw new Exception("Selecione a quantidade de quartos");
	}

	if(empty($post["nome"])){
		throw new Exception("Preencha o campo nome");
	}

	if(empty($post["sobreNome"])){
		throw new Exception("Preencha o campo sobrenome");
	}

	if(empty($post["email"])){
		throw new Exception("Preencha o campo e-mail");
	}

	if(empty($post["confirmarEmail"])){
		throw new Exception("Confirme o e-mail");
	}

	if($post['email'] <> $post['confirmarEmail']){
		throw new Exception("O campo e-mail e confirmar e-mail devem ser idênticos");
	}

	if(empty($post["meioPgto"])){
		throw new Exception("Selecione o meio de pagamento");
	}

	$nomeCompleto = sprintf("%s %s", $post["nome"], $post["sobreNome"]);
	// $checkin = (new Date($post["checkin"])->format('d/m/Y'));
	// $checkout = (new Date($post["checkout"])->format('d/m/Y'));

  // $email_to = "caio.eustaquio@hotmail.com";
  $email_to = sprintf("exotrip.project@outlook.com.br, %s", $post['email']);
  $datenow = (new DateTime("now", new DateTimeZone('America/Sao_Paulo')))->format('d/m/Y H:i:s');
		
  // Email body content 
	$htmlContent = "Olá, há uma nova solicitação de de hospedagem <a href='http://www.exotrip.orgfree.com'><b>exotrip.orgfree.com</b></a>!<br>
  <br>Nome: <b>{$nomeCompleto}</b>
  <br>E-mail: <b>{$post['email']}</b>
  <br>Destino: <b>{$post['destino']}</b>
  <br>Check-in: <b>{$post['checkin']}</b>
  <br>Check-out: <b>{$post['checkout']}</b>
  <br>Adultos: <b>{$post['qtdAdultos']}</b>
  <br>Crianças: <b>{$post['qtdCriancas']}</b>
  <br>Quartos: <b>{$post['qtQuartos']}</b>
  <br>Data preenchimento: {$datenow}<br><br>
  Mensagem automática do sistema, por favor não responda.";
	 
	// Header for sender info 
	$headers = "From: Exotrip <naoresponda@exotrip.com.br>";
	 
	// Boundary  
	$semi_rand = md5(time());  
	$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
	 
	// Headers for attachment
	$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
	 
	// Multipart boundary  
	$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
	"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  

	$message .= "--{$mime_boundary}--";
	$returnpath = "-f naoresponda@exotrip.com.br"; 

 	$send = @mail($email_to, "Solicitação de hospedagem - {$post["destino"]} | Exotrip", $message, $headers, $returnpath);

	if(!$send){
		throw new Exception("Erro ao enviar e-mail de confirmação");
	}  

	$response = ["success" => true];

}catch (Exception $e) {
	$response = ["success" => false, "error" => $e->getMessage()];
}finally{
	echo json_encode($response);
}
?>