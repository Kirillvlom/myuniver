<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?echo $nameSite?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="/assets/css/normalize.css">
	<link rel="stylesheet" href="/assets/css/style.css?v=<?echo microtime(1);?>">
	<link rel="stylesheet" href="/assets/css/main.css?v=<?echo microtime(1);?>">

	<script src="../../assets/js/lib/jquery/jquery-3.2.1.min.js"></script>
	<script src="../../assets/js/app.js?v=<?echo microtime(1);?>"></script>
	<script src="../../assets/js/style.js?v=<?echo microtime(1);?>"></script>

	<link rel="icon" type="image/png" href="/icon.png"/>
	<meta name="theme-color" content="#c45472">
</head>
<body>
	<main class="module-chat">
		<div class="inbox">
			<div class="inbox-header">
				<div class="header-name-site">
					<a href="/">Мойунивер.рф</a>
				</div>
			</div>
			<div class="inbox-new-message">
				<button>Написать</button>
			</div>
			<div class="messages-menu">
				<div class="row-menu">
					<div class="row-menu-name">Все сообщения</div>
					<div class="row-menu-number-of-messages">10</div>
				</div>

				<div class="row-menu">
					<div class="row-menu-name">Непрочитанные</div>
					<div class="row-menu-number-of-messages">10</div>
				</div>
				<div class="row-menu">
					<div class="row-menu-name">Избранные</div>
					<div class="row-menu-number-of-messages">10</div>
				</div>
			</div>	

			<div class="messeage-menu-division"></div>

			<div class="messages-menu">
				<div class="row-menu">
					<div class="row-menu-name"><a href="/my">Рабочие области</a></div>
					<div class="row-menu-number-of-messages"></div>
				</div>

				<div class="row-menu">
					<div class="row-menu-name"><a href="/user">Профиль</a></div>
					<div class="row-menu-number-of-messages"></div>
				</div>
				<div class="row-menu">
					<div class="row-menu-name">Меню сайта</div>
					<div class="row-menu-number-of-messages"></div>
				</div>
			</div>	

			<div class="messeage-menu-division"></div>

			<div class="messages-menu">
				<div class="row-menu">
					<div class="row-menu-name">Помощь</div>
					<div class="row-menu-number-of-messages"></div>
				</div>

				<div class="row-menu">
					<div class="row-menu-name"><a href="user/setting">Настройки</a></div>
					<div class="row-menu-number-of-messages"></div>
				</div>
				<div class="row-menu">
					<div class="row-menu-name"><a href="/user/session_destroy">Выход</a></div>
					<div class="row-menu-number-of-messages"></div>
				</div>
				
			</div>	
		</div>
		<div class="chats">
			<div class="header-chats">
				<form action="">
					<input type="text" placeholder="Поиск" class='search-chats'>
				</form>
			</div>
			<div class="messeage-menu-division"></div>
			<div class="list-chats">
				<div class="row-chat">
					<div class="chat-user-online-status">
						<span class='online-status' title="Online"></span>
					</div>
					<div class="chat-user-logo">
						<img src="" alt="" class='user-logo'>
					</div>
					<div class="chat-info-message">
						<div class="chat-user-name">
							<span class='user-name'>User Test</span>
						</div>
						<div class="chat-user-message-min">
							<span>вот тут то у нас текст</span>
						</div>
					</div>

					<div class="dop-action-and-information-chat">
						<div class="delete-chat">
							<div class="svg">
								<svg fill="#9e9e9e" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg" class='delete-svg'>
									<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
									<path d="M0 0h24v24H0z" fill="none"/>
								</svg>
							</div>
						</div>
						<div class="time-message">
							10:10
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="chat">
			<div class="chat-header">
				<div class="chat-header-title-user">
					<span class='user-name'>User Test</span>
					<span class='user-online-writes'>online</span>

				</div>
				<div class="open_dop_menu">
					<svg fill="#FFFFFF" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 0h24v24H0z" fill="none"/>
						<path d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
					</svg>
				</div>
			</div>
			<div class="region-chat">
				<div class="region-chat-content">
					<div class="the-message-the-interlocutor clearfix">
						<div class="the-message-the-interlocutor-icon-user-time">
							<div class="chat-user-logo-im">
								<img src="" alt="" class="user-logo bg-white">
							</div>
						</div>
						<div class="the-message-the-interlocutor-text-user bg-white left-triangle">Диплом сроки дедлайн скоро сдавать когда это закончится дайте покушать у меня лапки набор слов для гугла лоооол</div>
					</div>

					<div class="the-message-the-current-user clearfix">
						<div class="the-message-the-interlocutor-icon-user-time right">
							<div class="chat-user-logo-im right">
								<img src="" alt="" class="user-logo bg-white">
							</div>
						</div>
						<div class="the-message-the-interlocutor-text-user bg-blue right right-triangle" >Я просто хочу спокойствие и хавчик</div>
						
					</div>

					<div class="the-message-the-current-user clearfix">
						<div class="the-message-the-interlocutor-icon-user-time right">
							<div class="chat-user-logo-im right">
								<img src="" alt="" class="user-logo bg-white">
							</div>
						</div>
						<div class="the-message-the-interlocutor-text-user bg-blue right right-triangle" >Чет у меня уже лапки устали от этого диплома</div>
						
					</div>

					<div class="the-message-the-current-user clearfix">
						<div class="the-message-the-interlocutor-icon-user-time right">
							<div class="chat-user-logo-im right">
								<img src="" alt="" class="user-logo bg-white">
							</div>
						</div>
						<div class="the-message-the-interlocutor-text-user bg-blue right right-triangle" > <a href="https://www.dropbox.com/s/vgn9k3og0sst545/Diplom.docx?dl=0" style='color:#fff'>Диплом Влада</a></div>
						
					</div>

					<div class="the-message-the-current-user clearfix">
						<div class="the-message-the-interlocutor-icon-user-time right">
							<div class="chat-user-logo-im right">
								<img src="" alt="" class="user-logo bg-white">
							</div>
						</div>
						<div class="the-message-the-interlocutor-text-user bg-blue right right-triangle" ><a href="https://www.dropbox.com/s/c6z6k47csgtdsba/%D0%A0%D0%B0%D0%B7%D1%80%D0%B0%D0%B1%D0%BE%D1%82%D0%BA%D0%B0%20Web-%D0%BF%D1%80%D0%B8%D0%BB%D0%BE%D0%B6%D0%B5%D0%BD%D0%B8%D1%8F%20%D0%B4%D0%BB%D1%8F%20%D1%83%D1%87%D0%B5%D1%82%D0%B0%20%D1%80%D0%B0%D0%B1%D0%BE%D1%82%20%D1%81%D1%82%D1%83%D0%B4%D0%B5%D0%BD%D1%82%D0%BE%D0%B2%20%D0%BE%D0%B1%D1%80%D0%B0%D0%B7%D0%BE%D0%B2%D0%B0%D1%82%D0%B5%D0%BB%D1%8C%D0%BD%D0%BE%D0%B3%D0%BE%20%D1%83%D1%87%D1%80%D0%B5%D0%B6%D0%B4%D0%B5%D0%BD%D0%B8%D1%8F.docx?dl=0" style='color:#fff'>Диплом мой</a> </div>
						
					</div>

				</div>
				<div class="region-chat-input-textarea">
					<div class="chat-input-file">
						
						<svg fill="#676767" height="28" viewBox="0 0 24 24" width="28" xmlns="http://www.w3.org/2000/svg" id='attach-file'>
							<path d="M16.5 6v11.5c0 2.21-1.79 4-4 4s-4-1.79-4-4V5c0-1.38 1.12-2.5 2.5-2.5s2.5 1.12 2.5 2.5v10.5c0 .55-.45 1-1 1s-1-.45-1-1V6H10v9.5c0 1.38 1.12 2.5 2.5 2.5s2.5-1.12 2.5-2.5V5c0-2.21-1.79-4-4-4S7 2.79 7 5v12.5c0 3.04 2.46 5.5 5.5 5.5s5.5-2.46 5.5-5.5V6h-1.5z"/>
							<path d="M0 0h24v24H0z" fill="none"/>
						</svg>
					</div>
					<div class="chat-input-textarea">
						<textarea name="" id="" class='textarea-chat' placeholder='Начните писать сообщение'></textarea>
					</div>
					<div class="chat-input-enter-message">
						<div class="open-smile">
							
							<svg fill="#676767" height="28" viewBox="0 0 24 24" width="28" xmlns="http://www.w3.org/2000/svg" id='smile-chat'>
								<path d="M0 0h24v24H0z" fill="none"/>
								<path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
							</svg>
						</div>
						<div class="send-message-chat">
							<div class="send">
								
								<svg fill="#FFFFFF" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
									<path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
									<path d="M0 0h24v24H0z" fill="none"/>
								</svg>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
		<div class="friend_profile_bar">
			<div class="friend_profile_bar-header">
				
			</div>
			<div class="friend_profile_bar-full-info-user">
				<div class="friend_profile_bar-img-name">
					<div class="friend_profile_bar-img">
						<img src="https://salt.zone/storage/web/cache/1/nFzMgPvZhxowamY_CmYeMo-Ef-Hkb0yJ.jpg?w=1320&s=dc8e1c092146b59f48ffdcd8ff33972d" alt="">
					</div>
				</div>
				<div class="friend_profile_bar-name">
					<div class="name_user">User Sets</div>
					<div class="user_the_post">Учитель информатики</div>
				</div>
				<div class="messeage-menu-division"></div>
				<div class="friend_profile_bar-full-info">
					<div class="full-info-content">
						<div class="full-info-content-div">Ник</div>
						<div class="full-info-content-div">фывфыв</div>
					</div>
					<div class="messeage-menu-division"></div>
					<div class="full-info-content">
						<div class="full-info-content-div">Email</div>
						<div class="full-info-content-div">asdasdasd@jjj.ru</div>
					</div>
					<div class="messeage-menu-division"></div>
				</div>

			</div>
		</div>

	</main>
</body>

</html>
