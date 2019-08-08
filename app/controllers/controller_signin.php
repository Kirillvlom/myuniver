<?
class Controller_signin extends Controller
{

	function __construct()
	{
		$this -> model = new Model_signin();
		$this -> view = new View();
	}

	function action_index()
	{	
		if ($_SESSION['user']) {
			header("location: /my");
		}
		$this -> view -> generate('signin_view.php', 'template_view.php','Авторизация',[0,10,20,30,40]);		
	}
	//Авторизация пользователя
	function action_auth(){
		if (isset($_POST['user_login']) && isset($_POST['user_password'])) {
			$user_login = $this -> data_processing($_POST['user_login']);
			$user_password = $this -> data_processing($_POST['user_password']);
			
			$this -> model -> check_auth_user($user_login, $user_password);

		}
	}

	
}
