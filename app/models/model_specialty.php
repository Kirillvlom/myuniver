<?
class Model_specialty extends Model
{
	public function getAllSpecialty()
	{
		$db = new Db();
		return $db->db_query("specialties");
	}
}