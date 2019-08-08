<div class='content'>
	<div class='content-group-my-setting padding-0'>
		<div class='row padding-0 clearfix'>
			<div class='row-2 flex-align-center clearfix'>
				<span class='title-span'>Группы</span>
				<span class='count-my'>Всего: <?echo count($data["all_groups"])?></span>


			</div>
			<div class='row-2'>
				<a href='/new/group' class='button color-violet float-right'>Добавить</a>
				
			</div>
		</div>
	</div>

	
	
	<div class="content-group-my-setting profile  bg-blue">
		<div class="row clearfix">
			
			<div class="group-users-names">Название группы</div>
			<div class="group-users-role">Участников</div>
			<div class="group-users-meneger">Менеджер</div>
			<div class="group-users-action">Действия</div>
		</div>
	</div>	
	

	<?
	$db = new Db();

	for ($i=0; $i < count($data["all_groups"]) ; $i++) { 

		$count = $db -> db_query_param_where_column("students", "id_group",$data['all_groups'][$i]['id_group'], "id_student");

		$meneger = $db-> db_query_param_where_column("managers", "id_manager", $data["all_groups"][$i]['id_manager'], "id_user");

		$user = $db-> db_query_param_where_column("users", "id_user", $meneger[0]['id_user'], "id_user, name_user, surname_user, patronymic_user");
		echo "
		<div class='content-group-my-setting profile'>
		<div class='row clearfix' >
		
		<div class='group-users-names'><a href='/groups/id/".$data['all_groups'][$i]['id_group']."'>".$data['all_groups'][$i]['name_group']."</a></div>
		<div class='group-users-role'>";
		if ($count){ 
			echo count($count);
			
		} else{
			echo "0";
		}

		echo "</div>
		<div class='group-users-meneger'>
		<a href='/user/id/".$user[0]['id_user'] ."'>".$user[0]['surname_user']." ".$user[0]['name_user']."</a></div>
		<div class='group-users-action'>

		

		
		<a href='/edit/group/".$data["all_groups"][$i]["id_group"]."' class='action__'>
		<span class='svg-icon' style='float: none;'>
		
		<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'>
		<path d='M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z'/>
		<path d='M0 0h24v24H0z' fill='none'/>
		</svg>

		
		</span>
		</a>

		
		</span>

		</div>
		</div>
		</div>	
		";
	}


	?>










	<!--<table width="100%">
		<thead>
			<tr class='content-group-my-setting  clearfix flex-align-center-justify-space-between ' width='100%'>
				<td class="group-users-checkbox"></td>
				<td class="group-users-names">ФИО</td>
				<td class="group-users-role">Тип учетки</td>
				<td class="group-users-form">Форма обучения</td>
				<td class="group-users-type-education">Впо / Спо </td>
				<td class="group-users-type-course">Курс</td>
				<td class="group-users-groups">Группа</td>
			</tr>
		</thead>
		<tbody>
			<tr>
			<td>Толелев Кирилл Сергеевич</td>
			<td>Студент</td>
			<td>Очное</td>
			<td>Спо</td>
			<td>4</td>
			<td>ЯР-ДЛИ-401</td>
			<td><span class='svg-icon' style="float: none;">
				
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
					<path d="M0 0h24v24H0z" fill="none"/>
					<path d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
				</svg>
				https://dribbble.com/shots/3228142-CRM-Tickets-Ticket-Info/attachments/690810
			</span></td>
			</tr>
		</tbody>
	</table>-->

	
</div>