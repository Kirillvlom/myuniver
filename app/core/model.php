<?
class Model
{

	//Подключение к бд
	static function db_connect()
	{
		//Выполняем соединение
		$params = require_once 'config.php';
		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
		$opt = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
		];
		$db = new PDO($dsn,'root', '', $opt);
        // Задаем кодировку
		$db->exec("set names utf8");
		return  $db;
	}
	//Логирование ошибок в бд
	function log_error($type_error, $text_error, $date_error, $url_page_error)
	{
		/*	$this->log_error("sql","asdsa", $this->rus_date("l, j F Y - H:i:s"), $_SERVER['REQUEST_URI']);*/
		$db_connect = Model::db_connect();
		$log_error_sql = "INSERT INTO errors (type_error, date_error, url_page_error, text_error) VALUES ('$type_error', '$date_error', '$url_page_error', '$text_error')";
		$db_connect -> query($log_error_sql);
	}
	//Отлаживание кода с занесением в бд
	
	function log_debug($text_log, $date_log, $url_page_log, $db)
	{
		/*Model::log_debug($result, $this->rus_date("l, j F Y - H:i:s"), $_SERVER['REQUEST_URI']);;*/
		$text_log = addslashes ($text_log);
		$log_error_sql = "INSERT INTO log_debug (text_log, date_log, url_page_log) VALUES ('$text_log', '$date_log', '$url_page_log')";
		$db -> query($log_error_sql) or die(
			$db->errorinfo()[2]);
	}
	
	//Вывод даты на русском
	function rus_date() {
		$translate = array(
			"am" => "дп",
			"pm" => "пп",
			"AM" => "ДП",
			"PM" => "ПП",
			"Monday" => "Понедельник",
			"Mon" => "Пн",
			"Tuesday" => "Вторник",
			"Tue" => "Вт",
			"Wednesday" => "Среда",
			"Wed" => "Ср",
			"Thursday" => "Четверг",
			"Thu" => "Чт",
			"Friday" => "Пятница",
			"Fri" => "Пт",
			"Saturday" => "Суббота",
			"Sat" => "Сб",
			"Sunday" => "Воскресенье",
			"Sun" => "Вс",
			"January" => "Января",
			"Jan" => "Янв",
			"February" => "Февраля",
			"Feb" => "Фев",
			"March" => "Марта",
			"Mar" => "Мар",
			"April" => "Апреля",
			"Apr" => "Апр",
			"May" => "Мая",
			"May" => "Мая",
			"June" => "Июня",
			"Jun" => "Июн",
			"July" => "Июля",
			"Jul" => "Июл",
			"August" => "Августа",
			"Aug" => "Авг",
			"September" => "Сентября",
			"Sep" => "Сен",
			"October" => "Октября",
			"Oct" => "Окт",
			"November" => "Ноября",
			"Nov" => "Ноя",
			"December" => "Декабря",
			"Dec" => "Дек",
			"st" => "ое",
			"nd" => "ое",
			"rd" => "е",
			"th" => "ое"
		);

		if (func_num_args() > 1) {
			$timestamp = func_get_arg(1);
			return strtr(date(func_get_arg(0), $timestamp), $translate);
		} else {
			return strtr(date(func_get_arg(0)), $translate);
		}
	}

	//делаем русские буквы англ
	public function lat($new_title)
	{
		$char=array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','з'=>'z','и'=>'i',
			'й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t',' '=>'_',
			'у'=>'u','ф'=>'f','х'=>'h',"'"=>'','ы'=>'i','э'=>'e','ж'=>'zh','ц'=>'ts','ч'=>'ch','ш'=>'sh',
			'щ'=>'j','ь'=>'','ю'=>'yu','я'=>'ya','Ж'=>'ZH','Ц'=>'TS','Ч'=>'CH','Ш'=>'SH','Щ'=>'J',
			'Ь'=>'','Ю'=>'YU','Я'=>'YA','ї'=>'i','Ї'=>'Yi','є'=>'ie','Є'=>'Ye','А'=>'A','Б'=>'B','В'=>'V',
			'Г'=>'G','Д'=>'D','Е'=>'E','Ё'=>'E','З'=>'Z','И'=>'I','Й'=>'Y','К'=>'K','Л'=>'L','М'=>'M','Н'=>'N',
			'О'=>'O','П'=>'P','Р'=>'R','С'=>'S','Т'=>'T','У'=>'U','Ф'=>'F','Х'=>'H','Ъ'=>"'",'Ы'=>'I','Э'=>'E');
		$new_title=strtr($new_title,$char);
		return $new_title;
	}

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

}