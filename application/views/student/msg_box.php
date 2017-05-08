<div class="row">
	<h1 class="text-center title">Messaging Board</h1>
	<div class="col-lg-12">
		<div class="container">
			<!--  -->
			<span class="panel-container pull-right">
				<img src="<?=asset_url()?>uploads/<?=$cur_prof->img?>" alt="" class="msg-img">
				Professor <?=$cur_prof->name?>
			</span> <br> <br>
			<!--  -->
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
						<button type="submit" class="pull-right btn btn-primary" id="send-msg">Send</button>
					</div>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>