<?
class Controller_reset_password extends Controller
{
	function action_index()
	{	
		if ($_SESSION['user']) {
			header("location: /my");
		}
		$this->view->generate('reset_password_view.php', 'template_view.php','Востановление доступа',[0,10,20,30,40]);		
	}
	function action_reset()
	{
		$db = new Db();
		/*$_POST['user_email'];
		require_once('phpmailer/PHPMailerAutoload.php');
		$mail = new PHPMailer;
		$mail->CharSet = 'utf-8';

		$name = $_POST['user_name'];
		$phone = $_POST['user_phone'];
		$email = $_POST['user_email'];*/

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output


		$user_email = $this -> data_processing($_POST['user_email']);

		require_once('./app/class/phpmailer/PHPMailerAutoload.php');
		$mail = new PHPMailer;
		
		$mail->CharSet = 'utf-8';


		



		$mail->isSMTP();                                      
		$mail->Host = 'smtp.mail.ru';  																							
		$mail->SMTPAuth = true;                            
$mail->Username = 'admin@jooit.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = '73parila4231'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('admin@jooit.ru'); // от кого будет уходить письмо?
$mail->addAddress($user_email);     // Кому будет уходить письмо 

$mail->isHTML(true);    

$db = new Db();

if ($user = $db ->db_query_param_where_column("users", "email_user", $user_email)) {
	$password_user_new = $this->shapeSpace_random_string(12);
	$no_md5_password_user_new = $password_user_new;
	$password_user_new = md5($password_user_new);
	$array = array(
		"password_user" => $password_user_new
	);
	if ($db -> db_update_query("users","id_user", $user[0]["id_user"], $array)) {
		$mail->Subject = 'Восстановление пароля к сайту мойунивер.рф';
		$mail->Body    = "Привет, ".$user[0]['name_user']." "."<br>".'Твоя почта ?: ' .$user_email. " тогда держи новый пароль<br> Новый пароль: ".$no_md5_password_user_new."<br> <a href='https://xn--b1aghdohfvw.xn--p1ai/signin'>Страница авторизации</a> ";
		$mail->AltBody = '';

		if(!$mail->send()) {
			echo 'Error';
		} else {
			echo "<script>alert('Письмо на почте');document.location.href='/signin'</script>;
			";

		}
	}
}else{
	echo "<script>alert('Такого пользователя с почтой не существует. Давай регатсья?');document.location.href='/signup'</script>;";
}


}
}