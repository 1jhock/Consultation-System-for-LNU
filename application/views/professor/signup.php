<div class="row">
	 <div class="col-lg-12">
	 	
<div class="img-prof">
	<div class="signup">
		<div class="p-heading title white-text">Create new Professor account</div>
		<div class="p-body">	
			<div id="banner-prof"></div>
			<form action="" method="post" id="signup_prof">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" name="name" id="name" placeholder="Full name">
				</div>
				
				<div class="form-group">
					<label for="username">Email</label>
					<input type="text" class="form-control" name="email" id="email" placeholder="Your new email address">
				</div>
				<div class="form-group">
					<label for="username">About me</label>
					<textarea class="form-control" name="about" id="about" placeholder="Tell something about yourself" cols="30" rows="3"></textarea>
				</div>
				<div class="form-group">
					<label for="username">Department</label>
					<select name="department" id="department" class="form-control">
						<?php foreach($departments as $dept) :?>
							<option value="<?=$dept->dept_id?>"><?=$dept->full_name?></option>
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
				<div class="form-group"><button class="btn-prof-sm pull-right" type="submit">Create</button></div>
			</form>
		</div>
	</div>
</div>

	 </div>
</div>