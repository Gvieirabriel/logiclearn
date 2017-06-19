<?php
	$conn = include_once('mysql.inc.php');
	require_once("phpmailer/PHPMailerAutoload.php");

	$mail = new PHPMailer();
	$mail->IsSMTP();

	$mail->Host = "smtp.gmail.com";
	$mail->SMTPSecure = 'ssl';
	$mail->SMTPAuth= true;
	$mail->Port = 465; 
	$mail->Username = 'joppsoftdevinc@gmail.com';    
	$mail->Password = 'alex2017';          
	$mail->From = 'joppsoftdevinc@gmail.com';
	$mail->FromName = 'LogicLearn';

	if(isset($_POST['email'])){
		$usuario = mysqli_real_escape_string($conn, $_POST['email']);
		$result_usuario = "SELECT * FROM tbPessoa WHERE email = '$usuario' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
		$bytes = openssl_random_pseudo_bytes(3);
		$pwd = bin2hex($bytes);

		if(isset($resultado)){
			$mail->AddAddress($resultado['email'], $resultado['nome']);
			$mail->IsHTML(true);
			$mail->Subject  = "LogicLearn - Password Reset";
			$mail->Body = '<table align="center" width="570" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="content-cell">
                      <h1>Hi '.$resultado['nome'].',</h1>
                      <p>You recently requested to reset your password for your '.$resultado['email'].' account. Your new Password is: <strong>'.$pwd.'</strong></p>
                      <p>If you did not request a password reset, please ignore this email or <a href="{{support_url}}">contact support</a> if you have questions.</p>
                      <p>Thanks,
                        <br>The LogicLearn Team</p>
                    </td>
                  </tr>
		</table>';

			$enviado = $mail->Send();

			$mail->ClearAllRecipients();
			$mail->ClearAttachments();
			$temp = md5($pwd);
			if ($enviado) {
				$troca_senha = "UPDATE tbPessoa SET senha='$temp' WHERE email = '$usuario'";
				$resultado = mysqli_query($conn, $troca_senha);
				header('location:home.php');
			} else {
			  echo "Não foi possível enviar o e-mail. ";
			  header('location:home.php');
			}
		}else{	
			$_SESSION['loginErro'] = "Email Inválido";
		}
	}else{
		$_SESSION['loginErro'] = "Email inválido";
	}
?>
