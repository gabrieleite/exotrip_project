<?php
// require "../../lib/autoload.php";
// require '../../lib/PHPMailer/Exception.php';
// require '../../lib/PHPMailer/PHPMailer.php';
// require '../../lib/PHPMailer/SMTP.php';

// header("Content-Type: application/json; charset=UTF-8");

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// parse_str($_POST['post'], $post);

// try {

// 	if(empty($post['nome']))
// 		throw new Exception("Oops! Preencha o campo nome!");
		
// 	$datenow = (new DateTime("now", new DateTimeZone('America/Sao_Paulo')))->format('d/m/Y H:i:s');
// 	$mensagem = nl2br($post['mensagem']);
//   $corpoEmail = "Olá, há um novo cadastro de contato <a href='https://www.speedprintcopias.com.br'><b>speedprintcopias.com.br</b></a>!<br>
//   <br>Nome: <b>{$post['nome']}</b>
//   <br>E-mail: <b>{$post['email']}</b>
//   <br>Empresa: <b>{$post['empresa']}</b>
//   <br>Telefone: <b>{$post['telefone']}</b>
//   <br>Celular: <b>{$post['celular']}</b>
//   <br>Como chegou até aqui?: <b>{$post['como']}</b>
//   <br>Assunto: <b>{$post['assunto']}</b>
//   <br>Mensagem: <b>{$mensagem}</b>
//   <br>Data preenchimento: {$datenow}<br><br>
//   Mensagem automática do sistema, por favor não responda.";
//   $assunto = "Contato | Speed Print Cópias";
// 	$remetente = [
// 		"nome" => "Speed Print Cópias", 
// 		"email" => "email@contato.com.br", 
// 		"host" => "mail.site.com.br", 
// 		"pass" => "]kRQwV_IsVkJ", 
// 		"porta" => 587
// 	];
// 	$destinatario = [
// 		"nome" => "Nome do nosso site", 
// 		"email" => "email@contato.com.br"
// 	];

// 	$mail = new PHPMailer(true);
// 	$mail->SMTPDebug = false; // Enable verbose debug output
// 	$mail->isSMTP(); // Send using SMTP
// 	$mail->SMTPAuth 	= true;
// 	$mail->Host       = $remetente["host"]; // Set the SMTP server to send through
// 	$mail->Username   = $remetente["email"]; // SMTP username
// 	$mail->Password   = $remetente["pass"]; // SMTP password
// 	$mail->Port       = $remetente["porta"];   
// 	$mail->CharSet 		= "UTF-8";
// 	$mail->SMTPOptions = array(
// 	 'ssl' => array(
// 	      'verify_peer' => false,
// 	      'verify_peer_name' => false,
// 	      'allow_self_signed' => true
// 	  )
// 	);
// 	$mail->From = $remetente["email"]; // Seu e-mail
// 	$mail->FromName = $remetente["nome"]; // Seu nome
// 	$mail->Subject  = $assunto;
// 	$mail->Body = $corpoEmail;
// 	$mail->AddAddress($destinatario["email"], $destinatario["nome"]); // destinatário
// 	$mail->IsHTML(true);

//   if(!$mail->Send()){
//   	throw new Exception("Oops! Ocorreu algum problema ao enviar o email");
//   }

// 	$response = array("success" => true);
  
// }catch (Exception $e){
// 		$response = array("success" => false, "error" => $e->getMessage());
// }finally{
// 	echo json_encode($response);
// }
?>