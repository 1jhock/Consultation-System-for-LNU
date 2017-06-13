<div class="row">
	<div class="col-lg-12">
		<div class="container">
	<h4><i class="fa fa-id-card-o"></i>&nbsp;&nbsp;General Account Settings</h4>

	<table class="table table-responsive table-hover">
		<tbody>
			<tr>
				<!-- NAME -->
				<td><b>Name</b></td>
				<td>
					<?=$infos->name?>
					<div id="banner-prof-name"></div>
					<form action="" method="post" id="update_prof_name">
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
						<div id="banner-prof-usrn"></div>
						<form action="" method="post" id="update_prof_username">
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
						<div id="banner-prof-email"></div>
						<form action="" method="post" id="update_prof_email">
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
				<!-- ABOUT -->
				<td><b>About</b></td>
				<td>
					<?=$infos->about?> 
					<div id="banner-prof-about"></div>
						<form action="" method="post" id="update_prof_about">
							<div class="form-group">
								<textarea class="form-control" name="about" id="about" placeholder="Tell something about yourself" cols="30" rows="3" style="width: 250px !important"></textarea>
							</div>
							<div class="form-group">
								<button class="btn btn-default" type="submit"><i class="fa fa-pencil"></i>&nbsp;Change</button>
							</div>
						</form>
					<small class="btn-student-sm pull-right" id="update_toggle_about">Update</small>
				</td>
			</tr>
			<tr>
				<!-- DEPARTMENT -->
				<td><b>Department</b></td>
				<td>
					<?=$this->crud->get_dept($infos->department)?> 
					<div id="banner-prof-dept"></div>
						<form action="" method="post" id="update_prof_dept">
							<div class="form-group">
								
								<label for="username">Select Department</label>
								<select name="department" id="department" class="form-control" style="width: 250px !important">
									<?php foreach($departments as $dept) :?>
										<option value="<?=$dept->dept_id?>"><?=$dept->full_name?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<button class="btn btn-default" type="submit"><i class="fa fa-pencil"></i>&nbsp;Change</button>
							</div>
						</form>
					<small class="btn-student-sm pull-right" id="update_toggle_dept">Update</small>
				</td>
			</tr>
			<tr>
				<td><b>Profile Picture</b></td>
				<td>
					<div id="banner-prof-profile"></div>
					<?php (isset($error) ? '<div class="error">'. $error .'</div>' : '') ?>
					<?php (isset($success) ? '<div class="error">'. $success .'</div>' : '') ?>
					<?php echo form_open_multipart('professors/update_profile_pic');?>
						
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