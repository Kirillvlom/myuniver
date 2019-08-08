<?
class Model_user extends Model
{
	//Получаем всю информацию о пользоватле
	public function getInfoUser($id_user)
	{
		
		$db = new Db();
		//Получаем информацию о пользователе

		if ($_SESSION['user']['access_role'] == '10') {
			# Выгружаем инфу о студенте
			$array_user_student = $db -> db_query_param_where_column("students", "id_user",$id_user);
			$result_Userget_info_user = $db -> db_query_param_where_column("users", "id_user",$id_user);
			$array_user_info = array(
				'login_user' => $_SESSION['user']['login_user'], 
				'name_user' => $_SESSION['user']['name_user'], 
				'surname_user' => $_SESSION['user']['surname_user'], 
				'patronymic_user' => $_SESSION['user']['patronymic_user'], 
				'name_role' => $_SESSION['user']['name_role'], 
				'blocking_user' => $_SESSION['user']['blocking_user'], 

				'date_of_birth_user' => $result_Userget_info_user[0]['date_of_birth_user'], 
				'phone_user' => $result_Userget_info_user[0]['phone_user'], 
				'email_user' => $result_Userget_info_user[0]['email_user'], 
				'cover_user' => $result_Userget_info_user[0]['cover_user'], 
				'array_setting_user' => $result_Userget_info_user[0]['array_setting_user'], 
				'date_of_registration' => $result_Userget_info_user[0]['date_of_registration'],
				'id_course' => $array_user_student[0]['id_course'], 
				'record_book_student' => $array_user_student[0]['record_book_student'],
				'id_specialty' => $array_user_student[0]['id_specialty'], 
				'id_form_of_training' => $array_user_student[0]['id_form_of_training'], 
				'id_group' => $array_user_student[0]['id_group'], 
				'id_base' => $array_user_student[0]['id_base']
			);

			$get_full_info_user_sql = "SELECT name_specialty FROM specialties WHERE id_specialty = '".$array_user_info['id_specialty']."' UNION SELECT name_form_of_training FROM forms_of_training WHERE id_form_of_training = '".$array_user_info['id_form_of_training']."' UNION SELECT name_group FROM groups WHERE id_group = '".$array_user_info['id_group']."'   ";

		}	elseif ($_SESSION['user']['access_role'] == '20') {
			$array_user_teachers = $db -> db_query_param_where_column("teachers", "id_user",$id_user);
			$result_Userget_info_user = $db -> db_query_param_where_column("users", "id_user",$id_user);
			$array_user_info = array(
				'login_user' => $_SESSION['user']['login_user'], 
				'name_user' => $_SESSION['user']['name_user'], 
				'surname_user' => $_SESSION['user']['surname_user'], 
				'patronymic_user' => $_SESSION['user']['patronymic_user'], 
				'name_role' => $_SESSION['user']['name_role'], 
				'blocking_user' => $_SESSION['user']['blocking_user'], 

				'date_of_birth_user' => $result_Userget_info_user[0]['date_of_birth_user'], 
				'phone_user' => $result_Userget_info_user[0]['phone_user'], 
				'email_user' => $result_Userget_info_user[0]['email_user'], 
				'cover_user' => $result_Userget_info_user[0]['cover_user'], 
				'array_setting_user' => $result_Userget_info_user[0]['array_setting_user'], 
				'date_of_registration' => $result_Userget_info_user[0]['date_of_registration'], 

				'id_department' => $array_user_teachers[0]['id_department'], 
				'id_position' => $array_user_teachers[0]['id_position']
			);
			$get_full_info_user_sql = "SELECT name_department FROM department WHERE id_department = '".$array_user_info['id_department']."' UNION SELECT name_position FROM positions WHERE id_position = '".$array_user_info['id_position']."'";
		}	elseif ($_SESSION['user']['access_role'] == '30') {
			$array_user_managers = $db -> db_query_param_where_column("managers", "id_user",$id_user);
			$result_Userget_info_user = $db -> db_query_param_where_column("users", "id_user",$id_user);
			$array_user_info = array(
				'login_user' => $_SESSION['user']['login_user'], 
				'name_user' => $_SESSION['user']['name_user'], 
				'surname_user' => $_SESSION['user']['surname_user'], 
				'patronymic_user' => $_SESSION['user']['patronymic_user'], 
				'name_role' => $_SESSION['user']['name_role'], 
				'blocking_user' => $_SESSION['user']['blocking_user'], 

				'date_of_birth_user' => $result_Userget_info_user[0]['date_of_birth_user'], 
				'phone_user' => $result_Userget_info_user[0]['phone_user'], 
				'email_user' => $result_Userget_info_user[0]['email_user'], 
				'cover_user' => $result_Userget_info_user[0]['cover_user'], 
				'array_setting_user' => $result_Userget_info_user[0]['array_setting_user'], 
				'date_of_registration' => $result_Userget_info_user[0]['date_of_registration'],

				'id_department' => $array_user_managers[0]['id_department']
				
			);
			$get_full_info_user_sql = "SELECT name_department FROM department WHERE id_department = '".$array_user_info['id_department']."'";

		}	elseif ($_SESSION['user']['access_role'] == '40') {
			$array_user_managers = $db -> db_query_param_where_column("administrators", "id_user",$id_user);
			$result_Userget_info_user = $db -> db_query_param_where_column("users", "id_user",$id_user);
			$array_user_info = array(
				'login_user' => $_SESSION['user']['login_user'], 
				'name_user' => $_SESSION['user']['name_user'], 
				'surname_user' => $_SESSION['user']['surname_user'], 
				'patronymic_user' => $_SESSION['user']['patronymic_user'], 
				'name_role' => $_SESSION['user']['name_role'], 
				'blocking_user' => $_SESSION['user']['blocking_user'], 	
				'email_user' => $result_Userget_info_user[0]['email_user'],	
				'cover_user' => $result_Userget_info_user[0]['cover_user'], 
				'array_setting_user' => $result_Userget_info_user[0]['array_setting_user'], 
				'date_of_registration' => $result_Userget_info_user[0]['date_of_registration']		
			);
		}
		/*echo "<pre>";*/
		$array_full_info_user_sql = $db->db_composite_query($get_full_info_user_sql);
		
		array_push($array_user_info, $array_full_info_user_sql);

		return $array_user_info;
		
		
	}
//Редактируем информцаю 
	public function edit_info($table, $id_user, $new_array_info_user)
	{
		$db = new Db();
		if ($db->db_update_query($table, "id_user", $id_user, $new_array_info_user)) {
			return 1;
		} else{
			return 0;
		}

	}
	//Получаем информацию о пользователе по id и выводим информацию
	public function getInfoUserId($id_user)
	{
		$db = new Db();
		$userArray = $db -> db_query_param_where_column("users", "id_user", $id_user);
		$role_user = $userArray[0]['id_role_user'];
		if ($role_user == "1") {
			$array_user_student = $db -> db_query_param_where_column("students", "id_user",$id_user);
			$array_user_info = array(
				'id_user' => $id_user,
				'login_user' => $userArray[0]['login_user'], 
				'name_user' => $userArray[0]['name_user'], 
				'surname_user' => $userArray[0]['surname_user'], 
				'patronymic_user' => $userArray[0]['patronymic_user'], 
				'id_role_user' => $userArray[0]['id_role_user'], 
				'blocking_user' => $userArray[0]['blocking_user'], 
				'avatar_user' => $userArray[0]['avatar_user'],
				'date_of_birth_user' => $userArray[0]['date_of_birth_user'], 
				'phone_user' => $userArray[0]['phone_user'], 
				'email_user' => $userArray[0]['email_user'], 
				'cover_user' => $userArray[0]['cover_user'], 
				'array_setting_user' => $userArray[0]['array_setting_user'], 
				'date_of_registration' => $userArray[0]['date_of_registration'],
				'name_role' => "Студент",
				'id_course' => $array_user_student[0]['id_course'], 
				'id_workspace' => $userArray[0]['id_workspace'],
				'record_book_student' => $array_user_student[0]['record_book_student'],
				'id_specialty' => $array_user_student[0]['id_specialty'], 
				'id_form_of_training' => $array_user_student[0]['id_form_of_training'], 
				'id_group' => $array_user_student[0]['id_group'], 
				'id_base' => $array_user_student[0]['id_base']
			);

			$get_full_info_user_sql = "SELECT name_specialty FROM specialties WHERE id_specialty = '".$array_user_info['id_specialty']."' UNION SELECT name_form_of_training FROM forms_of_training WHERE id_form_of_training = '".$array_user_info['id_form_of_training']."' UNION SELECT name_group FROM groups WHERE id_group = '".$array_user_info['id_group']."'   ";
		}elseif($role_user == "2"){

			$array_user_teachers = $db -> db_query_param_where_column("teachers", "id_user",$id_user);
			
			$array_user_info = array(
				'id_user' => $id_user,
				'login_user' => $userArray[0]['login_user'], 
				'name_user' => $userArray[0]['name_user'], 
				'surname_user' => $userArray[0]['surname_user'], 
				'patronymic_user' => $userArray[0]['patronymic_user'], 
				'id_role_user' => $userArray[0]['id_role_user'], 
				'blocking_user' => $userArray[0]['blocking_user'], 
				'avatar_user' => $userArray[0]['avatar_user'],
				'date_of_birth_user' => $userArray[0]['date_of_birth_user'], 
				'phone_user' => $userArray[0]['phone_user'], 
				'email_user' => $userArray[0]['email_user'], 
				'cover_user' => $userArray[0]['cover_user'], 
				'array_setting_user' => $userArray[0]['array_setting_user'], 
				'date_of_registration' => $userArray[0]['date_of_registration'],
				'name_role' => "Преподаватель", 

				'id_department' => $array_user_teachers[0]['id_department'], 
				'id_position' => $array_user_teachers[0]['id_position']
			);
			$get_full_info_user_sql = "SELECT name_department FROM department WHERE id_department = '".$array_user_info['id_department']."' UNION SELECT name_position FROM positions WHERE id_position = '".$array_user_info['id_position']."'";
		}elseif($role_user == "3"){
			$array_user_managers = $db -> db_query_param_where_column("managers", "id_user",$id_user);
			
			$array_user_info = array(
				'id_user' => $id_user,
				'login_user' => $userArray[0]['login_user'], 
				'name_user' => $userArray[0]['name_user'], 
				'surname_user' => $userArray[0]['surname_user'], 
				'patronymic_user' => $userArray[0]['patronymic_user'], 
				'id_role_user' => $userArray[0]['id_role_user'], 
				'blocking_user' => $userArray[0]['blocking_user'], 
				'avatar_user' => $userArray[0]['avatar_user'],
				'date_of_birth_user' => $userArray[0]['date_of_birth_user'], 
				'phone_user' => $userArray[0]['phone_user'], 
				'email_user' => $userArray[0]['email_user'], 
				'cover_user' => $userArray[0]['cover_user'], 
				'array_setting_user' => $userArray[0]['array_setting_user'], 
				'date_of_registration' => $userArray[0]['date_of_registration'],
				'name_role' => "Менеджер", 

				'id_department' => $array_user_managers[0]['id_department']
				
			);
			$get_full_info_user_sql = "SELECT name_department FROM department WHERE id_department = '".$array_user_info['id_department']."'";
		}
		$array_full_info_user_sql = $db->db_composite_query($get_full_info_user_sql);
		
		array_push($array_user_info, $array_full_info_user_sql);
		return $array_user_info;

	}

//Создаем нового пользователя
	

}
