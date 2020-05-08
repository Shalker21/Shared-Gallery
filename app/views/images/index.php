<?php require 'app/views/includes/header.php'; ?>

	<h1>WELCOME</h1>

	<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'NIJE';?>
	<a href="<?=URLROOT?>/users/login" class="btn btn-danger">LOGOUT</a>

<?php require 'app/views/includes/footer.php'; ?>