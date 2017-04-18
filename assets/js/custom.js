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
			 url: 'login_user.php',
			 dataType: 'json',
			 data: creds,
			 success: function(data) {
			 	if( data.response ) {
					
					window.location.href = 'stud_home.php';

				} else {
					
					 $('#banner-stud').html("<i class='fa fa-exclamation-circle'></i>&nbsp;Wrong username or password");
				}
			 }
		});
		 	e.preventDefault();
	 });



	  /*LOGIN for Professor*/
	

	   $('#prof_log').on('submit', function(e) {

	   		var creds = $(this).serialize();

	   		$.ajax({
	   			method: 'POST',
	   			url: 'login_prof.php',
	   			dataType: 'json',
	   			data: creds,
	   			success: function(data) {
	   				if(data.response) {
	   					window.location.href = 'prof_home.php';
	   				
	   				} else {
	   					 $('#banner-prof').html("<i class='fa fa-exclamation-circle'></i>&nbsp;Wrong username or password");
	   					
	   				}
	   			}
	   		});

	   		e.preventDefault();
	   });

});
