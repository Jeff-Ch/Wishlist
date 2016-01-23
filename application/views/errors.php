<html>
	<head>
		<title>Wishlist - Errors</title>
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
	        <div class="col s12 m8 offset-m2">
	        	<h4 class="form_label">Wait a tick!</h4>
	          	<h5 class="center-align">You already added this item to your list.</h5>
	          	<h6 class="center-align"><a href="/wishlists/my_list" class="waves-effect waves-light btn-large amber accent-2 black-text" >Back to my Wishlist</a></h6>
	        </div>
	      </div>
		</div> <!-- end of container -->
	</body>
</html>

