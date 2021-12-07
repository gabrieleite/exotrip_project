<?php
require '../../lib/autoload.php';
require '../../lib/PHPMailer/Exception.php';
require '../../lib/PHPMailer/PHPMailer.php';
require '../../lib/PHPMailer/SMTP.php';

header("Content-Type: application/json; charset=utf-8");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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

	$datenow = (new DateTime("now", new DateTimeZone('America/Sao_Paulo')))->format('d/m/Y H:i:s');
  $corpoEmail = "Olá, há uma nova solicitação de de hospedagem <a href='https://www.exotrip.com.br'><b>exotrip.com.br</b></a>!<br>
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
  $assunto = "Contato | Exotrip";
	$remetente = [
		"nome" => "Exotrip", 
		"email" => "exotrip.project@outlook.com.br",
		"host" => "mail.outlook.com.br", 
		"pass" => "1FLpBx.[",
		"porta" => 587
	];
	$destinatario = [
		"nome" => $nomeCompleto,
		"email" => $post['email']
	];
	$copias = [

		"nome" => "Solicitações de hospedagem Exotrip",
		"email" => "exotrip.project@outlook.com.br"		
	];

	$mail = new PHPMailer(true);
	$mail->SMTPDebug = false; // Enable verbose debug output
	$mail->isSMTP(); // Send using SMTP
	$mail->SMTPAuth 	= true;
	$mail->Host       = $remetente["host"]; // Set the SMTP server to send through
	$mail->Username   = $remetente["email"]; // SMTP username
	$mail->Password   = $remetente["pass"]; // SMTP password
	$mail->Port       = $remetente["porta"];
	$mail->CharSet 		= "UTF-8";
	$mail->SMTPOptions = array(
	 'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
	  )
	);
	$mail->From = $remetente["email"]; // Seu e-mail
	$mail->FromName = $remetente["nome"]; // Seu nome
	$mail->Subject  = $assunto;
	$mail->Body = $corpoEmail;
	$mail->AddAddress($destinatario["email"], $destinatario["nome"]); // destinatário
	$mail->AddCC($copias["email"], $copias["nome"]); // copias
	$mail->IsHTML(true);

  if(!$mail->Send()){
  	throw new Exception("Ocorreu algum problema ao enviar o email");
  }	

	$response = ["success" => true];

}catch (Exception $e) {
	$response = ["success" => false, "error" => $e->getMessage()];
}finally{
	echo json_encode($response);
}
?>