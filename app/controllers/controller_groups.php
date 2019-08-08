<?
class Controller_groups extends Controller
{

	function __construct()
	{
		$this -> model = new Model_groups();
		$this -> view = new View();
	}

	function action_index()
	{	
		$array_groups = $this-> model->getAllgroups();
		$this->view->generate('groups_view.php', 'main_template_view.php','Группы',[10,20,30,40],$array_groups);		

	}

	function action_id($id_action)
	{
		$array = $this -> model -> getAllUsersGroup($id_action);
		$this->view->generate('groups_id_view.php', 'main_template_view.php',"Группа",[30], $array);	
	}

	function action_thetheme($id_action)
	{
		$array = $this -> model -> getAllUsersGroupTheme($id_action);

		$this->view->generate('groups_id_edit_theme_view.php', 'main_template_view.php',"Группа",[30], $array);
	}

	function action_sevetheme($id_action)
	{
		
		$this -> model -> sevetheme($_POST['new_theme_vkr']) ;

		
	}
	function action_evaluation($id_action)
	{
		$array = $this -> model -> editevaluation($id_action);
		$this->view->generate('groups_id_edit_evaluation_view.php', 'main_template_view.php',"На",[30], $array);	
	}
	function action_seveEvaluation($id_action)
	{
		$this -> model -> seveEvaluation($id_action);
	}
}