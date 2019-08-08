<?
class Model_edit extends Model
{
	public function getAllUserInfo($id_action)
	{
		$db = new Db();
		$userInfo = $db -> db_query_param_where_column("users", "id_user", $id_action);
		$userRole = $db -> db_query_param_where_column("roleof", "id_role", $userInfo[0]['id_role_user']);
		$arraySpecialties = $db -> db_query("specialties");
		$arrayDepartment = $db -> db_query("department"); 
		$arrayPositions = $db -> db_query("positions"); 
		if ($userInfo[0]['id_role_user'] == "1") {
			$studentInfo = $db -> db_query_param_where_column("students", "id_user", $id_action);
			$arrayCourse = $db -> db_query("courses");
			
			$array = array(
				"userInfo" => $userInfo,
				"userRole" => $userRole,
				"studentInfo" => $studentInfo,
				"arrayCourse" => $arrayCourse,
				"arraySpecialties" => $arraySpecialties,
				"arrayDepartment" => $arrayDepartment,
				"arrayPositions" => $arrayPositions

			);
		}elseif($userInfo[0]['id_role_user'] == "2"){
			
			$teachersInfo =  $db -> db_query_param_where_column("teachers", "id_user", $id_action);
			$array = array(
				"userInfo" => $userInfo,
				"userRole" => $userRole,
				"teachersInfo" => $teachersInfo,
				"arrayCourse" => $arrayCourse,
				"arraySpecialties" => $arraySpecialties,
				"arrayDepartment" => $arrayDepartment,
				"arrayPositions" => $arrayPositions

			);
		}elseif($userInfo[0]['id_role_user'] == "3"){
			
			$managersInfo =  $db -> db_query_param_where_column("managers", "id_user", $id_action);
			$array = array(
				"userInfo" => $userInfo,
				"userRole" => $userRole,
				"managersInfo" => $managersInfo,
				"arrayCourse" => $arrayCourse,
				"arraySpecialties" => $arraySpecialties,
				"arrayDepartment" => $arrayDepartment,
				"arrayPositions" => $arrayPositions

			);
		}
		
		



		return $array;
	}

	public function getAllspecialtyInfo($id_action)
	{
		$db = new Db();
		$info_specialty = $db -> db_query_param_where_column("specialties", "id_specialty", $id_action, "id_specialty, name_specialty");
		return $info_specialty;
	}
	public function specialtieSave($id_action)
	{
		$db = new Db();
		$array = array(
			"name_specialty" => $_POST['new_name_specialty']
		);
		if ($db -> db_update_query("specialties", "id_specialty", $id_action, $array)) {
			header("Location: /specialty");
		}	
	}
	public function getAllgroupInfo($id_action)
	{
		$db = new Db();
		$arrayGroups = $db->db_query("students");
		$name_group = $db -> db_query_param_where_column("groups", "id_group", $id_action, "name_group");
		$array = array(
			"arrayStudens" => $arrayGroups,
			"id_group" => $id_action,
			"name_group" => $name_group
		);

		return $array;
	}
	public function groupDeleteUser($id_action)
	{
		$db = new Db();

		$array = array(
			"name_group" => $_POST["new_name_group"]
		);

		$db -> db_update_query("groups", "id_group", $id_action, $array);
		for ($i=0; $i < count($_POST["arrayUser"]) ; $i++) { 
			$id = $_POST["arrayUser"][$i];
			$db -> db_composite_query("UPDATE students SET id_group = null WHERE id_student = '".$id."'");
		}
		header("Location: /groups");
		/*$student_group = $db -> db_query_param_where_column("students", "id_group", $id_action, "id_student, id_group");
		$all_student_group = $db -> db_query("students");
		$student_group_id = [];
		
		for ($i=0; $i < count($student_group) ; $i++) { 
			$student_group_id[$i] = $student_group[$i]["id_student"];
		}

		for ($i=0; $i < count($_POST["arrayUser"]) ; $i++) { 
			if (in_array($_POST["arrayUser"][$i], $student_group_id)) {
						
			}else{
				echo "<pre>";
				var_dump($all_student_group);
			}
		}
			
		*/
	}
	public function groupAddUser($id_action)
	{
		$db = new Db();
		
		if ($_POST["arrayUser"]) {
			for ($i=0; $i < count($_POST["arrayUser"]); $i++) { 
				$array = array(
					"id_group" => $id_action
				);
				if ($db -> db_update_query("students", "id_student", $_POST["arrayUser"][$i], $array)) {
					header("Location: /groups");
				};
			}
		}

	}
	public function editUser($id_action)
	{
		$db = new Db();
		
		$array_new_info = array(
			"name_user" => $_POST["new_name_user"],
			"surname_user" => $_POST["new_surname_user"],
			"patronymic_user" => $_POST["new_patronymic_user"],
			"date_of_birth_user" => $_POST["new_date_of_birth_user"],
			"phone_user" => $_POST["new_phone_user"],
			"email_user" => $_POST["new_email_user"]
			
		);
		$new_array_new_info = array();
		foreach ($array_new_info as $key => $value) {
			if ($value) {
				$new_array_new_info[$key] = $value;
			}
		}

		$id_role = $db -> db_query_param_where_column("users", "id_user", $id_action, "id_role_user");
		if ($id_role[0]["id_role_user"] == "1") {
			if ($_POST["new_record_book_student"]) {
				$array = array(
					"record_book_student" => $_POST["new_record_book_student"]
				);
				$db -> db_update_query("students", "id_user", $id_action, $array);
			}
		}

		if ($db -> db_update_query("users", "id_user", $id_action, $new_array_new_info)) {
			header("Location: /users");
		};
	}
	public function getAlldashboardInfo($id_action)
	{
		$db = new Db();
		$info_dashboard = $db -> db_query_param_where_column("workspaces", "id_workspace", $id_action);
		return $info_dashboard;
	}
	public function saveworkspace($id_action, $new_name,  $deadline, $array_plan, $description)
	{
		$db = new Db();

		$array = array(
			"name_workspace" => $new_name,
			"deadline" => $deadline,
			"execution_plan" => $array_plan,
			"description" => $description
		);
		$new_array = array();
		foreach ($array as $key => $value) {
			if ($value) {
				$new_array[$key] = $value;
			}
			
		}
		

	if ($db->db_update_query("workspaces", "id_workspace", $id_action, $new_array)) {
			return 1;
		}
	}
	public function add_file_workspace_edit($file, $type_file, $id_user, $id_action)
	{
		$db = new Db();
				$db = new Db();
		if ($type_file == "1") {
			$path = './assets/files/workspaces/'.$id_action."/material/";
		} else{
			$path = './assets/files/workspaces/'.$id_action."/document/";
		}
		
		$path_start =  './assets/files/workspaces/'.$id_action."/";
		@mkdir($path_start);
		@mkdir($path);

		$e = 0;
		foreach ($file["name"] as $key => $value) {
		
			$array = array(
				"name_materials_for_the_field" => $file["name"][$key],
				"document_materials_for_the_field" => $path.$this->lat($file["name"][$key]),
				"id_workspace" => $id_action,
				"type_material" => $type_file
			);

		
			$db -> db_insert_query("materials_for_the_field", $array);
			@copy($file["tmp_name"][$key], $path.$this->lat($file["name"][$key])); 

		}
		return 1;
	}
}