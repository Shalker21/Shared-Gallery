<?php require 'app/views/includes/header.php'; ?>

	<div class="container">
		<?php require 'app/views/includes/navbar.php'; ?>
		<hr>

		
        <div class="row centered-form p-5 my-5">
			<div class="col-md-12 mx-auto mb-5">
				<div class="row">
					<div class="col-md-8"></div>
					<div class="col-md-4">
						<button class="btn btn-info mb-3 float-right">Log In With Your Google Account!</button>
					</div>
				</div>
				<div class="panel panel-default border rounded p-3 bg-light">
					<?php if(!empty($data['error'])) : ?>
						<div class="alert alert-danger">
							<?=$data['error']?>
						</div>
					<?php else : ?>
					<?php endif; ?>
					<div class="panel-heading">
						<h3 class="panel-title">Log In</h3>
					</div>
					<?php message('success_view');?>
					<div class="panel-body">
						<form action="<?=URLROOT?>/users/login" method="POST">
							<div class="form-group">
								<label for="email">E-Mail:</label>
								<input type="email" name="email" id="email" class="form-control input-sm <?php echo !empty($data['email_err']) ? 'border-danger' : ''; ?>" value="<?php !empty($data['email'])?>" placeholder="Email Address">
								<small class="text-danger"><?php !empty($data['email_err']); ?></small>
							</div>

							<div class="form-group">
								<label for="password">Password:</label>
								<input type="password" name="password" id="password" class="form-control input-sm <?php echo !empty($data['password_err']) ? 'border-danger' : ''; ?>" placeholder="Password...">
								<small class="text-danger"><?php !empty($data['password_err']); ?></small>
							</div>

							<div class="form-group ml-4">
								<input type="checkbox" name="remember_me" value="1" class="form-check-input" id="remember_me">
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
