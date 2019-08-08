<?
/**
* 
*/
class Db 
{
	private $db;
	function __construct()
	{
		//Выполняем соединение
		$host = '127.0.0.1';
		$db   = 'my_university';
		$user = 'root';
		//$pass = 's2O6lbP7fFHXB01pE65';
		//$pass = '1234567';
		$pass = '';
		$charset = 'utf8';

		$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
		$opt = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
		];
		$this ->db = new PDO($dsn, $user, $pass, $opt);
	}
//Получаем тупо всю информцию из таблицы
	public function db_query($table)
	{
		$sql =  "SELECT * FROM $table";
		$result = $this->db->query($sql)->fetchAll();
		if ($result) {
			return $result;
		} else{
			echo "Ошибка";
		}
	}

//Получаем информацию по выборке с условием
	public function db_query_param_where_column($table, $param, $value, $get_column = '')
	{
		if ($get_column) {
			$sql =  "SELECT $get_column FROM $table WHERE $param = '$value'";
		}else{
			$sql =  "SELECT * FROM $table WHERE $param = '$value'";
		}
		
		$result = $this->db->query($sql)->fetchAll();
	
		if ($result) {
			return $result;
		} else{
			return 0;
		}
	}

	//Получаем информацию по выборке с условием
	public function db_composite_query($query)
	{
		
		$result = $this->db->query($query)->fetchAll();
		if ($result) {
			return $result;
		} else{
			//echo "Ошибка";
		}
	}

	//Добавляем информацию
	public function db_insert_query($table, $array)
	{

		$update_query = "INSERT INTO $table (";
		$e = 1;
		$count_array = count($array);
		foreach ($array as $key => $value) {
			
			if (!empty($value)) {

				if ($e == $count_array ) {
					$update_query .= " $key";
					
				} else{
					$update_query .= " $key,";

				}
			}
			$e +=1;
		}
		$e = 1;
		$update_query .= ") VALUES (";
		foreach ($array as $key => $value) {
			
			if (!empty($value)) {

				if ($e == $count_array ) {
					$update_query .= " '$value'";
					
				} else{
					$update_query .= " '$value',";

				}
			}
			$e +=1;
		}
		$update_query .= ")";
		
		if ($this->db->query($update_query)) {
			return 1;
		} else{
			return 0;
		}

	}
		//Обновляем информацию
	public function db_update_query($table, $where_name, $where, $array)
	{

		$update_query = "UPDATE $table SET";
		$e = 1;
		$count_array = count($array);
		foreach ($array as $key => $value) {
			
			if (!empty($value)) {

				if ($e == $count_array ) {
					$update_query .= " $key = '$value'";
					
				} else{
					$update_query .= " $key = '$value',";

				}
			}
			$e +=1;
		}
		$update_query .= " WHERE $where_name = '$where'";
	
		if ($this->db->query($update_query)) {
			return 1;
		} else{
			return 0;
		}

	}

	//Получаем последний id в таблице
	public function maxId($param, $table)
	{
		
	//Получаем последний id в базе
		$sql = "SELECT MAX($param) FROM $table";

		if ($result  = $this->db -> query($sql)) {
			//return $result -> fetchAll()[0][0]+1;
			return $result -> fetchAll()[0]["MAX(".$param.")"];
		}else{
			return 0;
		}
	}

	//Удаляем
	public function delete($param, $table)
	{
		

		$sql = "DELETE  FROM $table WHERE $param";

		if ($result  = $this->db -> query($sql)) {
			
			return 1;
		}else{
			return 0;
		}
	}
}