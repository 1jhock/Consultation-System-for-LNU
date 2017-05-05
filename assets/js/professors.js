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
			 		contents = '<h3 class="text-center">No Current Conversation</h3>';
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
	 		
	
	 reloadMsgProf();

});