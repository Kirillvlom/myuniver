<div class='content'>
	<div class='content-group-my-setting padding-0'>
		<div class='row padding-0 clearfix'>
			<div class='row-2 flex-align-center clearfix'>
				<span class='title-span'>Пользователи</span>
				<span class='count-my'>Всего: <span class='count_user'><?echo count($data)?></span></span>
			<!--	<div class='sort-my flex-align-center'>Сортировать по: <select name='' id='' class='select-sort'>
					<option value=''>А - Я</option> 
					<option value=''>Я - А</option> 

				</select></div> -->

			</div>
			<div class='row-2'>
				
				<a href='/new/user' class='button color-violet float-right'>Добавить</a>
				<div  class='button color-write float-right filter-modal'>Фильтр 
					
				</div>
				<div  class='filter-modal-alert '>
					<div class="row-all"><button class='button-action-content-group margin-10 0 s open_role_1'>Студенты</button></div>
					<div class="row-all"><button class='button-action-content-group margin-10 0 s open_role_2'>Преподаватели</button></div>
					<div class="row-all"><button class='button-action-content-group margin-10 0 s open_role_3'>Менеджеры</button></div>
					<div class="row-all"><button class='button-action-content-group margin-10 0 s open_role_all'>Все</button></div>

					
				</div>
				

			</div>
		</div>
	</div>


	
	<div class="content-group-my-setting profile  bg-blue">
		<div class="row clearfix">
			<div class="group-users-checkbox "><input type="checkbox" disabled></div>
			<div class="group-users-names">ФИО</div>
			<div class="group-users-role">Тип учетки</div>
			<div class="group-users-action">Действия</div>
		</div>
	</div>	
	

	<?
	$db = new Db();
	for ($i=0; $i < count($data) ; $i++) { 
		$name_role_user = $db -> db_query_param_where_column("roleof", "id_role",$data[$i]['id_role_user']);
		echo "
		<div class='content-group-my-setting profile role_".$data[$i]['id_role_user']."' >
		<div class='row clearfix' >
		<div class='group-users-checkbox '><input type='checkbox' name='usersid[]' value='".$data[$i]['id_user']."' disabled></div>
		<div class='group-users-names'><a href='/user/id/".$data[$i]['id_user']."'>".$data[$i]['surname_user']." ".$data[$i]['name_user']." ".$data[$i]['patronymic_user']."</a></div>
		<div class='group-users-role'>".$name_role_user[0]['name_role']."</div>
		<div class='group-users-action float-right'>
		
		
		<a href='/edit/user/".$data[$i]['id_user']."' class='action__'>
		<span class='svg-icon' style='float: none;'>
		<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'>
		<path d='M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z'/>
		<path d='M0 0h24v24H0z' fill='none'/>
		</svg>
		</span>
		</a>
		
		
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