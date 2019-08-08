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
	<script src='/assets/js/lib/jquery/jquery-3.2.1.min.js'></script>
	<script src='/assets/js/lib/jquery/jquery.validate.min.js'></script>
	<script src='/assets/js/app.js?v=<?echo microtime(1);?>'></script>
	<link rel="icon" type="image/png" href="/icon.png"/>
	<meta name="theme-color" content="#c45472">
</head>
<body>
	<div class="auth-sign">
		<div class="sign-main">
			<div class="sign-title-logo">
				<a href="/">Мойунивер.рф</a>
			</div>
			<div class="sign-method">
				<span>Авторизация</span>
			</div>
			<form action="/signin/auth" class='form-auth' method="post" id='form-auth'>
				<div class="row-form-auth">
					<label for="user_login_in">Логин</label>
					<input type="text" placeholder="Логин" name='user_login' id='user_login_in'>
				</div>

				<div class="row-form-auth">
					<label for="user_password">Пароль</label>
					<input type="password" placeholder="Логин" name='user_password' id='user_password'>
				</div>
				<div class="row-form-auth ">
					<div class="button-auth button-auth-space-between">
						<a href="/signup" class='new-user'>Создать аккаунт</a>
						<input type="submit" class='button-sign-in' value="Войти">
					</div>
				</div>
			</form>
			<div class="footer-auth">
				<span>Не можете войти в учетную запись? <a href="/reset_password">Восстановить доступ</a></span>
			</div>
		</div>

	</div>
</body>
</html>