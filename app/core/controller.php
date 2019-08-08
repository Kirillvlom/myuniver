<?
class Controller{
	
	public $model;
	public $view;
	
	function __construct()
	{
		$this->view = new View();
		
	}
	
	function action_index()
	{
		
	}
	//Обработка введенных данных пользователя
	function data_processing($data)
	{
		$vowels  = array("/", "{", "}");
		htmlentities($data);
		$data = str_replace($vowels, " ", $data);
		return $data;
	}

	function shapeSpace_random_string($length) {
		
		$characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
		$strlength = strlen($characters);
		
		$random = '';
		
		for ($i = 0; $i < $length; $i++) {
			$random .= $characters[rand(0, $strlength - 1)];
		}
		return $random;
		
	}
}