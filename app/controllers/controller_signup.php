<?
class Controller_signup extends Controller
{

	function __construct()
	{
		$this -> model = new Model_signup();
		$this -> view = new View();
	}
	function action_index()
	{	
		if ($_SESSION['user']) {
			header("location: /my");
		}
		$this -> view -> generate('signup_view.php', 'template_view.php','Регистрация',[0,10,20,30,40]);
	}

//Проверяем данные при регистрации на такие же, как в бд
	function action_check_information_in_up()
	{
		
		if ($this -> model->check_information_in_up($_POST['check_information'], $_POST['value'])) {
			echo "true";
		}else{
			echo "false";

		};
	}
	//Метод создания нового пользователя
	function action_new_user()
	{
		$user_fio = $this->data_processing($_POST['user_fio']);
		$user_login = $this->data_processing($_POST['user_login']);
		$user_password = $this->data_processing($_POST['user_password']);
		$user_email = $this->data_processing($_POST['user_email']);
		$role_user = $_POST['role_user'];
		$this -> model -> new_user($user_fio, $user_login, $user_password, $user_email, $role_user);
	}
}