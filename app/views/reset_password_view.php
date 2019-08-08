<?

/*

<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'dzharuzov@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = '$dk820&123'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('dzharuzov@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('gomudusu@p33.org');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с тестового сайта';
$mail->Body    = '' .$name . ' оставил заявку, его телефон ' .$phone. '<br>Почта этого пользователя: ' .$email;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank-you.html');
}
?>


*/
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><? echo $nameSite;?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
	<link rel="stylesheet" href="/assets/css/lib/bootstrap.min.css?v=<?echo microtime(1);?>">
	<link rel="stylesheet" href="/assets/css/style.css?v=<?echo microtime(1);?>">
	<link rel="stylesheet" href="/assets/css/main.css?v=<?echo microtime(1);?>">
	<link rel="icon" type="image/png" href="/icon.png"/>
	<meta name="theme-color" content="#c45472">
</head>
<body>
	<div class="auth-sign">
		<div class="sign-main">
			<div class="sign-title-logo">
				<a href="/">Мойунивер.рф</a>
			</div>
			<div class="sign-method">
				<span>Восстановление пароля</span>
			</div>
			<div class="row-form-auth">
				<div class="dop-info-reset">
					Мы вышлем на вашу почту письмо, с инструкцией по востановлению доступа к вашему аккаунту
				</div>
			</div>
				<form action="/reset_password/reset" class='form-auth' method="post">
					<div class="row-form-auth">
						<label for="user_email">Ваша почта</label>
						<input type="email" placeholder="Почта" id='user_email' name='user_email'>
					</div>
					<div class="row-form-auth ">
						<div class="button-auth button-auth-space-between">
							<a href="/signup" class='new-user'>Создать аккаунт</a>
							<input type="submit" class='button-sign-in' value="Востановить">
						</div>
					</div>
				</form>
				<div class="footer-auth">
					<span>Уже есть аккаунт? <a href="/signin">Войти</a></span>
				</div>
			</div>

		</div>
	</body>
	</html>