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
					<form action="<?=URLROOT?>/users/register" method="POST">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-input">
										<label for="first_name">First Name:</label>
									</div>
									<div class="form-group">
										<input type="text" name="first_name" id="first_name" class="form-control input-sm <?php echo !empty($data['first_name_err']) ? 'border-danger' : '' ?>" value="<?=$data['first_name']?>" placeholder="First Name" >
										<small class="text-danger"><?=$data['first_name_err']?></small>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-input">
										<label for="last_name">Last Name:</label>
									</div>
									<div class="form-group">
										<input type="text" name="last_name" id="last_name" class="form-control input-sm <?php echo !empty($data['last_name_err']) ? 'border-danger' : '' ?>" placeholder="Last Name" value="<?=$data['last_name']?>">
										<small class="text-danger"><?=$data['last_name_err']?></small>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="Username">Username:</label>
								<input type="text" name="username" id="username" class="form-control input-sm <?php echo !empty($data['username_err']) ? 'border-danger' : ''; ?>" placeholder="Username" value="<?=$data['username']?>">
								<small class="text-danger"><?=$data['username_err']?></small>

							</div>

							
							<div class="form-group">
								<label for="email">E-Mail:</label>
								<input type="email" name="email" id="email" class="form-control input-sm <?php echo !empty($data['email_err']) ? 'border-danger' : ''; ?>" value="<?=$data['email']?>" placeholder="Email Address">
								<small class="text-danger"><?=$data['email_err']?></small>
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="password">Password:</label>
										<input type="password" name="password" id="password" class="form-control input-sm <?php echo !empty($data['password_err']) ? 'border-danger' : ''; ?>" placeholder="Password" >
										<small class="text-danger"><?=$data['password_err']?></small>

									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label for="password_confirmation">Confirm Password:</label>
										<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm <?php echo !empty($data['confirm_password_err']) ? 'border-danger' : ''; ?>" placeholder="Confirm Password" >
										<small class="text-danger"><?=$data['confirm_password_err']?></small>
									</div>
								</div>
							</div>
							
							<button name="register" type="submit" class="btn btn-primary btn-block">Register</button>
						
						</form>
						<span>Registered? <a href="<?=URLROOT?>/users/login">Login</a></span>
					</div>
				</div>
			</div>
		</div>
	</div>

	

<?php require 'app/views/includes/footer.php'; ?>
