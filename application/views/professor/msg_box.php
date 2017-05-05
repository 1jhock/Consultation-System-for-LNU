<div class="row">
	<div class="col-lg-12">
		<div class="container">
	<h1 class="title"><span class="highlight">Message to: <?=$cur_stud->name?></span></h1>
<!-- 	<h2><?= date('F j, Y g:i a',strtotime($cur_prof->date_created))?></h2> -->
	<div id="msg-thread-box">
		<i class="fa fa-spinner fa-spin fa-3x fa-fw spin center-block"></i>
		<span class="sr-only">Loading...</span>
	</div>
	<div class="msg-box">
		<form action="" method="post" id="send-msg-prof">
			<input type="hidden" id="to_id" name="to_id" value="<?=$cur_stud->stud_id?>">
			<input type="hidden" id="conversation_id" name="conversation_id" value="<?=$conversation_data->conversation_id?>">
			<div class="row">
				<div class="col-xs-8">
					<div class="form-group">
				<textarea name="msg" id="msg" cols="30" rows="1" class="form-control" placeholder="Type your message here..."></textarea>
					</div>
			
				</div>
				<div class="col-xs-4">
					<div class="form-group">
				<button type="submit" class="pull-right btn btn-primary">Send</button>
			</div>
				</div>
			</div>
		</form>

	</div>

</div>

	</div>
</div>