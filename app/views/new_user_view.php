<div class='content'>
	<div class='content-group-my-setting padding-0'>
		<script src="/assets/js/lib/maskedinput/jquery.maskedinput.min.js">
			
		</script>
		<script>
			$(function(){
				$("#phone").mask("8(999) 999-9999");
			});
		</script>
		<div class='row padding-0 clearfix flex-justify-center'>
			<div class='row-1 padding-0 clearfix profile '>
				<div class='row  clearfix'>
					<div class='row-all flex-align-center clearfix'>
						<span class='title-span'>Добавить пользователя</span>
					</div>
				</div>
				<div class='row-all  clearfix'>
					<form action="/new/userAdd" method="post" id='userAdd'>
						<div class="row clearfix">
							<div class="row-3">Имя</div>
							<div class="row-1"><input type="text" class='textarea-chat' name='new_name_user' placeholder="Имя" ></div>	
						</div>

						<div class="row clearfix">
							<div class="row-3">Фамилия</div>
							<div class="row-1"><input type="text" class='textarea-chat' name='new_surname_user' placeholder="Фамилия" ></div>
						</div>

						<div class="row clearfix">
							<div class="row-3">Отчество</div>
							<div class="row-1"><input type="text" class='textarea-chat' name='new_patronymic_user' placeholder="Отчество" ></div>
						</div>

						<div class="row clearfix">
							<div class="row-3">Телефон</div>
							<div class="row-1"><input type="text" class='textarea-chat' name='new_phone_user' placeholder="Телефон" id='phone' ></div>
						</div>

						<div class="row clearfix">
							<div class="row-3">Почта</div>
							<div class="row-1"><input type="email" class='textarea-chat' name='new_email_user' placeholder="Почта" id='user_email'></div>
						</div>

						<div class="row clearfix">
							<div class="row-3">Дата рождения</div>
							<div class="row-1"><input type="date" class='textarea-chat' name='new_date_of_birth_user' placeholder="Дата рождения" ></div>
						</div>

						<div class="row clearfix">
							<div class="row-3">Логин</div>
							<div class="row-1"><input type="text" class='textarea-chat' name='new_login_user' placeholder="Логин"  id='user_login'></div>
						</div>

						<div class="row clearfix">
							<div class="row-3">Пароль</div>
							<div class="row-1"><input type="password" class='textarea-chat' name='new_password_user' placeholder="Пароль" ></div>
						</div>




						<div class="row clearfix ">
							<div class="row-3">Тип учетки</div>
							<div class="row-1">
								<select name="new_id_role_user" id="" class='type_accounts'>
									<option value="1">Студент</option>
									<option value="2">Преподаватель</option>
									<option value="3">Менеджер</option>
								</select>
							</div>
						</div>

						<div class="row clearfix new_student">
							<div class="row-3">Зачетная книжка</div>
							<div class="row-1"><input type="text" class='textarea-chat' name='new_record_book_student' placeholder="Зачетная книжка" value='<?echo $data['patronymic_user']?>'></div>
						</div>


						<div class="row clearfix new_student">
							<div class="row-3">Курс</div>
							<div class="row-1">
								<select name="new_id_course" id="">
									<?
									for ($i=0; $i <  count($data["arrayCourse"]); $i++) { 
										if ($data["arrayCourse"][$i]["id_course"] == "4") {
											echo "<option value='".$data["arrayCourse"][$i]["id_course"]."' >".$data["arrayCourse"][$i]["name_course"]."</option>";
										}else{
											echo "<option value='".$data["arrayCourse"][$i]["id_course"]."'disabled >".$data["arrayCourse"][$i]["name_course"]."</option>";
										}
										
									}
									?>
								</select>
							</div>
						</div>

						<div class="row clearfix new_student">
							<div class="row-3">Специальность</div>
							<div class="row-1">
								<select name="new_id_specialty" class="specialty_select">
									<?

									for ($i=0; $i <  count($data["arraySpecialties"]); $i++) { 
										
										echo "<option value='".$data["arraySpecialties"][$i]["id_specialty"]."' >".$data["arraySpecialties"][$i]["name_specialty"]."</option>";

										
									}
									?>
								</select>
							</div>
						</div>

						<div class="row clearfix new_student">
							<div class="row-3">Группа</div>
							<div class="row-1">
								<select name="new_id_group" id="groups_workspace">
								</select>
							</div>
						</div>
						
						<div class="row clearfix new_teachers new_manager">
							<div class="row-3">Кафедра</div>
							<div class="row-1">
								<select name="new_id_department" id="">
									<?
									
									for ($i=0; $i <  count($data["arrayDepartment"]); $i++) { 
										
										echo "<option value='".$data["arrayDepartment"][$i]["id_department"]."' >".$data["arrayDepartment"][$i]["name_department"]."</option>";

										
									}
									?>
								</select>
							</div>
						</div>

						<div class="row clearfix new_teachers">
							<div class="row-3">Должность</div>
							<div class="row-1">
								<select name="new_id_position" id="">
									<?
									
									for ($i=0; $i <  count($data["arrayPositions"]); $i++) { 
										
										echo "<option value='".$data["arrayPositions"][$i]["id_position"]."' >".$data["arrayPositions"][$i]["name_position"]."</option>";

										
									}
									?>
								</select>
							</div>
						</div>

						<div class="row clearfix ">
							<div class="row-1"> <a href="/new/user">Очистить</a></div>
							<div class="row-3"><input type="submit" class='new-message float-right' value="Добавить">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>