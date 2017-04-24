$(document).ready(function(){
	

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




	/*LOGIN for Student*/
	  $("#student_log").on('submit',function(e) {
		
		 var creds = $(this).serialize();

		 $.ajax({
			 type: "POST",
			 url:  'http://localhost/consultation/students/login',
			 dataType: 'json',
			 data: creds,
			 success: function(data) {
			 	if( data.user ) {
					
					window.location.href = 'http://localhost/consultation/students/home';
					console.log('logged in');
				} else {
					
					 $('#banner-stud').html("<i class='fa fa-exclamation-circle'></i>&nbsp;Wrong username or password");
					 console.log('nope!');
				}
			 }
		});
		 	e.preventDefault();
	 });



	  /*LOGIN for Professor*/
	

	   // $('#prof_log').on('submit', function(e) {

	   // 		var creds = $(this).serialize();

	   // 		$.ajax({
	   // 			method: 'POST',
	   // 			url: 'login_prof.php',
	   // 			dataType: 'json',
	   // 			data: creds,
	   // 			success: function(data) {
	   // 				if(data.response) {
	   // 					window.location.href = 'prof_home.php';
	   				
	   // 				} else {
	   // 					 $('#banner-prof').html("<i class='fa fa-exclamation-circle'></i>&nbsp;Wrong username or password");
	   					
	   // 				}
	   // 			}
	   // 		});

	   // 		e.preventDefault();
	   // });

	   /*Send msg for Students*/
	  $("#send-msg").on('submit',function(e) {
		
		 var creds = $(this).serialize();

		 $.ajax({
			 type: "POST",
			 url:  'http://localhost/consultation/students/send_msg',
			 dataType: 'json',
			 data: creds,
			 success: function(data) {
			
			 		$('textarea#msg').text("").focus();
			 		 reloadMsg();
			 	
			 }
		});
		 	e.preventDefault();
	 });


	 function reloadMsg() {
	 	var contents = "";
	 	  $.ajax({
			 type: "GET",
			 url:  'http://localhost/consultation/students/get_msg_thread', 
			 success: function(data) {
			 	$.each(data, function(index){
			 		contents += "<small class='pull-right'>" + data[index]['date_created'] + "</small> </br><div class='msg-single'>" + data[index]['msg'] + "</div>";
			 	});
			 	 $('#msg-thread-box').html(contents).fadeIn(1500);
			 	 $("#msg-thread-box").scrollTop($("#msg-thread-box")[0].scrollHeight);

	 			 $('.spin').hide();
			 }
		});

	 };
	 		
	reloadMsg() ;
	
});
