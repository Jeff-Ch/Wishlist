<html>
	<head>
		<title>Wishlist - Friend's List</title>
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
			<div class="row"  id="collection_top">
			<div class="nav-wrapper">
				<form action="/users/find_user" method="post">
					<div class="col m6 offset-m3">
						<div class="input-field grey lighten-4">
		          <input class="grey lighten-4" id="search" name="email" type="search" required>
		          <label for="search"><i class="material-icons">search</i></label>
		        </div>
		        <div class="row">
		        	<div class="col m12">
							 	<button class="waves-effect waves-light btn amber accent-2 black-text right">Search</button>
		        	</div>
						</div>
					</div>
				</form>
				</div>
			</div>
			<div class="row">
				<div class="col m5">
					<ul class="collection with-header">
						<li class="collection-header center-align"><h4>Friends</h4></li>
						<? foreach($friends as $friend){ ?>
								<li class="collection-item"><div><?= $friend['name'] ?><a href="/wishlists/friends_list/<?= $friend['user_id'] ?>" class="secondary-content"><i class="material-icons grey-text">view_list</i></a></div></li>
						<? } ?>
			    </ul>
				</div> <!--end of col m6 -->
				<div class="col m5 offset-m2">
					<ul class="collection with-header">
						<li class="collection-header center-align"><h4>Friend Requests</h4></li>
						<? foreach($friend_requests as $request){ ?>
								<li class="collection-item">
									<div><?= $request['requestor_name'] ?>
										<a href="/wishlists/friends_list/<?= $request['requestor_id'] ?>" class="secondary-content"><i class="material-icons grey-text">view_list</i></a>
									</div>
								</li>
						<? } ?>
			    </ul>
				</div>
			</div> <!-- end of row -->
		</div> <!-- end of container -->	
	</body>
</html>