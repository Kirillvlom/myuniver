<?
$db = new Db();
$users = $db->db_composite_query("SELECT COUNT(id_user) FROM users");
$students = $db->db_composite_query("SELECT COUNT(id_user) FROM users WHERE id_role_user = 1");
$teachers = $db->db_composite_query("SELECT COUNT(id_user) FROM users WHERE id_role_user = 2");
$managers = $db->db_composite_query("SELECT COUNT(id_user) FROM users WHERE id_role_user = 3");
$materials_for_the_field = $db->db_composite_query("SELECT COUNT(id_materials_for_the_field) FROM materials_for_the_field");
$answers_to_workspace = $db->db_composite_query("SELECT COUNT(id_answers_to_workspace) FROM answers_to_workspace");
$workspaces = $db->db_composite_query("SELECT COUNT(id_workspace) FROM workspaces");
?>
<div class='content'>

	<?php if ($_SESSION['user']['access_role'] == '10'): ?>

		<div class='content-group-my-setting padding-0'>
			<div class='row padding-0 clearfix'>
				<div class='row-2 flex-align-center clearfix'>
					<span class='title-span'>Рабочие области</span>
					<span class='count-my'>Всего: <?echo count($data['array_workspace_user'])?></span>
					
				</div>
				<div class='row-2'>
					
				</div>
			</div>
		</div>
		<div class='content-group-my-setting '>
			<div class='row flex-align-center-justify-space-between'>

				<?
				if ($data["array_workspace_user"]) {
					for ($i=0; $i < count($data["array_workspace_user"]); $i++) { 
						echo "<div class='row-block-my profile'>
						<a href='/my/dashboard/".$data["array_workspace_user"][$i]["id_workspace"]."'>
						<div class='row-block-my-img'><img src='/assets/files/dashboard_cover/".$data["array_workspace_user"][$i]["cover_workspace"]."' alt=''></div>
						<div class='row-block-my-info-min'>
						<div class='row-block-my-title'>".$data["array_workspace_user"][$i]["name_workspace"]."</div>
						<div class='row-block-my-date clearfix'>
						<div class='row-2'>до ".$data["array_workspace_user"][$i]["deadline"]."</div>
						<div class='row-2 flex-align-center flex-justify-right'>
						<span class='margin-0-5'>



						</span>
						<span class='margin-0-5'></span>
						</div>
						</div>
						</div>
						</a>
						</div>";
					}
				} else{
					echo "<div class='row-block-my profile'>

					<div class='row-block-my-img'><img src='/assets/files/dashboard_cover/default_cover.jpg' alt=''></div>
					<div class='row-block-my-info-min'>
					<div class='row-block-my-title'>У вас нет рабочих областей </div>
					<div class='row-block-my-date clearfix'>
					<div class='row-2'></div>
					<div class='row-2 flex-align-center flex-justify-right'>
					<span class='margin-0-5'>
					¯\_(ツ)_/¯
					</span>
					<span class='margin-0-5'></span>
					</div>
					</div>
					</div>

					</div>";
				}



				?>

			</div>
		</div>

	<?php endif ?>

	<?php if ($_SESSION['user']['access_role'] == '20'): ?>
		<?
		$info_teacher = $db ->db_query_param_where_column("teachers","id_user",  $_SESSION['user']['id_user'], "id_teachers");
		$info_workspace = $db ->db_query_param_where_column("workspaces","id_teachers",  $info_teacher[0]['id_teachers']);
		
		?>
		<div class='content-group-my-setting padding-0'>
			<div class='row padding-0 clearfix'>
				<div class='row-2 flex-align-center clearfix'>
					<span class='title-span'>Рабочие  глобальные группы преподавателя</span>
					<span class='count-my'>Всего: 1</span>
					

				</div>
				<div class='row-2'>
					
					
				</div>
			</div>
		</div>
		<div class='content-group-my-setting '>

			<div class='row flex-align-center-justify-space-between'>
				
				<div class='row-block-my profile'>
					<a href="/my/dashboards/vpo-ochka">
						<div class='row-block-my-img'><img src='./assets/img/dashboard/material-1-1000x563.jpg' alt=''></div>
						<div class='row-block-my-info-min'>
							<div class='row-block-my-title'>ВПО очка</div>
							<div class='row-block-my-date clearfix'>
								<div class='row-2'>области</div>
								<div class='row-2 flex-align-center flex-justify-right'>
									<span class='margin-0-5'>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
											<path d="M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z"></path>
											<path d="M0 0h24v24H0z" fill="none"></path>
										</svg>
									</span>
									<span class='margin-0-5'></span>
								</div>
							</div>
						</div>
					</a>
				</div>

				<!--<div class='row-block-my profile'>
					<a href="/my/dashboards/vpo-zauchka">
						<div class='row-block-my-img'><img src='https://maxcdn.icons8.com/app/uploads/2016/03/material-1-1000x563.jpg' alt=''></div>
						<div class='row-block-my-info-min'>
							<div class='row-block-my-title'>ВПО заочка</div>
							<div class='row-block-my-date clearfix'>
								<div class='row-2'>областей</div>
								<div class='row-2 flex-align-center flex-justify-right'>
									<span class='margin-0-5'>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
											<path d="M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z"></path>
											<path d="M0 0h24v24H0z" fill="none"></path>
										</svg>
									</span>
									<span class='margin-0-5'>10</span>
								</div>
							</div>
						</div>
					</a>
				</div>

				<div class='row-block-my profile'>
					<a href="/my/dashboards/spo-ochka">
						<div class='row-block-my-img'><img src='https://maxcdn.icons8.com/app/uploads/2016/03/material-1-1000x563.jpg' alt=''></div>
						<div class='row-block-my-info-min'>
							<div class='row-block-my-title'>СПО очка</div>
							<div class='row-block-my-date clearfix'>
								<div class='row-2'>областей</div>
								<div class='row-2 flex-align-center flex-justify-right'>
									<span class='margin-0-5'>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
											<path d="M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z"></path>
											<path d="M0 0h24v24H0z" fill="none"></path>
										</svg>
									</span>
									<span class='margin-0-5'>10</span>
								</div>
							</div>
						</div>
					</a>
				</div>

				<div class='row-block-my profile'>
					<a href="/my/dashboards/spo-zauchka">
						<div class='row-block-my-img'><img src='https://maxcdn.icons8.com/app/uploads/2016/03/material-1-1000x563.jpg' alt=''></div>
						<div class='row-block-my-info-min'>
							<div class='row-block-my-title'>СПО заочка</div>
							<div class='row-block-my-date clearfix'>
								<div class='row-2'>областей</div>
								<div class='row-2 flex-align-center flex-justify-right'>
									<span class='margin-0-5'>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
											<path d="M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z"></path>
											<path d="M0 0h24v24H0z" fill="none"></path>
										</svg>
									</span>
									<span class='margin-0-5'>10</span>
								</div>
							</div>
						</div>
					</a>
				</div> -->

			</div>
		</div>
		
	<?php endif ?>

	<?php if ($_SESSION['user']['access_role'] == '40'): ?>
		<div class='content-group-my-setting padding-0'>
			<div class='row padding-0 clearfix'>
				<div class='row-2'>
					<div class="row clearfix">
						<div class='title-span'>Отчеты</div>
					</div>

					<div class="row clearfix padding-0">
						<div class="row clearfix flex-align-center-justify-space-between padding-0">

							<div class="row-brief-information profile padding-10 flex-align-center">
								<a href="" class='row-brief-information-a '>
									<div class="row-all clearfix flex-align-center">
										<div class="row-2 flex-align-center-justify-center">
											<div class="row-svg-brief-information flex-align-center-justify-center bg-light-red">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
													<path d="M0 0h24v24H0z" fill="none"/>
													<path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
												</svg>
											</div>
										</div>
										<div class="row-2 flex-align-center-justify-space-between">
											<div class="row-svg-brief-information-text ">
												Создать итоговую ведомость по  ВКР 
											</div>
										</div>
									</div>
								</a>
							</div>

							<div class="row-brief-information profile padding-10 flex-align-center">
								<a href="" class='row-brief-information-a '>
									<div class="row-all clearfix flex-align-center">
										<div class="row-2 flex-align-center-justify-center">
											<div class="row-svg-brief-information flex-align-center-justify-center bg-light-red">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
													<path d="M0 0h24v24H0z" fill="none"/>
													<path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
												</svg>
											</div>
										</div>
										<div class="row-2 flex-align-center-justify-space-between">
											<div class="row-svg-brief-information-text ">
												Создать отчет по допуску к ВКР
											</div>
										</div>
									</div>
								</a>
							</div>

						</div>
					</div>
				</div>
				
				<div class='row-2 clearfix'>
					<div class="row clearfix">
						<div class='title-span'>Быстрые действия</div>
					</div>
					<div class="row clearfix padding-0">
						<div class="row clearfix flex-align-center-justify-space-between padding-0">
							
							
							<div class="row-brief-information profile padding-10 flex-align-center">
								<a href="/new/user" class='row-brief-information-a '>
									<div class="row-all clearfix flex-align-center">
										<div class="row-2 flex-align-center-justify-center">
											<div class="row-svg-brief-information flex-align-center-justify-center bg-light-red">

												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
													<path d="M0 0h24v24H0z" fill="none"/>
													<path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
												</svg>

											</div>
										</div>
										<div class="row-2 flex-align-center-justify-space-between">
											<div class="row-svg-brief-information-text ">
												Добавить пользователя
											</div>
										</div>
									</div>
								</a>
							</div>
							

							<div class="row-brief-information profile padding-10 flex-align-center">
								<a href="/new/group" class='row-brief-information-a '>
									<div class="row-all clearfix flex-align-center">
										<div class="row-2 flex-align-center-justify-center">
											<div class="row-svg-brief-information flex-align-center-justify-center bg-light-red">


												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
													<path d="M0 0h24v24H0z" fill="none"/>
													<path d="M8 10H5V7H3v3H0v2h3v3h2v-3h3v-2zm10 1c1.66 0 2.99-1.34 2.99-3S19.66 5 18 5c-.32 0-.63.05-.91.14.57.81.9 1.79.9 2.86s-.34 2.04-.9 2.86c.28.09.59.14.91.14zm-5 0c1.66 0 2.99-1.34 2.99-3S14.66 5 13 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm6.62 2.16c.83.73 1.38 1.66 1.38 2.84v2h3v-2c0-1.54-2.37-2.49-4.38-2.84zM13 13c-2 0-6 1-6 3v2h12v-2c0-2-4-3-6-3z"/>
												</svg>


											</div>
										</div>
										<div class="row-2 flex-align-center-justify-space-between">
											<div class="row-svg-brief-information-text ">
												Добавить группу
											</div>
										</div>
									</div>
								</a>
							</div>

							<div class="row-brief-information profile padding-10 flex-align-center">
								<a href="/new/workspace" class='row-brief-information-a '>
									<div class="row-all clearfix flex-align-center">
										<div class="row-2 flex-align-center-justify-center">
											<div class="row-svg-brief-information flex-align-center-justify-center bg-light-red">


												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
													<path d="M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z"></path>
													<path d="M0 0h24v24H0z" fill="none"></path>
												</svg>


											</div>
										</div>
										<div class="row-2 flex-align-center-justify-space-between">
											<div class="row-svg-brief-information-text ">
												Добавить рабочую область
											</div>
										</div>
									</div>
								</a>
							</div>

							<div class="row-brief-information profile padding-10 flex-align-center">
								<a href="/new/specialtie" class='row-brief-information-a '>
									<div class="row-all clearfix flex-align-center">
										<div class="row-2 flex-align-center-justify-center">
											<div class="row-svg-brief-information flex-align-center-justify-center bg-light-red">



												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
													<path d="M0 0h24v24H0z" fill="none"/>
													<path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
												</svg>



											</div>
										</div>
										<div class="row-2 flex-align-center-justify-space-between">
											<div class="row-svg-brief-information-text ">
												Добавить специальность
											</div>
										</div>
									</div>
								</a>
							</div>


							<div class="row-brief-information profile padding-10 flex-align-center">
								<a href="/new/specialtie" class='row-brief-information-a '>
									<div class="row-all clearfix flex-align-center">
										<div class="row-2 flex-align-center-justify-center">
											<div class="row-svg-brief-information flex-align-center-justify-center bg-light-red">



												
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
													<path d="M11.99 2c-5.52 0-10 4.48-10 10s4.48 10 10 10 10-4.48 10-10-4.48-10-10-10zm3.61 6.34c1.07 0 1.93.86 1.93 1.93 0 1.07-.86 1.93-1.93 1.93-1.07 0-1.93-.86-1.93-1.93-.01-1.07.86-1.93 1.93-1.93zm-6-1.58c1.3 0 2.36 1.06 2.36 2.36 0 1.3-1.06 2.36-2.36 2.36s-2.36-1.06-2.36-2.36c0-1.31 1.05-2.36 2.36-2.36zm0 9.13v3.75c-2.4-.75-4.3-2.6-5.14-4.96 1.05-1.12 3.67-1.69 5.14-1.69.53 0 1.2.08 1.9.22-1.64.87-1.9 2.02-1.9 2.68zM11.99 20c-.27 0-.53-.01-.79-.04v-4.07c0-1.42 2.94-2.13 4.4-2.13 1.07 0 2.92.39 3.84 1.15-1.17 2.97-4.06 5.09-7.45 5.09z"/>
													<path fill="none" d="M0 0h24v24H0z"/>
												</svg>



											</div>
										</div>
										<div class="row-2 flex-align-center-justify-space-between">
											<div class="row-svg-brief-information-text ">
												Прикрепить к группе
											</div>
										</div>
									</div>
								</a>
							</div>

							<div class="row-brief-information profile padding-10 flex-align-center">
								<a href="/new/specialtie" class='row-brief-information-a '>
									<div class="row-all clearfix flex-align-center">
										<div class="row-2 flex-align-center-justify-center">
											<div class="row-svg-brief-information flex-align-center-justify-center bg-light-red">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
													<path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
													<path d="M0 0h24v24H0z" fill="none"/>
												</svg>
											</div>
										</div>
										<div class="row-2 flex-align-center-justify-space-between">
											<div class="row-svg-brief-information-text ">
												Редактировать рабочую область
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>







					<!-- Если что, отчеты были тут-->
				</div>
			</div>

		</div>

	</div>

