<div class="container">
	<h1 class="text-center title">Courses under <?=$dept?></h1>
	<br>
	<br>
	<br>
	<div class="row">
		<div class="col-lg-12">
			<?php if(empty($courses)) : ?>
				<p class="text-center no-result">
					<i class="fa fa-frown-o"></i>&nbsp;&nbsp;No courses under this department.
				</p>
			<?php else : ?>
	<table class="table table-hover table-striped table-responsive">
		
		<tbody>
			<?php foreach($courses as $course) : ?>
				<tr>
					<td><a href="<?=base_url()?>professors/students_list/<?=$course->course_id?>"><?=$course->full_name?></a>&nbsp;&nbsp;&nbsp;<span class="badge"><?=$course->num_stud?></span></td>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php endif; ?>
		</div>
	</div>

</div>

