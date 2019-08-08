<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><? echo $nameSite;?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
	<link rel="stylesheet" href="/assets/css/lib/bootstrap.min.css?v=<?echo microtime(1);?>">
	<link rel="stylesheet" href="/assets/css/style.css?v=<?echo microtime(1);?>">
	<link rel="stylesheet" href="/assets/css/main.css?v=<?echo microtime(1);?>">
	<link rel="icon" type="image/png" href="/icon.png"/>
	<script src='/assets/js/lib/jquery/jquery-3.2.1.min.js'></script>
	<script src='/assets/js/lib/jquery/jquery.validate.min.js'></script>
	<script src='/assets/js/app.js?v=<?echo microtime(1);?>'></script>

	<meta name="theme-color" content="#c45472">
</head>
<body>

	<div class="auth-sign">
		<div class="sign-main">
			<div class="sign-title-logo">
				<a href="/">Мойунивер.рф</a>
			</div>
			<div class="sign-method">
				<span>Регистрация</span>
			</div>
			<form action="/signup/new_user" class='form-auth' id='form-signup' method="post">
				<div class="row-form-auth">
					<label for="user_fio">ФИО</label>
					<input type="text" placeholder="Например: Петрушкин Василий Викторович" name='user_fio' id='user_fio'>
				</div>
				<div class="row-form-auth">
					<label for="user_login">Логин</label>
					<input type="text" placeholder="Логин" name='user_login' id='user_login'>
				</div>

				<div class="row-form-auth">
					<label for="user_password">Пароль</label>
					<input type="password" placeholder="Логин" name='user_password' id='user_password'>
				</div>
				<div class="row-form-auth">
					<label for="user_email">Почта</label>
					<input type="email" placeholder="Почта" name='user_email' id='user_email'>
				</div>
				<div class="row-form-auth">
					<label for="user_email">Тип учетной записи</label>
					<select name="role_user" id="">
						<option value="1">Студент</option>
						<option value="2">Преподаватель</option>
					</select>
				</div>
				<div class="row-form-auth ">
					<div class="button-auth button-auth-flex-end">
						<input type="submit" class='button-sign-in' value="Регистрация">
					</div>
				</div>
			</form>
			<div class="footer-auth">
				<span>Уже есть аккаунт? <a href="/signin">Войти</a></span>
			</div>
		</div>

	</div>
</body>
</html>