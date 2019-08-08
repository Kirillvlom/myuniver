<?
class Model_users extends Model
{
	public function getAllUsers()
	{
		$db = new Db();
		return $db->db_query("users");
	}
}