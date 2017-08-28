<div class="container">
		<div class="row">
		<h1 class="text-center title"><?=$this->crud->get_course($cur_course)?></h1>
		<br>
		<br>
		<br>
		<div class="col-lg-12">
			<?php if(empty($students)) : ?>
		<div class="no-result"><i class="fa fa-frown-o"></i>No students</div>
	<?php else : ?>
	<table class="table table-hover table-striped table-responsive">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Active since</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($students as $student) : ?>
				<tr>
					<td><img src="<?=asset_url()?>uploads/<?=$student->img?>" alt="Profile Picture" class="img-circle" style="height: 30px; width: auto">&nbsp;&nbsp;<?=$student->name?></td>
					<td><?=$student->email?></td>
					<td><?=$student->date_created?></td>
					<td style="display: flex; align-items: center;"><a class="btn-student-sm" data-id="<?=$student->stud_id?>" data-toggle="modal" href="<?=base_url()?>professors/current_message/<?=$student->stud_id?>">Send message</a></td></tr>
					
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php endif; ?>
		</div>
	</div>
</div>