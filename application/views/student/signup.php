<div class="row">
	<div class="col-lg-12">
		<div class="img-stud">

	<div class="signup">
		<div class="s-heading title white-text">Create new Student account</div>
		<div class="s-body">	
			<div id="banner-stud"></div>
			<form action="" method="post" id='signup_stud'>
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" name="name" id="name" placeholder="Full name">
				</div>
				<div class="form-group">
					<label for="username">Email</label>
					<input type="text" class="form-control" name="email" id="email" placeholder="Your new email address">
				</div>
				<div class="form-group">
					<label for="username">Select Course</label>
					<select name="course" id="course" class="form-control">
						<?php foreach($courses as $course) :?>
							<option value="<?=$course->course_id?>"><?=$course->short_name?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" name="username" id="username" placeholder="Your new username">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="Your new password">
				</div>
				<div class="form-group">
					<label for="password">Verify Password</label>
					<input type="password" class="form-control" name="repassword" id="repassword" placeholder="Type your password again">
				</div>
				<div class="form-group">
						<div class="form-group"><a href="<?=base_url()?>" class="back"><i class="fa fa-arrow-circle-left"></i>&nbsp;back</a><button class="btn-student-sm pull-right" type="submit">Create</button>
				</div>
			</form>
		</div>
	</div>
</div>
	</div>
</div>