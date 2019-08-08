<?
class Model_generation extends Model
{
	public function NewVkrPlanDocument($param)
	{
		$db = new Db();

		$execution_plan = $db -> db_query_param_where_column("workspaces", "id_workspace", $param, "id_student, execution_plan");
		$id_student_group = $db -> db_query_param_where_column("students", "id_student", $execution_plan[0]["id_student"], "id_group");
		$name_group = $db -> db_query_param_where_column("groups", "id_group", $id_student_group[0]["id_group"], "name_group");
		$name_group = $name_group[0]["name_group"];
		$execution_plan = unserialize($execution_plan[0]["execution_plan"]);

		?>
		<script type="text/javascript">
			window.print();
		</script>
		<table border="1" width="100%" style='border-collapse: collapse'>
			<caption style='font-size: 20px;'>График выполнения ВКР</caption>
			<tr>
				<th>Этап</th>
				<th>Дата</th>
				<th>Описание действий</th>


			</tr>
			<?
			$e = 1;
			
			for ($i=0; $i < count($execution_plan["new_date_plan_array"]); $i++) { 
				echo "<tr>
				<td style='padding:5px'>".$e."</td>
				<td style='padding:5px'>до ".$execution_plan["new_date_plan_array"][$i]."</td>
				<td style='padding:5px'>".$execution_plan["new_date_text_array"][$i]."</td>
				
				</tr>";
				$e++;
			}
			?>

			
			<tr>
				<td style='padding:5px; color:red'>Всего: <?echo count($execution_plan["new_date_plan_array"])?></td>
				<td style='padding:5px'></td>
				<td style='padding:5px'></td>
				
			</tr>
		</table>


		<?






		/*$phpWord = new  \PhpOffice\PhpWord\PhpWord();
		$document = $phpWord->loadTemplate("./assets/files/generation_templates/vkr_plan.docx"); //шаблон
		$document->setValue('vkr_group_name', $name_group[0]["name_group"]); //Название группы
		
		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="first.docx"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
		
		
		$document->saveAs("php://output"); //имя заполненного шаблона для сохранения*/
	}
	public function NewlistStudentPrint($param)
	{
		$db = new Db();
		$groups_name = $db -> db_query_param_where_column("groups", "id_group", $param, "name_group");
		$name_specialty = $db -> db_query_param_where_column("specialties", "id_group", $param, "name_specialty");
		$groups_student = $db -> db_query_param_where_column("students", "id_group", $param);
		$info_user = [];
		for ($i=0; $i < count($groups_student); $i++) { 
			$info_user[$i] = $db -> db_query_param_where_column("users","id_user", $groups_student[$i]["id_user"], "name_user, surname_user, patronymic_user, phone_user, email_user");
		}

		?>
		<script type="text/javascript">
			window.print();
		</script>
		<table border="1" width="100%" style='border-collapse: collapse'>
			<caption style='font-size: 20px;'>Студенты группы <?echo $groups_name[0]["name_group"]?> , 4  курс</caption>
			<tr>
				<th>ФИО</th>
				<th>Специальность</th>
				<th>Зачетная книжка</th>
				<th>Телефон</th>
				<th>Почта</th>

			</tr>
			<?
			for ($i=0; $i < count($info_user); $i++) { 
				echo "<tr>
				<td style='padding:5px'>".$info_user[$i][0]["surname_user"]." ".$info_user[$i][0]["name_user"]." ".$info_user[$i][0]["patronymic_user"]."</td>
				<td style='padding:5px'>".$name_specialty[0]["name_specialty"]."</td>
				<td style='padding:5px'>№ ".$groups_student[$i]["record_book_student"]."</td>
				<td style='padding:5px'>".$info_user[$i][0]["phone_user"]."</td>
				<td style='padding:5px'> ".$info_user[$i][0]["email_user"]."</td>
				
				</tr>";
			}
			?>

			
			<tr>
				<td style='padding:5px; color:red'>Всего: <?echo count($info_user)?></td>
				<td style='padding:5px'></td>
				<td style='padding:5px'></td>
				<td style='padding:5px'></td>
				<td style='padding:5px'></td>
			</tr>
		</table>


		<?
	}

