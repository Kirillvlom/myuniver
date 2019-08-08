<div class='content'>
	<div class='content-group-my-setting padding-0'>

		<div class='row padding-0 clearfix flex-justify-center'>
			<div class='row-1 padding-0 clearfix profile '>
				<div class='row  clearfix'>
					<div class='row-all flex-align-center clearfix'>
						<span class='title-span'>Редактировать специальность</span>
					</div>
				</div>
				<div class='row-all  clearfix'>
					<form action="/edit/specialtieSave/<?
							echo $data[0]['id_specialty']
							?>" method="post" id='new_specialtie'>
						<div class="row clearfix">
							<div class="row-3">Название специальности</div>
							<div class="row-1"><input type="text" class='textarea-chat' name='new_name_specialty' placeholder="Название" value="<?
							echo $data[0]['name_specialty']
							?>" ></div>	
						</div>
						
						<div class="row clearfix ">
							<div class="row-1"> <a href="/new/specialtie">Очистить</a></div>
							<div class="row-3"><input type="submit" class="new-message float-right" value="Сохранить">
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>