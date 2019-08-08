<?
class Controller_delete extends Controller
{

	function __construct()
	{
		$this -> model = new Model_delete();
		$this -> view = new View();
	}

	function action_index()
	{	
		header("location: /my");

	}

	function action_group($id_action)
	{
		$array = $this -> model -> deleteGroup($id_action);
		
	}
}