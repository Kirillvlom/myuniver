<div class='content'>
	<div class='content-group-my-setting padding-0'>
		<div class='row padding-0 clearfix'>
			<div class='row-2 flex-align-center clearfix'>
				<span class='title-span'>Рабочие области</span>
				<span class='count-my'>Всего: <?echo count($data["all_workspaces"])?></span>
				

			</div>
			<div class='row-2'>
				<a href="/new/workspace" class="button color-violet float-right">Добавить</a>
				
			</div>
		</div>
	</div>


	
	<div class="content-group-my-setting profile  bg-blue">
		<div class="row clearfix">
			
			<div class="group-users-names">Название рабочей области</div>
			<div class="group-users-role">Преподаватель</div>
			<div class="group-users-meneger">Участник</div>
			<div class="group-users-action">Изменить тему</div>
		</div>
	</div>	
	

	<?
	$db = new Db();

	for ($i=0; $i < count($data["all_workspaces"]) ; $i++) { 
		
		$student = $db-> db_query_param_where_column("students", "id_student", $data["all_workspaces"][$i]['id_student'], "id_user, id_student, id_group");
		$user = $db-> db_query_param_where_column("users", "id_user", $student[0]['id_user'], "id_user, name_user, surname_user, patronymic_user");

		$teacher = $db-> db_query_param_where_column("teachers", "id_teachers", $data["all_workspaces"][$i]['id_teachers'], "id_user");
		$user_teacher = $db-> db_query_param_where_column("users", "id_user", $teacher[0]['id_user'], "id_user, name_user, surname_user, patronymic_user");
		
		//var_dump($data["all_workspaces"]);
		echo "
		<div class='content-group-my-setting profile'>
		<div class='row clearfix' >
		
		<div class='group-users-names'><a href='/my/dashboard/".$data['all_workspaces'][$i]['id_workspace']."'>".$data['all_workspaces'][$i]['name_workspace']."</a></div>
		<div class='group-users-role'><a href='/user/id/".$user_teacher[0]['id_user'] ."'>".$user_teacher[0]['surname_user']." ".$user_teacher[0]['name_user']."</a></div>

		<div class='group-users-meneger'><a href='/user/id/".$user[0]['id_user'] ."'>".$user[0]['surname_user']." ".$user[0]['name_user']."</a></div>
		<div class='group-users-action'>
		<a href='/groups/thetheme/".$student[0]['id_group']."'>
		<span class='svg-icon' style='float: none;'>
		<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'>
		<path d='M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z'/>
		<path d='M0 0h24v24H0z' fill='none'/>
		</svg>
		</span>
		</a>
		<div class='dropdown-menu-action clearfix'>

		<div class='dropdown-menu-action-row clearfix'>
		<div class='dropdown-menu-action-icon'>
		<span class='svg-icon '>
		<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'>
		<path d='M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z'/>
		<path d='M0 0h24v24H0z' fill='none'/>
		</svg>
		</span>
		</div>
		<div class='dropdown-menu-action-name'>Редактировать</div>
		</div>

		<div class='dropdown-menu-action-row clearfix'>
		<div class='dropdown-menu-action-icon'>
		<span class='svg-icon '>
		<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'>
		<path d='M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z'/>
		<path d='M0 0h24v24H0z' fill='none'/>
		</svg>
		</span>
		</div>
		<div class='dropdown-menu-action-name'>Удалить</div>
		</div>

		<div class='dropdown-menu-action-row clearfix'>
		<div class='dropdown-menu-action-icon'>
		<span class='svg-icon '>


		<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'>
		<path d='M0 0h24v24H0z' fill='none'/>
		<path d='M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM4 12c0-4.42 3.58-8 8-8 1.85 0 3.55.63 4.9 1.69L5.69 16.9C4.63 15.55 4 13.85 4 12zm8 8c-1.85 0-3.55-.63-4.9-1.69L18.31 7.1C19.37 8.45 20 10.15 20 12c0 4.42-3.58 8-8 8z'/>
		</svg>


		</span>
		</div>
		<div class='dropdown-menu-action-name'>Заблокировать</div>
		</div>
		</div>
		</div>
		</div>
		</div>	
		";
	}


	?>











	
</div>