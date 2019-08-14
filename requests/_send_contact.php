
<?php

$to = "hola@unbarco.com";
//$to = "mpiazaniboni@gmail.com";
$subject = "ESTUDIO BARCO - Contacto desde sitio web";

$message = 
	'<table width="650" border="0" align="center" cellpadding="0" cellspacing="0" style="background: white">
		<tr>
			<td height="20" colspan="3"><h1 style="color: #333; font: Bold 16px Arial, Helvetica, sans-serif; margin: 0; padding: 0">&nbsp;</h1></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td width="54"><a href="http://www.unbarco.com" target="_blank"><img src="http://www.unbarco.com/img/logo.png" width="" height="" alt="Ir a sitio web de Estudio Barco" title="Ir a sitio web de Estudio Barco" " border="0" align="middle" /></a></td>
			<td width="30">&nbsp;</td>
			<td width="537" valign="middle"><h1 style="color: #333; font: Bold 16px Arial, Helvetica, sans-serif; margin: 0; padding: 0">Estudio Barco</h1>
			<h1 style="color: #333; font: Bold 16px Arial, Helvetica, sans-serif; margin: 0; padding: 0">Email de contacto</h1></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td height="20" colspan="3"><p style="color: #333; font: normal 14px Arial, Helvetica, sans-serif; margin: 0; padding: 0">Este email ha sido generado desde el formulario de contacto del sitio web  de unbarco.com</p></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td height="20" colspan="3"><h1 style="color: #333; font: Bold 16px Arial, Helvetica, sans-serif; margin: 0; padding: 0; text-decoration: underline">Datos de contacto:</h1></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td height="20" colspan="3"><p style="color: #333; font: normal 14px Arial, Helvetica, sans-serif; margin: 0; padding: 0"><strong>Nombre y apellido: </strong>' . $_POST["name"] . '</p></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td height="20" colspan="3"><p style="color: #333; font: normal 14px Arial, Helvetica, sans-serif; margin: 0; padding: 0"><strong>Correo electr&oacute;nico: </strong>' . $_POST["email"] . '</p></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td height="20" colspan="3"><p style="color: #333; font: normal 14px Arial, Helvetica, sans-serif; margin: 0; padding: 0"><strong>Ciudad: </strong>' . $_POST["city"] . '</p></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td height="20" colspan="3"><p style="color: #333; font: normal 14px Arial, Helvetica, sans-serif; margin: 0; padding: 0"><strong>Asunto: </strong>' . $_POST["subject"] . '</p></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td height="20" colspan="3"><p style="color: #333; font: normal 14px Arial, Helvetica, sans-serif; margin: 0; padding: 0"><strong>Mensaje: </strong>' . $_POST["message"] . '</p></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
	</table>';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <' . $_POST["email"] . '>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

if(mail($to, $subject, $message, $headers)){
	echo 1;
	exit;
} else {
	echo 0;
	exit;
};


/*
if($_REQUEST){

	require_once("../PHPMailer/PHPMailerAutoload.php");

	$mail = new PHPMailer;
	
	$mail->From = "hola@unbarco.com";
	$mail->FromName = "prueba";
	//$mail->addAddress('', '');
	$mail->addAddress('matiasc1986@gmail.com', 'Estudio Barco');
	
	$mail->isHTML(true);
	$mail->Subject = 'ESTUDIO BARCO - Contacto desde sitio web';
	$mail->Body    = '<table width="650" border="0" align="center" cellpadding="0" cellspacing="0" style="background: white">
		<tr>
			<td height="20" colspan="3"><h1 style="color: #333; font: Bold 16px Arial, Helvetica, sans-serif; margin: 0; padding: 0">&nbsp;</h1></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td width="54"><a href="http://www.unbarco.com" target="_blank"><img src="http://www.unbarco.com/img/logo.png" width="" height="" alt="Ir a sitio web de Estudio Barco" title="Ir a sitio web de Estudio Barco" " border="0" align="middle" /></a></td>
			<td width="30">&nbsp;</td>
			<td width="537" valign="middle"><h1 style="color: #333; font: Bold 16px Arial, Helvetica, sans-serif; margin: 0; padding: 0">Estudio Barco</h1>
			<h1 style="color: #333; font: Bold 16px Arial, Helvetica, sans-serif; margin: 0; padding: 0">Email de contacto</h1></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td height="20" colspan="3"><p style="color: #333; font: normal 14px Arial, Helvetica, sans-serif; margin: 0; padding: 0">Este email ha sido generado desde el formulario de contacto del sitio web  de unbarco.com</p></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td height="20" colspan="3"><h1 style="color: #333; font: Bold 16px Arial, Helvetica, sans-serif; margin: 0; padding: 0; text-decoration: underline">Datos de contacto:</h1></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td height="20" colspan="3"><p style="color: #333; font: normal 14px Arial, Helvetica, sans-serif; margin: 0; padding: 0"><strong>Nombre y apellido: </strong>' . $_POST["name"] . '</p></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td height="20" colspan="3"><p style="color: #333; font: normal 14px Arial, Helvetica, sans-serif; margin: 0; padding: 0"><strong>Correo electr&oacute;nico: </strong>' . $_POST["email"] . '</p></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td height="20" colspan="3"><p style="color: #333; font: normal 14px Arial, Helvetica, sans-serif; margin: 0; padding: 0"><strong>Ciudad: </strong>' . $_POST["city"] . '</p></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td height="20" colspan="3"><p style="color: #333; font: normal 14px Arial, Helvetica, sans-serif; margin: 0; padding: 0"><strong>Asunto: </strong>' . $_POST["subject"] . '</p></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td height="20" colspan="3"><p style="color: #333; font: normal 14px Arial, Helvetica, sans-serif; margin: 0; padding: 0"><strong>Mensaje: </strong>' . $_POST["message"] . '</p></td>
		</tr>
		<tr>
			<td height="20" colspan="3">&nbsp;</td>
		</tr>
		</table>';
	
	if(!$mail->send()){
		echo 0;
		exit;
	} else {
		echo 1;
		exit;
	}

}*/
	
?>