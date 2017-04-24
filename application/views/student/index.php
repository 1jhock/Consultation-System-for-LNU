<div class="container-fluid">
	<div class="row">
		<div class="col-lg-1"></div>
		<div class="col-lg-6">
			<h1 class="title">Recent Messages</h1>
			<ul class="basic-container">
				<li>
					<small>5 days ago</small> <br>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium, vero!
				</li>
				<li>ldsds  dsds sdsd 2</li>
				<li>ldsds  dsds sdsd 3</li>
				<li>ldsds  dsds sdsd 4</li>
				<li>ldsds  dsds sdsd 5</li>
				<li>ldsds  dsds sdsd 6</li>
				<li>ldsds  dsds sdsd 7</li>
				<li>ldsds  dsds sdsd 8</li>
				<li>ldsds  dsds sdsd 9</li>
				<li>ldsds  dsds sdsd 10</li>
			</ul>
		</div>
		<div class="col-lg-2"></div>
		<div class="col-lg-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3>Contact Professors</h3>
				</div>
				<div class="panel-body">
						<ul class="list-group">
							<?php if(!empty($professors)) : ?>
								<?php foreach($professors as $professor) :?>
									<li class="list-group-item"><a href="<?=base_url()?>current_prof/students/<?=$professor->prof_id?>"><?=$professor->name?></a> <br>
									<small><a href="<?=base_url()?>students/message/<?=$professor->prof_id?>">Send Message</a></small>
									</li>
								<?php endforeach; ?>
							<?php else: ?>
									<p>No professor</p>
							<?php endif; ?>
						</ul>
					</div>
			</div>
		</div>
	</div>
</div>