<div id="home-page">
	<!-- HEADER -->
	<div class="header">
		<ul>
			<li><a href="about">About</a></li>
			<li><a href="instruction">Instructions</a></li>
		</ul>
	</div>
	<!-- END -->
	<h1 class="white-text text-center title">Student Consultation System</h1>
	
	<div id="btn-container">
		<button class="btn-light" id="stud-btn">Student</button>&nbsp;&nbsp;&nbsp;<button class="btn-light" id="prof-btn">Professor</button>
	</div>
	
	<div id="form-container">
	<!-- Student Login -->

		<div id="student-login" class="center-block">
			
			<form action="" method="post" id="student_log">
				<h4>Login as <span class="emp-stud">Student</span></h4> <br>
				<!-- Error -->
				<small id="banner-stud" class="secondary-text"></small>

				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control" placeholder="Username" required="required">
				</div>

				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required">
				</div>
				
				<div class="form-group">
					<a href="create_acc_student.php">Create account</a><button class="btn-student-sm pull-right" type="submit"  name="student_log" id="student_log">Login</button>
				</div>
			</form>
		</div>

	<!-- Professor Login -->
	<div id="professor-login" class="center-block">
			<form action="" method="post"  id="prof_log">
				<h4>Login as <span class="emp-prof">Professor</span></h4> <br>
				<!-- Error -->
				<small id="banner-prof" class="secondary-text"></small>
				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control" placeholder="Username" required="required">
				</div>

				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required">
				</div>

				<div class="form-group">
					<a href="create_acc_prof.php">Create account</a><button class="btn-prof-sm pull-right" type="submit"  name="prof_log" id="prof_log">Login</button>
				</div>
			</form>
		</div>
	</div>
</div>