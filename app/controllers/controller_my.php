<?
class Controller_my extends Controller
{


	function __construct()
	{
		$this -> model = new Model_my();
		$this -> view = new View();
	}

	function action_index()
	{	
		
		if ($_SESSION['user']['access_role'] == '30') {
			
		}else{
			$arrayData = $this -> model -> getInfoWorkspaces($_SESSION["user"]["id_user"], $_SESSION["user"]["access_role"]);

		}

		$this->view->generate('my_view.php', 'main_template_view.php','Рабочие области', [10,20,30,40], $arrayData );		
	}

	//открываем рабочую область
	function action_dashboard($action_id)
	{

		if (isset($action_id)) {
			$array = $this-> model ->getAllInfoWorkspace($action_id );
			$this->view->generate('my_dashboard_view.php', 'main_template_view.php','Рабочия область', [10,20,30],$array );
		} else{
			header("location: /my");
		}
		
	}

	//открываем рабочую область
	function action_dashboards()
	{
		$array = $this -> model -> getAllVpoOchka($_SESSION['user']['id_user']);

		$this->view->generate('my_dashboards_view.php', 'main_template_view.php','Рабочия область', [20], $array );
	}
	
	//открываем рабочую область
	function action_dashboard_group($action_id)
	{
		$array = $this -> model -> getAllUserGroup($action_id, $_SESSION['user']['id_user']);

		$this->view->generate('my_dashboard_group_view.php', 'main_template_view.php','Рабочия область', [20],$array );
	}


	function action_newFile_dashboard($id_action)
	{

		$array = array(
			"document" => $_FILES["new_material"],
			"comment" => $this -> data_processing($_POST["comment"])
		);
		if ($this -> model ->newFile_dashboard($id_action, $array, $_SESSION['user']["id_user"], $_SESSION['user']["access_role"])) {
			echo "<script>
			window.location.href = '/my/dashboard/$id_action';
			</script>";
		}
	
	}
}