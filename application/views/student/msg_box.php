<div class="container">
	<h1 class="title">Message to Professor <?=$cur_prof->name?></h1>
	<?php echo smiley_js(); ?>
	<div id="msg-thread-box">
		<i class="fa fa-spinner fa-spin fa-3x fa-fw spin center-block"></i>
		<span class="sr-only">Loading...</span>
	</div>
	<div class="msg-box">
		<form action="" method="post" id="send-msg">
			<input type="hidden" id="from_id" name="from_id" value="<?=$this->session->userdata('user-id')?>">
			<div class="row">
				<div class="col-lg-8">
					<div class="form-group">
				<textarea name="msg" id="msg" cols="30" rows="1" class="form-control" placeholder="Type your message here..."></textarea>
					</div>
			
				</div>
				<div class="col-lg-4">
					<div class="form-group">
				<button type="submit" class="pull-right btn btn-primary" id="send-msg">Send</button>
			</div>
				</div>
			</div>
		</form>

	</div>

	 <?php echo $smiley_table; ?>
</div>
