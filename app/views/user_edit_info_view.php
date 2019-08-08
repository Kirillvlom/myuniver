
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

			<div class="content-group-profile-bg" style="background-image: url('/assets/files/dashboard_cover/edit_cover.jpg') !important;" >

			</div>
			<div class="content-group-profile-avatar">
				<img src="/assets/files/user_logo/<?echo $data['userInfo'][0]['avatar_user'];?>" >


			</div>
			<div class="content-group-profile-info">
				<div class="profile-info-name"><? echo $data['userInfo'][0]['surname_user']." ".$data['userInfo'][0]['name_user']." ".$data['userInfo'][0]['patronymic_user']?> </div>
				<div class="profile-info-role clearfix">
					<div class="row-2"><? echo $data['userRole'][0]['name_role']?></div>
					<div class="row-2">
					</div>

				</div>
			</div>

		</div>

		
		<form action="/edit/editUser/<?echo $data['userInfo'][0]["id_user"]?>" method="post">
			<div class="row clearfix">
				<div class="row clearfix">
					<div class="title-span">Основная информация</div>
				</div>
				<div class="row-2 ">
					<div class="row clearfix">
						<div class="row-3">Имя</div>
						<div class="row-1"><input type="text" class='textarea-chat' name='new_name_user' placeholder="Имя" value='<?echo $data['userInfo'][0]['name_user']?>'></div>
					</div>

					<div class="row clearfix">
						<div class="row-3">Фамилия</div>
						<div class="row-1"><input type="text" class='textarea-chat' name='new_surname_user' placeholder="Фамилия" value='<?echo $data['userInfo'][0]['surname_user']?>'></div>
					</div>

					<div class="row clearfix">
						<div class="row-3">Отчество</div>
						<div class="row-1"><input type="text" class='textarea-chat' name='new_patronymic_user' placeholder="Отчество" value='<?echo $data['userInfo'][0]['patronymic_user']?>'></div>
					</div>

				</div>
				<div class="row-2">
					<div class="row clearfix ">
						<div class="row-3">День рождения </div>
						<div class="row-1 " >
							<input type="date" class='textarea-chat' name='new_date_of_birth_user' placeholder="День рождения" value='<?echo $data['userInfo'][0]['date_of_birth_user']?>'>
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
								<div class="row-1"><input type="text" class='textarea-chat' id='phone' name='new_phone_user' placeholder="Телефон" value='<?echo $data['userInfo'][0]['phone_user']?>'></div>
							</div>
							<div class="row clearfix ">
								<div class="row-3">Email</div>
								<div class="row-1"><input type="email" class='textarea-chat' name='new_email_user' placeholder="Почта" value='<?echo $data['userInfo'][0]['email_user']?>'></div>
							</div>
						</div>
					</div>		


					
					
					

					<?php if ($data['userInfo'][0]['id_role_user'] == "1"): ?>
						<div class="row clearfix">
							<div class="row clearfix">
								<div class="title-span">Учебная часть</div>
							</div>
							<div class="row clearfix ">
								<div class="row-3">Зачетная книжка</div>
								<div class="row-1"><input type="text" class='textarea-chat' name='new_record_book_student' placeholder="Зачетная книжка" value='<?echo $data['studentInfo'][0]['record_book_student']?>'></div>
							</div>
						</div>
					<?php endif ?>
					


					

					

					

					

					

					
					<div class="row clearfix">
						<input type="submit" class='new-message float-right' value="Изменить">
					</div>
				</form>








			</div>
		</div> 	
	</div>
</div>