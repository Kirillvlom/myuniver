<?
class Model_signin extends Model
{
//Проверяем логин и почту на наличие в базе
	public function check_auth_user($user_login, $user_password)
	{
		$db = new Db();
		//Получаем информацию о пользователе
		$result_Userget_info_user = $db -> db_query_param_where_column("users", "login_user",$user_login);
		if ($result_Userget_info_user) {
			$role_user = $db -> db_query_param_where_column("roleof", "id_role",$result_Userget_info_user[0]['id_role_user']);
			/*
			echo "<pre>";
			var_dump($_SESSION['user']);*/
			
			if (md5($user_password) == $result_Userget_info_user[0]['password_user']) {
				$_SESSION['user'] = array(
					'id_user' => $result_Userget_info_user[0]['id_user'],
					'login_user' => $result_Userget_info_user[0]['login_user'],
					'name_user' => $result_Userget_info_user[0]['name_user'],
					'surname_user' => $result_Userget_info_user[0]['surname_user'],
					'patronymic_user' => $result_Userget_info_user[0]['patronymic_user'] ,
					'avatar_user' => $result_Userget_info_user[0]['avatar_user'] ,
					'blocking_user' => $result_Userget_info_user[0]['blocking_user'] ,
					'access_role' => $role_user[0]["access_role"],
					'name_role' => $role_user[0]["name_role"],
				);	
				header("Location: /my");
			} else{
				echo "<script>alert('Пароли не совпадают');
				window.location.href='/signin' </script>";
			}
		} else{
			echo "<script>alert('Введенные данные не верны');
			window.location.href='/signin' </script>";		}

		}
	}