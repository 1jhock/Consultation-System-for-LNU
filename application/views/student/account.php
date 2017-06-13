<div class="row">
	<div class="col-lg-12">
		<div class="container">

		<ol class="breadcrumb">
			<li>
				<a href="<?=base_url()?>students">Home</a>
			</li>
			
			<li class="active">Account</li>
		</ol>

	<h4><i class="fa fa-id-card-o"></i>&nbsp;&nbsp;General Account Settings</h4>

	<table class="table table-responsive table-hover">
		<tbody>
			<tr>
				<!-- NAME -->
				<td><b>Name</b></td>
				<td>
					<?=$infos->name?>
					<div id="banner-stud-name"></div>
					<form action="" method="post" id="update_student_name">
						<div class="form-group">
							<input type="text" class="form-control" id="name" name="name" placeholder="Type your new name" style="width: 250px !important">
						</div>
						<div class="form-group">
							<button class="btn btn-default" type="submit"><i class="fa fa-pencil"></i>&nbsp;Change</button>
						</div>
					</form>
					<small class="btn-student-sm pull-right"  id="update_toggle_name">Update</small>
				</td>
			</tr>
			<tr>
				<!-- USERNAME -->
				<td><b>Username</b></td>
				<td>
						<?=$infos->username?> 
						<div id="banner-stud-usrn"></div>
						<form action="" method="post" id="update_student_username">
							<div class="form-group">
								<input type="text" class="form-control" id="username" name="username" placeholder="Type your new username" style="width: 250px !important">
							</div>
							<div class="form-group">
								<button class="btn btn-default" type="submit"><i class="fa fa-pencil"></i>&nbsp;Change</button>
							</div>
						</form>
					<small class="btn-student-sm pull-right" id="update_toggle_username">Update</small>
				</td>
			</tr>
			<tr>
				<!-- EMAIL -->
				<td><b>Email Address</b></td>
				<td>
					<?=$infos->email?> 
						<div id="banner-stud-email"></div>
						<form action="" method="post" id="update_student_email">
							<div class="form-group">
								<input type="text" class="form-control" id="email" name="email" placeholder="Type your new email" style="width: 250px !important">
							</div>
							<div class="form-group">
								<button class="btn btn-default" type="submit"><i class="fa fa-pencil"></i>&nbsp;Change</button>
							</div>
						</form>
					<small class="btn-student-sm pull-right" id="update_toggle_email">Update</small>
				</td>
			</tr>
			<tr>
				<!-- COURSE -->
				<td><b>Course</b></td>
				<td>
					<?=$this->crud->get_dept($infos->course)?> 
					<div id="banner-stud-course"></div>
						<form action="" method="post" id="update_student_course">
							<div class="form-group">
								
								<label for="username">Select Course</label>
								<select name="course" id="course" class="form-control" style="width: 250px !important">
									<?php foreach($courses as $course) :?>
										<option value="<?=$course->course_id?>"><?=$course->short_name?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<button class="btn btn-default" type="submit"><i class="fa fa-pencil"></i>&nbsp;Change</button>
							</div>
						</form>
					<small class="btn-student-sm pull-right" id="update_toggle_course">Update</small>
				</td>
			</tr>
			<tr>
				<td><b>Profile Picture</b></td>
				<td>
					<div id="banner-stud-profile"></div>
					<?php (isset($error) ? '<div class="error">'. $error .'</div>' : '') ?>
					<?php (isset($success) ? '<div class="error">'. $success .'</div>' : '') ?>
					<?php echo form_open_multipart('students/update_profile_pic');?>
						
						<div class="form-group">
							<input type="file" name="profile" id="profile" size="20" class="form-control" style="width: 250px !important"/>
						</div>
						<div class="form-group">
							<button class="btn btn-default" type="submit"><i class="fa fa-pencil"></i>&nbsp;Upload</button>
						</div>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
</div>
	</div>
</div>