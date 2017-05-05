<div class="row">
	<div class="col-lg-12">
		<div class="container">
<h4><i class="fa fa-id-badge"></i>&nbsp;&nbsp;Students with Account</h4>
		<hr>
		<?php if(!empty($students)) : ?>
			<?php foreach($students as $student) :?>
				
			

				  <div class="media">
				    <div class="media-left">
				      <img src="<?=asset_url()?>uploads/<?=$student->img?>" class="media-object" style="width:60px">
				    </div>
				    <div class="media-body">
				      <h4 class="media-heading"><?=$student->name?></h4>
				      <p>
					      	 <i class="fa fa-envelope-o"></i><?=$student->email?> <br>
					      	<i class="fa fa-mortar-board"></i><?=$student->course?>	
				      	</p>
				      <small><a href="<?=base_url()?>professors/message/<?=$student->stud_id?>" class="send-btn"><i class="fa fa-comment-o"></i>&nbsp;Send Message</a></small>
				    </div>
				  </div>
				  <hr>
				
			<?php endforeach; ?>
		<?php else: ?>
				<p>No Student</p>
		<?php endif; ?>
</div>


	</div>
</div>