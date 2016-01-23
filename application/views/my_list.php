<html>
	<head>
		<title>Wishlist - My List</title>
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
	      <h4 class="form_label">Your Wishlist</h4>
	      <?
	      	foreach($items as $item){ 
	      ?>
	      	<div class="col s12 m4">
	          <div class="card grey lighten-1">
	            <div class="card-content">
	              <img src="<?= $item['image_url']?>" width= 100%>
	            </div>
	            <div class="card-action">
            	  <a href="/main/info/<?= $item['product_id'] ?>"><span class="black-text title"><?= $item['name'] ?></span></a>
	              <a href="/wishlists/delete/<?= $item['product_id'] ?>"><i class="material-icons amber-text accent-2-text right">delete</i></a>
	            </div>
	          </div>
	        </div>
	    <?
	      }
	      ?>
	      </div> <!-- end of row -->
		</div> <!-- end of container -->

		
	</body>
</html>