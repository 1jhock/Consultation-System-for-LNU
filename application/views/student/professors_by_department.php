<div class="container">
	<ol class="breadcrumb">
		<li>
			<a href="<?=base_url()?>students">Home</a>
		</li>
		<li>
			<a href="<?=base_url()?>students/list_professor">Professors by Department</a>
		</li>
		<li>
			<a href="<?=base_url()?>students/course_list/<?=$department->dept_id?>"><?=$department->full_name?></a>
		</li>
		<li class="active"><?=$courses->short_name?></li>
	</ol>
	<h1 class="text-center title"><?=$courses->full_name?></h1>	
	<br><br>
	
</div>


<!-- ==============================MODAL ================================= -->
	
<div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-address-book-o"></i>&nbsp;Current Information</h4>
      </div>
      <div class="modal-body" id="modal-current-prof">
      	<div class="modal-current-prof">
      		<i class="fa fa-refresh fa-spin fa-3x fa-fw spin center-block" id="loading-current-prof"></i>
      	</div>
      	
      	<table class='table table-hover table-striped'>
			<thead>
			 <tr>
				<th>Room</th>
				<th>Time</th>
			 </tr>
			 <tbody id='current-schedule'>
				<tr>
					<td></td>
					<td></td>
				</tr>
			 </tbody>
			</thead>
	 	</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Close</button>
      </div>
    </div>
  </div>	
</div>

<!-- ==============================end ========================================= -->