<?
class Controller_new extends Controller
{

	function __construct()
	{
		$this -> model = new Model_new();
		$this -> view = new View();
	}

	function action_index()
	{	
		header("Location: /my");
		//$this->view->generate('user_view.php', 'main_template_view.php',$_SESSION['user']['login_user'],[10,20,30,40], $array_user_user);		
		
	}
	//Добавляем нового пользователя
	function action_user()
	{
		$array_info_user = $this -> model -> getInfoUserArray("user");
		$this->view->generate('new_user_view.php', 'main_template_view.php',"Добавление нового пользователя",[30], $array_info_user);
	}

	//Добавляем новую рабочую область
	function action_workspace()
	{
		
		$array_info_user = $this -> model -> getInfoUserArray("workspace");
		$this->view->generate('new_workspace_view.php', 'main_template_view.php',"Добавление новой рабочей области",[30], $array_info_user);
	}

	//Добавляем новую группу
	function action_group()
	{
		
		$array_info_user = $this -> model -> getInfoUserArray("groups");
		$this->view->generate('new_group_view.php', 'main_template_view.php',"Добавление новой группы",[30], $array_info_user);
	}

	//Добавляем новую специальность
	function action_specialtie()
	{
		
		$array_info_user = $this -> model -> getInfoUserArray("specialtie");
		$this->view->generate('new_specialtie_view.php', 'main_template_view.php',"Добавление новой группы",[30], $array_info_user);
	}
	
		//Выгружаем инфу по студента курса
	function action_getgroupusers($action_id)
	{
		$array_info_user = $this -> model -> getgroupuser($action_id);
		echo  json_encode($array_info_user);
	}

	//Выгружаем инфу по группе исходя из выбранной специальности
	function action_getgroupusersSpecialty($action_id)
	{
		$array = $this -> model -> getInfoGroupSpecialtyArray($action_id);
		echo  json_encode($array);
	}
	function action_getgroupuser($action_id)
	{
		$array = $this -> model -> getGroupuse($action_id);
		echo  json_encode($array);
	}
	
	function action_newgroup()
	{
		//$array = array( 1,2 );
		//echo $array = serialize($array);
		$phpWord = new  \PhpOffice\PhpWord\PhpWord();
		
	}

	function action_workspaceAdd()
	{
		$new_name_group = $_POST['new_name_workspace'];
		$deadline = $_POST['new_deadline'];
		$arrayUser = $_POST['groups_workspace'];
		$new_description = $_POST['new_description'];
		$new_material_1 = $_FILES['new_material_1'];
		$new_material_2 = $_FILES['new_material_2'];
		$new_date_plan_array = $_POST['date_plan_array'];
		$new_date_text_array = $_POST['text_plan_array'];
		$new_id_teachers = $_POST['new_id_teachers'];
		
		
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
		


		if ($id_workspace = $this -> model -> add_workspace($new_name_group, $deadline, $new_id_teachers, $new_description, $arrayUser, $array_plan, $new_material_1, $new_material_2)) {

			//$this -> model -> add_file_workspace($new_material_1, "1", $id_workspace);
			//$this -> model -> add_file_workspace($new_material_2, "2", $id_workspace);
			header("location: /workspaces");
		}
	


	}

	//Добавляем пользователя
	function action_userAdd()
	{
		
		$new_name_user = $_POST['new_name_user'];
		$new_surname_user = $_POST['new_surname_user'];
		$new_patronymic_user = $_POST['new_patronymic_user'];
		$new_phone_user = $_POST['new_phone_user'];
		$new_email_user = $_POST['new_email_user'];
		$new_date_of_birth_user = $_POST['new_date_of_birth_user'];
		$new_login_user = $_POST['new_login_user'];
		$new_password_user = $_POST['new_password_user'];
		$new_id_role_user = $_POST['new_id_role_user'];
		$new_record_book_student = $_POST['new_record_book_student'];
		$new_id_course = $_POST['new_id_course'];
		$new_id_specialty = $_POST['new_id_specialty'];
		$new_id_group = $_POST['new_id_group'];

		$new_id_department = $_POST['new_id_department'];
		$new_id_position = $_POST['new_id_position'];


		if ($new_id_role_user == "1") {
			if ($this -> model -> add_student($new_name_user, $new_surname_user, $new_patronymic_user, $new_phone_user, $new_email_user,  $new_date_of_birth_user, $new_login_user, $new_password_user, $new_id_role_user, $new_record_book_student, $new_id_course, $new_id_specialty, $new_id_group)) {
				header("Location: /users");
			};
		}elseif($new_id_role_user == "2"){
			if ($this -> model -> add_teacher($new_name_user, $new_surname_user, $new_patronymic_user, $new_phone_user, $new_email_user,  $new_date_of_birth_user, $new_login_user, $new_password_user, $new_id_role_user, $new_id_department, $new_id_position)) {
				header("Location: /users");
			}

			
		}elseif($new_id_role_user == "3"){
			if ($this -> model -> add_manager($new_name_user, $new_surname_user, $new_patronymic_user, $new_phone_user, $new_email_user,  $new_date_of_birth_user, $new_login_user, $new_password_user, $new_id_role_user, $new_id_department)) {
				header("Location: /users");
			}
		}



	}

	//Добавление специальности
	function action_specialtieAdd()
	{
		$new_name_specialty = $_POST['new_name_specialty'];
		$new_id_course = $_POST['new_id_course'];
		$new_id_group = $_POST['new_id_group'];

		if ($this -> model -> add_specialtie($new_name_specialty,$new_id_course, $new_id_group )) {
			header("Location: /specialty");
		}
	}

	//Добавление группы
	function action_groupAdd()
	{
		$new_name_group = $_POST['new_name_group'];
		$new_id_manager = $_POST['new_id_manager'];
		$arrayUser = $_POST['arrayUser'];

		if ($arrayUser) {

			$arrayUsers = [];
			$i = 0;
			foreach($_POST['arrayUser'] as $check) { 
				$arrayUsers[$i] = $check; 
				$i ++;
			}
		} else{
			$arrayUsers = 0;
		}

		if ($this -> model -> add_group($new_name_group,$new_id_manager, $arrayUsers )) {
			//header("Location: /groups");
		}
		
		

	}

	function action_teme($id_action)
	{
		$db = new Db();
		$new_teme_workspace = $_POST['new_teme_workspace'];
		if (!$new_teme_workspace) {
			header("Location: /workspaces/thetheme/".$id_action);
		}
		$id_workspace = $db -> db_query_param_where_column("workspaces", "id_student", $id_action)[0]['id_workspace'];
		$array = array(
			"teme" => $new_teme_workspace
		);
		if ($db -> db_update_query("workspaces", "id_workspace", $id_workspace, $array)) {
			header("Location: /workspaces/thetheme/".$id_action);
		}
		
	}	

	
	
	


}