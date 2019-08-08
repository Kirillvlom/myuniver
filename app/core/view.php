<?
class View
{
	//public $template_view; // здесь можно указать общий вид по умолчанию.
	
	function generate($content_view, $template_view, $nameSite = null,  $role = null,$data = null)
	{
		$_SESSION['page_url_previous'] = $_SERVER['REQUEST_URI'];
		/*
		if(is_array($data)) {
			// преобразуем элементы массива в переменные
			extract($data);
		}
		*/

		if (isset($_SESSION['user']['access_role'])) {
			$role_total = $_SESSION['user']['access_role'];
			
		}  else{
			$role_total = 0;
		}
		if ($_SESSION['user']['blocking_user'] == '1') {
			$role_total = 0;
			Route::error("оУууууу", "Ваш профиль заблокирован, <br>обрабитесь на кафедру 😏", "/");
			echo "<script>function func() {
				window.location.href= '/user/session_destroy';
			}

			setTimeout(func, 2000);</script>";
			exit();
		}
		
		if (in_array($role_total, $role)) {
			
			include 'app/views/'.$template_view;
			include 'app/views/'.$content_view;
			echo "

			</div>
			</div>
			</div>";
		} else{
			Route::error("оУууууу", "Данная страница не доступна, <br>чет ты попутал 😏", "/");
		}		
	}
}