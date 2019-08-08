<?
class Model_groups extends Model
{
	public function getAllUsers()
	{
		$db = new Db();
		return $db->db_query("users");
	}

	public function getAllgroups()
	{
		$db = new Db();
		$all_groups = $db-> db_query("groups");
		
		$array_data = array(
			"all_groups" => $all_groups
		);
		return $array_data;
		
	}

	public function deleteGroup($id_group)
	{
		$db = new Db();
		$info_group =$db -> db_query_param_where_column("groups", "id_group", $id_group);
	}

	public function getAllUsersGroup($action_id)
	{
		$db = new Db();

		$array_All_id_student =  $db -> db_query_param_where_column("students", "id_group", $action_id, "id_student");
		$users_id = [];
		$students = [];
		for ($i=0; $i < count($array_All_id_student); $i++) { 
			$users_id[$i] = $db -> db_query_param_where_column("students", "id_student", $array_All_id_student[$i]['id_student'], "id_user");
		}
		for ($i=0; $i < count($users_id); $i++) { 
			$students[$i] = $db -> db_query_param_where_column("users", "id_user", $users_id[$i][0]['id_user']);
		}
		$groups_info = $db -> db_query_param_where_column("groups","id_group", $action_id);
		$user_teachers_info = $db -> db_query_param_where_column("users","id_user", $param, "name_user, surname_user, patronymic_user");


		$id_user_manager =  $db -> db_query_param_where_column("managers","id_manager", $groups_info[0]['id_manager'], "id_user");

		$user_manager = $db -> db_query_param_where_column("users","id_user", $id_user_manager[0]['id_user'], "id_user, name_user, surname_user, patronymic_user");
		$array_All_Group_info = array(
			"students" => $students,
			"user_manager" => $user_manager,
			"id_group" => $action_id
		);


		return $array_All_Group_info;
		
	}

	public function getAllUsersGroupTheme($id_action)
	{
		$db = new Db();
		$array_All_id_student =  $db -> db_query_param_where_column("students", "id_group", $id_action, "id_student");
		$users_id = [];
		$students_workspaces = [];
		for ($i=0; $i < count($array_All_id_student); $i++) { 
			$students_workspaces[$i] = $db -> db_query_param_where_column("students", "id_student", $array_All_id_student[$i]['id_student'], "id_student, theme_vkr");
		}
		
		return $students_workspaces;
	}
	public function sevetheme($post)
	{
		$db = new Db();
		foreach ($post as $key => $value) {
			$array = array(
				"theme_vkr" => $value
			);
			if ($db -> db_update_query("students", "id_student", $key, $array)) {
				header("Location: /groups/");
			}
		}
	}
	public function editevaluation($id_action)
	{
		$db = new Db();
		$array_All_id_student =  $db -> db_query_param_where_column("students", "id_group", $id_action, "id_student");
		$users_id = [];
		$students_workspaces = [];
		for ($i=0; $i < count($array_All_id_student); $i++) { 
			$students_workspaces[$i] = $db -> db_query_param_where_column("students", "id_student", $array_All_id_student[$i]['id_student'], "id_student, evaluation_vkr");
		}
		
		return $students_workspaces;
	}
	public function seveEvaluation($id_action)
	{
		$db = new Db();

		foreach ($_POST["new_ocenka"] as $key => $value) {
			if ($value) {
				$array = array(
					"evaluation_vkr" => $value
				);
				if ($db -> db_update_query("students", "id_student", $key, $array) ){
					header("Location: /groups/id"+$id_action);
				}
			}else{

				header("Location: /groups/");
			}
		}
	}
}