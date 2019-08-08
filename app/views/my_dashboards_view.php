<div class='content'>

	<div class='content-group-my-setting padding-0'>
		<div class='row padding-0 clearfix'>
			<div class='row-2 flex-align-center clearfix'>
				<span class='title-span'>Группы области ВПО очки</span>
				<span class='count-my'>Всего: <?echo count($data)?></span>
				

			</div>
			<div class='row-2'>
				
			</div>
		</div>
	</div>
	<div class='content-group-my-setting '>
		<div class='row flex-align-center-justify-space-between'>

			<?
			if ($data) {
				for ($i=0; $i < count($data); $i++) { 
					echo "<div class='row-block-my profile'>
					<a href='/my/dashboard_group/".$data[$i]['id_group']."'>
					<div class='row-block-my-img'><img src='/assets/img/dashboard/material-1-1000x563.jpg' alt=''></div>
					<div class='row-block-my-info-min'>
					<div class='row-block-my-title'>".$data[$i]['name_group']."</div>
					<div class='row-block-my-date clearfix'>
					<div class='row-2'>группа</div>
					<div class='row-2 flex-align-center flex-justify-right'>
					<span class='margin-0-5'>
					<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='#fff'>
					<path d='M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z'></path>
					<path d='M0 0h24v24H0z' fill='none'></path>
					</svg>
					</span>
					<span class='margin-0-5'></span>
					</div>
					</div>
					</div>
					</a>
					</div>";
				}

			}else{
				echo "<div class='row-block-my profile'>

				<div class='row-block-my-img'><img src='/assets/files/dashboard_cover/default_cover.jpg' alt=''></div>
				<div class='row-block-my-info-min'>
				<div class='row-block-my-title'>У вас нет групп </div>
				<div class='row-block-my-date clearfix'>
				<div class='row-2'></div>
				<div class='row-2 flex-align-center flex-justify-right'>
				<span class='margin-0-5'>
				¯\_(ツ)_/¯
				</span>
				<span class='margin-0-5'></span>
				</div>
				</div>
				</div>

				</div>";
			}


			?>
			
		</div>
	</div>
</div>




