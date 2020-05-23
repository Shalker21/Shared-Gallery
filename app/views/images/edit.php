<?php require 'app/views/includes/header.php'; ?>

<?php require 'app/views/includes/navbar.php'; ?>

<div class="container">	

<div class="m-5 bg-light p-3 border rounded">

<form action="<?=URLROOT?>/images/UpdatePost" method="POST" id="upload_image_form" enctype="multipart/form-data">

	<h3 class="text-info">EDIT POST</h3>
	<?php !empty($data['title_err']) ? $data['title_err']:''; ?>
		<div class="form-group">
			<label>Title:</label>
			<input type="text" class="form-control <?php echo !empty($data['title_err']) ? 'border-danger' : ''; ?>" name="title" placeholder="Insert Title..." value="<?php echo !empty($data['title']) ? $data['title']:'';?>">
			<small class="text-danger"><?php echo !empty($data['title_err']) ? $data['title_err'] : '';?></small>
		</div>

		<div class="form-group">
			<label>Description:</label>
			<textarea class="form-control <?php echo !empty($data['description_err']) ? 'border-danger' : ''; ?>" name="description" placeholder="Insert description..."><?php echo !empty($data['description']) ? $data['description']:'';?></textarea>
			<small class="text-danger"><?php echo !empty($data['description_err']) ? $data['description_err'] : ''; ?></small>
		</div>

		<div class="row text-center text-lg-left">
			  <?php foreach($data['images'] as $image) : ?>
				  <div class="col-lg-3 col-md-4 col-6">
					  <a href="#" class="d-block mb-4 h-100 zoomClick m-3">
						  <img class="d-block w-100 img" src="<?php echo URLROOT."/public/images/".$image->file_name; ?>"/>
					  </a>
				  </div>
			  <?php endforeach; ?>
		</div>

	<div class="my-3" id="images_list">

	</div>
	
	<button class="btn btn-primary d-block" type="submit" name="submit">Post</button>

</form>

</div>
	
</div>

<?php require 'app/views/includes/footer.php'; ?>
