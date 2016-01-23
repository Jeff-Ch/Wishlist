<html>
	<head>
		<title>Wishlist - <?= $name ?>'s Wishlist</title>
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
			  <div class="col-m12">
					<h4 class="form_label"><?= $name ?>'s Wishlist</h4>
					<? if ($friend_status == "friends") { ?>
			    	<form action="/users/remove_friend/<?=$this->session->userdata('id')?>/<?=$friend_id?>">
						  <button class="btn waves-effect waves-light red darken-3 black-text right" type="submit" name="action"><i class="material-icons left">close</i>Remove Friend</button>
						</form>
			    	<button class="btn waves-effect waves-light grey black-text right"><i class="material-icons left">done</i>Friends</button>
					<? } ?>
					<? if ($friend_status == "cancel") { ?>
			    	<form action="/users/cancel_friend_req/<?=$this->session->userdata('id')?>/<?=$friend_id?>">
						  <button class="btn waves-effect waves-light grey black-text right" type="submit" name="action"><i class="material-icons left">close</i>Cancel Friend Request</button>
						</form>
					<? } ?>
					<? if ($friend_status == "accept") { ?>
			    	<form action="/users/accept_friend_req/<?=$friend_id?>/<?=$this->session->userdata('id')?>">
						  <button class="btn waves-effect waves-light grey lighten-3 black-text right" type="submit" name="action"><i class="material-icons left">perm_identity</i>Accept Friend Request</button>
			    	</form>
			    	<form action="/users/reject_friend_req/<?=$friend_id?>/<?=$this->session->userdata('id')?>">
						  <button class="btn waves-effect waves-light grey lighten-3 black-text right" type="submit" name="action"><i class="material-icons left">close</i>Reject Friend Request</button>
			    	</form>
					<? } ?>
					<? if ($friend_status == "none") { ?>
						<form action="/users/add_friend/<?=$this->session->userdata('id')?>/<?=$friend_id?>" method="post">
			    		<button class="btn waves-effect waves-light grey darken-3 amber-text accent-2-text right" type="submit" name="action"><i class="material-icons left">add</i>Add Friend</button>
			    	</form>
					<? } ?>
		    </div>
		  </div>
  			<div class="row">
			
	      <?
	      if(isset($item)){
	      for($i = 0; $i < count($item); $i ++){
	      	?>
	      	<div class="col s12 m3">
	          <div class="card grey lighten-1">
	            <div class="card-content">
	              <img src="<?= $item[$i]['image_url'] ?>" width= 100%>
	            </div>
	            <div class="card-action padding_bottom">
	              <a href="/main/info/<?= $item[$i]['product_id'] ?>"><span class="black-text title"><?= $item[$i]['name'] ?></span></a>
	              <a href="/wishlists/add_my_list/<?= $item[$i]['product_id'] ?>"><i class="material-icons amber-text accent-2-text right">add</i></a>
	              <!-- CHECKOUT BUTTON -->
					<form action = "/carts/add" method = "post">
						<div>
						  <input type = "hidden" name = "product_id" value = "<?= $item[$i]['product_id'] ?>">
	              	      <input type = "hidden" name = "recipient_id" value = "<?= $item[$i]['id'] ?>">
					 	  <button class="waves-effect waves-light btn amber accent-2 black-text center buy" type="submit" name="action"><i class="material-icons left black-text">payment</i>Buy Gift</button>
						</div>
					</form>
				</div>
	          </div>
	        </div>
	        <?
	      }
	  }
	      ?>

	      </div> <!-- end of row -->
		</div> <!-- end of container -->
	</body>
</html>