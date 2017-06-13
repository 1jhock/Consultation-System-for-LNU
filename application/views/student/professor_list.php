<div class="container">
	<ol class="breadcrumb">
		<li>
			<a href="<?=base_url()?>students">Home</a>
		</li>
		
		<li class="active">Professors</li>
	</ol>
</div>
<div class="container-fluid">
	<h1 class="text-center title">Professors by Department</h1>
	<br><br>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<div class="course-container">
				<a href="<?=base_url()?>students/course_list/1">
					<img src="<?=asset_url()?>img/BSIT.jpg" alt="" class="img-responsive course-img center-block">
					
					<div class="overlay center-block">
						<h2 class="text-center title"><i class="fa fa-cloud-upload"></i><br>Computer Education Department</h2> <br>
						<div class="overlay-block">
							<span>
								<span class="badge"><?=$CompEd?></span>&nbsp;&nbsp;Courses
							</span>
							<span>
								<span class="badge"><?=(!empty($stud_count_CompEd)) ? $stud_count_CompEd :0?></span>&nbsp;&nbsp;Students
							</span>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<div class="course-container">
				<a href="<?=base_url()?>students/course_list/2">
					<img src="<?=asset_url()?>img/BSCS.jpg" alt="" class="img-responsive course-img center-block">
					<div class="overlay center-block">
						<h2 class="text-center title"><i class="fa fa-graduation-cap"></i><br>Basic Education Department</h2> <br>
						<div class="overlay-block">
								<span>
									<span class="badge"><?=$BED?></span>&nbsp;&nbsp;Courses
								</span>
								<span>
									<span class="badge"><?=(!empty($stud_count_BED)) ? $stud_count_BED :0?></span>&nbsp;&nbsp;Students
								</span>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<div class="course-container">
				<a href="<?=base_url()?>students/course_list/3">
					<img src="<?=asset_url()?>img/CE.jpg" alt="" class="img-responsive course-img center-block">
					<div class="overlay center-block">
						<h2 class="text-center title"><i class="fa fa-puzzle-piece"></i><br>Mathematics Department</h2> <br>
						<div class="overlay-block">
								<span>
									<span class="badge"><?=$Math?></span>&nbsp;&nbsp;Courses
								</span>
								<span>
									<span class="badge"><?=(!empty($stud_count_Math)) ? $stud_count_Math :0?></span>&nbsp;&nbsp;Students
								</span>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<div class="course-container">
				<a href="<?=base_url()?>students/course_list/4">
					<img src="<?=asset_url()?>img/BSED.jpg" alt="" class="img-responsive course-img center-block">
					<div class="overlay center-block">
						<h2 class="text-center title"><i class="fa fa-institution"></i><br>Humanities Department</h2> <br>
						<div class="overlay-block">
								<span>
									<span class="badge"><?=$Hum?></span>&nbsp;&nbsp;Courses
								</span>
								<span>
									<span class="badge"><?=(!empty($stud_count_Hum)) ? $stud_count_Hum :0?></span>&nbsp;&nbsp;Students
								</span>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<div class="course-container">
				<a href="<?=base_url()?>students/course_list/6">
					<img src="<?=asset_url()?>img/BEED.jpg" alt="" class="img-responsive course-img center-block">
					<div class="overlay center-block">
						<h2 class="text-center title"><i class="fa fa-rocket"></i><br>Engineering Department</h2> <br>
						<div class="overlay-block">
								<span>
									<span class="badge"><?=$Eng?></span>&nbsp;&nbsp;Courses
								</span>
								<span>
									<span class="badge"><?=(!empty($stud_count_Eng)) ? $stud_count_Eng :0?></span>&nbsp;&nbsp;Students
								</span>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<div class="course-container">
				<a href="<?=base_url()?>students/course_list/7">
					<img src="<?=asset_url()?>img/BLISS.jpg" alt="" class="img-responsive course-img center-block">
					<div class="overlay center-block">
						<h2 class="text-center title"><i class="fa fa-book"></i><br>Management Department</h2> <br>
						<div class="overlay-block">
								<span>
									<span class="badge"><?=$Mangnt?></span>&nbsp;&nbsp;Courses
								</span>
								<span>
									<span class="badge"><?=(!empty($stud_count_Mangnt)) ? $stud_count_Mangnt :0?></span>&nbsp;&nbsp;Students
								</span>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>