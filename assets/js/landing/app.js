/*Главный файл js*/
var time_scroll;
function ScrollScreen(){
		var clientHeight = document.documentElement.clientHeight;
		var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
		var newScroll = scrollTop + (clientHeight - scrollTop);

		if(scrollTop < newScroll){
			window.scrollBy(0,10);
			time_scroll = setTimeout('ScrollScreen()',12);
		} else clearTimeout(time_scroll);
		return false;
		//= setTimeout(newScroll, 20);
		

}
$(document).ready(function() {
})