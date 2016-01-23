<html>
	<head>
		<title>Wishlist - Settings</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Raleway:200,100' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css'); ?>">
	</head>
	<body>
<?php
@include('partials/nav_logged_in.php');
?>
		<div class="container">
			<div class="row">
			 	<!-- CHANGE INFORMATION -->
			    <form class="col m5 s12" action="/users/edit_info/<?=$this->session->userdata('id')?>" method="post">
			    <h4 class="form_label">Change Information</h4>
			      <div class="row">
			        <div class="input-field col s6">
			          <input id="first_name" type="text" name="first_name" class="validate" value="<?=$this->session->userdata('first_name')?>">
			          <label for="first_name">First Name</label>
			        </div>
			        <div class="input-field col s6">
			          <input id="last_name" type="text" name="last_name" class="validate" value="<?=$this->session->userdata('last_name')?>">
			          <label for="last_name">Last Name</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="email" type="email" name="email" class="validate" value="<?=$this->session->userdata('email')?>">
			          <label for="email">Email</label>
			        </div>
			      </div>
			      <div class="row">
					<div>
					 	<button class="waves-effect waves-light btn amber accent-2 black-text right">Update</button>
					</div>
				  </div>
			    </form>
			    <!-- RESET PASSWORD -->
			    <form class="col m5 offset-m2 s12" action="/users/change_password/<?=$this->session->userdata('id')?>" method="post">
			      <h4 class="form_label">Reset Password</h4>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="password" type="password" name="password" class="validate">
			          <label for="password">New Password</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="confirm_password" type="password" name="confirm_password" class="validate">
			          <label for="confirm_password">Password</label>
			        </div>
			      </div>
			      <div class="row">
					<div>
					 	<button class="waves-effect waves-light btn amber accent-2 black-text right">Reset</button>
					</div>
				  </div>
			    </form>
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</body>
</html>