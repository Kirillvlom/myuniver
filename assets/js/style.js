$(document).ready(function() {
	//Выпадающая панель с уведомлениеями
	$('#notification-user').click(function(){
		if ($('.drop-down-notification-user').attr("data-hidden") == 0) {
			$('.drop-down-notification-user').attr("data-hidden", "1").css("opacity", "1");
		}else{
			$('.drop-down-notification-user').attr("data-hidden", "0").css("opacity", "0");
		}
	});
})