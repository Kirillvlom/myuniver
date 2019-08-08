<?
$db = new Db();
$theme = $db->db_query_param_where_column("workspaces", "id_student", $data, "teme");
?>
<div class='content'>
	<div class='content-group-my-setting padding-0'>

		<div class='row padding-0 clearfix flex-justify-center'>
			<div class='row-1 padding-0 clearfix profile '>
				<div class='row  clearfix'>
					<div class='row-all flex-align-center clearfix'>
						<span class='title-span'>Изменить тему пользователя</span>
					</div>
				</div>
				<div class='row-all  clearfix'>
					<form action="/new/teme/<?echo $data?>" method="post">
						<div class="row clearfix">
							<div class="row-3">Название темы</div>

							<div class="row-1"><input type="text" class='textarea-chat' name='new_teme_workspace' placeholder="Название темы"  value="<?echo $theme[0]["teme"]?>"></div>	
						</div>
						<div class="row clearfix ">
							<div class="row-1"> <a href="">Очистить</a></div>
							<div class="row-3"><input type="submit" class='new-message float-right' value="Сохранить">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>