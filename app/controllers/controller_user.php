<?
class Controller_user extends Controller
{

	function __construct()
	{
		$this -> model = new Model_user();
		$this -> view = new View();
	}

	function action_index()
	{	
		if ($_SESSION['user']) {
			$array_user_user = $this -> model ->getInfoUser($_SESSION['user']['id_user']); //Получаем информацию о пользователе
		}
		$this->view->generate('user_view.php', 'main_template_view.php',$_SESSION['user']['login_user'],[10,20,30,40], $array_user_user);		
		
	}
	function action_session_destroy()
	{
		session_destroy();
		header("location: /");
	}

	function action_setting()
	{
		$array_user_user = $this -> model ->getInfoUser($_SESSION['user']['id_user']); //Получаем информацию по пользователю
		$this->view->generate('user_setting_view.php', 'main_template_view.php',$_SESSION['user']['login_user'],[10,20,30,40], $array_user_user);	
	}
	//выводим информацию о пользователе
	function action_id($action_id)
	{
		$array_user_user = $this -> model ->getInfoUserId($action_id); //Получаем информацию по пользователю
		$this->view->generate('user_view_id.php', 'main_template_view.php',$_SESSION['user']['login_user'],[10,20,30,40], $array_user_user);
	}

		//редактируем информацию о пользователе
	function action_edit_info($action_id)
	{
		if ($action_id == "student") {

			$new_array_info_user = array(
				"name_user" => $this->data_processing($_POST['new_name_user']),
				"surname_user" => $this->data_processing($_POST['new_surname_user']),
				"patronymic_user" => $this->data_processing($_POST['new_patronymic_user']),
				"date_of_birth_user" => $this->data_processing($_POST['new_date_of_birth_user']),
				"phone_user" => $this->data_processing($_POST['new_phone_user']),
				"email_user" => $this->data_processing($_POST['new_email_user'])
			);

		} elseif ($action_id == "teacher") {
			$new_array_info_user = array(
				"name_user" => $this->data_processing($_POST['new_name_user']),
				"surname_user" => $this->data_processing($_POST['new_surname_user']),
				"patronymic_user" => $this->data_processing($_POST['new_patronymic_user']),
				"date_of_birth_user" => $this->data_processing($_POST['new_date_of_birth_user']),
				"email_user" => $this->data_processing($_POST['new_email_user'])
			);
			
		} elseif ($action_id == "manager") {
			$new_array_info_user = array(
				"name_user" => $this->data_processing($_POST['new_name_user']),
				"surname_user" => $this->data_processing($_POST['new_surname_user']),
				"patronymic_user" => $this->data_processing($_POST['new_patronymic_user']),
				"email_user" => $this->data_processing($_POST['new_email_user'])
			);
			
		} elseif ($action_id == "administrator") {
			$new_array_info_user = array(
				"name_user" => $this->data_processing($_POST['new_name_user']),
				"surname_user" => $this->data_processing($_POST['new_surname_user']),
				"patronymic_user" => $this->data_processing($_POST['new_patronymic_user']),
				"email_user" => $this->data_processing($_POST['new_email_user'])
			);

		} 
		//отправляем запрос на редактирование информации
		if ($result_edit_info = $this -> model ->edit_info("users",$_SESSION['user']['id_user'],$new_array_info_user)) {
			$_SESSION['user']['name_user'] = $this->data_processing($_POST['new_name_user']);
			$_SESSION['user']['surname_user'] = $this->data_processing($_POST['new_surname_user']) ;
			$_SESSION['user']['patronymic_user'] = $this->data_processing($_POST['new_patronymic_user']) ;

			header("Location: /user/setting");	
		}
	}

	function action_edit_security($action_id)
	{
		if ($action_id == "userlogin_and_password") {

			if ($_POST['new_password_user']) {
				$password_user =md5($this->data_processing($_POST['new_password_user']));

				$new_array_info_user = array(
					"login_user" => $this->data_processing($_POST['new_login_user']),
					"password_user" => $password_user
				);
			} else{
				$new_array_info_user = array(
					"login_user" => $this->data_processing($_POST['new_login_user'])
				);
			}

			//отправляем запрос на редактирование информации
			if ($result_edit_info = $this -> model ->edit_info("users",$_SESSION['user']['id_user'],$new_array_info_user)) {
				$_SESSION['user']['login_user'] = $this->data_processing($_POST['new_login_user']);
				header("Location: /user/setting");
			}
		
	} 
}
}