<?$db = new Db();
?>
<div class='content'>
	<div class='content-group-my-setting padding-0'>

		<div class='row padding-0 clearfix flex-justify-center'>
			<div class='row-1 padding-0 clearfix profile '>
				<div class='row  clearfix'>
					<div class='row-all flex-align-center clearfix'>
						<span class='title-span'>Добавление участников из группы</span>
					</div>
				</div>
				<div class='row-all  clearfix'>
					<form action="/edit/groupAddUser/<?echo $data["id_group"]?>" method="post">
						<div class="row clearfix">
							<div class="row-3">Название группы</div>
							<div class="row-1"><input type="text" class='textarea-chat' name='new_name_group' placeholder="Название" value="<?echo $data["name_group"][0]["name_group"]?>" ></div>	
						</div>

						<div class="row clearfix ">
							<div class="row-3">Студенты</div>
							<div class="row-1">
								<div class="row-2">
									<div class="row-all clearfix">
										Прикрепленные студенты
									</div>

									<div class="row-list-attached-students margin-10-0  " id='student_workspace'>
										<?
								
										
										for ($i=0; $i < count($data['arrayStudens']) ; $i++) {
											$userinfo = $db -> db_query_param_where_column("users", "id_user", $data["arrayStudens"][$i]["id_user"], "id_user, name_user, surname_user, patronymic_user ");

											if ($data['arrayStudens'][$i]['id_group'] AND $data['arrayStudens'][$i]['id_group'] == $data["id_group"] ) {
												
											}elseif(!$data['arrayStudens'][$i]['id_group']){

												echo "<input type='checkBox'  class='arrayUser_checkBox' name='arrayUser[]' value='".$data['arrayStudens'][$i]["id_student"]."'>".$userinfo[0]['surname_user']." ".$userinfo[0]['name_user']." ".$userinfo[0]['patronymic_user']." <br>";
											}
											
										}
				
										?>
									</div>






									
								</div>
								<div class="row-2">
									<!--<div class="row-all clearfix">
										Прикрепленные студенты
									</div>
									<div class="row-list-attached-students margin-10-0 ">
										<div class="attached-students">
											<input type="hidden" name='new_array_students' value="">
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
									</div> -->
								</div>
								
							</div>
						</div>

						

						

						

						

						

						<div class="row clearfix ">
							<div class="row-1"> <a href="/edit/group/<?echo $data["id_group"]?>">Удалить участников</a></div>
							<div class="row-3"><input type="submit" class="new-message float-right" value="Добавить">
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>