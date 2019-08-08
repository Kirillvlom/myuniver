<?
class Controller_chat extends Controller
{
	function action_index()
	{	
		$this->view->generate('chat_view.php', 'template_view.php','Чат',[10,20,30,40]);		
	}
}