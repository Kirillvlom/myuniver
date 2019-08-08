<?
class Controller_specialty extends Controller
{

	function __construct()
	{
		$this -> model = new Model_specialty();
		$this -> view = new View();
	}

	function action_index()
	{	
		$array = $this -> model -> getAllSpecialty();
		
		$this->view->generate('specialty_view.php', 'main_template_view.php','Пользователи',[10,20,30,40],$array);		

	}

	function action_setting()
	{
		$this->view->generate('user_setting_view.php', 'main_template_view.php',$_SESSION['login_user'],[10,20,30,40]);	
	}
}