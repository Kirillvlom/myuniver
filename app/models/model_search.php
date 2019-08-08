<?
class Model_search extends Model
{

	public function search($value)
	{
		$db = new Db();
		
		$sql_users = "SELECT id_user FROM users WHERE  surname_user LIKE '%".$value. "%' OR name_user LIKE '%".$value. "%' OR  patronymic_user LIKE '%".$value. "%' ORDER BY  id_user ASC ";
		$sql_groups = "SELECT id_group FROM groups WHERE  name_group LIKE '%".$value. "%' ORDER BY  id_group ASC ";
		
		if ($result = $db ->db_composite_query($sql_users)) {
			$result_div = "<div class='result_search'>";
			for ($i=0; $i < count($result) ; $i++) { 

				$full_user = $db -> db_query_param_where_column("users", "id_user", $result[$i]["id_user"], "name_user, surname_user,patronymic_user");
				$result_div .= "<div class='row-all a-search'><a href='/user/id/".$result[$i]["id_user"]."'>".$full_user[0]["surname_user"]." ".$full_user[0]["name_user"]." ".$full_user[0]["patronymic_user"]."	</a></div>";
			}
			return $result_div;
		}elseif ($result = $db ->db_composite_query($sql_groups)) {
			$result_div = "<div class='result_search'>";
			for ($i=0; $i < count($result) ; $i++) { 

				$full_group = $db -> db_query_param_where_column("groups", "id_group", $result[$i]["id_group"], "name_group");
				$result_div .= "<div class='row-all a-search'><a href='/groups/id/".$result[$i]["id_group"]."'>".$full_group[0]["name_group"]." </a></div>";
			}
			return $result_div;
		}
		
	}


}