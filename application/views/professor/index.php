<div class="container-fluid">
	<div class="row">
		<div class="col-lg-8">
			<div id="search-container">
				<i class="fa fa-search" style="padding: 0px 10px; margin: 0px;"></i><input type="search" name="search_student" id="search-student" placeholder="Find a Student" class="form-control">	
			</div>
			<div id="search-results"></div>
		</div>
		<div class="col-lg-4">
			<a href="#conversation" class="btn-student-sm pull-right focus-btn" data-toggle="modal"><i class="fa fa-envelope-open"></i>&nbsp;Recent Conversation</a> <br> <br> <br>
		</div>
	</div>
	<br>
	<br>
	<div class="row">
		<div class="col-lg-3">
			<div class="list-panel">
				<div class="list-body glance">
					<h1 class="title text-center">Students</h1>
					<div class="glance-container mx-auto" id="student">
						<div class="fa fa-user-circle fa-5x"></div>
					</div>
					<div>
						<div>
							<span class="badge"><?=$total_stud_per_dept?></span>
							<small><?=$this->crud->get_dept($this->session->userdata('department'))?></small>
						</div>
						<div>
							<span class="badge"s><?=$total_stud?></span>
							<small>Registed Students</small>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="list-panel">
				<div class="list-body glance">
					<h1 class="title text-center">Unread</h1>
					<div class="glance-container mx-auto" id="unread">
						<fa class="fa fa-envelope fa-5x"></fa>
					</div>
					<div>
						<div>
							<span class="badge"><?=$unread_msg?></span>&nbsp;&nbsp;<small>Unread</small>
						</div>
						<div>
							<span class="badge"><?=$all_msg?></span>&nbsp;&nbsp;<small>Messages Received</small>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="list-panel">
				<div class="list-body glance">
					<h1 class="title text-center">Interactions</h1>
					<div class="glance-container mx-auto" id="inter">
						<div class="fa fa-retweet fa-5x"></div>
					</div>
					<div>
						<div>
						<span class="badge"><?=$interactions?></span>&nbsp;&nbsp;<small>Interactions today</small>
					</div>
					<div>
						<span class="badge"><?=$total_class?></span>&nbsp;&nbsp;<small>Classes today</small>
					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			
				<?php date_default_timezone_set('Asia/Kuala_Lumpur') //for PHL  ?> 
				<h1 class="title"><?= date('l') ?></h1>
				<small><a data-toggle="modal" href="#schedule"><i class="fa fa-plus"></i>&nbsp;Add Schedule</a></small>
		
			
			<div class="list-body" id='schedule-list'>
				<i class="fa fa-refresh fa-spin fa-3x fa-fw center-block loading-sched" aria-hidden="true"></i>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<div class="row">
		<div class="col-lg-9">
				
		
			<div class="list-panel">
				
				<div class="list-body">
					<h1 class="title text-right">Students</h1>
					<small class="secondary-text pull-right"><?= $this->crud->get_dept($this->session->userdata('department')) ?></small>
					<br><br>
					<hr>
					<div class="list-msg">
						<?php if(!empty($students)) : ?>
						<?php foreach($students as $student) :?>
							 <small class="pull-right"><a href="<?=base_url()?>professors/message/<?=$student->stud_id?>" class='send-btn'><i class="fa fa-comment-o"></i>&nbsp;Send Message</a></small>
							 <div class="media">
								    <div class="media-left">
								      <img src="<?=asset_url()?>uploads/<?=$student->img?>" class="media-object img-fluid rounded-circle" style="width:60px">
								    </div>
								    <div class="media-body">
								    	<?php date_default_timezone_set('Asia/Kuala_Lumpur'); //for PHL ?>
								      <h4 class="media-heading"><?=$student->name?><?=$this->crud->get_total_unread_frm_stud($this->session->userdata('prof_id'), $student->stud_id)?></h4>
								      <p class="secondary-text"> <?=$student->email?>

								    </div>
								  </div>
								  <hr>
								
							<?php endforeach; ?>
						<?php else: ?>
								<p class="text-center no-result">
								<i class="fa fa-frown-o"></i>&nbsp;&nbsp;No students under this department.
							</p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
