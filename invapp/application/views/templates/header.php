<html>
	<head>
		<title>INVAPP</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	</head>
	<body>
	<div class="bs-component">
	  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	    <a class="navbar-brand" href="<?php echo base_url();?>">INVAPP</a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>

	    <div class="collapse navbar-collapse" id="navbarColor02">
	      <ul class="navbar-nav mr-auto">
	        <li class="nav-item active">
	          <a class="nav-link" href="<?php echo base_url();?>">Home <span class="sr-only">(current)</span></a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="<?php echo base_url();?>about">ABOUT</a>
	        </li>
	        <?php if(isset($_SESSION['username']) && $_SESSION['username']=='admin'): ?>
	       	<li class="nav-item">
	          <a class="nav-link" href="<?php echo base_url();?>users">USERS</a>
	        </li>
	        <?php elseif(isset($_SESSION['username'])): ?>
	       	<li class="nav-item">
	          <a class="nav-link" href="<?php echo base_url();?>items">ITEMS</a>
	        </li>
	        <?php endif; ?>
	      </ul>
	      <?php if(isset($_SESSION['logged_in'])): ?>
		  	<a class="btn btn-primary btn-lg" href="<?php echo base_url();?>users/logout">Logout</a>
		  	<?php else: ?>
		  	<a class="btn btn-primary btn-lg" href="<?php echo base_url();?>users/login">Log in</a>
		  <?php endif; ?>
		  <?php if(isset($_SESSION['username'])){ ?>
		  <span><?php echo $_SESSION['username']; ?></span>
		  <?php } ?>
	    </div>
	  </nav>
	</div>
	<br>
	<div class="container">

	<!-- Flash messages -->
	<?php if($this->session->flashdata('user_loggedin')): ?>
		<div class="alert alert-dismissible alert-info">
		  <strong><?php echo $this->session->flashdata('user_loggedin'); ?></strong>
		</div>
		<?php endif; ?>

		<?php if($this->session->flashdata('user_loggedout')): ?>
		<div class="alert alert-dismissible alert-info">
		  <strong><?php echo $this->session->flashdata('user_loggedout'); ?></strong>
		</div>
		<?php endif; ?>

		<?php if($this->session->flashdata('user_created')): ?>
		<div class="alert alert-dismissible alert-info">
		  <strong><?php echo $this->session->flashdata('user_created'); ?></strong>
		</div>
		<?php endif; ?>
		<?php if($this->session->flashdata('user_deleted')): ?>
		<div class="alert alert-dismissible alert-info">
		  <strong><?php echo $this->session->flashdata('user_deleted'); ?></strong>
		</div>
		<?php endif; ?>

		<?php if($this->session->flashdata('login_failed')): ?>
		<div class="alert alert-dismissible alert-danger">
		  <strong><?php echo $this->session->flashdata('login_failed'); ?></strong>
		</div>
		<?php endif; ?>
