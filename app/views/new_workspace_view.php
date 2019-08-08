<?$db = new Db();?>
<div class='content'>
	<div class='content-group-my-setting padding-0'>

		<div class='row padding-0 clearfix flex-justify-center'>
			<div class='row-1 padding-0 clearfix profile '>
				<div class='row  clearfix'>
					<div class='row-all flex-align-center clearfix'>
						<span class='title-span'>Добавить рабочую область</span>
					</div>
				</div>
				<div class='row-all  clearfix'>
					<form action="/new/workspaceAdd" method="post" enctype="multipart/form-data" id='new_workspace'>
						<div class="row clearfix">
							<div class="row-3">Название рабочей области</div>
							<div class="row-1"><input type="text" class='textarea-chat' name='new_name_workspace' placeholder="Название" ></div>	
						</div>

						<div class="row clearfix">
							<div class="row-3">Срок сдачи</div>
							<div class="row-1"><input type="date" class='textarea-chat' name='new_deadline' placeholder="Срок сдачи" ></div>	
						</div>

						<div class="row clearfix ">
							<div class="row-3">Преподаватель</div>
							<div class="row-1">
								
								<select name="new_id_teachers" id="">
									<?
									var_dump($data["arrayTeachers"]);
									for ($i=0; $i <  count($data["arrayTeachers"]); $i++) { 
										$userinfo = $db -> db_query_param_where_column("users", "id_user", $data["arrayTeachers"][$i]["id_user"], "id_user, name_user, surname_user, patronymic_user ");
										echo "<option value='".$data['arrayTeachers'][$i]['id_teachers']."'>".$userinfo[0]['surname_user']." ".$userinfo[0]['name_user']." ".$userinfo[0]['patronymic_user']."</option>";
									}
									?>
								</select>
							</div>
						</div>

						

						<div class="row clearfix ">
							<div class="row-3">Специальность</div>
							<div class="row-1">
								
								<select name="" id="" class='specialty_select'>
									<?

									for ($i=0; $i <  count($data["arraySpecialties"]); $i++) { 
										
										echo "<option value='".$data['arraySpecialties'][$i]["id_specialty"]."'>".$data['arraySpecialties'][$i]['name_specialty']."</option>";
									}
									?>
								</select>
							</div>
						</div>


						<div class="row clearfix ">
							<div class="row-3">Группа </div>
							<div class="row-1">
								
								<select name="groups_workspace" id="groups_workspace">
									
								</select>
							</div>
						</div>

						<!--<div class="row clearfix ">
							<div class="row-3">Участники</div>
							<div class="row-1">
								<div class="row-2">


									<div class="row-all clearfix">
										Прикрепленные студенты
									</div>

									<div class="row-list-attached-students margin-10-0  " id='student_workspace'>
										
									</div>
								</div>
								<div class="row-2">
									<div class="row-all clearfix">
										Прикрепленные студенты
									</div>
									<div class="row-list-attached-students margin-10-0 ">
										<div class="attached-students">
											<div class="attached-students-delete bg-light-red">
												
												<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" >
													<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
													<path d="M0 0h24v24H0z" fill="none"/>
												</svg>

											</div>
											<div class="attached-students-name">
												<a href="">Толелев Кирилл Сергеевич</a>
											</div>
										</div>
									</div> ->
								</div>
								
							</div>
						</div> -->

						<div class="row clearfix ">
							<div class="row-3">Описание</div>
							<div class="row-1">
								
								<textarea name="new_description" id="" class='textarea-new-workspace' cols="30" rows="10"></textarea>
							</div> 
						</div>

						<div class="row clearfix ">
							<div class="row-3">Материалы</div>
							<div class="row-1">
								<label for="new_material" class="new_doc_button bg-light-lilac">Загрузить материалы</label>
								<label for="new_document" class="new_doc_button bg-light-lilac">Загрузить документы</label>

								<input type="file" name='new_material_1[]' class='file-profile' id='new_material' multiple="true">
								<input type="file" name='new_material_2[]' class='file-profile' id='new_document' multiple="true">

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
								
								

							</div>

						</div>

						<div class="row clearfix ">
							<div class="row-1"> <a href="/new/user">Очистить</a></div>
							<div class="row-3"><input type="submit" class="new-message float-right" value="Добавить">
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>