<?php

$Nome		= $_POST["nome"];	// Pega o valor do campo Nome
//$Fone		= $_POST["fone"];	// Pega o valor do campo Telefone
$Email		= $_POST["email"];	// Pega o valor do campo Email
$Mensagem	= $_POST["mensagem"];	// Pega os valores do campo Mensagem

// Variável que junta os valores acima e monta o corpo do email

$Vai = "Nome: $Nome\n\nE-mail: $Email\n\nTelefone: Sem por enquanto\n\nMensagem: $Mensagem\n";
//echo $Vai."<br><br>";
require_once("phpmailer/class.phpmailer.php");

//define('GUSER', 'felipeteofilosiqueiracosta@gmail.com');	// <-- Insira aqui o seu GMail
//define('GPWD', 'Felipe@12345');		// <-- Insira aqui a senha do seu GMail

define('GUSER', "apikey");
define('GPWD', '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');

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
	global $error;
	$mail = new PHPMailer();
	$mail->IsSMTP();		// Ativar SMTP
	$mail->SMTPDebug = 1;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$mail->SMTPAuth = true;		// Autenticação ativada
	$mail->SMTPSecure = 'ssl';	// SSL REQUERIDO pelo GMail
	$mail->Host = 'smtp.sendgrid.net';	// SMTP utilizado
	$mail->Port = 465;  		// A porta 587 deverá estar aberta em seu servidor
	$mail->Username = GUSER;
	$mail->Password = GPWD;
	$mail->SetFrom($de, $de_nome);
	$mail->Subject = $assunto;
	$mail->Body = $corpo;
	$mail->AddAddress($para);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Mensagem enviada!';
		return true;
	}
}

// Insira abaixo o email que irá receber a mensagem, o email que irá enviar (o mesmo da variável GUSER), 
//o nome do email que envia a mensagem, o Assunto da mensagem e por último a variável com o corpo do email.
//bacetti.yasmin@unifesp.br
    if(smtpmailer('bacetti.yasmin@unifesp.br', 'felipeteofilosiqueiracosta@gmail.com', 'Felipe Teofilo Siqueira Costa', 'Mensagem do PHP...', $Vai)) {

	//Header("location:http://www.dominio.com.br/obrigado.html"); // Redireciona para uma página de obrigado.
        echo "<br><br><h1>Obrigado por enviar seu email!</h1>";
    }
if (!empty($error)) echo $error;

?>