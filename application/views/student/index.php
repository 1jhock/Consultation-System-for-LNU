<div class="container-fluid">
	<a href="<?=base_url()?>students/list_professor" class="btn btn-primary pull-right"><i class="fa fa-users"></i>&nbsp;See all Professors</a> <br> <br> <br>
			<hr>
	<div class="row">
		<div class="col-lg-7">
				<h4 class="title-heading"><i class="fa fa-comment-o"></i>Recent Conversation
				<div class="panel-container pull-right "  style="font-size: 13px; color: black">
					<?php if(empty($cur_prof)) :  ?>
						No data
					<?php else : ?>
						<img src="<?=asset_url()?>uploads/<?=$cur_prof->img?>" alt="" class="msg-img">
					Professor <?=$cur_prof->name?>
					<?php endif; ?>
				</div>
			</h4>
			<!--  -->
			<?php if(empty($conversation_data)) : ?>
				<div class="no-result"><i class="fa fa-frown-o"></i>No recent conversation</div>
			<?php else : ?>
			<div id="msg-thread-box">
				<i class="fa fa-spinner fa-spin fa-3x fa-fw spin center-block"></i>
				<span class="sr-only">Loading...</span>
			</div>
			<div class="msg-box">
				<form action="" method="post" id="send-msg">
					<input type="hidden" id="to_id" name="to_id" value="<?=$cur_prof->prof_id?>">
					<input type="hidden" id="conversation_id" name="conversation_id" value="<?=$conversation_data->conversation_id?>">
					<div class="row">
						<div class="col-lg-8">
							<div class="form-group">
						<textarea name="msg" id="msg" cols="40" rows="1" class="form-control" placeholder="Type your message here..."></textarea>
							</div>
					
						</div>
						<div class="col-lg-4">
							<div class="form-group">
						<button type="submit"  class="pull-right btn btn-primary" id="send-msg">Send</button>
					</div>
						</div>
					</div>
				</form>

			</div>
			<!--  -->
			<?php endif; ?>
		</div>
		<div class="col-lg-2"></div>
		<div class="col-lg-3">
			
			<h4 class="title-heading"><i class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;Contact Professors
				<span class="badge pull-right">BSIT</span>
			</h4>
			
			<!--  -->
			<div class="list-professors">
				<?php if(!empty($professors)) : ?>
					<?php foreach($professors as $professor) :?>
						  <div class="media">
						    <div class="media-left">
						      <img src="<?=asset_url()?>uploads/<?=$professor->img?>" class="media-object img-circle img-thumbnail" style="width:60px">
						    </div>
						    <div class="media-body">
						      <h4 class="media-heading"><?=$professor->name?></h4>
						      <p><?=$professor->about?></p>
						      <hr>
						 		<p class="secondary-text"> <?=$professor->email?>
						      <?=$professor->department?></p>
						     
						      <small><a href="<?=base_url()?>students/message/<?=$professor->prof_id?>" class='send-btn'><i class="fa fa-comment-o"></i>&nbsp;Send Message</a></small>
						    </div>
						  </div>
						  <hr>
						
					<?php endforeach; ?>
				<?php else: ?>
						<div class="no-result"><i class="fa fa-frown-o"></i>No professors</div>
				<?php endif; ?>
			</div>
			<!--  -->
			<h3 class="text-right"><a href=""><i class="fa fa-question-circle"></i></a></h3>
		</div>
	</div>
</div>