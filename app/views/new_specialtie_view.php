<div class='content'>
	<div class='content-group-my-setting padding-0'>

		<div class='row padding-0 clearfix flex-justify-center'>
			<div class='row-1 padding-0 clearfix profile '>
				<div class='row  clearfix'>
					<div class='row-all flex-align-center clearfix'>
						<span class='title-span'>Добавить новую специальность</span>
					</div>
				</div>
				<div class='row-all  clearfix'>
					<form action="/new/specialtieAdd" method="post" id='new_specialtie'>
						<div class="row clearfix">
							<div class="row-3">Название специальности</div>
							<div class="row-1"><input type="text" class='textarea-chat' name='new_name_specialty' placeholder="Название" ></div>	
						</div>


						<div class="row clearfix ">
							<div class="row-3">Курс</div>
							<div class="row-1">
								
								<select name="new_id_course" id="" class='course'>
									<?
									for ($i=0; $i <  count($data["arrayCourse"]); $i++) { 
										if ($data["arrayCourse"][$i]["id_course"] == "4") {
											echo "<option value='".$data["arrayCourse"][$i]["id_course"]."' selected='selected'>".$data["arrayCourse"][$i]["name_course"]."</option>";
										}else{
											echo "<option value='".$data["arrayCourse"][$i]["id_course"]."'disabled >".$data["arrayCourse"][$i]["name_course"]."</option>";
										}


										
									}
									?>
								</select>
							</div>
						</div>
						<div class="row clearfix ">
							<div class="row-3">Группа</div>
							<div class="row-1">
								
								<select name="new_id_group" id="" class=''>
									<?
									for ($i=0; $i <  count($data["arrayGroups"]); $i++) { 
										$db = new Db();
										if (!$db->db_query_param_where_column("specialties", "id_group", $data["arrayGroups"][$i]["id_group"])) {
											echo "<option value='".$data["arrayGroups"][$i]["id_group"]."' >".$data["arrayGroups"][$i]["name_group"]."</option>";
										} else{

										}
			
									}
									?>
								</select>
							</div>
						</div>
						
						<div class="row clearfix ">
							<div class="row-1"> <a href="/new/specialtie">Очистить</a></div>
							<div class="row-3"><input type="submit" class="new-message float-right" value="Добавить">
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>