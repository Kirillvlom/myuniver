var new_user_group_array = [];
function add_user_group(id_user)
{
	new_user_group_array.push(id_user);
	

}
$(document).ready(function(){
//Открытие и закрытие меню
/*
$('.dropdown-menu-user').click(function(){
	if ($('.dropdown-menu-user').data("menuOpen") == "open") {
		$(this).css("display","none");
		$(this).data("menuOpen","close");
	} else{
		$(this).css("display","block");
		$(this).data("menuOpen","open");
	}
});*/
$('.update').click(function(){ // ловим клик по ссылке с классом go_to
	document.location.href = '/my';
});

$('#profile-icon-menu').click(function(){
	if ($('.dropdown-menu-user').data("menuOpen") == "open") {
		$('.dropdown-menu-user').css("display","none");
		$('.dropdown-menu-user').data("menuOpen","close");
	} else{
		$('.dropdown-menu-user').css("display","block");
		$('.dropdown-menu-user').data("menuOpen","open");
	}
});

$('.type_accounts').click(function(){
	var id_class = $('.type_accounts option:selected').val();
	if (id_class == "1") {
		$('.new_student').css("display", "block");
		$('.new_teachers').css("display", "none");
		$('.new_manager').css("display", "none");


	}else if(id_class == "2"){
		$('.new_student').css("display", "none");
		$('.new_teachers').css("display", "block");
		$('.new_manager').css("display", "block");	
	}else if(id_class == "3"){
		$('.new_student').css("display", "none");
		$('.new_teachers').css("display", "none");
		$('.new_manager').css("display", "block");	
	}else if(id_class == "4"){
		$('.new_student').css("display", "none");
		$('.new_teachers').css("display", "none");
		$('.new_manager').css("display", "none");	
	}
});
$('.students_list_item').click(function(){
	alert(1);
	//console.log($(".students_list_item").data("id"));
})

$('.course ').click(function(){
	var id = $('.course option:selected').val();

	$.ajax({
		type: "POST",
		url: "/new/getgroupusers/"+id,
		success: function(msg){
			array_student_course = msg;
		},
		dataType:"json"
	});
	for (var i = 0; i <= array_student_course.length; i++) {
		$('.students_list').append("<div class='students_list_item' onclick='add_user_group("+array_student_course[i][0]["id_user"]+")' >"+array_student_course[i][0]["surname_user"]+" "+ array_student_course[i][0]["name_user"]+" "+array_student_course[i][0]["patronymic_user"]+" </div");

	}
	
	
});

$('.specialty_select').click(function(){
	var id = $('.specialty_select option:selected').val();
	$.ajax({
		type: "POST",
		url: "/new/getgroupusersSpecialty/"+id,
		success: function(msg){
			array = msg;
			$('#groups_workspace option').remove();
			$('#groups_workspace').append("<option  selected value='"+array[0][0]["id_group"]+"'>"+array[0][0]['name_group']+" </option>");
			console.log(array);
			
		},
		dataType:"json"
	});	
	$('#student_workspace').html("");
	for (var i = 0; i <= array[0][0]["array_students"].length; i++) {
		id_user = array[0][0]["id_group"][i];
		console.log(array[0][0]["id_group"][i]);
		$.ajax({
			type: "POST",
			url: "/new/getgroupuser/"+id_user,
			success: function(msg){
				array = msg;
				console.log(array);

				if (!array[0]['id_workspace']) {
					$('#student_workspace').append("<input type='checkBox' class='arrayUser_checkBox' name='arrayUser[]' value='"+array[0]["id_user"]+"'>"+array[0]['surname_user']+" "+array[0]['name_user']+" "+array[0]['patronymic_user']+"<br>");

				}

			},
			dataType:"json"
		});	
	}
	

	












});

$('#new_button_plan').click(function(){
	var date = $('#input_date_plan').val();
	var text = $('#input_text_plan').val();

	$('.select_plan').prepend("<div class='row-all clearfix margin-10-0 '>\
		\
		<div class='row-3 padding-10'>\
		<input type='date' class='textarea-chat' name='date_plan_array[]' value='"+date+"'>\
		</div>\
		<div class='row-2 padding-10'>\
		<input type='text' class='textarea-chat' name='text_plan_array[]' value='"+text+"'>\
		</div>\
		\
		<div class='row-3'>\
		<span class='new_button_plan bg-light-red delete_plan' >\
		<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'>\
		<path d='M19 13H5v-2h14v2z'/>\
		<path d='M0 0h24v24H0z' fill='none'/>\
		</svg>\
		</span>\
		</div>	\
		\
		</div>	");
});


//Удалние плана по штуке
$("body").on("click", ".delete_plan", function(){
	console.log($(this).parent().parent().remove());
});






//Модальное окно об ошибках
//error - название ошибки
//text - текст ошибки

function modal_window(error, text)
{
	$('body').prepend("	<div class='alert-info-error'>\
		<div class='alert-info-error-header'>\
		<span id='alert-info-error-header'>"+error+"</span>\
		</div>\
		<div class='alert-info-error-info'>\
		<span id='alert-info-error-info'>"+text+"</span>\
		</div>\
		</div>");
	$('.alert-info-error').delay(3000).animate({opacity:0},2000, function(){
		$(this).remove();
	});
}

	//Валидация форм
	$("#form-auth").validate({
		rules:{

			user_login:{
				required: true,
				minlength: 4,
				maxlength: 16,
			},

			user_password:{
				required: true,
				minlength: 6,
				maxlength: 16,
			},
		},

		messages:{

			user_login:{
				required: "Это поле обязательно для заполнения",
				minlength: "Логин должен быть минимум 4 символа",
				maxlength: "Максимальное число символо - 16",
			},

			user_password:{
				required: "Это поле обязательно для заполнения",
				minlength: "Пароль должен быть минимум 6 символа",
				maxlength: "Пароль должен быть максимум 16 символов",
			},

		}
	});

		//Валидация форм
		$("#form-signup").validate({
			rules:{

				user_fio:{
					required: true
				},

				user_login:{
					required: true,
					minlength: 6
				},
				user_password:{
					required: true,
					minlength: 6
				},
				user_email:{
					required: true,
					email: true
				}
			},

			messages:{
				user_fio:{
					required: "Это поле обязательно для заполнения"
				},

				user_login:{
					required: "Это поле обязательно для заполнения",
					minlength: "Логин должен быть минимум 6 символа"
				},

				user_password:{
					required: "Это поле обязательно для заполнения",
					minlength: "Пароль должен быть минимум 6 символа"
				},
				user_email:{
					required: "Это поле обязательно для заполнения",
					email: "Почта введена не правильно",
				}

			}
		});



				//Валидация формы для добавления специальности
				$("#new_specialtie").validate({
					rules:{

						new_name_specialty:{
							required: true,
							minlength: 5
						},

						new_id_course:{
							required: true
						},
						new_id_group:{
							required: true
						}
					},

					messages:{
						new_name_specialty:{
							required: "Это поле обязательно для заполнения",
							minlength: "Минимальная длина названия - 5"
						},

						new_id_course:{
							required: "Это поле обязательно для заполнения"
						},

						new_id_group:{
							required: "Требуется выбрать группу"
						}

					}
				});


				//Валидация формы для добавления пользователя
				$("#userAdd").validate({
					rules:{

						new_name_user:{
							required: true,
							minlength: 2
						},

						new_surname_user:{
							required: true,
							minlength: 2
						},
						new_patronymic_user:{
							required: true,
							minlength: 2
						},
						new_phone_user:{
							required: true
						},
						new_email_user:{
							required: true
						},
						new_date_of_birth_user:{
							required: true
						},
						new_login_user:{
							required: true
						},
						new_password_user:{
							required: true
						},
						new_record_book_student:{
							required: true
						}

					},

					messages:{
						new_name_user:{
							required: "Это поле обязательно для заполнения",
							minlength: "Минимальная длина названия - 2"
						},

						new_surname_user:{
							required: "Это поле обязательно для заполнения",
							minlength: "Минимальная длина названия - 2"
						},

						new_patronymic_user:{
							required: "Это поле обязательно для заполнения",
							minlength: "Минимальная длина названия - 2"
						},
						new_phone_user:{
							required: "Это поле обязательно для заполнения"
						},

						new_email_user:{
							required: "Это поле обязательно для заполнения"
						},

						new_date_of_birth_user:{
							required: "Это поле обязательно для заполнения"
						},						
						new_login_user:{
							required: "Это поле обязательно для заполнения"
						},

						new_password_user:{
							required: "Это поле обязательно для заполнения"
						},

						new_record_book_student:{
							required: "Это поле обязательно для заполнения"
						}

					}
				});
				
				//Валидация формы для добавления специальности
				$("#my_dashboard").validate({
					rules:{

						comment:{
							required: true,
							minlength: 10
						}
					},

					messages:{
						comment:{
							required: "Это поле обязательно для заполнения",
							minlength: "Минимальная длина названия - 10"
						}


					}
				});



		//Проверка логина и почты

		$('#user_login').focusout(function(){
			var user_login = $(this).val();
			console.log("value="+user_login+"&check_information=user_login");
			$.ajax({
				type: "POST",
				url: "/signup/check_information_in_up",
				data: "value="+user_login+"&check_information=login_user",
				success: function(msg){
					console.log(msg);
					if (msg == "true") {
						$('#user_login').val(" ");
						modal_window("Ошибка регистрации", "Такой логин уже существует");
					}
				}
			});
		});

		$('#user_email').focusout(function(){
			var user_email = $(this).val();
			$.ajax({
				type: "POST",
				url: "/signup/check_information_in_up",
				data: "value="+user_email+"&check_information=user_email",
				success: function(msg){
					console.log(msg);
					if (msg == "true") {
						$('#user_email').val(" ");
						modal_window("Ошибка регистрации", "Такая почта уже существует");
					}
				}
			});
		});

		$('.open_setting').click(function()
		{
			var data = "#"+$(this).data("setting");
			console.log(data);

		});

		$('.open_role_1').click(function()
		{
			$('.role_1').css("display", "block");
			$('.count_user').html($('.role_1').length);
			$('.role_2').css("display", "none");
			$('.role_3').css("display", "none");

		});

		$('.open_role_2').click(function()
		{
			$('.role_2').css("display", "block");
			$('.count_user').html($('.role_2').length);
			$('.role_1').css("display", "none");
			$('.role_3').css("display", "none");

		});
		$('.open_role_3').click(function()
		{
			$('.role_3').css("display", "block");
			$('.count_user').html($('.role_3').length);
			$('.role_2').css("display", "none");
			$('.role_1').css("display", "none");

		});
		$('.open_role_all').click(function()
		{
			$('.role_3').css("display", "block");
			$('.count_user').html($('.role_1').length+ $('.role_2').length+$('.role_3').length);
			$('.role_2').css("display", "block");
			$('.role_1').css("display", "block");

		});

		var filter_modal = 0;
		$('.filter-modal').click(function(){
			console.log(filter_modal);
			if (filter_modal == 0) {
				$('.filter-modal-alert').css("display", "flex");
				filter_modal = 1;
			}else{
				$('.filter-modal-alert').css("display", "none");
				filter_modal = 0;
			}
			
		});

		

		var data_imgbg = $('.content-group-profile-bg').data("imgbg");
		if (data_imgbg) {
			$('.content-group-profile-bg').css("background-image","url(/assets/files/user_cover/"+data_imgbg+")");
		}
		$('#search_site_all').keydown(function(){
			var Value = $('#search_site_all').val();
			if (Value.length > 2) {
				$.post(
					"/search/all/",
					{
						value: Value
					},
					onAjaxSuccess
					);

				function onAjaxSuccess(data)
				{

					$("#results_search").html("");
					$("#results_search").show();

					$("#results_search").append(data);
				}
			}
		});

		$(document).click( function(event){
			if( $(event.target).closest("#results_search").length ) 
				return;
			$("#results_search").fadeOut("slow");
			
			event.stopPropagation();
		});
	});

