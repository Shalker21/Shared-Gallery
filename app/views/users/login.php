<?php require 'app/views/includes/header.php'; ?>

	<div class="container">
		<?php require 'app/views/includes/navbar.php'; ?>
		<hr>

        <div class="row centered-form p-5 my-5">
			<div class="col-md-12 mx-auto mb-5">
				<div class="panel panel-default border rounded p-3 bg-light">
					<div class="panel-heading">
						<h3 class="panel-title">Log In</h3>
					</div>
					<div class="panel-body">
						<form role="form">

							<div class="form-group">
								<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
							</div>
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
							</div>
							<div class="form-group ml-4">
								<input type="checkbox" name="remember_me" class="form-check-input" id="remember_me">
								<label class="form-check-label" for="exampleCheck1">Remember Me</label>
							</div>
							
							<input type="submit" value="Login" class="btn btn-primary btn-block">
						
						</form>
						<span>Not registered? <a href="<?=URLROOT?>/users/register">Register</a></span>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php require 'app/views/includes/footer.php'; ?>
