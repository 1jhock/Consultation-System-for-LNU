<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Students Consultation System</title>
	<link rel="stylesheet" href="<?=asset_url()?>css/style.css">
  <link rel="stylesheet" href="<?=asset_url()?>font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=asset_url()?>css/bootstrap.min.css">
</head>
<body>
	
<?php if($this->session->userdata('stud_id') == TRUE) :?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=base_url()?>students">Student | Student Consultation System</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
       
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">&nbsp;<?=$this->session->userdata('name')?>&nbsp;<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?=base_url()?>students/update_admin/<?=$this->session->userdata('admin_id')?>"><i class="fa fa-wrench"></i>&nbsp;Account</a></li>
             <li role="separator" class="divider"></li>
            <li><a href="<?=base_url()?>students/logout"><i class="fa fa-sign-out"></i>&nbsp;Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php elseif($this->session->userdata('prof_id') == TRUE) :?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=base_url()?>admins">Professor | Student Consultation System</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
       
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?=base_url() . 'img/businessman.svg'?>" width="25px" height="auto">&nbsp;<?=$this->session->userdata('name')?>&nbsp;<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?=base_url()?>admins/update_admin/<?=$this->session->userdata('admin_id')?>"><i class="fa fa-wrench"></i>&nbsp;Update Account</a></li>
           <li><a href="<?=base_url()?>admins/manage_users"><i class="fa fa-users"></i>&nbsp;Manage Users</a></li>
            <li role="separator" class="divider"></li>
              <li><a href="<?=base_url()?>admins/signup"><i class="fa fa-plus-square-o"></i>&nbsp;Add new Admin</a></li>
             <li role="separator" class="divider"></li>
            <li><a href="<?=base_url()?>admins/logout"><i class="fa fa-sign-out"></i>&nbsp;Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php else : ?>
  
<?php endif; ?>