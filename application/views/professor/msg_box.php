<div class="container">
	<ol class="breadcrumb">
		<li>
			<a href="<?=base_url()?>students">Home</a>
		</li>
		
		<li class="active">Message</li>
	</ol>
</div>

<div class="row">
	<h1 class="text-center title">Messaging Board</h1>
	<div class="col-lg-12">
		<div class="container">
			<div class="list-panel">
				<!--  -->
				<span class="panel-container pull-right">
					<img src="<?=asset_url()?>uploads/<?=$cur_stud->img?>" alt="" class="msg-img">
					<?=$cur_stud->name?>
				</span> <br> <br>
				<!--  -->
					<div class="list-body">
					
					<div id="msg-thread-box-prof">
						<i class="fa fa-refresh fa-spin fa-3x fa-fw spin center-block"></i>
						<span class="sr-only">Loading...</span>
					</div>
					
						<form action="" method="post" id="send-msg-prof" class="msg-box">
							<input type="hidden" id="to_id" name="to_id" value="<?=$cur_stud->stud_id?>">
							<input type="hidden" id="conversation_id" name="conversation_id" value="<?=$conversation_data->conversation_id?>">
							<textarea name="msg" id="msg" cols="40" rows="1" class="form-control" placeholder="Type your message here..."></textarea>
							<button type="submit" class="pull-right btn-student-sm" id="send-msg">Send</button>
						</form>
				</div>
			</div>
		</div>
	</div>
</div>