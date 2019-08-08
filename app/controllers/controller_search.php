<?
class Controller_search extends Controller
{


	function __construct()
	{
		$this -> model = new Model_search();
		$this -> view = new View();
	}

	function action_index()
	{		
				
	}

	function action_all($action_id)
	{		
		echo $this -> model -> search($this->data_processing($_POST['value']));		
	}



	
}