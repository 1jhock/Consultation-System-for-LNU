$(document).ready(function(){
	var baseURL = $('#base_url').val();
	/*
	LOGIN FORMS IN HOMEPAGE
	*/
	var studLogin = $('#student-login');
	var profLogin = $('#professor-login');
	var studBtn = $('#stud-btn');
	var profBtn =  $('#prof-btn');

	studLogin.hide();
	profLogin.hide();
	
	studBtn.click(function(){
		studLogin.fadeIn();
		profLogin.hide();
		$(this).addClass('active');
		$(profBtn).removeClass('active');

	});

	profBtn.click(function(){
		studLogin.hide();
		profLogin.fadeIn();
		$(this).addClass('active');
		$(studBtn).removeClass('active');
	});




	/*
	LOGIN FOR STUDENT
	*/
	  $("#student_log").on('submit',function(e) {
		
		 var creds = $(this).serialize();

		 $.ajax({
			 type: "POST",
			 url:  baseURL+'students/login',
			 dataType: 'json',
			 data: creds,
			 success: function(data) {
			 	if( data.user ) {
					
					window.location.href = baseURL+'students/home';
					
				} else {
					
					 $('#banner-stud').html("<i class='fa fa-exclamation-circle'></i>&nbsp;Wrong username or password");
					
				}
			 }
		});
		 	e.preventDefault();
	 });



	 

	   /*
		SEND MESSAGE FROM STUDENT
	   */
	  $("#send-msg").on('submit',function(e) {
		
		 var creds = $(this).serialize();

		 $.ajax({
			 type: "POST",
			 url:  baseURL+'students/send_msg',
			 dataType: 'json',
			 data: creds,
			 success: function(data) {
			
			 		$('textarea#msg').text("").focus();
			 		
			 		 setInterval(reloadMsgStud(), 5000);
			 }
		});
		 	e.preventDefault();
	 });

	

	  /*
	  GET MESSAGES FROM DB
	  */
	 function reloadMsgStud() {
	 	var contents = "";
	 	  $.ajax({
			 type: "GET",
			 url:  baseURL+'students/get_msg_thread/'+$('#conversation_id').val(), 
			 success: function(data) {
			 	if(data.length == 0) {
			 		contents = '<h3 class="text-center">Start your conversation now.</h3>';
			 	} else {
			 		$.each(data, function(index){
			 		contents += "<small class='pull-right'> <time data-toggle='tooltip' data-placement='top' class='timeago' datetime='"+ data[index]['date_created'] +"'>"+  data[index]['date_created']+"</time></small> </br><div class='msg-single'>" + data[index]['msg'] + "</div>";
			 		
			 		});
			 	
			 	}

			 	 $('#msg-thread-box').html(contents);
			 	 $('#msg-thread-box').scrollTop($("#msg-thread-box")[0].scrollHeight);
			
	 			 $('.spin').hide();
			 	
			 }
		});

	 };
	 		
	
	setTimeout(reloadMsgStud(), 5000);


	/*
	SIGNUP FOR STUDENTS
	*/
	$('#signup_stud').on('submit', function(e) {

		var creds = $(this).serialize();

		 $.ajax({
			 type: "POST",
			 url:  baseURL+'students/add_student',
			 dataType: 'json',
			 data: creds,
			 success: function(data) {
			 	if( data.added ) {	
			 	
					 $('#banner-stud').html("<small class='success'><i class='fa fa-check-circle'></i>&nbsp; You have successfully created a new account. Please login to continue.</small>").delay(3000);

					 window.location.href = baseURL+'students/walkthrough';
				
				} else {
					
					 $('#banner-stud').html("<small class='error'><i class='fa fa-exclamation-circle'></i>&nbsp;Please provide necessary inputs to create an account.</small>");
					 
				}
			 }
		});

		e.preventDefault();
	});


	

	/*
	UPDATES FOR STUDENTS, EACH FIELD ARE UPDATED INDIVIDUALLY
	*/


	// TOGGLE BUTTONS 
	var updateNameBtn  = $('#update_toggle_name');
	var updateUsrNamBtn = $('#update_toggle_username');
	var updateEmailBTn = $('#update_toggle_email');
	var updateCourseBtn = $('#update_toggle_course');

	// TOGGLE FOR NAME FIELD
	var nameForm = $('#update_student_name');

	nameForm.hide()
	updateNameBtn.click(function(){
		nameForm.slideToggle();
	});

	// TOGGLE FOR USERNAME FIELD
	var usernForm = $('#update_student_username');

	usernForm.hide();
	updateUsrNamBtn.click(function(){
		usernForm.slideToggle();
	});

	// TOGGLE FOR EMAIL FIELD
	var emailForm = $('#update_student_email');

	emailForm.hide();
	updateEmailBTn.click(function(){
		emailForm.slideToggle();
	});	

	// TOGGLE FOR COURSE FIELD
	var courseForm = $('#update_student_course');

	courseForm.hide();
	updateCourseBtn.click(function(){
		courseForm.slideToggle();
	});

	


	/*
	UPDATE NAME
	*/
	$('#update_student_name').on('submit', function(e) {
		var creds = $(this).serialize();

		 $.ajax({
			 type: "POST",
			 url:  baseURL+'students/update_name',
			 dataType: 'json',
			 data: creds,
			 success: function(data) {
			 	if( data.updated ) {	
					 $('#banner-stud-name').html("<small class='success'><i class='fa fa-check-circle'></i>&nbsp; You have updated you name</small>");
					 nameForm.delay(1500).slideUp();
				} else {
					
					 $('#banner-stud-name').html("<small class='error'><i class='fa fa-exclamation-circle'></i>&nbsp;Your name hasn't been updated</small>");
					 
				}
			 }
		});

		e.preventDefault();
	});


	/*
	UPDATE USERNAME
	*/
	$('#update_student_username').on('submit', function(e) {
		var creds = $(this).serialize();

		 $.ajax({
			 type: "POST",
			 url:  baseURL+'students/update_username',
			 dataType: 'json',
			 data: creds,
			 success: function(data) {
			 	if( data.updated ) {	
					 $('#banner-stud-usrn').html("<small class='success'><i class='fa fa-check-circle'></i>&nbsp; You have updated your username</small>");
					 usernForm.delay(1500).slideUp();
				} else {
					
					 $('#banner-stud-usrn').html("<small class='error'><i class='fa fa-exclamation-circle'></i>&nbsp;Your username hasn't been updated</small>");
					 
				}
			 }
		});

		e.preventDefault();
	});

	/*UPDATE EMAIL*/
	$('#update_student_email').on('submit', function(e) {
		var creds = $(this).serialize();

		 $.ajax({
			 type: "POST",
			 url:  baseURL+'students/update_email',
			 dataType: 'json',
			 data: creds,
			 success: function(data) {
			 	if( data.updated ) {	
					 $('#banner-stud-email').html("<small class='success'><i class='fa fa-check-circle'></i>&nbsp; You have updated your email</small>");
					 emailForm.delay(1500).slideUp();
				} else {
					
					 $('#banner-stud-email').html("<small class='error'><i class='fa fa-exclamation-circle'></i>&nbsp;Your email hasn't been updated</small>");
					 
				}
			 }
		});

		e.preventDefault();
	});

	/*UPDATE COURSE*/
	$('#update_student_course').on('submit', function(e) {
		var creds = $(this).serialize();

		 $.ajax({
			 type: "POST",
			 url:  baseURL+'students/update_course',
			 dataType: 'json',
			 data: creds,
			 success: function(data) {
			 	if( data.updated ) {	
					 $('#banner-stud-course').html("<small class='success'><i class='fa fa-check-circle'></i>&nbsp; You have updated your course</small>");
					 courseForm.delay(1500).slideUp();
				} else {
					
					 $('#banner-stud-course').html("<small class='error'><i class='fa fa-exclamation-circle'></i>&nbsp;Your course hasn't been updated</small>");
					 
				}
			 }
		});

		e.preventDefault();
	});

	/*
	RELOAD Profile Picture fro database
	*/

	 function reloadPic() {
	 	var contents = "";
	 	  $.ajax({
			 type: "GET",
			 url:  baseURL+'students/get_profile_picture', 
			 success: function(data) {
			 	$('#profile-picture').attr('src', baseURL+'assets/uploads/' + data['img']);
			 }
		});

	 };
	 		

	reloadPic();



	/*
	ALL ABOUT UI/UX
	*/
	var msgTxt = $('textarea#msg');

	msgTxt.click(function() {
	
		$('.panel-container .msg-img').animate({'height':'40px','width':'40px'}, 500, function(){
				$('.panel-container').css({'backgroundColor':'#2766a7','color':'white','font-size':'15px','transition':'all 0.5s ease-in'});
		});

	});

	var walkItems =  [
		'.walk-item .fa-envelope-open-o',
		'.walk-item .fa-address-card-o',
		'.walk-item .fa-comments-o',
		'dummy'
	];

	var i = 0;
	

	function loadWalkthrough() {
		$(walkItems[i]).animate({'font-size':'3em'});
		$(walkItems[i-1]).animate({'font-size':'1em'}).delay(2000);
		i++;

		if(i  == walkItems.length) {
			
			i = 0;
			
		}


	}

	setInterval(loadWalkthrough, 2000);
	
});

