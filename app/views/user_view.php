<div class="content">
	<div class="content-user-profile" >
		<div class="content-group-profile profile" style='min-height: 310px;'>
			<div class="content-group-profile-bg" data-imgbg='<?echo $data['cover_user']?>' >
				<a href="/user/setting" class="edit-img">изменить фон</a>
			</div>
			<div class="content-group-profile-avatar">
				<!--<img src="https://avatars.mds.yandex.net/get-pdb/70729/4309e06a-0696-4ecd-80e4-42d8f4c12729/s800" alt=""> -->
				<img src="/assets/files/user_logo/<?echo $_SESSION['user']['avatar_user'];?>"  date-titleImg="<?echo $_SESSION['user']['login_user']?>">
				<a href="/user/setting" class="edit-img-min">изменить фото</a>
			</div>
			<div class="content-group-profile-info">
				<div class="profile-info-name"><? echo $data['surname_user']." ".$data['name_user']." ".$data['patronymic_user']?> <span class='online-user'></span></div>
				<div class="profile-info-role clearfix">
					<div class="row-2"><? echo $data['name_role']?></div>
					<div class="row-2">
					</div>

				</div>
			</div>
		</div>
	</div> 
	<?php if ($_SESSION['user']['access_role'] == '10'): ?>
		<div class="content-group-profile-info-all profile">
			<div class="row">
				<h2>Информация о пользователе  <a href="/user/setting">
					
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
						<path fill="none" d="M0 0h20v20H0V0z"/>
						<path d="M15.95 10.78c.03-.25.05-.51.05-.78s-.02-.53-.06-.78l1.69-1.32c.15-.12.19-.34.1-.51l-1.6-2.77c-.1-.18-.31-.24-.49-.18l-1.99.8c-.42-.32-.86-.58-1.35-.78L12 2.34c-.03-.2-.2-.34-.4-.34H8.4c-.2 0-.36.14-.39.34l-.3 2.12c-.49.2-.94.47-1.35.78l-1.99-.8c-.18-.07-.39 0-.49.18l-1.6 2.77c-.1.18-.06.39.1.51l1.69 1.32c-.04.25-.07.52-.07.78s.02.53.06.78L2.37 12.1c-.15.12-.19.34-.1.51l1.6 2.77c.1.18.31.24.49.18l1.99-.8c.42.32.86.58 1.35.78l.3 2.12c.04.2.2.34.4.34h3.2c.2 0 .37-.14.39-.34l.3-2.12c.49-.2.94-.47 1.35-.78l1.99.8c.18.07.39 0 .49-.18l1.6-2.77c.1-.18.06-.39-.1-.51l-1.67-1.32zM10 13c-1.65 0-3-1.35-3-3s1.35-3 3-3 3 1.35 3 3-1.35 3-3 3z"/>
					</svg>

				</a></h2>
			</div>
			<div class="row clearfix">
				<div class="row-2">
					<div class="row clearfix">
						<div class="row-3">Тип образования:</div>
						<div class="row-1">ВПО очка</div>
					</div>
					<div class="row clearfix">
						<div class="row-3">Курс:</div>
						<div class="row-1"><?echo $data['id_course']?> курс</div>
					</div>
					<div class="row clearfix">
						<div class="row-3">Группа:</div>
						<div class="row-1"><?echo $data[0][2]['name_specialty']?></div>
					</div>
					<div class="row clearfix">
						<div class="row-3">Направление:</div>
						<div class="row-1"><?echo $data[0][0]['name_specialty']?></div>
					</div>

					<div class="row clearfix">
						<div class="row-3">Блокировка профиля:</div>
						<div class="row-1"><?if ($data['blocking_user'] == 0) {
							echo "Отсутствует";
						} else{
							echo "Профиль заблокирован";
						}?></div>
					</div>
				</div>
				<div class="row-2">
					<div class="row clearfix">
						<div class="row-3">№ зачетной книги:</div>
						<div class="row-1"><?echo $data['record_book_student']?></div>
					</div>
					<div class="row clearfix">
						<div class="row-3">Email:</div>
						<div class="row-1"><a href=""><?echo $data['email_user']?></a></div>
					</div>
					<div class="row clearfix">
						<div class="row-3">День рождения:</div>
						<div class="row-1"><?echo $data['date_of_birth_user']?></div>
					</div>
					<div class="row clearfix">
						<div class="row-3">Номер телефона:</div>
						<div class="row-1"><?echo $data['phone_user']?></div>
					</div>
					<div class="row clearfix">
						<div class="row-3">Дата регистрации:</div>
						<div class="row-1"><?echo $data['date_of_registration']?></div>
					</div>

				</div>
			</div>
		</div> 
	<?php endif ?>

	<?php if ($_SESSION['user']['access_role'] == '20'): ?>
		<div class="content-group-profile-info-all profile">
			<div class="row">
				<h2>Информация о пользователе  <a href="/user/setting">
					
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
						<path fill="none" d="M0 0h20v20H0V0z"/>
						<path d="M15.95 10.78c.03-.25.05-.51.05-.78s-.02-.53-.06-.78l1.69-1.32c.15-.12.19-.34.1-.51l-1.6-2.77c-.1-.18-.31-.24-.49-.18l-1.99.8c-.42-.32-.86-.58-1.35-.78L12 2.34c-.03-.2-.2-.34-.4-.34H8.4c-.2 0-.36.14-.39.34l-.3 2.12c-.49.2-.94.47-1.35.78l-1.99-.8c-.18-.07-.39 0-.49.18l-1.6 2.77c-.1.18-.06.39.1.51l1.69 1.32c-.04.25-.07.52-.07.78s.02.53.06.78L2.37 12.1c-.15.12-.19.34-.1.51l1.6 2.77c.1.18.31.24.49.18l1.99-.8c.42.32.86.58 1.35.78l.3 2.12c.04.2.2.34.4.34h3.2c.2 0 .37-.14.39-.34l.3-2.12c.49-.2.94-.47 1.35-.78l1.99.8c.18.07.39 0 .49-.18l1.6-2.77c.1-.18.06-.39-.1-.51l-1.67-1.32zM10 13c-1.65 0-3-1.35-3-3s1.35-3 3-3 3 1.35 3 3-1.35 3-3 3z"/>
					</svg>

				</a></h2>
			</div>
			<div class="row clearfix">
				<div class="row-2">
					<div class="row clearfix">
						<div class="row-3">Отдел:</div>
						<div class="row-1"><? echo $data[0][0]['name_department']?></div>
					</div>
					<div class="row clearfix">
						<div class="row-3">Должность:</div>
						<div class="row-1"><? echo $data[0][1]['name_department']?></div>
					</div>

				</div>
				<div class="row-2">
					<div class="row clearfix">
						<div class="row-3">Email:</div>
						<div class="row-1"><a href=""><? echo $data['email_user']?></a></div>
					</div>
					<div class="row clearfix">
						<div class="row-3">Блокировка профиля:</div>
						<div class="row-1">
							<div class="row-1"><?if ($data['blocking_user'] == 0) {
								echo "Отсутствует";
							} else{
								echo "Профиль заблокирован";
							}?></div>
						</div>
					</div>
				</div>
			</div>
		</div> 	
	<?php endif ?>

	<?php if ($_SESSION['user']['access_role'] == '30'): ?>
		<div class="content-group-profile-info-all profile">
			<div class="row">
				<h2>Информация о пользователе <a href="/user/setting">
					
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
						<path fill="none" d="M0 0h20v20H0V0z"/>
						<path d="M15.95 10.78c.03-.25.05-.51.05-.78s-.02-.53-.06-.78l1.69-1.32c.15-.12.19-.34.1-.51l-1.6-2.77c-.1-.18-.31-.24-.49-.18l-1.99.8c-.42-.32-.86-.58-1.35-.78L12 2.34c-.03-.2-.2-.34-.4-.34H8.4c-.2 0-.36.14-.39.34l-.3 2.12c-.49.2-.94.47-1.35.78l-1.99-.8c-.18-.07-.39 0-.49.18l-1.6 2.77c-.1.18-.06.39.1.51l1.69 1.32c-.04.25-.07.52-.07.78s.02.53.06.78L2.37 12.1c-.15.12-.19.34-.1.51l1.6 2.77c.1.18.31.24.49.18l1.99-.8c.42.32.86.58 1.35.78l.3 2.12c.04.2.2.34.4.34h3.2c.2 0 .37-.14.39-.34l.3-2.12c.49-.2.94-.47 1.35-.78l1.99.8c.18.07.39 0 .49-.18l1.6-2.77c.1-.18.06-.39-.1-.51l-1.67-1.32zM10 13c-1.65 0-3-1.35-3-3s1.35-3 3-3 3 1.35 3 3-1.35 3-3 3z"/>
					</svg>

				</a></h2>
			</div>
			<div class="row clearfix">
				<div class="row-2">
					<div class="row clearfix">
						<div class="row-3">Отдел:</div>
						<div class="row-1"><? echo $data[0][0]['name_department']?></div>
					</div>
					<div class="row clearfix">
						<div class="row-3">Email:</div>
						<div class="row-1"><a href=""><? echo $data['email_user']?></a></div>
					</div>

				</div>
				<div class="row-2">
					<div class="row clearfix">
						<div class="row-3">Блокировка профиля:</div>
						<div class="row-1">
							<div class="row-1"><?if ($data['blocking_user'] == 0) {
								echo "Отсутствует";
							} else{
								echo "Профиль заблокирован";
							}?></div>
						</div>
					</div>
				</div>
			</div>
		</div> 	
	<?php endif ?>

	<?php if ($_SESSION['user']['access_role'] == '40'): ?>
		<div class="content-group-profile-info-all profile">
			<div class="row">
				<h2>Информация о пользователе  <a href="/user/setting">
					
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
						<path fill="none" d="M0 0h20v20H0V0z"/>
						<path d="M15.95 10.78c.03-.25.05-.51.05-.78s-.02-.53-.06-.78l1.69-1.32c.15-.12.19-.34.1-.51l-1.6-2.77c-.1-.18-.31-.24-.49-.18l-1.99.8c-.42-.32-.86-.58-1.35-.78L12 2.34c-.03-.2-.2-.34-.4-.34H8.4c-.2 0-.36.14-.39.34l-.3 2.12c-.49.2-.94.47-1.35.78l-1.99-.8c-.18-.07-.39 0-.49.18l-1.6 2.77c-.1.18-.06.39.1.51l1.69 1.32c-.04.25-.07.52-.07.78s.02.53.06.78L2.37 12.1c-.15.12-.19.34-.1.51l1.6 2.77c.1.18.31.24.49.18l1.99-.8c.42.32.86.58 1.35.78l.3 2.12c.04.2.2.34.4.34h3.2c.2 0 .37-.14.39-.34l.3-2.12c.49-.2.94-.47 1.35-.78l1.99.8c.18.07.39 0 .49-.18l1.6-2.77c.1-.18.06-.39-.1-.51l-1.67-1.32zM10 13c-1.65 0-3-1.35-3-3s1.35-3 3-3 3 1.35 3 3-1.35 3-3 3z"/>
					</svg>

				</a></h2>
			</div>
			<div class="row clearfix">
				<div class="row-2">
					<div class="row clearfix">
						<div class="row-3">Email:</div>
						<div class="row-1"><a href=""><? echo $data['email_user']?></a></div>
					</div>
				</div>
				<div class="row-2">
					<div class="row clearfix">
						<div class="row-3">Блокировка профиля:</div>
						<div class="row-1">
							<div class="row-1"><?if ($data['blocking_user'] == 0) {
								echo "Отсутствует";
							} else{
								echo "Профиль заблокирован";
							}?></div>
						</div>
					</div>

				</div>
			</div>
		</div> 	


	</div>
<?php endif ?>











</div>