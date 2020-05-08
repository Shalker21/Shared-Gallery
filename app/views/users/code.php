<?php require 'app/views/includes/header.php'; ?>

	<div class="container">
		<?php require 'app/views/includes/navbar.php'; ?>
		<hr>

		<form action="<?=URLROOT?>/users/code" method="POST">

			<div class="col-md-3 p-3 bg-light rounded border form-group mx-auto my-5">
			<?php if(!empty($data['error'])) : ?>
						<div class="alert alert-danger">
							<?=$data['error']?>
						</div>
					<?php endif; ?>
				<div class="alert alert-defaut border rounded text-info">Code number is located in your E-Mail address!</div>
				<label>Code Confirmation:</label>
				<input type="text" class="form-control" name="form_code_number" placeholder="Insert Number...">
				<small id="helpId" class="form-text text-muted"><?='validation'?></small>
				<button type="submit" name="code" class="btn btn-primary mt-1">Submit</button>
			</div>

		</form>
		</body>
</html>