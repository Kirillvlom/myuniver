<?
class Controller_generation extends Controller
{

	function __construct()
	{
		$this -> model = new Model_generation();
		$this -> view = new View();
	}

	function action_index()
	{	
		header("Location: /my");
		//$this->view->generate('user_view.php', 'main_template_view.php',$_SESSION['user']['login_user'],[10,20,30,40], $array_user_user);		
		
	}
	function action_vkr_plan($id_action)
	{
		$this -> model ->NewVkrPlanDocument($id_action);

	}
	function action_listStudent($id_action)
	{
		$array = $this -> model ->NewlistStudentPrint($id_action);
		
	}
	function action_listStudent_for_teacher($id_action)
	{
		$this -> model ->listStudent_for_teacher($id_action, $_SESSION['user']['id_user']);
	}

	function action_order_vkr($id_action)
	{
		$this -> model ->new_order_vkr($id_action);
	}

}