	public function listStudent_for_teacher($param, $teacher)
	{
		$db = new Db();

		if ($id_teachers = $db -> db_query_param_where_column("teachers", "id_user", $teacher, "id_teachers") ) {
			$name_specialty = $db -> db_query_param_where_column("specialties", "id_group", $param, "name_specialty");

			$groups_name = $db -> db_query_param_where_column("groups", "id_group", $param, "name_group");
			$array_All_id_student =  $db -> db_query_param_where_column("students", "id_group", $param, "id_student");
			
			for ($i=0; $i < count($array_All_id_student); $i++) { 
				$sql_group_info_student .= "SELECT id_workspace, id_student FROM workspaces WHERE id_teachers = '".$id_teachers[0]['id_teachers']."' AND id_student = '".$array_All_id_student[$i]['id_student']."' UNION ";
			}
			$sql_group_info_student = substr($sql_group_info_student, 0, -6);

			$array_All_Group_user =  $db -> db_composite_query($sql_group_info_student);

			$groups_info = $db -> db_query_param_where_column("groups","id_group", $param);
			$user_teachers_info = $db -> db_query_param_where_column("users","id_user", $teacher, "name_user, surname_user, patronymic_user");


			$id_user_manager =  $db -> db_query_param_where_column("managers","id_manager", $groups_info[0]['id_manager'], "id_user");

			$user_teachers_manager = $db -> db_query_param_where_column("users","id_user", $id_user_manager[0]['id_user'], "id_user, name_user, surname_user, patronymic_user");

			$array_All_Group_info = array(
				"array_All_Group_user" => $array_All_Group_user,
				"groups_info" => $groups_info,
				"user_teachers_info" => $user_teachers_info,
				"user_teachers_manager" => $user_teachers_manager
			);

			for ($i=0; $i < count($array_All_Group_info["array_All_Group_user"]); $i++) { 
				$info_user[$i] = $db -> db_query_param_where_column("students","id_student", $array_All_Group_info["array_All_Group_user"][$i]["id_student"], "id_user");
			}

			for ($i=0; $i < count($info_user); $i++) { 
				$info_user_full[$i] = $db -> db_query_param_where_column("users","id_user", $info_user[$i][0]["id_user"],"name_user, surname_user, patronymic_user, phone_user, email_user");
			}


			?>
			<script type="text/javascript">
				window.print();
			</script>
			<table border="1" width="100%" style='border-collapse: collapse'>
				<caption style='font-size: 20px;'>Студенты группы <?echo $groups_name[0]["name_group"]?> , 4  курс <br>
					ИНФОРМАЦИЯ ПО РАБОЧЕЙ ОБЛАСТИ<br>
					Преподаватель: <?echo $array_All_Group_info["user_teachers_info"][0]["surname_user"]." ".$array_All_Group_info["user_teachers_info"][0]["name_user"] ." ".$array_All_Group_info["user_teachers_info"][0]["patronymic_user"] .""?> <br>
					Менеджер: <?echo $array_All_Group_info["user_teachers_manager"][0]["surname_user"]." ".$array_All_Group_info["user_teachers_manager"][0]["name_user"] ." ".$array_All_Group_info["user_teachers_manager"][0]["patronymic_user"] .""?></caption>
					<tr>
						<th>ФИО</th>
						<th>Специальность</th>
						<th>Зачетная книжка</th>
						<th>Телефон</th>
						<th>Почта</th>

					</tr>
					<?
					for ($i=0; $i < count($info_user_full); $i++) { 
						echo "<tr>
						<td style='padding:5px'>".$info_user_full[$i][0]["surname_user"]." ".$info_user_full[$i][0]["name_user"]." ".$info_user_full[$i][0]["patronymic_user"]."</td>
						<td style='padding:5px'>".$name_specialty[0]["name_specialty"]."</td>
						<td style='padding:5px'>№ ".$groups_student[$i]["record_book_student"]."</td>
						<td style='padding:5px'>".$info_user_full[$i][0]["phone_user"]."</td>
						<td style='padding:5px'> ".$info_user_full[$i][0]["email_user"]."</td>

						</tr>";
					}
					?>


					<tr>
						<td style='padding:5px; color:red'>Всего: <?echo count($info_user_full)?></td>
						<td style='padding:5px'></td>
						<td style='padding:5px'></td>
						<td style='padding:5px'></td>
						<td style='padding:5px'></td>
					</tr>
				</table>


				<?

			}
		}

