<?
class Controller_workspaces extends Controller
{

	function __construct()
	{
		$this -> model = new Model_workspaces();
		$this -> view = new View();
	}

	function action_index()
	{	
	
		$array_groups = $this-> model->getAllworkspaces();
		$this->view->generate('workspaces_view.php', 'main_template_view.php','Рабочие области',[20,30],$array_groups);		

	}

	function action_setting()
	{
		$this->view->generate('user_setting_view.php', 'main_template_view.php',$_SESSION['login_user'],[10,20,30,40]);	
	}

	function action_thetheme($action_id)
	{
		
		$this->view->generate('user_teme_view.php', 'main_template_view.php',$_SESSION['login_user'],[10,20,30,40], $action_id);
	}
}