<?
class Model_workspaces extends Model
{
	public function getAllUsers()
	{
		$db = new Db();
		return $db->db_query("users");
	}

	public function getAllworkspaces()
	{
		$db = new Db();
		$all_workspaces = $db-> db_query("workspaces");
		
		$array_data = array(
			"all_workspaces" => $all_workspaces
		);
		return $array_data;
		
	}

}