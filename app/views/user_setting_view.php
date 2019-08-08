
<div class="content">
	
	<script src="/assets/js/lib/maskedinput/jquery.maskedinput.min.js">

	</script>
	<script>
		$(function(){
			$("#phone").mask("8(999) 999-9999");
		});
	</script>

	<div class="content-group-profile profile" id='user_setting_all' data-open='open' >
		
		<div class="row padding-0">
			<form action="">
				<div class="content-group-profile-bg" data-imgbg='<?echo $data['cover_user']?>' >
					<label for="edit-img-cover" class="edit-img">изменить фон</label>
					<input type="file" id='edit-img-cover' accept="image/*,image/jpeg">
				</div>
				<div class="content-group-profile-avatar">
					<img src="/assets/files/user_logo/<?echo $_SESSION['user']['avatar_user'];?>"  date-titleImg="<?echo $_SESSION['user']['login_user']?>">
					<label for="edit-img-avatar" class="edit-img-min">изменить фото</label>
					<input type="file" id='edit-img-avatar' accept="image/*,image/jpeg">
					
				</div>
				<div class="content-group-profile-info">
					<div class="profile-info-name"><? echo $data['surname_user']." ".$data['name_user']." ".$data['patronymic_user']?> <span class='online-user'></span></div>
					<div class="profile-info-role clearfix">
						<div class="row-2"><? echo $data['login_user']?></div>
						<div class="row-2">
						</div>

					</div>
				</div>
			</form>
		</div>

		<?php if ($_SESSION['user']['access_role'] == '10'): ?>
			<form action="/user/edit_info/student" method="post">
				<div class="row clearfix">
					<div class="row clearfix">
						<div class="title-span">Основная информация</div>
					</div>
					<div class="row-2 ">
						<div class="row clearfix">
							<div class="row-3">Имя</div>
							<div class="row-1"><input type="text" class='textarea-chat' name='new_name_user' placeholder="Имя" value='<?echo $data['name_user']?>'></div>
						</div>

						<div class="row clearfix">
							<div class="row-3">Фамилия</div>
							<div class="row-1"><input type="text" class='textarea-chat' name='new_surname_user' placeholder="Фамилия" value='<?echo $data['surname_user']?>'></div>
						</div>

						<div class="row clearfix">
							<div class="row-3">Отчество</div>
							<div class="row-1"><input type="text" class='textarea-chat' name='new_patronymic_user' placeholder="Отчество" value='<?echo $data['patronymic_user']?>'></div>
						</div>

					</div>
					<div class="row-2">
						<div class="row clearfix ">
							<div class="row-3">День рождения</div>
							<div class="row-1 " >
								<input type="date" class='textarea-chat' name='new_date_of_birth_user' placeholder="День рождения" value='<?echo $data['date_of_birth_user']?>'>
									<!--<div class="row-select">
										<select name="" id="">
											<?
											for ($i=1; $i <= 31; $i++) { 
												echo "<option value='$i'>$i</option>";
											}
											?>									
										</select>
									</div>
									<div class="row-select"><select name="" id="">

										<option value='1'>Январь</option>
										<option value='2'>Февраль</option>
										<option value='3'>Март</option>
										<option value='4'>Апрель</option>
										<option value='5'>Май</option>
										<option value='6'>Июнь</option>
										<option value='7'>Июль</option>
										<option value='8'>Август</option>
										<option value='9'>Сентябрь</option>
										<option value='10'>Октябрь</option>
										<option value='11'>Ноябрь</option>
										<option value='12'>Декабрь</option>


									</select></div>
									<div class="row-select"><select name="" id="">
										<?
										for ($i=1902; $i <= 2004; $i++) { 
											echo "<option value='$i'>$i</option>";
										}
										?>									
									</select></div> -->
								</div>
							</div>
							<div class="row clearfix ">
								<div class="row-3">Телефон</div>
								<div class="row-1"><input type="text" class='textarea-chat' id='phone' name='new_phone_user' placeholder="Телефон" value='<?echo $data['phone_user']?>'></div>
							</div>
							<div class="row clearfix ">
								<div class="row-3">Email</div>
								<div class="row-1"><input type="email" class='textarea-chat' name='new_email_user' placeholder="Почта" value='<?echo $data['email_user']?>'></div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<input type="submit" class='new-message float-right' value="Сохранить">
					</div>
				</form>
				<form action="/user/edit_security/userlogin_and_password" method="post">
					<div class="row clearfix">
						<div class="row clearfix">
							<div class="title-span">Безопасность</div>
						</div>
						<div class="row-2">							
							<div class="row clearfix">
								<div class="row-3">Логин</div>
								<div class="row-1"><input type="text" class='textarea-chat' name='new_login_user' placeholder="Логин" value='<?echo $data['login_user']?>'></div>
							</div>
						</div>
						<div class="row-2">
							<div class="row clearfix ">
								<div class="row-3">Пароль</div>
								<div class="row-1"><input type="password"  class='textarea-chat' name='new_password_user' placeholder="Пароль" value=''></div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<input type="submit" class='new-message float-right' value="Изменить">
					</div>
				</form>

			<?php endif ?>

			<?php if ($_SESSION['user']['access_role'] == '20'): ?>
				<form action="/user/edit_info/teacher" method="post">

					<div class="row clearfix">
						<div class="row clearfix">
							<div class="title-span">Основная информация</div>
						</div>
						<div class="row-2 ">
							<div class="row clearfix">
								<div class="row-3">Имя</div>
								<div class="row-1"><input type="text" class='textarea-chat' name='new_name_user' placeholder="Имя" value='<?echo $data['name_user']?>'></div>
							</div>

							<div class="row clearfix">
								<div class="row-3">Фамилия</div>
								<div class="row-1"><input type="text" class='textarea-chat' name='new_surname_user' placeholder="Фамилия" value='<?echo $data['surname_user']?>'></div>
							</div>
						</div>
						<div class="row-2">
							<div class="row clearfix">
								<div class="row-3">Отчество</div>
								<div class="row-1"><input type="text" class='textarea-chat' name='new_patronymic_user' placeholder="Отчество" value='<?echo $data['patronymic_user']?>'></div>
							</div>
							<div class="row clearfix ">
								<div class="row-3">Email</div>
								<div class="row-1"><input type="text" class='textarea-chat' name='new_email_user' placeholder="Почта" value='<?echo $data['email_user']?>'></div>
							</div>

						</div>
					</div>
					<div class="row clearfix">
						<input type="submit" class='new-message float-right' value="Изменить">
					</div>
				</form>
				<form action="/user/edit_security/userlogin_and_password" method="post">
					<div class="row clearfix">
						<div class="row clearfix">
							<div class="title-span">Безопасность</div>
						</div>
						<div class="row-2">							
							<div class="row clearfix">
								<div class="row-3">Логин</div>
								<div class="row-1"><input type="text" name='new_login_user' class='textarea-chat' placeholder="Логин" value='<?echo $data['login_user']?>'></div>
							</div>
						</div>
						<div class="row-2">
							<div class="row clearfix ">
								<div class="row-3">Пароль</div>
								<div class="row-1"><input type="password" class='textarea-chat' name='new_password_user' placeholder="Пароль" value=''></div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<input type="submit" class='new-message float-right' value="Изменить">
					</div>
				</form>
			<?php endif ?>

			<?php if ($_SESSION['user']['access_role'] == '30'): ?>
				<form action="/user/edit_info/manager" method="post">

					<div class="row clearfix">
						<div class="row clearfix">
							<div class="title-span">Основная информация</div>
						</div>
						<div class="row-2 ">
							<div class="row clearfix">
								<div class="row-3">Имя</div>
								<div class="row-1"><input type="text" class='textarea-chat' name='new_name_user' placeholder="Имя" value='<?echo $data['name_user']?>'></div>
							</div>

							<div class="row clearfix">
								<div class="row-3">Фамилия</div>
								<div class="row-1"><input type="text" class='textarea-chat' name='new_surname_user' placeholder="Фамилия" value='<?echo $data['surname_user']?>'></div>
							</div>
						</div>
						<div class="row-2">
							<div class="row clearfix">
								<div class="row-3">Отчество</div>
								<div class="row-1"><input type="text" class='textarea-chat' name='new_patronymic_user' placeholder="Отчество" value='<?echo $data['patronymic_user']?>'></div>
							</div>
							<div class="row clearfix ">
								<div class="row-3">Email</div>
								<div class="row-1"><input type="text" class='textarea-chat' name='new_email_user' placeholder="Почта" value='<?echo $data['email_user']?>'></div>
							</div>

						</div>
					</div>
					<div class="row clearfix">
						<input type="submit" class='new-message float-right' value="Изменить">
					</div>
				</form>
				<form action="/user/edit_security/userlogin_and_password" method="post">
					<div class="row clearfix">
						<div class="row clearfix">
							<div class="title-span">Безопасность</div>
						</div>
						<div class="row-2">							
							<div class="row clearfix">
								<div class="row-3">Логин</div>
								<div class="row-1"><input type="text" class='textarea-chat' name='new_login_user' placeholder="Логин" value='<?echo $data['login_user']?>'></div>
							</div>
						</div>
						<div class="row-2">
							<div class="row clearfix ">
								<div class="row-3">Пароль</div>
								<div class="row-1"><input type="password"  class='textarea-chat' name='new_password_user' placeholder="Пароль" value=''></div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<input type="submit" class='new-message float-right' value="Изменить">
					</div>
				</form>
			<?php endif ?>

			<?php if ($_SESSION['user']['access_role'] == '40'): ?>
				<form action="/user/edit_info/administrator" method="post">
					<div class="row clearfix">
						<div class="row-2 ">
							<div class="row clearfix">
								<div class="row-3">Имя</div>
								<div class="row-1"><input type="text" class='textarea-chat' name='new_name_user' placeholder="Имя" value='<?echo $data['name_user']?>'></div>
							</div>

							<div class="row clearfix">
								<div class="row-3">Фамилия</div>
								<div class="row-1"><input type="text" class='textarea-chat' name='new_surname_user' placeholder="Фамилия" value='<?echo $data['surname_user']?>'></div>
							</div>

						</div>
						<div class="row-2">
							<div class="row clearfix">
								<div class="row-3">Отчество</div>
								<div class="row-1"><input type="text" class='textarea-chat' name='new_patronymic_user' placeholder="Отчество" value='<?echo $data['patronymic_user']?>'></div>
							</div>
							<div class="row clearfix ">
								<div class="row-3">Email</div>
								<div class="row-1"><input type="text" class='textarea-chat' name='new_email_user' placeholder="Почта" value='<?echo $data['email_user']?>'></div>
							</div>
							
						</div>
					</div>
					<div class="row clearfix">
						<input type="submit" class='new-message float-right' value="Сохранить">
					</div>
				</form>
				<form action="/user/edit_security/userlogin_and_password" method="post">
					<div class="row clearfix">
						<div class="row clearfix">
							<div class="title-span">Безопасность</div>
						</div>
						<div class="row-2">							
							<div class="row clearfix">
								<div class="row-3">Логин</div>
								<div class="row-1"><input type="text" class='textarea-chat' name='new_login_user' placeholder="Логин" value='<?echo $data['login_user']?>'></div>
							</div>
						</div>
						<div class="row-2">
							<div class="row clearfix ">
								<div class="row-3">Пароль</div>
								<div class="row-1"><input type="password"  class='textarea-chat' name='new_password_user' placeholder="Пароль" value=''></div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<input type="submit" class='new-message float-right' value="Изменить">
					</div>
				</form>
			<?php endif ?>


		</div>
	</div> 	
</div>
</div>