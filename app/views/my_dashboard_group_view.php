<div class='content'>

	<div class='content-group-my-setting padding-0'>
		<div class='row padding-0 clearfix'>
			<div class='row-2 flex-align-center clearfix'>
				<span class='title-span'><?echo $data['groups_info'][0]['name_group']?></span>
				<span class='count-my'>Всего: 2</span>
				

			</div>
			<div class='row-2'>
				
			</div>
		</div>
	</div>
	<div class="row clearfix">
		<div class="row-3 ">
			
			<div class="row profile margin-10-0 padding-0">
				<div class="row row-title bg-blue">Дипломные работы</div>
				<div class="row row-info clearfix">
					<div class="row-2">Преподаватель</div>
					<div class="row-2"><a href="/user"><?
					echo $data['user_teachers_info'][0]["surname_user"]." ".$data['user_teachers_info'][0]["name_user"]." ".$data['user_teachers_info'][0]["patronymic_user"];
					?></a></div>
				</div>

				<div class="row row-info clearfix">
					<div class="row-2">Студентов</div>
					<div class="row-2"><? echo count($data['array_All_Group_user'])?></div>
				</div>
				<div class="row row-info clearfix">
					<div class="row-2">Менеджер группы</div>
					<div class="row-2"><a href="/user/id/<? echo $data['user_teachers_manager'][0]["id_user"]?>"><?
					echo $data['user_teachers_manager'][0]["surname_user"]." ".$data['user_teachers_manager'][0]["name_user"]." ".$data['user_teachers_manager'][0]["patronymic_user"];
					?></a></div>
				</div>
				
			</div>


			<div class="row profile margin-10-0 padding-0">
				<div class="row row-title bg-blue">Отчеты</div>
				<div class="row row-info clearfix">
					<div class="row-2">Список студентов</div>
					<div class="row-2"><a href="/generation/listStudent_for_teacher/<?echo $data["groups_info"][0]["id_group"]?>" target="_blank">Сформировать</a></div>
				</div>

	
							
			</div>



		</div>
		
		<div class="row-1 ">



			<div class='content-group-my-setting '>
				<div class='row flex-align-center-justify-space-between'>

					<?

					$db = new Db();
					for ($i=0; $i <  count($data['array_All_Group_user']); $i++) { 
						$user_id = $db -> db_query_param_where_column("students", "id_student", $data['array_All_Group_user'][$i]['id_student'], "id_user" );
						$user_info = $db -> db_query_param_where_column("users","id_user", $user_id[0]['id_user'], "name_user, surname_user, patronymic_user");
						
						echo "<div class='row-block-my profile'>
						<a href='/my/dashboard/".$data['array_All_Group_user'][$i]['id_workspace']."'>
						<div class='row-block-my-img'><img src='https://maxcdn.icons8.com/app/uploads/2016/03/material-1-1000x563.jpg' alt=''></div>
						<div class='row-block-my-info-min'>
						<div class='row-block-my-title'>".$user_info[0]['surname_user']." ".$user_info[0]['name_user']." ".$user_info[0]['patronymic_user']."</div>
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
					?>

					
				</div>
			</div>
		</div>
	</div>
</div>