		public function new_order_vkr($id_group)
		{
			
			$db = new Db();
			$specialtie_info = $db -> db_query_param_where_column("specialties", "id_group", $id_group);
			$users_group = $db -> db_query_param_where_column("students", "id_group", $id_group);


			?>
			<script type="text/javascript">
				window.print();
			</script>
			<link rel="stylesheet" href="/assets/css/normalize.css">
			<link rel="stylesheet" href="/assets/css/style.css?v=<?echo microtime();?>">
			<link rel="stylesheet" href="/assets/css/main.css?v=<?echo microtime();?>">
			<div class="document">
				<div class="header-img"><img src="../../assets/img/document_templates/shapka.png" alt=""></div>
				<div class="body-text">
					Нижеперечисленным студентам 4 курса очной формы обучения, Ярославского филиала РЭУ им. Г. В. Плеханова, обучающимся по образовательной программе бакалавриата по направлению подготовки «<?echo $specialtie_info[0]["name_specialty"]?>» профиль «<?echo $specialtie_info[0]["Profile"]?>», утвердить темы выпускных квалификационных работ и назначить научных руководителей:
				</div>
				<div class="body-table">
					<table border="1" width="100%" style='border-collapse: collapse; font-size: 20px;  white-space: pre-wrap;'>

						<tr>
							<th>№ <br> п/п</th>
							<th>ФИО студента</th>
							<th>Тема выпускной квалификационной работы</th>
							<th>Научный руководитель</th>
							<th>Кафедра</th>

						</tr>
						<?
						$e = 1;
						for ($i=0; $i < count($users_group); $i++) { 

							$workspace_user =$db -> db_query_param_where_column("workspaces", "id_student", $users_group[$i]["id_student"]);
							$user_info = $db -> db_query_param_where_column("users", "id_user", $users_group[$i]["id_user"]);
							$id_user_teacher = $db -> db_query_param_where_column("teachers", "id_teachers", $workspace_user[0]["id_teachers"]);
							$teacher_info = $db -> db_query_param_where_column("users", "id_user", $id_user_teacher[0]["id_user"]);
							
							echo "<tr>
							<td style='padding:5px;     vertical-align: sub;'>".$e."</td>
							<td style='padding:5px;     vertical-align: sub;'>".$user_info[0]["surname_user"]." ".$user_info[0]["name_user"]." ".$user_info[0]["patronymic_user"]."</td>
							<td style='padding:5px; width: 30%;     vertical-align: sub;' > ".$users_group[$i]["theme_vkr"]."</td>
							<td style='padding:5px;     vertical-align: sub;'>".$teacher_info[0]["surname_user"]." ".$teacher_info[0]["name_user"]." ".$teacher_info[0]["patronymic_user"]."</td>
							<td style='padding:5px;     vertical-align: sub;'>ИиМ</td>

							</tr>";
							$e++;
						}
						?>



					</table>

				</div>
				<div class="header-img"><img src="../../assets/img/document_templates/footer.png" alt=""></div>
			</div>


			<?
		}

	}