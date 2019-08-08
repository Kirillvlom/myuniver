<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><?echo $nameSite?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
	<link rel="stylesheet" href="/assets/css/normalize.css">
	<link rel="stylesheet" href="/assets/css/style.css?v=<?echo microtime();?>">
	<link rel="stylesheet" href="/assets/css/main.css?v=<?echo microtime();?>">
	<link rel="icon" type="image/png" href="/icon.png" />
	<script src="/assets/js/lib/jquery/jquery-3.2.1.min.js"></script>
	<script src="/assets/js/lib/jquery/jquery.validate.min.js"></script>
	<script src="/assets/js/app.js?v=<?echo microtime()?>"></script>
	<script src="/assets/js/style.js?v=<?echo microtime()?>"></script>
</head>
<body>

	<div class="main-template">
		<div class="main-template-menu">
			<div class="template-menu-site-name">
				<a href="/">Мойунивер.рф</a>
				
			</div>
			<div class="main-template-menu-list-link">
				<div class="link-row clearfix">
					<div class="link-row-link margin-10-0">
						<a href="/help/user-role" class='clearfix link-row'>
							<span class='svg-icon'>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
									<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
									<path d="M0 0h24v24H0z" fill="none"/>
								</svg>
							</span>
							<span class="link"><?echo $_SESSION['user']['name_role']?></span>
						</a>
					</div>
				</div>	

				<div class="link-row clearfix">
					<div class="link-row-link">
						<a href="/my" class='clearfix link-row'>
							<span class='svg-icon'>
								
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
									<path d="M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z"/>
									<path d="M0 0h24v24H0z" fill="none"/>
								</svg>

							</span>
							
							<?
							if ($role_total == '30') {
								echo "<span class='link'>Главная</span>";
							} else{
								echo "<span class='link'>Мои области</span>";

							}
							?>
						</a>
					</div>
				</div>

				<!--<div class="link-row clearfix">
					<div class="link-row-link">
						<a href="/chat" class='clearfix link-row'>
							<span class='svg-icon'>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
									<path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/>
									<path d="M0 0h24v24H0z" fill="none"/>
								</svg>

							</span>
							<span class="link">Общение</span>
						</a>
					</div>
				</div> -->
				<?if (in_array($role_total, [40])){?> 
				<div class="link-row clearfix">
					<div class="link-row-link">
						<a href="/groups" class='clearfix link-row'>
							<span class='svg-icon'>

								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
									<path d="M0 0h24v24H0z" fill="none"/>
									<path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
								</svg>


							</span>
							<span class="link">Группы</span>
						</a>
					</div>
				</div>


				<?}?>

				<?if (in_array($role_total, [40])){?> 

				<div class="link-row clearfix">
					<div class="link-row-link">
						<a href="/groups" class='clearfix link-row'>
							<span class='svg-icon'>

								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
									<path d="M0 0h24v24H0z" fill="none"/>
									<path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
								</svg>


							</span>
							<span class="link">Группы</span>
						</a>
					</div>
				</div>

				<div class="link-row clearfix">
					<div class="link-row-link">
						<a href="/teachers" class='clearfix link-row'>
							<span class='svg-icon'>

								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
									<path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
									<path d="M0 0h24v24H0z" fill="none"/>
								</svg>


							</span>
							<span class="link">Преподаватели</span>
						</a>
					</div>
				</div>

				<?}?>

				<?if (in_array($role_total, [30])){?> 
				<div class="link-row clearfix">
					<div class="link-row-link">
						<a href="/workspaces" class='clearfix link-row'>
							<span class='svg-icon'>

								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
									<path d="M0 0h24v24H0z" fill="none"/>
									<path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
								</svg>


							</span>
							<span class="link">Рабочие области</span>
						</a>
					</div>
				</div>

				<div class="link-row clearfix">
					<div class="link-row-link">
						<a href="/users" class='clearfix link-row'>
							<span class='svg-icon'>

								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
									<path d="M0 0h24v24H0z" fill="none"/>
									<path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
								</svg>


							</span>
							<span class="link">Пользователи</span>
						</a>
					</div>
				</div>

				<div class="link-row clearfix">
					<div class="link-row-link">
						<a href="/specialty" class='clearfix link-row'>
							<span class='svg-icon'>

								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
									<path d="M0 0h24v24H0z" fill="none"/>
									<path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
								</svg>


							</span>
							<span class="link">Специальности</span>
						</a>
					</div>
				</div>

				<div class="link-row clearfix">
					<div class="link-row-link">
						<a href="/groups" class='clearfix link-row'>
							<span class='svg-icon'>

								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
									<path d="M0 0h24v24H0z" fill="none"/>
									<path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
								</svg>


							</span>
							<span class="link">Группы</span>
						</a>
					</div>
				</div>

				


				

				<?}?>

				


				<div class="messeage-menu-division-transparent"></div>

			<!--	<div class="link-row clearfix">
					<div class="link-row-link">
						<a href="/user" class='clearfix link-row'>
							<span class='svg-icon'>

								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
									<path d="M0 0h24v24H0z" fill="none"/>
									<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"/>
								</svg>

							</span>
							<span class="link">Помощь</span>
						</a>
					</div>
				</div>
			-->
			</div>

		</div>
		<div class="main-template-content">
			<div class="main-template-content-header clearfix">
				<div class="content-header-search">
					<div class="header-search-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#CFD9DD">
							<path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
							<path d="M0 0h24v24H0z" fill="none"/>
						</svg>
					</div>
					<div class="header-search-form">
						
							<input type="text" placeholder="Поиск" class='header-search-form-input' id="search_site_all">
							<div class="" id='results_search'></div>
					</div>
				</div>
				<div class="content-header-user-profile">
					
					<div class="profile-notice-dropdown">

					</div>
					<div class="profile-name">
						<?echo $_SESSION['user']['name_user']?>
					</div>
					<div class="content-header-user-profile-icon clearfix">
						<div class="profile-icon" id='profile-icon-menu' >

							<img src="/assets/files/user_logo/<?echo $_SESSION['user']['avatar_user'];?>"  date-titleImg="<?echo $_SESSION['user']['login_user']?>">
						</div>
						<div class="dropdown-menu-user" data-menuOpen='close'>
							<div class="row link-dropdown-menu-user "><a href="/user">Профиль</a></div>
							<div class="row link-dropdown-menu-user "><a href="/user/setting">Настройки</a></div>
							<div class="row link-dropdown-menu-user "><a href="/user/session_destroy">Выход</a></div>
						</div>

<!--
						<div class="hidden-open-menu">
							<div class="svg-h-o-menu">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#CFD9DD" id='hidden-ioen-menu' data-menuOpen = "open">
									<path d="M0 0h24v24H0z" fill="none"/>
									<path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
								</svg>
							</div>
						</div>

					-->
				</div>	
			</div>
		</div>




