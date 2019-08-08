<div class='content'>
	<div class='content-group-my-setting padding-0'>

		<div class='row padding-0 clearfix flex-justify-center'>
			<div class='row-1 padding-0 clearfix profile '>
				<div class='row  clearfix'>
					<div class='row-all flex-align-center clearfix'>
						<span class='title-span'>Темы ВКР</span>
					</div>
				</div>
				<div class='row-all  clearfix'>
					<form action="/groups/sevetheme/" method="post" >
						<?
						$db = new Db();


						for ($i=0; $i < count($data); $i++) { 
							$id_user = $db -> db_query_param_where_column("students", "id_student", $data[$i][0]["id_student"], "id_user");
							$user_FIO = $db -> db_query_param_where_column("users", "id_user", $id_user[0]["id_user"], "name_user, surname_user, patronymic_user");
							echo "						<div class='row clearfix'>
							<div class='row-3'>".$user_FIO[0]["surname_user"]." ".$user_FIO[0]["name_user"]." ".$user_FIO[0]["patronymic_user"]."</div>
							<div class='row-1'><input type='text' class='textarea-chat' name='new_theme_vkr[".$data[$i][0]["id_student"]."]' placeholder='Название ВКР' value='".$data[$i][0]["theme_vkr"]."' ></div>	
							</div>";
						}
						?>

						<div class="row clearfix ">
							<div class="row-1"> <a href="/new/user">Очистить</a></div>
							<div class="row-3"><input type="submit" class='new-message float-right' value="Сохранить">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>