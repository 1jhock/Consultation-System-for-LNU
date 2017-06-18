<div class="container-fluid">
	<a href="<?=base_url()?>students/list_professor" class="focus-btn btn-student-sm pull-right"><i class="fa fa-users"></i>&nbsp;See all Professors</a> &nbsp;&nbsp;<a href="#map-modal" data-toggle="modal" class="focus-btn btn-student-sm pull-right" style="margin-right: 15px;"><i class="fa fa-map"></i>&nbsp;Show Map</a><br> <br> <br>
	
			<hr>
	<div class="row">
	<div class="col-lg-1">
		<div id="prof-hub">
			<?php if(empty($all_profs)) : ?>

			<?php else: ?>
				<?php foreach($all_profs as $prof) : ?>
					<img src="<?=asset_url()?>uploads/<?=$prof->img?>" alt="" class="profile-head" data-toggle="tooltip" title="<?=$prof->name?>" data-placement="right">
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
		<div class="col-lg-8">
			<div class="list-panel">
				<div class="list-heading">
					<h4 class="only-fa"><i class="fa fa-comments-o fa-padding"></i>Recent Conversation
					<div class="panel-container pull-right"  style="font-size: 13px; color: black">
						<?php if(empty($cur_prof)) :  ?>
							No data
						<?php else : ?>
							<img src="<?=asset_url()?>uploads/<?=$cur_prof->img?>" alt="" class="msg-img">
						Professor <?=$cur_prof->name?>
						<?php endif; ?>
					</div>
					</h4>
				</div>
				<div class="list-body">
					<!--  -->
					<?php if(empty($conversation_data)) : ?>
						<div class="no-result"><i class="fa fa-frown-o"></i>No recent conversation</div>
					<?php else : ?>
					<div id="msg-thread-box">
						<i class="fa fa-refresh fa-spin fa-3x fa-fw spin center-block"></i>
						<span class="sr-only">Loading...</span>
					</div>
					
						<form action="" method="post" id="send-msg" class="msg-box">
							<input type="hidden" id="to_id" name="to_id" value="<?=$cur_prof->prof_id?>">
							<input type="hidden" id="conversation_id" name="conversation_id" value="<?=$conversation_data->conversation_id?>">
							<textarea name="msg" id="msg" cols="100" rows="1" class="form-control" placeholder="Type your message here..."></textarea>
							<button type="submit"  class="pull-right btn-student-sm" id="send-msg">Send</button>
						</form>
				
					<!--  -->
					<?php endif; ?>
				</div>
			</div>
		</div>
		
		<div class="col-lg-3">
			
			
			
			<!--  -->
			<div class="list-panel">
					<div class="list-heading"><h4 style="margin: 0px;"><i class="fa fa-address-card-o fa-padding"></i>Contact Professors</h4>
					</div>
					<div class="list-body">
						<?php if(!empty($professors)) : ?>
							<?php foreach($professors as $professor) :?>
								  <div class="media">
								    <div class="media-left">
								      <img src="<?=asset_url()?>uploads/<?=$professor->img?>" class="media-object img-circle img-thumbnail" style="width:60px">
								    </div>
								    <div class="media-body">
								    	<?php date_default_timezone_set('Asia/Kuala_Lumpur'); //for PHL ?>
								      <h4 class="media-heading"><?=$professor->name?></h4>
								      <span style="color: #e57373" data-toggle="tooltip" data-placement="right" title="Current Schedule"><i class="fa fa-map-marker"></i>&nbsp;<?=$this->schedule->get_current_schedule(date('H:i:s'), $professor->prof_id, date('N')) ?></span>
								      <p><?=$professor->about?></p>
								      <small><?=$professor->email?></small>
								      <hr>
								      <small><a href="<?=base_url()?>students/message/<?=$professor->prof_id?>" class='send-btn'><i class="fa fa-comment-o"></i>&nbsp;Send Message</a></small>
								    </div>
								  </div>
								  <hr>
								
							<?php endforeach; ?>
						<?php else: ?>
								<div class="no-result"><i class="fa fa-frown-o"></i>No professors</div>
						<?php endif; ?>
					</div>
			</div>
			<!--  -->
			<h3 class="text-right"><a href=""><i class="fa fa-question-circle"></i></a></h3>
		</div>
	</div>
</div>

<!-- ==============================MODAL ================================= -->
	
<div class="modal fade" id="map-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-map-o"></i>&nbsp;&nbsp;Map of Leyte Normal University</h4>
      </div>
      <div class="modal-body">
      	<div id="map" style="width: 565px; height: 400px">Please connect to the internet to view the map.</div>
      </div>
     <div style="display: flex; padding: 20px 0px">
     	 <button type="button" class="btn btn-sm btn-info" id="zoom" data-toggle="tooltip" data-placement="right" title="Toggle Free hand control"><i class="fa fa-search-plus" ></i>&nbsp;Free Hand</button>
     	 <button type="button" class="btn btn-sm btn-info" id="show-school" data-toggle="tooltip" data-placement="right" title="View Universities around Tacloban City Area"><i class="fa fa-graduation-cap"></i>&nbsp;Universities in Area</button>
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Close</button>
      </div>
    </div>
  </div>	
</div>

<!-- ==============================end ========================================= -->