<?php endif ?>


<?php if ($_SESSION['user']['access_role'] == '30'): ?>
	<div class='content-group-my-setting padding-0'>
		<div class='row padding-0 clearfix'>
			<div class='row-2'>
				<div class="row clearfix">
					<div class='title-span'>Краткая сводка</div>
				</div>

				<div class="row clearfix flex-align-center-justify-space-between padding-0">
					<div class="row-brief-information profile padding-10">
						<div class=' row-all clearfix'>
							<div class="svg-icon float-right update">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
									<path d="M19 8l-4 4h3c0 3.31-2.69 6-6 6-1.01 0-1.97-.25-2.8-.7l-1.46 1.46C8.97 19.54 10.43 20 12 20c4.42 0 8-3.58 8-8h3l-4-4zM6 12c0-3.31 2.69-6 6-6 1.01 0 1.97.25 2.8.7l1.46-1.46C15.03 4.46 13.57 4 12 4c-4.42 0-8 3.58-8 8H1l4 4 4-4H6z"/>
									<path d="M0 0h24v24H0z" fill="none"/>
								</svg>
							</div>
						</div>
						<div class="row-all clearfix">
							<div class="row-2 flex-align-center-justify-center">
								<div class="row-svg-brief-information flex-align-center-justify-center bg-light-red">


									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
										<path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
										<path d="M0 0h24v24H0z" fill="none"/>
									</svg>


								</div>
							</div>
							<div class="row-2 flex-align-center-justify-space-between">
								<div class="row-svg-brief-information-text ">
									Ответы к рабочим областям
								</div>
								<div class="row-svg-brief-information-count">
									<? echo ($answers_to_workspace[0]["COUNT(id_answers_to_workspace)"]);?>
								</div>


							</div>
						</div>
					</div>

					<div class="row-brief-information profile padding-10">
						<div class=' row-all clearfix'>
							<div class="svg-icon float-right update">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
									<path d="M19 8l-4 4h3c0 3.31-2.69 6-6 6-1.01 0-1.97-.25-2.8-.7l-1.46 1.46C8.97 19.54 10.43 20 12 20c4.42 0 8-3.58 8-8h3l-4-4zM6 12c0-3.31 2.69-6 6-6 1.01 0 1.97.25 2.8.7l1.46-1.46C15.03 4.46 13.57 4 12 4c-4.42 0-8 3.58-8 8H1l4 4 4-4H6z"/>
									<path d="M0 0h24v24H0z" fill="none"/>
								</svg>
							</div>
						</div>
						<div class="row-all clearfix">
							<div class="row-2 flex-align-center-justify-center">
								<div class="row-svg-brief-information flex-align-center-justify-center bg-light-blue">

									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
										<path d="M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z"></path>
										<path d="M0 0h24v24H0z" fill="none"></path>
									</svg>

								</div>
							</div>
							<div class="row-2 flex-align-center-justify-space-between">
								<div class="row-svg-brief-information-text ">
									Рабочих областей
								</div>
								<div class="row-svg-brief-information-count">
									<? echo ($workspaces[0]["COUNT(id_workspace)"]);?>
								</div>


							</div>
						</div>
					</div>

					<div class="row-brief-information profile padding-10">
						<div class=' row-all clearfix'>
							<div class="svg-icon float-right update">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
									<path d="M19 8l-4 4h3c0 3.31-2.69 6-6 6-1.01 0-1.97-.25-2.8-.7l-1.46 1.46C8.97 19.54 10.43 20 12 20c4.42 0 8-3.58 8-8h3l-4-4zM6 12c0-3.31 2.69-6 6-6 1.01 0 1.97.25 2.8.7l1.46-1.46C15.03 4.46 13.57 4 12 4c-4.42 0-8 3.58-8 8H1l4 4 4-4H6z"/>
									<path d="M0 0h24v24H0z" fill="none"/>
								</svg>
							</div>
						</div>
						<div class="row-all clearfix">
							<div class="row-2 flex-align-center-justify-center">
								<div class="row-svg-brief-information flex-align-center-justify-center bg-light-lilac">

									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
										<path d="M16.5 6v11.5c0 2.21-1.79 4-4 4s-4-1.79-4-4V5c0-1.38 1.12-2.5 2.5-2.5s2.5 1.12 2.5 2.5v10.5c0 .55-.45 1-1 1s-1-.45-1-1V6H10v9.5c0 1.38 1.12 2.5 2.5 2.5s2.5-1.12 2.5-2.5V5c0-2.21-1.79-4-4-4S7 2.79 7 5v12.5c0 3.04 2.46 5.5 5.5 5.5s5.5-2.46 5.5-5.5V6h-1.5z"/>
										<path d="M0 0h24v24H0z" fill="none"/>
									</svg>

								</div>
							</div>
							<div class="row-2 flex-align-center-justify-space-between">
								<div class="row-svg-brief-information-text ">
									Добавлено материалов и документов
								</div>
								<div class="row-svg-brief-information-count">
									<? echo $materials_for_the_field[0]["COUNT(id_materials_for_the_field)"]?>
								</div>


							</div>
						</div>
					</div>

					<div class="row-brief-information profile padding-10">
						<div class=' row-all clearfix'>
							<div class="svg-icon float-right update ">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
									<path d="M19 8l-4 4h3c0 3.31-2.69 6-6 6-1.01 0-1.97-.25-2.8-.7l-1.46 1.46C8.97 19.54 10.43 20 12 20c4.42 0 8-3.58 8-8h3l-4-4zM6 12c0-3.31 2.69-6 6-6 1.01 0 1.97.25 2.8.7l1.46-1.46C15.03 4.46 13.57 4 12 4c-4.42 0-8 3.58-8 8H1l4 4 4-4H6z"/>
									<path d="M0 0h24v24H0z" fill="none"/>
								</svg>
							</div>
						</div>
						<div class="row-all clearfix">
							<div class="row-2 flex-align-center-justify-center">
								<div class="row-svg-brief-information flex-align-center-justify-center bg-light-pink">


									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
										<path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
										<path d="M0 0h24v24H0z" fill="none"/>
									</svg>


								</div>
							</div>
							<div class="row-2 flex-align-center-justify-space-between">
								<div class="row-svg-brief-information-text ">
									Пользователей
								</div>
								<div class="row-svg-brief-information-count">
									<?echo $users[0]["COUNT(id_user)"]?>
								</div>


							</div>
						</div>
					</div>

				</div>
				<div class="row clearfix">
					<div class='title-span'>Статистика</div>
				</div>
				<div class="row clearfix">
					<div class="row clearfix profile">
						<div class='row-all clearfix'>
							<div class="svg-icon float-right update ">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
									<path d="M19 8l-4 4h3c0 3.31-2.69 6-6 6-1.01 0-1.97-.25-2.8-.7l-1.46 1.46C8.97 19.54 10.43 20 12 20c4.42 0 8-3.58 8-8h3l-4-4zM6 12c0-3.31 2.69-6 6-6 1.01 0 1.97.25 2.8.7l1.46-1.46C15.03 4.46 13.57 4 12 4c-4.42 0-8 3.58-8 8H1l4 4 4-4H6z"/>
									<path d="M0 0h24v24H0z" fill="none"/>
								</svg>
							</div>
						</div>
						<div class="row-all clearfix">
							<div class="row-all flex-align-center-justify-center">
								<div class="row-canvas-brief-information flex-align-center-justify-center ">
									<script src="/assets/js/lib/Chart/Chart.js"></script>
									<canvas id="canvas" width="350" height="250"></canvas> 
									<script> 
										new Chart(document.getElementById("canvas"),{
											"type":"doughnut",
											"data":{
												"labels":["Студенты","Преподаватели","Менеджеры"],
												"datasets":[
												{
													"data":[<?echo $students[0]["COUNT(id_user)"]?>,<?echo $teachers[0]["COUNT(id_user)"]?>,<?echo $managers[0]["COUNT(id_user)"]?>],
													"backgroundColor":
													[
													"rgb(255, 99, 132)",
													"rgb(54, 162, 235)",
													"rgb(255, 205, 86)"
													]
												}
												]
											},
											"options":{
												"legend" :{
													"position": "right"
												}

											}

										});
									</script> 
								</div>
							</div>
						</div>

					</div>
				</div>



			</div>
			<div class='row-2 clearfix'>
				<div class="row clearfix">
					<div class='title-span'>Быстрые действия</div>
				</div>
				<div class="row clearfix padding-0">
					<div class="row clearfix flex-align-center-justify-space-between padding-0">


						<div class="row-brief-information profile padding-10 flex-align-center">
							<a href="/new/user" class='row-brief-information-a '>
								<div class="row-all clearfix flex-align-center">
									<div class="row-2 flex-align-center-justify-center">
										<div class="row-svg-brief-information flex-align-center-justify-center bg-light-red">

											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
												<path d="M0 0h24v24H0z" fill="none"/>
												<path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
											</svg>

										</div>
									</div>
									<div class="row-2 flex-align-center-justify-space-between">
										<div class="row-svg-brief-information-text ">
											Добавить пользователя
										</div>
									</div>
								</div>
							</a>
						</div>


						<div class="row-brief-information profile padding-10 flex-align-center">
							<a href="/new/group" class='row-brief-information-a '>
								<div class="row-all clearfix flex-align-center">
									<div class="row-2 flex-align-center-justify-center">
										<div class="row-svg-brief-information flex-align-center-justify-center bg-light-red">


											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
												<path d="M0 0h24v24H0z" fill="none"/>
												<path d="M8 10H5V7H3v3H0v2h3v3h2v-3h3v-2zm10 1c1.66 0 2.99-1.34 2.99-3S19.66 5 18 5c-.32 0-.63.05-.91.14.57.81.9 1.79.9 2.86s-.34 2.04-.9 2.86c.28.09.59.14.91.14zm-5 0c1.66 0 2.99-1.34 2.99-3S14.66 5 13 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm6.62 2.16c.83.73 1.38 1.66 1.38 2.84v2h3v-2c0-1.54-2.37-2.49-4.38-2.84zM13 13c-2 0-6 1-6 3v2h12v-2c0-2-4-3-6-3z"/>
											</svg>


										</div>
									</div>
									<div class="row-2 flex-align-center-justify-space-between">
										<div class="row-svg-brief-information-text ">
											Добавить группу
										</div>
									</div>
								</div>
							</a>
						</div>

						<div class="row-brief-information profile padding-10 flex-align-center">
							<a href="/new/workspace" class='row-brief-information-a '>
								<div class="row-all clearfix flex-align-center">
									<div class="row-2 flex-align-center-justify-center">
										<div class="row-svg-brief-information flex-align-center-justify-center bg-light-red">


											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
												<path d="M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z"></path>
												<path d="M0 0h24v24H0z" fill="none"></path>
											</svg>


										</div>
									</div>
									<div class="row-2 flex-align-center-justify-space-between">
										<div class="row-svg-brief-information-text ">
											Добавить рабочую область
										</div>
									</div>
								</div>
							</a>
						</div>

						<div class="row-brief-information profile padding-10 flex-align-center">
							<a href="/new/specialtie" class='row-brief-information-a '>
								<div class="row-all clearfix flex-align-center">
									<div class="row-2 flex-align-center-justify-center">
										<div class="row-svg-brief-information flex-align-center-justify-center bg-light-red">



											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
												<path d="M0 0h24v24H0z" fill="none"/>
												<path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
											</svg>



										</div>
									</div>
									<div class="row-2 flex-align-center-justify-space-between">
										<div class="row-svg-brief-information-text ">
											Добавить специальность
										</div>
									</div>
								</div>
							</a>
						</div>


						

						
					</div>
				</div>







				<!-- Если что, отчеты были тут-->
				
				<div class="row clearfix">
					<div class='title-span'>Отчеты</div>
				</div>

				<div class="row clearfix padding-0">
					<div class="row clearfix flex-align-center-justify-space-between padding-0">

						<div class="row-brief-information profile padding-10 flex-align-center">
							<a href="" class='row-brief-information-a '>
								<div class="row-all clearfix flex-align-center">
									<div class="row-2 flex-align-center-justify-center">
										<div class="row-svg-brief-information flex-align-center-justify-center bg-light-red">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
												<path d="M0 0h24v24H0z" fill="none"/>
												<path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
											</svg>
										</div>
									</div>
									<div class="row-2 flex-align-center-justify-space-between">
										<div class="row-svg-brief-information-text ">
											Создать сводную ведомость по ВКР
										</div>
									</div>
								</div>
							</a>
						</div>

						<div class="row-brief-information profile padding-10 flex-align-center">
							<a href="" class='row-brief-information-a '>
								<div class="row-all clearfix flex-align-center">
									<div class="row-2 flex-align-center-justify-center">
										<div class="row-svg-brief-information flex-align-center-justify-center bg-light-red">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
												<path d="M0 0h24v24H0z" fill="none"/>
												<path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
											</svg>
										</div>
									</div>
									<div class="row-2 flex-align-center-justify-space-between">
										<div class="row-svg-brief-information-text ">
											Создать приказ о закреплении тем ВКР
										</div>
									</div>
								</div>
							</a>
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>

</div>
<?php endif ?>








</div>




