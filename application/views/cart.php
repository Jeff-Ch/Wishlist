<html>
	<head>
		<title>Wishlist - Cart</title>
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
					<h4 class="form_label">Your Cart</h4>
					<div class="row">
			      <table class="striped">
					    <thead>
					      <tr>
				          <th data-field="id">Item</th>
						  		<th data-field="recipient">Recipient</th>
				          <th data-field="price">Price</th>
				          <th data-field="remove">Remove</th>
					      </tr>
					    </thead>
							<tbody>
							<?
							for($i = 0; $i < count($items) - 1; $i ++){ 

							?>
								<tr>
									<td><?= $items[$i]['name'] ?></td>
									<td><?= $items[$i]['first_name']." ".$items[$i]['last_name'] ?></td>
									<td>$ <?= number_format($items[$i]['price'],2,'.',',') ?></td>
									<td><a href="/carts/remove/<?= $items[$i]['product_id'] ?>/<?= $items[$i]['recipient_id'] ?>"><i class="material-icons remove black-text">delete</i></a></td>
								</tr>
						<?
						}
						?>
					    </tbody>
					  </table>
					</div> <!-- end of row -->


					<div class="row">
				      <table class="striped">
					    <thead>
					      <tr>
					          <th data-field="id">Total:</th>
					          <th data-field="price" id="total">$<?= $items['total'] ?></th>
					      </tr>
					    </thead>
					  </table>
					</div> <!-- end of row -->

					<div class="row">
			    	<form action="/billing/bill_user" method="POST" class="right">
							<script
							src="https://checkout.stripe.com/checkout.js" class="stripe-button"
							data-key="pk_test_m7JCy0kSf4lkc0AghLPzwJp6"
							data-name="Wishlist"
							data-description""
							data-amount=""
							data-locale="auto"
							data-shipping-address="true"
							data-billing-address="false">
							</script>
						</form>
					</div> <!-- end of row -->
				</div>
			</div>
		</div> <!-- end of container -->
	</body>
</html>