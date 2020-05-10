<?php require 'app/views/includes/header.php'; ?>

<?php require 'app/views/includes/navbar.php'; ?>
<div class="container">	

	<h1 class="text-center p-3 text-primary">IMAGES</h1>
	<a href="<?=URLROOT?>/" class="btn btn-primary">Add Images</a>
	<div class="row border rounded p-3 my-3">
		<?php for($i = 0; $i < 10; $i++) : ?>
			<div class="col-md-4">
				<div class="card mb-4 box-shadow">

					<img class="card-img-top" src="https://cdn.pixabay.com/photo/2020/04/22/09/59/tree-5077020_1280.jpg" alt="Image">
					
					<div class="card-body">
						<h4 class=" text-primary">NASLOV</h4>
						<p class="card-text">OPIS</p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group">
								<button type="button" class="btn btn-sm btn-outline-secondary">View</button>
								<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
							</div>
							<small class="text-muted">Published: 9 mins</small>
						</div>
					</div>
				</div>
			</div>
		<?php endfor;?>
	</div>
</div>

<?php require 'app/views/includes/footer.php'; ?>