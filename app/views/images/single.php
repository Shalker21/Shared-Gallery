<?php require 'app/views/includes/header.php'; ?>

<?php require 'app/views/includes/navbar.php'; ?>
<div class="container">	

	
	<div class="col-md-12 bg-light mt-5 border rounded">
	<a href="<?=URLROOT?>/images/index" class="btn btn-primary mt-3">Back</a>
	<a href="<?=URLROOT?>/images/edit/18" class="btn btn-info mt-3">Edit</a>
	<a href="#" class="btn btn-danger mt-3">Delete</a>
		<h1 class="font-weight-light text-center text-lg-left mt-4 mb-0"><?=$data['title']?></h1>
		<hr class="mt-2 my-3">
		<p class="font-weight-light text-center text-lg-left"><?=$data['description']?></p>
		<div class="row text-center text-lg-left">
			  <?php foreach($data['images'] as $image) : ?>
				  <div class="col-lg-3 col-md-4 col-6">
					  <a href="#" class="d-block mb-4 h-100 zoomClick m-3">
						  <img class="d-block w-100 img" src="<?php echo URLROOT."/public/images/".$image->file_name; ?>"/>
					  </a>
				  </div>
			  <?php endforeach; ?>
		</div>
	</div>


	
</div>



<?php require 'app/views/includes/footer.php'; ?>

