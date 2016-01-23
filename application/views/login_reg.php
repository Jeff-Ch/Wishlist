<?php
@include('partials/nav.php');
?>
		<div class="container">
			<div class="row">
			 	<!-- REGISTRATION -->
			    <form class="col m5 s12" action="/users/register" method="post">
			    <h4 class="form_label">Register</h4>
			      <div class="row">
			        <div class="input-field col s6">
			          <input id="first_name" type="text" name="first_name" class="validate">
			          <label for="first_name">First Name</label>
			        </div>
			        <div class="input-field col s6">
			          <input id="last_name" type="text" name="last_name" class="validate">
			          <label for="last_name">Last Name</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="email" type="email" name="email" class="validate">
			          <label for="email">Email</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="password" type="password" name="password" class="validate">
			          <label for="password">Password</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="confirm_password" type="password" name="confirm_password" class="validate">
			          <label for="confirm_password">Confirm Password</label>
			        </div>
			      </div>
				  <div class="row">
						<div>
						 	<button class="waves-effect waves-light btn amber accent-2 black-text right">Register</button>
						</div>
				  </div>
			    </form>
			    

			    <!-- LOGIN -->
			    <!-- needs responsive work -->
			    <form class="col m5 offset-m2 s12" action="/users/login" method="post">
			      <h4 class="form_label">Login</h4>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="login_email" type="email" name="email" class="validate">
			          <label for="login_email">Email</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="login_password" type="password" name="password" class="validate">
			          <label for="login_password">Password</label>
			        </div>
			      </div>
			      <div class="row">
						 	<button class="waves-effect waves-light btn amber accent-2 black-text right">Login</button>
					  </div>
			    </form>
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</body>
</html>