<?	
/**
* 
*/
class User extends Model
{
	
	//Получаем информацию по логину
	public function get_info_user($login_user='')
	{
		$db_connect = Model::db_connect();
		if ($login_user == "all") {
			$get_info_user_sql = "SELECT * FROM users";
			
			if ($get_info_user_result = $db_connect -> query($get_info_user_sql)->fetchAll()) {
				return $get_info_user_result;
			} else{
				return 0;
			}
		}else{
			$get_info_user_sql = "SELECT * FROM users WHERE login_user = '$login_user'";
			if ($get_info_user_result = $db_connect -> query($get_info_user_sql)->fetchAll()) {

				$get_info_roleof_sql = "SELECT * FROM roleof WHERE id_role = ".$get_info_user_result[0]['id_role_user']."";
				
				if ($result =  $db_connect -> query($get_info_roleof_sql)->fetchAll()) {

					$access_role = $result[0]['access_role'];
					$name_role = $result[0]['name_role'];

				}else{
					$access_role = 0;
				}
				array_push($get_info_user_result, $access_role);
				array_push($get_info_user_result, $name_role);

				
				return $get_info_user_result;
			} else{
				return 0;
			}
		}

	}


//Получаем информацию студенту
	public function get_info_student($id_user='')
	{
		$db_connect = Model::db_connect();
		$get_info_student_sql = "SELECT * FROM students WHERE id_user = '$id_user'";
		
		if ($get_info_student_result = $db_connect -> query($get_info_student_sql) or die($db_connect->errorInfo()[2])) {	
			return $get_info_student_result->fetchAll();
		}else{
			return 0;
		}
	}
//Получаем информацию студенту
	public function get_dop_info_student($sql)
	{
		$db_connect = Model::db_connect();
		
		if ($get_dop_info_student = $db_connect -> query($sql) or die($db_connect->errorInfo()[2])) {

			return $get_dop_info_student->fetchAll();
		}else{
			return 0;
		}
	}
}