<!-- 		<div class="col-lg-6">
			<h1 class="title">Messages</h1>
			<small class="secondary-text">Unread Messages from students</small>
	
			<div id="list-container">
					<div class="list-group">
					<?php if(empty($conversations)) : ?>
								<p class="text-center no-result">
									<i class="fa fa-frown-o"></i>&nbsp;&nbsp;No unread messages.
								</p>
							<?php else : ?>
								<?php foreach($conversations as $conversation) : ?>
								<a href="<?=base_url()?>professors/current_message/<?=$this->crud->get_sender_id($conversation->conversation_id)?>" class="list-group-item">
									<div class="media">
									  <div class="media-left">
									  	<img class="media-object img-fluid img-circle" style="width:35px" src="<?=asset_url()?>uploads/jack2.jpg" alt="Generic placeholder image">
									  </div>
									  <div class="media-body">
									    <h5 class="media-heading"><strong><?=$this->crud->get_sender($this->crud->get_sender_id($conversation->conversation_id))?></strong></h5>
									    <p><?php 
									    	$msgs = explode(",", $conversation->msgs, 1 );

									    	foreach($msgs as $id => $msg) {

									    		if(strlen(substr($msg, 0,   strpos($msg, ','))) > 20) {
									    			echo $msg . '...';
									    		} else {
									    			echo substr($msg, 0,   strpos($msg, ','));
									    		}
									    	} 

									    	?>	
									    </p>
									  </div>
									</div>
								</a>
							<?php endforeach; ?>
							<?php endif; ?>
				</div>
			</div>
		</div> -->
		<!--  -->
	
	</div>	
</div>

<!-- ============================== MODAL for adding Schedule ================================= -->
	
<div class="modal fade" id="schedule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar-plus-o"></i>&nbsp;Add new Schedule</h4><small id="sched-banner"></small>
      </div>
      <div class="modal-body">
      	<form action="" method="post" id="new-schedule">
      		<div class="form-group">
      			<label for="week"><i class="fa fa-check-circle"></i>&nbsp;Select Week</label>
      			<select name="week" id="week" class="form-control">
      				<option value="1">Monday</option>
      				<option value="2">Tuesday</option>
      				<option value="3">Wednesday</option>
      				<option value="4">Thursday</option>
      				<option value="5">Friday</option>
      				<option value="6">Saturday</option>
      				<option value="7">Sunday</option>
      			</select>
      		</div>
      		<div class="form-group">
      			
      			<div class="row">
      				<div class="col-lg-6">
      					<label for="from_time"><i class="fa fa-clock-o"></i>&nbsp;From</label>
      					<input type="time" id="from_time" name="from_time" class="form-control">
      				</div>
      				<div class="col-lg-6">
      					<label for="to_time"><i class="fa fa-clock-o"></i>&nbsp;To</label>
      					<input type="time" id="to_time" name="to_time" class="form-control">
      				</div>
      			</div>
      		</div>

      		<div class="form-group">
      			<label for="room"><i class="fa fa-building-o"></i>&nbsp;Room</label>
      			<input type="text" class="form-control" id="room" name="room">
      		</div>
      		 <div class="modal-footer">
      		 	<button class="btn-student-sm pull-right" type="submit"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</button>
		      </div>
      	</form>
      </div>
    </div>
  </div>	
</div>

<!-- ==============================end ========================================= -->

<!-- ============================== MODAL for Recent Conversation ================================= -->
	
<div class="modal fade" id="conversation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-comments-o fa-padding"></i>Recent Conversation
		
		</h4>&nbsp;<small id="sched-banner"></small>
      </div>
      <div class="modal-body">
      			<div class="list-panel">
			
					<span class="panel-container pull-right"  style="font-size: 13px; color: black;">
						<?php if(empty($cur_stud)) :  ?>
							No Data
						<?php else : ?>
							<img src="<?=asset_url()?>uploads/<?=$cur_stud->img?>" alt="" class="msg-img">
						<?=$cur_stud->name?>
						<?php endif; ?>
					</span>
					<br><br>
				<div class="list-body">
					<?php if(empty($conversation_data)) : ?>
						<div class="no-result"><i class="fa fa-frown-o"></i>No recent conversation</div>
					<?php else : ?>
					<div id="msg-thread-box-prof">
						<i class="fa fa-refresh fa-spin fa-3x fa-fw spin center-block"></i>
						
					</div>
					
						<form action="" method="post" id="send-msg-prof" class="msg-box">
							<input type="hidden" id="to_id" name="to_id" value="<?=$cur_stud->stud_id?>">
							<input type="hidden" id="conversation_id" name="conversation_id" value="<?=$conversation_data->conversation_id?>">
							<textarea name="msg" id="msg" cols="50" rows="1" class="form-control" placeholder="Type your message here..."></textarea>
							<button type="submit"  class="pull-right btn-student-sm" id="send-msg">Send</button>
						</form>
					<?php endif; ?>
				</div>
			</div>
      </div>
    </div>
  </div>	
</div>

<!-- ==============================end ========================================= -->