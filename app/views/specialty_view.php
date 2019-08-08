<div class='content'>
	<div class='content-group-my-setting padding-0'>
		<div class='row padding-0 clearfix'>
			<div class='row-2 flex-align-center clearfix'>
				<span class='title-span'>Специальности</span>
				<span class='count-my'>Всего: <span class='count_user'><?echo count($data)?></span></span>


			</div>
			<div class='row-2'>
				<a href='/new/specialtie' class='button color-violet float-right'>Добавить</a>	

			</div>
		</div>
	</div>


	
	<div class="content-group-my-setting profile  bg-blue">
		<div class="row clearfix">
			
			<div class="group-users-names">Название </div>
			<div class="group-users-role">Курс</div>
			<div class="group-users-meneger">Группа</div>
			<div class="group-users-action">Действия</div>
		</div>
	</div>	
	

	<?
	$db = new Db();
	for ($i=0; $i < count($data) ; $i++) { 
		$name_group = $db -> db_query_param_where_column("groups", "id_group",$data[$i]['id_group']);
		echo "
		<div class='content-group-my-setting profile role_".$data[$i]['id_role_user']."'>
		<div class='row clearfix' >
		
		<div class='group-users-names'>".$data[$i]['name_specialty']."</div>
		<div class='group-users-role'>".$data[$i]['id_course']."</div>
		<div class='group-users-meneger'><a href='/groups/id/".$name_group[0]['id_group']."'>".$name_group[0]['name_group']."</a></div>
		<div class='group-users-action float-right'>
		

		<a href='/edit/specialty/".$data[$i]['id_specialty']."' class='action__'>
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
	
</div>