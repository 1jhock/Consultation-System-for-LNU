<div class="container-fluid">
	<a href="<?=base_url()?>students/list_professor" class="btn btn-primary pull-right"><i class="fa fa-users"></i>&nbsp;See all Students</a> <br> <br> <br>
	<hr>
	<div class="row">
		<div class="col-lg-3">
			<div class="list-panel">
				<div class="list-heading">
					<h4><i class="fa fa-id-badge"></i>&nbsp;&nbsp;Students with Account</h4>
				</div>
				<div class="list-body">
					<div class="list-msg">
						<?php if(!empty($students)) : ?>
						<?php foreach($students as $student) :?>
							 <div class="media">
								    <div class="media-left">
								      <img src="<?=asset_url()?>uploads/<?=$student->img?>" class="media-object img-circle img-thumbnail" style="width:60px">
								    </div>
								    <div class="media-body">
								    	<?php date_default_timezone_set('Asia/Kuala_Lumpur'); //for PHL ?>
								      <h4 class="media-heading"><?=$student->name?></h4>
								      
								      <hr>
								 		<p class="secondary-text"> <?=$student->email?>
								      <?=$student->course?></p>
								     
								      <small><a href="<?=base_url()?>professors/message/<?=$student->stud_id?>" class='send-btn'><i class="fa fa-comment-o"></i>&nbsp;Send Message</a></small>
								    </div>
								  </div>
								  <hr>
								
							<?php endforeach; ?>
						<?php else: ?>
								<p class="no-result">No Student</p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		<!--  -->
		<div class="col-lg-6">
			<div class="list-panel">
				<div class="list-heading">
					<h4><i class="fa fa-comments-o"></i>Recent Conversation
					<div class="panel-container pull-right "  style="font-size: 13px; color: black">
						<?php if(empty($cur_stud)) :  ?>
							No data
						<?php else : ?>
							<img src="<?=asset_url()?>uploads/<?=$cur_stud->img?>" alt="" class="msg-img">
						<?=$cur_stud->name?>
						<?php endif; ?>
					</div>
					</h4>
				</div>
				<div class="list-body">
					<?php if(empty($conversation_data)) : ?>
						<div class="no-result"><i class="fa fa-frown-o"></i>No recent conversation</div>
					<?php else : ?>
					<div id="msg-thread-box">
						<i class="fa fa-refresh fa-spin fa-3x fa-fw spin center-block"></i>
						<span class="sr-only">Loading...</span>
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
		<!--  -->
		<div class="col-lg-3">
			<h1 class="title">Schedule</h1>	
			<?php date_default_timezone_set('Asia/Kuala_Lumpur') //for PHL  ?> 
			<p><i class="fa fa-circle-o"></i><?= date('l') ?></p>

			<div class="list-body" id='schedule-list'>
				<i class="fa fa-refresh fa-spin fa-3x fa-fw center-block loading-sched" aria-hidden="true"></i>
			</div>

			<p class="text-right" style="font-size: 13px; color: black"><a data-toggle="modal" href="#schedule"><i class="fa fa-plus"></i>Add Schedule</a></p>
		</div>
	</div>	
</div>

<!-- ==============================MODAL ================================= -->
	
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
      			<label for="week">Select Week</label>
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
      			<label for="from_time">From</label>
      			<div class="row">
      				<div class="col-lg-6">
      					<input type="time" id="from_time" name="from_time" class="form-control">
      				</div>
      				<div class="col-lg-6">
      					
      				</div>
      			</div>
      		</div>
      		<div class="form-group">
      			<label for="to_time">To</label>
      			<div class="row">
      				<div class="col-lg-6">
      					<input type="time" id="to_time" name="to_time" class="form-control">
      				</div>
      				<div class="col-lg-6">
      					
      				</div>
      			</div>
      		</div>
      		<div class="form-group">
      			<label for="room">Room</label>
      			<input type="text" class="form-control" id="room" name="room">
      		</div>
      		 <div class="modal-footer">
      		 	<button class="btn-student-sm pull-right" type="submit">Add</button>
		      </div>
      	</form>
      </div>
    </div>
  </div>	
</div>

<!-- ==============================end ========================================= -->