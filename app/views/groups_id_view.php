
<div class='content'>

	<div class='content-group-my-setting padding-0'>
		<div class='row padding-0 clearfix'>
			<div class='row-2 flex-align-center clearfix'>		

			</div>
			<div class='row-2'>
				
			</div>
		</div>
	</div>
	<div class="row clearfix">
		<div class="row-3 ">
			<div class="row profile margin-10-0 padding-0">
				<div class="row row-title bg-blue">Группа <?
				$db = new Db();
				$name_group = $db -> db_query_param_where_column("groups", "id_group", $data["id_group"]);
				echo($name_group[0]["name_group"]);
				?></div>


				<div class="row row-info clearfix">
					<div class="row-2">Студентов</div>
					<div class="row-2"><? 
					
					if ($data['students'][0]) {
						echo  count($data['students']);
					}else{
						echo  0;

					}

					?></div>
				</div>
				<div class="row row-info clearfix">
					<div class="row-2">Менеджер группы</div>
					<div class="row-2"><a href="/user/id/<? echo $data['user_manager'][0]["id_user"]?>"><?
					echo $data['user_manager'][0]["surname_user"]." ".$data['user_manager'][0]["name_user"]." ".$data['user_manager'][0]["patronymic_user"];
					?></a></div>
				</div>
				
			</div>


			<div class="row profile margin-10-0 padding-0">
				<div class="row row-title bg-blue">Отчеты</div>
				<div class="row row-info clearfix">
					<div class="row-2">Список студентов</div>
					<div class="row-2"><a href="/generation/listStudent/<?echo $data["id_group"]?>" target="_blank">Сформировать</a></div>
				</div>

				<div class="row row-info clearfix">
					<div class="row-2">Сводная ведомость ВКР</div>
					<div class="row-2"><a href="/generation/order_vkr/<?echo $data["id_group"]?>" target="_blank">Сформировать </a></div>
				</div>	

				<div class="row row-info clearfix">
					<div class="row-2">Приказ о  ВКР </div>
					<div class="row-2"><a href="/generation/order_vkr/<?echo $data["id_group"]?>" target="_blank">Сформировать </a></div>
				</div>				
			</div>

			<div class="row profile margin-10-0 padding-0">
				<div class="row row-title bg-blue">Действия</div>
				
				<div class="row row-info clearfix">
					<div class="row-2">Оценки ВКР</div>
					<div class="row-2"><a href="/groups/evaluation/<?echo $data["id_group"]?>">Добавить  </a></div>
				</div>
				<div class="row row-info clearfix">
					<div class="row-2">Добавить студентов</div>
					<div class="row-2"><a href="/edit/add_student/<?echo $data["id_group"]?>">Добавить  </a></div>
				</div>	
				<div class="row row-info clearfix">
					<div class="row-2">Удалить участников</div>
					<div class="row-2"><a href="/edit/group/<?echo $data["id_group"]?>">Удалить </a></div>
				</div>

				<div class="row row-info clearfix">
					<div class="row-2">Темы ВКР</div>
					<div class="row-2"><a href="/groups/thetheme/<?echo  $data["id_group"]?>">Изменить </a></div>
				</div>				
			</div>



		</div>
		
		<div class="row-1 ">



			<div class='content-group-my-setting '>
				<div class='row flex-align-center-justify-space-between'>

					<?

					$db = new Db();
					if ($data['students'][0]) {
						
						for ($i=0; $i <  count($data['students']); $i++) { 


							echo "<div class='row-block-my profile'>
							<a href='/user/id/".$data['students'][$i][0]['id_user']."'>
							<div class='row-block-my-img'><img src='/assets/img/dashboard/material-1-1000x563.jpg' alt=''></div>
							<div class='row-block-my-info-min'>
							<div class='row-block-my-title'>".$data['students'][$i][0]['surname_user']." ".$data['students'][$i][0]['name_user']." ".$data['students'][$i][0]['patronymic_user']."</div>
							<div class='row-block-my-date clearfix'>
							<div class='row-2'>Студент</div>
							<div class='row-2 flex-align-center flex-justify-right'>
							<span class='margin-0-5'>

							<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='#fff'>
							<path d='M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z'/>
							<path d='M0 0h24v24H0z' fill='none'/>
							</svg>

							</span>
							<span class='margin-0-5'></span>
							</div>
							</div>
							</div>
							</a>
							</div>";
						}
					}else{
						echo "<div class='row-block-my profile'>

						<div class='row-block-my-img'><img src='/assets/img/dashboard/material-1-1000x563.jpg' alt=''></div>
						<div class='row-block-my-info-min'>
						<div class='row-block-my-title'>Группа пуста</div>
						<div class='row-block-my-date clearfix'>
						<div class='row-2'>Студент</div>
						<div class='row-2 flex-align-center flex-justify-right'>
						<span class='margin-0-5'>

						<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='#fff'>
						<path d='M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z'/>
						<path d='M0 0h24v24H0z' fill='none'/>
						</svg>

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
		</div>
	</div>
</div>





