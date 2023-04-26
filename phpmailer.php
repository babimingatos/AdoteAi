<?php
date_default_timezone_set('America/Sao_Paulo');

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ((isset($_POST['cemail']) && !empty(trim($_POST['cemail']))) && (isset($_POST['cdescricao']) && !empty(trim($_POST['cdescricao'])))) {

	$nome = !empty($_POST['cnome']) ? $_POST['cnome'] : 'Não informado';
	$sobrenome = !empty($_POST['csobrenome']) ? $_POST['csobrenome'] : 'Não informado';
	$email = $_POST['cemail'];
	$assunto = !empty($_POST['cassunto']) ? utf8_decode($_POST['cassunto']) : 'Não informado';

	$mensagem = $_POST['cdescricao'];
	date_default_timezone_set("Brazil/East");
	$data = date('d/m/Y H:i:s');
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'adoteai43@gmail.com';
	$mail->Password = 'projetotcc';
	$mail->Port = 587;

	$mail->setFrom('adoteai43@gmail.com');
	$mail->addAddress('adoteai43@gmail.com');

	$mail->isHTML(true);
	$mail->Subject = $assunto;
	$mail->Body = "Nome: {$nome} {$sobrenome}<br>
				   Assunto: {$assunto}<br>
				   Email: {$email}<br>
				   Mensagem: {$mensagem}<br>
				   Data/hora: {$data}";

	if ($mail->send()) {
		 echo 'Email enviado com sucesso.';
		 header("location: index.php");
		 
	} else {
		echo 'Email não enviado.';
	}
} else {
	echo 'Não enviado: informar o email e a mensagem.';
}
