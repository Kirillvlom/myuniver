<?
class Controller_edit extends Controller
{

	function __construct()
	{
		$this -> model = new Model_edit();
		$this -> view = new View();
	}

	function action_index()
	{	
		header("location: /my");

	}

	function action_user($id_action)
	{
		$array = $this -> model -> getAllUserInfo($id_action);
		$this->view->generate('user_edit_info_view.php', 'main_template_view.php',"Настройки пользователя",[30], $array);	
	}

	function action_specialty($id_action)
	{
		$array = $this -> model -> getAllspecialtyInfo($id_action);
		$this->view->generate('edit_specialtie_view.php', 'main_template_view.php',"Настройки пользователя",[30], $array);	
	}
	function action_specialtieSave($id_action)
	{
		$this -> model -> specialtieSave($id_action);
	}

	function action_group($id_action)
	{
		$array = $this -> model -> getAllgroupInfo($id_action);
		$this->view->generate('edit_group_view.php', 'main_template_view.php',"Настройки пользователя",[30], $array);	
	}
	function action_groupDeleteUser($id_action)
	{
		$this -> model -> groupDeleteUser($id_action);
	}
	function action_add_student($id_action)
	{
		$array = $this -> model -> getAllgroupInfo($id_action);
		$this->view->generate('edit_group_add_view.php', 'main_template_view.php',"Настройки пользователя",[30], $array);
	}
	function action_groupAddUser($id_action)
	{
		$this -> model -> groupAddUser($id_action);
	}
	function action_editUser($id_action)
	{
		$this -> model -> editUser($id_action);
	}
	
	function action_dashboard($id_action)
	{
		$array = $this -> model -> getAlldashboardInfo($id_action);
		$this->view->generate('edit_dashboard_view.php', 'main_template_view.php',"Настройки пользователя",[20], $array);
	}

	function action_saveworkspace($id_action)
	{

		$new_name = $this -> data_processing($_POST['new_name_workspace']);
		$deadline = $this -> data_processing($_POST['new_deadline']);
		$description =  $this -> data_processing($_POST['new_description']);
		$new_material_1 = $_FILES['new_material_1'];
		$new_material_2 = $_FILES['new_material_2'];
		$new_date_plan_array = $_POST['date_plan_array'];
		$new_date_text_array = $_POST['text_plan_array'];
		

		if ($new_date_plan_array) {
			$new_date_plan_array = array_reverse($new_date_plan_array);
		}
		if ($new_date_text_array) {
			$new_date_text_array = array_reverse($new_date_text_array);
		}
		$array_plan = array(
			"new_date_plan_array" => $new_date_plan_array,
			"new_date_text_array" => $new_date_text_array
		);
		$array_plan = serialize ($array_plan);
		if ($this -> model -> saveworkspace($id_action, $new_name,  $deadline, $array_plan, $description)) {
			$this -> model -> add_file_workspace_edit($new_material_1, 1, $_SESSION['user']['id_user'], $id_action);
			$this -> model -> add_file_workspace_edit($new_material_2, 2, $_SESSION['user']['id_user'], $id_action);
			echo "<script>
			window.location.href = '/my/dashboard/$id_action';
			</script>";
		}
	}
}