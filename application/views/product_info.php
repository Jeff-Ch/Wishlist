<html>
	<head>
		<title>Wishlist - <?= $info['name'] ?></title>
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
				<div class="col m6 offset-m3">
					<h4 class="form_label" id="margin_bottom">Product Information</h4>
				</div> <!--end of col m6 -->
			</div> <!-- end of row -->

			<div class="row">
	        <div class="col s12 m6 offset-m3">
	          <div class="card">
	          	<!-- size of area will change depending on the size of img-->
	            <div class="card-image">
	              <img src="<?= $info['image_url'] ?>">
	            </div>
	            <div class="card-content">
	              
	            </div>
	            <div class="card-action grey lighten-1">
	              <span class="card-title black-text"><?= $info['name'] ?></span>
	              <span class="card-title black-text right price">$<?= number_format($info['price'],2,'.',',') ?></span>
	              <p class="padding"><?= $info['description'] ?></p>
	            </div>
	          </div>
	        </div>
	      </div>
		
		</div> <!-- end of container -->

		
	</body>
</html>