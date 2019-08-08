<?
class Controller_users extends Controller
{

	function __construct()
	{
		$this -> model = new Model_users();
		$this -> view = new View();
	}

	function action_index()
	{	
		$db = new Db();
		$array_user_users = $db->db_composite_query("SELECT id_user, name_user, surname_user, patronymic_user, id_role_user FROM users"); //Получаем информацию о всех пользователях
		$this->view->generate('users_view.php', 'main_template_view.php','Пользователи',[10,20,30,40],$array_user_users);		

	}

	function action_setting()
	{
		$this->view->generate('user_setting_view.php', 'main_template_view.php',$_SESSION['login_user'],[10,20,30,40]);	
	}
	function action_bron_delete()
	{
		var_dump($_POST['usersid']);
	}
}