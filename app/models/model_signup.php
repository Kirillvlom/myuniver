<?
class Model_signup extends Model
{
	//Проверяем логин и почту на наличие в базе
	public function check_information_in_up($field_validation, $value)
	{
		$db = new Db();
		if ($field_validation == "login_user") {
			if ($db->db_query_param_where_column("users", "login_user", $value, "login_user")) {
				return 1;
			} else{
				return 0;
			}
		} elseif ($field_validation == "user_email") {
			
			if ($db->db_query_param_where_column("users", "email_user", $value, "login_user")) {
				return 1;
			} else{
				return 0;
			}
		}
	}

//Создаем нового пользователя
	function new_user($user_fio, $user_login, $user_password, $user_email, $role_user)
	{
		$db = new Db();
	  	//Разбиваем строку по пробелам, и вытаскиваем ФИО по отдельности в массив
		$array_fio_user = preg_split("/[\s,]+/", $user_fio);
	  	//Получаем хеш пароля
		$user_password = md5($user_password);
		if ($db->db_query_param_where_column("users", "login_user", $user_login)) {
			echo "<script>alert('Ошибка регистрации, Такой логин существует'); window.location.href='/signup'; </script>";
		}else{
			$new_user_array = array(
				"login_user" => $user_login,
				"password_user" => $user_password ,
				"name_user" => $array_fio_user[1] ,
				"surname_user" => $array_fio_user[0],
				"patronymic_user" => $array_fio_user[2],
				"email_user" => $user_email,
				"id_role_user" => $role_user,
				"date_of_registration" => date("Y-m-d H:i:s")
			);
			if ($db->db_insert_query("users", $new_user_array)) {
				$result_info_user = $db->db_query_param_where_column("users", "login_user", $user_login);
				if ($role_user == 1) {
					$new_student_array = array(
						"id_user" => $result_info_user[0]["id_user"]
					);
					if ($db->db_insert_query("students", $new_student_array)) {
						$role_users = $db -> db_query_param_where_column("roleof", "id_role",$result_info_user[0]['id_role_user']);
						$_SESSION['user'] = array(
							'id_user' => $result_info_user[0]['id_user'],
							'login_user' => $result_info_user[0]['login_user'],
							'name_user' => $result_info_user[0]['name_user'],
							'surname_user' => $result_info_user[0]['surname_user'],
							'patronymic_user' => $result_info_user[0]['patronymic_user'] ,
							'avatar_user' => $result_info_user[0]['avatar_user'] ,
							'blocking_user' => $result_info_user[0]['blocking_user'] ,
							'access_role' => $role_users[0]["access_role"],
							'name_role' => $role_users[0]["name_role"],
						);	
						header("Location: /user");
					} else{
						echo "<script>alert('Ошибка регистрации'); window.location.href='/signup'; </script>";
					}

				}elseif ($role_user == 2) {
					$new_student_array = array(
						"id_user" => $result_info_user[0]["id_user"]
					);
					if ($db->db_insert_query("teachers", $new_student_array)) {
						$role_users = $db -> db_query_param_where_column("roleof", "id_role",$result_info_user[0]['id_role_user']);
						$_SESSION['user'] = array(
							'id_user' => $result_info_user[0]['id_user'],
							'login_user' => $result_info_user[0]['login_user'],
							'name_user' => $result_info_user[0]['name_user'],
							'surname_user' => $result_info_user[0]['surname_user'],
							'patronymic_user' => $result_info_user[0]['patronymic_user'] ,
							'avatar_user' => $result_info_user[0]['avatar_user'] ,
							'blocking_user' => $result_info_user[0]['blocking_user'] ,
							'access_role' => $role_users[0]["access_role"],
							'name_role' => $role_users[0]["name_role"],
						);	

						header("Location: /user");
					} else{
						echo "<script>alert('Ошибка регистрации'); window.location.href='/signup'; </script>";
					}
				}
			}
		}



		


/*
		if ($db_connect -> query($new_user_sql) or die($db_connect -> errorinfo()[2])) {
			if ($role_user == 1) {
				# Студент
				$sql = "SELECT * FROM users WHERE login_user = '$login_user'";
				$id_user = $db_connect -> query($sql) or die($db_connect -> errorinfo()[2]);
				$new_student_sql =  "INSERT INTO  students (id_user) VALUES ('".$id_user[0]['id_user']."')";
				echo $new_student_sql;
				if ($db_connect -> query($new_student_sql) or die($db_connect -> errorinfo()[2])) {
					echo "ok";
				}
			} elseif($role_user == 2){
				# Преподаватель
			}
			//header("Location: /user");
		} else{
			
		}*/
	}

}