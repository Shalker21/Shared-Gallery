<?php require 'app/views/includes/header.php'; ?>

<?php require 'app/views/includes/navbar.php'; ?>
	
	<div class="container">	
		<div class="m-5 bg-light p-3 border rounded">

			<form action="<?=URLROOT?>/images/storeImages" method="POST" id="upload_image_form" enctype="multipart/form-data">

				<h3 class="text-info">ADD POST</h3>
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

					<div class="form-group">
						<label>Select Image:</label>
						<small class="d-block">You can select multiple images</small>

						<?php if(!empty($data['file_err'])) :?>
							<div class="alert alert-danger">Please Select images!</div>
						<?php endif; ?>
						
						<input id='image' type='file' name='image[]' multiple accept=".jpg, .png, .gif" hidden/>
						<input class="btn btn-primary" type="button" name="insert" id="insert" value="Select Images">
					</div>

				<div class="my-3" id="images_list">
		
				</div>
				
				<button class="btn btn-primary d-block" type="submit" name="submit">Post</button>

			</form>
			
		</div>

	
	</div>

<?php require 'app/views/includes/footer.php'; ?>

<script>
	$(document).ready(function() {

		
		$('#image').on('change', function(e) {
			e.preventDefault();

			var files = $(this)[0].files;
			var varHtml = "<b>SELECTED FILES</b>: <br>";
			var number = 0;
			for(var count = 0; count < files.length; count++) {
				number++;
				varHtml += "<b>"+ number +". </b>"+files[count].name+"<br>";
			}
			$('#images_list').html(varHtml).fadeIn();
			$('#images_list').addClass('border rounded p-1');
		});
		
		
	});
</script>
<script>
	document.getElementById('insert').addEventListener('click', function() {
		document.getElementById('image').click();
	});
	
</script>