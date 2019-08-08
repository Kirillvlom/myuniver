<div class='content'>
	<div class='content-group-my-setting padding-0'>

		<div class='row padding-0 clearfix flex-justify-center'>
			<div class='row-1 padding-0 clearfix profile '>
				<div class='row  clearfix'>
					<div class='row-all flex-align-center clearfix'>
						<span class='title-span'>Редактировать рабочую область</span>
					</div>
				</div>
				<div class='row-all  clearfix'>
					<form action="/edit/saveworkspace/<?echo $data[0]["id_workspace"]; ?>" method="post" enctype="multipart/form-data">
						<div class="row clearfix">
							<div class="row-3">Название рабочей области</div>
							<div class="row-1"><input type="text" class='textarea-chat' name='new_name_workspace' placeholder="Название" value="<?echo $data[0]["name_workspace"]?>" ></div>	
						</div>

						<div class="row clearfix">
							<div class="row-3">Срок сдачи</div>
							<div class="row-1"><input type="date" class='textarea-chat' name='new_deadline' placeholder="Срок сдачи" value="<?
							echo $data[0]["deadline"]


							?>" ></div>	
						</div>
						




						<div class="row clearfix ">
							<div class="row-3">Материалы</div>
							<div class="row-1">
								<label for="new_material" class="new_doc_button bg-light-lilac">Добавить материалы</label>
								<label for="new_document" class="new_doc_button bg-light-lilac">Добавить документы</label>

								<input type="file" name='new_material_1[]' class='file-profile' id='new_material' multiple="true">
								<input type="file" name='new_material_2[]' class='file-profile' id='new_document' multiple="true">

							</div> 
						</div>
						<div class="row clearfix ">
							<div class="row-3">Описание</div>
							<div class="row-1">
								
								<textarea name="new_description" id="" class='textarea-new-workspace' cols="30" rows="10"><?
							echo $data[0]["description"];


							?></textarea>
							</div> 
						</div>

						<div class="row clearfix ">
							<div class="row-3">План выполнения работы</div>
							<div class="row-1">
								<div class="row-3">
									<input type="date" class='textarea-chat' name='' placeholder="Дата (10.05 - 12.05)" id='input_date_plan'>
								</div>
								<div class="row-2"><input type="text" class='textarea-chat' name='' placeholder="Краткое описание" id='input_text_plan' ></div>
								
								<div class="row-3"><span class='new_button_plan  bg-light-grean' id='new_button_plan'>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
										<path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
										<path d="M0 0h24v24H0z" fill="none"/>
									</svg>
								</span></div>				
							</div> 
						</div>

						<div class="row clearfix ">
							<div class="row-3">План работы (визуально)</div>
							<div class="row-1 select_plan">
								<?

								$plan_array = unserialize($data[0]['execution_plan']);
								$count = count($plan_array['new_date_plan_array'])-1;
								for ($i = $count ; $i >= 0; $i--) { 
									echo "<div class='row-all clearfix margin-10-0 '>				
									<div class='row-3 padding-10'>		
									<input type='date' class='textarea-chat' name='date_plan_array[]' value='".$plan_array['new_date_plan_array'][$i]."'>		
									</div>		
									<div class='row-2 padding-10'>		
									<input type='text' class='textarea-chat' name='text_plan_array[]' value='".$plan_array['new_date_text_array'][$i]."'>	
									</div>				
									<div class='row-3'>		
									<span class='new_button_plan bg-light-red delete_plan'>		
									<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'>	<path d='M19 13H5v-2h14v2z'></path>		<path d='M0 0h24v24H0z' fill='none'></path>	</svg>		
									</span>		
									</div>					
									</div>";
									$e++;
								}


								?>


							</div>

						</div>

						<div class="row clearfix ">
							<div class="row-1"> <a href="/new/user">.</a></div>
							<div class="row-3"><input type="submit" class="new-message float-right" value="Сохранить">
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>