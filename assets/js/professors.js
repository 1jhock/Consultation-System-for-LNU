$(document).ready(function(){
var baseURL = $('#base_url').val();


	/*
	SIGNUP FOR PROFESSORS
	*/
	$('#signup_prof').on('submit', function(e) {

		var creds = $(this).serialize();

		 $.ajax({
			 type: "POST",
			 url:  baseURL+'professors/add_professor',
			 dataType: 'json',
			 data: creds,
			 success: function(data) {
			 	if( data.added ) {	
		
					 $('#banner-prof').html("<small class='success'><i class='fa fa-check-circle'></i>&nbsp; You have successfully created a new account. Please login to continue.</small>");
				} else {
		
					 $('#banner-prof').html("<small class='error'><i class='fa fa-exclamation-circle'></i>&nbsp;Please provide necessary inputs to create an account.</small>");
					 
				}
			 }
		});

		e.preventDefault();
	});


	/*
	LOGIN FOR PROFESSORS
	*/
	  $("#prof_log").on('submit',function(e) {
		
		 var creds = $(this).serialize();

		 $.ajax({
			 type: "POST",
			 url:  baseURL+'professors/login',
			 dataType: 'json',
			 data: creds,
			 success: function(data) {
			 	if( data.prof ) {
					
					window.location.href = baseURL+'professors/home';
					
				} else {
					
					 $('#banner-prof').html("<i class='fa fa-exclamation-circle'></i>&nbsp;Wrong username or password");
					
				}
			 }
		});
		 	e.preventDefault();
	 });


	 	   /*
		SEND MESSAGE FROM STUDENT
	   */
	  $("#send-msg-prof").on('submit',function(e) {
		
		 var creds = $(this).serialize();

		 $.ajax({
			 type: "POST",
			 url:  baseURL+'professors/send_msg',
			 dataType: 'json',
			 data: creds,
			 success: function(data) {
			 		$('textarea#msg').text("").focus();
			 		 reloadMsgProf();
			 	
			 }
		});
		 	e.preventDefault();
	 });


	    /*
	  GET MESSAGES FROM DB
	  */ 
	 function reloadMsgProf() {
	 	var contents = "";
	 	  $.ajax({
			 type: "GET",
			 url:  baseURL+'professors/get_msg_thread/'+$('#conversation_id').val(), 
			 success: function(data) {
			 	if(data.length == 0) {
			 		contents = '<h3 class="text-center title">No Current Conversation</h3>';
			 	} else {
			 		$.each(data, function(index){
			 		contents += "<small class='pull-right'> <time data-toggle='tooltip' data-placement='top' class='timeago' datetime='"+ data[index]['date_created'] +"'>"+  data[index]['date_created']+"</time></small> </br><div class='msg-single'>" + data[index]['msg'] + "</div>";
			 		});
			 	
			 	}

			 	 $('#msg-thread-box-prof').html(contents);
			 	 $('#msg-thread-box-prof').scrollTop($("#msg-thread-box-prof")[0].scrollHeight);
			
	 			 $('.spin').hide();
			 	
			 }
		});
	 };
	 		
	
	 reloadMsgProf();

	 /*
	RELOAD Profile Picture fro database
	*/

	 function reloadPicProf() {
	 
	 	  $.ajax({
			 type: "GET",
			 url:  baseURL+'professors/get_profile_picture', 
			 success: function(data) {
			 	$('#profile-picture').attr('src', baseURL+'assets/uploads/' + data['img']);
			 }
		});

	 };
	 		

	reloadPicProf();


	// TOGGLE FOR DEPARTMENT FIELD
	var deptForm = $('#update_prof_dept');
	var updateDeptBtn = $('#update_toggle_dept');
	deptForm.hide();
	updateDeptBtn.click(function(){
		deptForm.slideToggle();
	});

	// TOGGLE FOR ABOUT FIELD
	var aboutForm = $('#update_prof_about');
	var updateAboutBtn = $('#update_toggle_about');
	aboutForm.hide();
	updateAboutBtn.click(function(){
		aboutForm.slideToggle();
	});


	// TOGGLE BUTTONS 
	var updateNameBtn  = $('#update_toggle_name');
	var updateUsrNamBtn = $('#update_toggle_username');
	var updateEmailBTn = $('#update_toggle_email');
	var updateCourseBtn = $('#update_toggle_course');

	// TOGGLE FOR NAME FIELD
	var nameForm = $('#update_prof_name');

	nameForm.hide()
	updateNameBtn.click(function(){
		nameForm.slideToggle();
	});

	// TOGGLE FOR USERNAME FIELD
	var usernForm = $('#update_prof_username');

	usernForm.hide();
	updateUsrNamBtn.click(function(){
		usernForm.slideToggle();
	});

	// TOGGLE FOR EMAIL FIELD
	var emailForm = $('#update_prof_email');

	emailForm.hide();
	updateEmailBTn.click(function(){
		emailForm.slideToggle();
	});	

	// TOGGLE FOR COURSE FIELD
	var courseForm = $('#update_prof_course');

	courseForm.hide();
	updateCourseBtn.click(function(){
		courseForm.slideToggle();
	});


	/*=====UPDATING CREDS=======*/

	/*
	UPDATE NAME
	*/
	$('#update_prof_name').on('submit', function(e) {
		var creds = $(this).serialize();

		 $.ajax({
			 type: "POST",
			 url:  baseURL+'professors/update_name',
			 dataType: 'json',
			 data: creds,
			 success: function(data) {
			 	if( data.updated ) {	
					 $('#banner-prof-name').html("<small class='success'><i class='fa fa-check-circle'></i>&nbsp; You have updated you name</small>");
					 nameForm.delay(1500).slideUp();
				} else {
					
					 $('#banner-prof-name').html("<small class='error'><i class='fa fa-exclamation-circle'></i>&nbsp;Your name hasn't been updated</small>");
					 
				}
			 }
		});

		e.preventDefault();
	});


	/*
	UPDATE USERNAME
	*/
	$('#update_prof_username').on('submit', function(e) {
		var creds = $(this).serialize();

		 $.ajax({
			 type: "POST",
			 url:  baseURL+'professors/update_username',
			 dataType: 'json',
			 data: creds,
			 success: function(data) {
			 	if( data.updated ) {	
					 $('#banner-prof-usrn').html("<small class='success'><i class='fa fa-check-circle'></i>&nbsp; You have updated your username</small>");
					 usernForm.delay(1500).slideUp();
				} else {
					
					 $('#banner-prof-usrn').html("<small class='error'><i class='fa fa-exclamation-circle'></i>&nbsp;Your username hasn't been updated</small>");
					 
				}
			 }
		});

		e.preventDefault();
	});

	/*UPDATE EMAIL*/
	$('#update_prof_email').on('submit', function(e) {
		var creds = $(this).serialize();

		 $.ajax({
			 type: "POST",
			 url:  baseURL+'professors/update_email',
			 dataType: 'json',
			 data: creds,
			 success: function(data) {
			 	if( data.updated ) {	
					 $('#banner-prof-email').html("<small class='success'><i class='fa fa-check-circle'></i>&nbsp; You have updated your email</small>");
					 emailForm.delay(1500).slideUp();
				} else {
					
					 $('#banner-prof-email').html("<small class='error'><i class='fa fa-exclamation-circle'></i>&nbsp;Your email hasn't been updated</small>");
					 
				}
			 }
		});

		e.preventDefault();
	});

	/*UPDATE ABOUT*/
	$('#update_prof_about').on('submit', function(e) {
		var creds = $(this).serialize();

		 $.ajax({
			 type: "POST",
			 url:  baseURL+'professors/update_about',
			 dataType: 'json',
			 data: creds,
			 success: function(data) {
			 	if( data.updated ) {	
					 $('#banner-prof-about').html("<small class='success'><i class='fa fa-check-circle'></i>&nbsp; You have updated your email</small>");
					 emailForm.delay(1500).slideUp();
				} else {
					
					 $('#banner-prof-about').html("<small class='error'><i class='fa fa-exclamation-circle'></i>&nbsp;Your email hasn't been updated</small>");
					 
				}
			 }
		});

		e.preventDefault();
	});

	/*UPDATE COURSE*/
	$('#update_prof_dept').on('submit', function(e) {
		var creds = $(this).serialize();

		 $.ajax({
			 type: "POST",
			 url:  baseURL+'professors/update_dept',
			 dataType: 'json',
			 data: creds,
			 success: function(data) {
			 	if( data.updated ) {	
					 $('#banner-prof-dept').html("<small class='success'><i class='fa fa-check-circle'></i>&nbsp; You have updated your course</small>");
					 courseForm.delay(1500).slideUp();
				} else {
					
					 $('#banner-prof-dept').html("<small class='error'><i class='fa fa-exclamation-circle'></i>&nbsp;Your course hasn't been updated</small>");
					 
				}
			 }
		});

		e.preventDefault();
	});


	  /*
		Add new schedule
	  */

	  	$('#new-schedule').on('submit', function(e) {

		var creds = $(this).serialize();

		 $.ajax({
			 type: "POST",
			 url:  baseURL+'professors/add_schedule',
			 dataType: 'json',
			 data: creds,
			 success: function(data) {
			 	if( data.added ) {
		 			$('#sched-banner').text("Added new Schedule");
		 		} else {
		 			$('#sched-banner').text("Schedule already exist").delay(1500).slideUp(1500);
		 		}

		 		$("#new-schedule")[0].reset();

			 }
		});

		e.preventDefault();
	});


	 /*LOAD SCHEDULES*/
	 function loadSchedules() {
	 	 var contents = "";
	 	  $.ajax({
			 type: "GET",
			 url:  baseURL+'professors/get_schedules', 
			 success: function(data) {
			 	if(data.length == 0) {
			 		contents = '<div class="list-panel"><div class="list-body" style="height:300px; display: flex; align-items: center; justify-content: center;"><p class="text-center no-error"><i class="fa fa-frown-o"></i>&nbsp;&nbsp;No Schedules for today</p></div></div>';
			 		$('#schedule-list').html(contents);
			 	} else {
			 		 $('#schedule-list').append(
			 		 	`<table class='table table-hover table-striped'>
							<thead>
							 <tr>
								<th>Room</th>
								<th>Time</th>
							 </tr>
							 <tbody id='current-schedule'>
								
							 </tbody>
							</thead>
			 		 	</table>`
			 		 	);

			 		 $.each(data, function(index){
			 			contents += `<tr>
										<td>`+data[index]['room']+`</td>
										<td>`+data[index]['f_from_time']+ ' '  + ' - ' + data[index]['to_time'] + ' '  +`</td>
			 						</tr>`;
			 		});
			 		

			 	}

			 	 $('#current-schedule').html(contents);
	 			 $('.loading-sched').hide();
			 }
		});

	 };
	 		
	 loadSchedules();

});
