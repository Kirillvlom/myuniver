<?

$db = new Db();
$array_materials_for_the_field = $db -> db_query_param_where_column("materials_for_the_field", "id_workspace", $data["array_workspace"][0]["id_workspace"]);
$teacher = $db -> db_query_param_where_column("teachers", "id_teachers",$data['array_workspace'][0]["id_teachers"], "id_user");
$teacher_info  = $db -> db_query_param_where_column("users", "id_user",$teacher[0]["id_user"], "id_user, name_user, surname_user,patronymic_user ");

$theme = $db->db_query_param_where_column("workspaces", "id_workspace", $data['array_workspace'][0]["id_workspace"], "teme, id_student");

$student_info  = $db -> db_query_param_where_column("students", "id_student",$theme[0]["id_student"], "id_user, theme_vkr");
$student_info_full  = $db -> db_query_param_where_column("users", "id_user",$student_info[0]["id_user"], "id_user, name_user, surname_user,patronymic_user ");

?>
<div class='content'>
	<div class="row clearfix">
		<div class="row-3 ">
			<div class="row profile margin-10-0 padding-0">
				<?php if ($_SESSION['user']['access_role'] == '20'): ?>
					<div class="row  bg-red" style="text-align: center; margin-bottom: 2px; "><a href="/edit/dashboard/<?echo $data['array_workspace'][0]["id_workspace"]?>" style="color:#fff;">Редактировать область</a></div>
				<?php endif ?>
				<div class="row row-title bg-blue">Дипломная работа	</div>
				<div class="row row-info clearfix">
					<div class="row-2">Преподаватель</div>
					<div class="row-2"><a href="/user/id/<? echo $teacher_info[0]["id_user"] ?>"><?
					echo $teacher_info[0]["surname_user"]." ".$teacher_info[0]["name_user"]." ".$teacher_info[0]["patronymic_user"];
					?></a></div>
				</div>
				<div class="row row-info clearfix">
					<div class="row-2">Студент</div>
					<div class="row-2"><a href="/user/id/<? echo $student_info[0]["id_user"] ?>"><?
					echo $student_info_full[0]["surname_user"]." ".$student_info_full[0]["name_user"]." ".$student_info_full[0]["patronymic_user"];
					?></a></div>
				</div>

				<div class="row row-info clearfix">
					<div class="row-2">Название области</div>
					<div class="row-2"><?echo $data['array_workspace'][0]['name_workspace']?></div>
				</div>

				<div class="row row-info clearfix">
					<div class="row-2">Тема ВКР</div>
					<div class="row-2"><?  echo $student_info[0]["theme_vkr"]?></div>
				</div>

				<div class="row row-info clearfix">
					<div class="row-2">Срок сдачи</div>
					<div class="row-2"><?echo $data['array_workspace'][0]['deadline']?></div>
				</div>

				<div class="row row-info clearfix">
					<div class="row-2">Дата создания</div>
					<div class="row-2"><?echo $data['array_workspace'][0]['date_of_creation']?></div>
				</div>
			</div>
			<div class="row profile margin-10-0 padding-0">
				<div class="row row-title bg-blue">План выполенения работы</div>
				<div class="row clearfix">
					<?
					$plan_array = unserialize($data['array_workspace'][0]['execution_plan']);
					$e = 1;
					for ($i=0; $i < count($plan_array['new_date_plan_array']); $i++) { 
						echo "	<div class='row clearfix flex-align-center'>
						<div class='row-checklist'>$e</div>
						<div class='row-checklist'>".$plan_array['new_date_text_array'][$i]."</div>
						<div class='row-checklist'>до ".$plan_array['new_date_plan_array'][$i]."</div>
						</div>";
						$e++;
					}
					?>

				</div>
				<?php if ($_SESSION['user']['access_role'] == '20' OR $_SESSION['user']['access_role'] == "30" ): ?>
					<div class="row row-title bg-red" style="text-align: center;">
						<a href="/generation/vkr_plan/<?echo $data['array_workspace'][0]["id_workspace"]?>" style="color:#fff;"  target="_blank">Сформировать график ВКР</a>
					</div>
				<?php endif ?>
				
			</div>

			<div class='row profile margin-10-0 padding-0'>
				<div class='row row-title bg-blue'>Материалы к рабочей области</div>
				<?
				for ($i=0; $i < count($array_materials_for_the_field); $i++) { 
					if ($array_materials_for_the_field[$i]["type_material"] == "1" AND $array_materials_for_the_field[$i]["name_materials_for_the_field"]) {

						echo "
						
						<div class='row clearfix'>
						<a href='../../".$array_materials_for_the_field[$i]["document_materials_for_the_field"]."' download=''>".$array_materials_for_the_field[$i]["name_materials_for_the_field"]."</a>
						</div>
						";
					}

					

				}
				?>

			</div>

			<div class="row profile margin-10-0 padding-0">
				<div class="row row-title bg-blue">Документы к рабочей области</div>
				<?
				for ($i=0; $i < count($array_materials_for_the_field); $i++) { 
					if ($array_materials_for_the_field[$i]["type_material"] == "2" AND $array_materials_for_the_field[$i]["name_materials_for_the_field"]) {

						echo "
						
						<div class='row clearfix'>
						<a href='../../".$array_materials_for_the_field[$i]["document_materials_for_the_field"]."' download=''>".$array_materials_for_the_field[$i]["name_materials_for_the_field"]."</a>
						</div>
						";
					}

					

				}
				?>
			</div>


		</div>

		<div class="row-1 ">
			<div class="row profile margin-10">
				<?echo $data["array_workspace"][0]['description']?>
			</div>
			<div class="row profile margin-10 ">
				
				<div class="row clearfix"><span class='row title-span margin-0-5'><?

				if ($_SESSION['user']['access_role'] == "10" OR  $_SESSION['user']['access_role'] == "30") {
					echo "Файлы студента";
				} elseif ($_SESSION['user']['access_role'] == "10") {
					echo "Мои файлы";
				}
				?> </span></div>
				<div class="row clearfix flex-align-center-justify-space-between">
					<?
					for ($i=0; $i <  count($data["array_workspace_answers"][$i]); $i++) { 
						if ($data["array_workspace_answers"][$i]["user_role"] == "10" AND $data["array_workspace_answers"][$i]["file"]) {
							echo "
							<div class='file_student'>
							<a href='".$data["array_workspace_answers"][$i]["file"]." ' download>".$data["array_workspace_answers"][$i]["file_name"]." </a>
							</div>
							";
						}
						
					}
					?>
					

				</div>
			</div>
			<?php if ($_SESSION['user']['access_role'] == '10' OR  $_SESSION['user']['access_role'] == '20' ): ?>
				<div class="row profile margin-10">
					<form action="/my/newFile_dashboard/<?echo $data['array_workspace'][0]["id_workspace"]?>" method='post' id='my_dashboard' enctype="multipart/form-data">


						<label for="new_document" class="row field-upload" style="width: 100%">Загрузить работу</label>
						<input type="file" name='new_material' class='file-profile' id='new_document' multiple="false">

						<div class="row ">
							<textarea class='field-upload-comment' name="comment" id="" cols="30" rows="10" placeholder="Комментарий"></textarea>
						</div>
						<div class="row ">
							<input type="submit"  class="button color-violet float-right" value="загрузить">
						</div>
					</form>
				</div>
			<?php endif ?>


			<div class="row profile margin-10 ">
				<div class="row clearfix"><span class='row title-span margin-0-5'>История файлов </span></div>

			

				<?

				for ($i=0; $i <  count($data["array_workspace_answers"][$i]); $i++) { 
					if ($data["array_workspace_answers"][$i]["user_role"] == "10") {
						$text_ = "Студент";
					}elseif ($data["array_workspace_answers"][$i]["user_role"] == "20") {
						$text_ = "Преподаватель";
					}
					echo "<div class='row clearfix'>
					<div class='row-3 padding-10'>
					<div class='row-3'>$text_:</div>
					<div class='row-1 flex-justify-right'>".$data["array_workspace_answers"][$i]["date_of_creation"]."</div>
					</div>

					<div class='row-2 padding-10'>".$data["array_workspace_answers"][$i]["comment_text"]."</div>
					<div class='row-3 padding-10'><a href='".$data["array_workspace_answers"][$i]["file"]." ' download>".$data["array_workspace_answers"][$i]["file_name"]." </a></div>
					</div>";
				}


				?>
			


			</div>





		</div>
	</div>
</div>
</div>