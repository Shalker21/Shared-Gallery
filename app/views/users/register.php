<?php require 'app/views/includes/header.php'; ?>

	<div class="container">
		<?php require 'app/views/includes/navbar.php'; ?>
		<hr>

        <div class="row centered-form p-5 my-5">
			<div class="col-md-12 mx-auto mb-5">
				<div class="panel panel-default border rounded p-3 bg-light">
					<div class="panel-heading">
						<h3 class="panel-title">Sign Up</h3>
					</div>
					<div class="panel-body">
					<form action="<?=FORMCONTROLLERSROOT?>/users/register" method="POST">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-input">
										<label for="first_name">First Name:</label>
									</div>
									<div class="form-group">
										<input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-input">
										<label for="last_name">Last Name:</label>
									</div>
									<div class="form-group">
										<input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name">
									</div>
								</div>
							</div>

							<div class="form-input">
								<label for="Username">Username:</label>
							</div>
							<div class="form-group">
								<input type="text" name="username" id="username" class="form-control input-sm" placeholder="Username">
							</div>

							
							<div class="form-group">
							<label for="email">Username:</label>
								<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="password">Password:</label>
										<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="password_confirmation">Confirm Password:</label>
										<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
									</div>
								</div>
							</div>
							
							<button type="submit" class="btn btn-primary btn-block">Register</button>
						
						</form>
						<span>Registered? <a href="<?=URLROOT?>/users/login">Login</a></span>
					</div>
				</div>
			</div>
		</div>
	</div>

	

<?php require 'app/views/includes/footer.php'; ?>
