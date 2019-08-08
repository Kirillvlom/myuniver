<?
class Model_my extends Model
{
	//Получаем информацию по областям для пользователя
	public function getInfoWorkspaces($id_user, $id_role)
	{
		$db = new Db();

		
		if ($id_role == "10") {
			$workspaces_user = $db->db_query_param_where_column("students", "id_user", $id_user);
			$array_workspace = $db-> db_query_param_where_column("workspaces", "id_student", $workspaces_user[0]["id_student"]);

		}
		
		//$array_workspace_user = $db->db_query_param_where_column("workspaces", "id_student", $id_user);
		$array = array(
			"array_workspace_user" => $array_workspace
		);
		return $array;
	}	


		//Получаем информацию по рабочей области
	public function getAllInfoWorkspace($action_id)
	{
		$db = new Db();
		$array_workspace = $db-> db_query_param_where_column("workspaces", "id_workspace", $action_id);
		$array_workspace_answers = $db-> db_query_param_where_column("answers_to_workspace", "id_workspace", $action_id);
		if ($array_workspace_answers) {
			$array_workspace_answers = array_reverse($array_workspace_answers);
		}
		
		$array = array(
			"array_workspace" => $array_workspace,
			"array_workspace_answers" => $array_workspace_answers,

		);
		
		return $array;
	}	

	public function getAllVpoOchka($param)
	{
		$db = new Db();

		if ($id_teachers = $db -> db_query_param_where_column("teachers", "id_user", $param, "id_teachers") ) {
			
			$array_All_VpoOchka =  $db -> db_query_param_where_column("workspaces", "id_teachers", $id_teachers[0]['id_teachers'], "id_student");

			if ($array_All_VpoOchka) {

				for ($i=0; $i < count($array_All_VpoOchka); $i++) { 

					if ($array_All_VpoOchka[$i]['id_student']) {
						$where_sql .= "SELECT id_group FROM students WHERE id_student = '".$array_All_VpoOchka[$i]['id_student']."' UNION ";
					}
				}
				$where_sql = substr($where_sql, 0, -6);

				$array_All_Group_users =  $db -> db_composite_query($where_sql);
				for ($i=0; $i < count($array_All_Group_users); $i++) { 
					if ($array_All_Group_users[$i]['id_group']) {
						$sql_group_info .= "SELECT id_group, name_group FROM groups WHERE id_group = '".$array_All_Group_users[$i]['id_group']."' UNION ";
					}
				}
				$sql_group_info = substr($sql_group_info, 0, -6);
				$array_All_Group =  $db -> db_composite_query($sql_group_info);
				return $array_All_Group;
			}

			return 0;
		}
		
	}

	public function getAllUserGroup($action_id, $param)
	{
		$db = new Db();

		
		if ($id_teachers = $db -> db_query_param_where_column("teachers", "id_user", $param, "id_teachers") ) {
			

			$array_All_id_student =  $db -> db_query_param_where_column("students", "id_group", $action_id, "id_student");
			
			for ($i=0; $i < count($array_All_id_student); $i++) { 
				$sql_group_info_student .= "SELECT id_workspace, id_student FROM workspaces WHERE id_teachers = '".$id_teachers[0]['id_teachers']."' AND id_student = '".$array_All_id_student[$i]['id_student']."' UNION ";
			}
			$sql_group_info_student = substr($sql_group_info_student, 0, -6);

			$array_All_Group_user =  $db -> db_composite_query($sql_group_info_student);

			$groups_info = $db -> db_query_param_where_column("groups","id_group", $action_id);
			$user_teachers_info = $db -> db_query_param_where_column("users","id_user", $param, "name_user, surname_user, patronymic_user");


			$id_user_manager =  $db -> db_query_param_where_column("managers","id_manager", $groups_info[0]['id_manager'], "id_user");

			$user_teachers_manager = $db -> db_query_param_where_column("users","id_user", $id_user_manager[0]['id_user'], "id_user, name_user, surname_user, patronymic_user");

			$array_All_Group_info = array(
				"array_All_Group_user" => $array_All_Group_user,
				"groups_info" => $groups_info,
				"user_teachers_info" => $user_teachers_info,
				"user_teachers_manager" => $user_teachers_manager
			);


			return $array_All_Group_info;
		}
	}

	public function newFile_dashboard($id_action, $arrays, $id_user, $user_role)
	{
		$db = new Db();

		if ($user_role == "10") {
			$path = './assets/files/workspaces/'.$id_action."/user_file/student/";
		} elseif($user_role == "20"){
			$path = './assets/files/workspaces/'.$id_action."/user_file/teacher/";
		}
		
		$path_start =  './assets/files/workspaces/'.$id_action."/user_file/";
		@mkdir($path_start);
		@mkdir($path);

		if ($arrays["document"]["name"]) {
			$array = array(
				"id_user" => $id_user,
				"comment_text" => $arrays["comment"],
				"date_of_creation" => $this -> rus_date("Y-m-d H:i:s"),
				"file" => $path.date("Y-m-d")."_".$arrays["document"]["name"],
				"file_name" => $arrays["document"]["name"],
				"id_workspace" => $id_action,
				"user_role" => $user_role
			);
		}else{
			$array = array(
				"id_user" => $id_user,
				"comment_text" => $arrays["comment"],
				"date_of_creation" => $this -> rus_date("Y-m-d H:i:s"),
				"id_workspace" => $id_action,
				"user_role" => $user_role
			);
		}
		


		$db -> db_insert_query("answers_to_workspace", $array);
		@copy($arrays["document"]["tmp_name"], $path.$this->lat($arrays["document"]["name"])); 

		
		return 1;

	}
}