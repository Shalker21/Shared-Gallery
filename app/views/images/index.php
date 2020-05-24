<?php require 'app/views/includes/header.php'; ?>

<?php require 'app/views/includes/navbar.php'; ?>
<div class="container">	


	<h1 class="text-center p-3 text-primary">POSTS</h1>
	<a href="<?=URLROOT?>/images/createPost" class="btn btn-primary">Add Images</a>
	<div class="row border rounded p-3 my-3">
		<?php foreach($data as $post) : ?>
			<div class="col-md-4">
				<div class="card mb-4 box-shadow">

					<div id="carouselExampleControls<?=$post->post_id?>" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							
							<?php foreach($images = explode(',', $post->images) as $key => $image) : ?>
								<div class="carousel-item <?php if($key == 0) {echo 'active';} ?>">
									<img height="300" class="d-block w-100" src="<?=URLROOT?>/public/images/<?=$image?>">
								</div>
							<?php endforeach; ?> 
						</div>
						<a class="carousel-control-prev" href="#carouselExampleControls<?=$post->post_id?>" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleControls<?=$post->post_id?>" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
					
					<div class="card-body">
						<h4><a class=" text-primary" href="<?=URLROOT?>/images/single/<?=$post->post_id?>"><?=$post->title?><a></h4>
						<p class="card-text"><?=$post->description?></p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group mr-3">
								<a type="button" class="btn btn-sm btn-outline-secondary" href="<?=URLROOT?>/images/single/<?=$post->post_id?>">View</a>
								<?php if(isset($_SESSION['user_id'])) : ?>
									<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
									<button onclick="deletePost(<?=$post->post_id?>)" id="delete_product" type="button" class="btn btn-sm btn-outline-secondary">Delete</button>
								<?php endif; ?>
							</div>
							<small class="text-muted d-block">Published: <?=$post->created_at?></small>
							<small class="text-muted">By User: <?=$post->name?></small>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
	</div>
</div>

<?php require 'app/views/includes/footer.php'; ?>
<script>
	function deletePost(postID) {
		Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			$.ajax({
				type: "POST",
				url: "<?=URLROOT?>/Images/ajaxRequest",
				data: 'post_id='+postID,
				cache: false,
				success: function(response) {
					swal(
					"Sccess!",
					"Your note has been saved!",
					"success"
					)
				},
				failure: function (response) {
					swal(
					"Internal Error",
					"Oops, your note was not saved.", // had a missing comma
					"error"
					)
				}
			});
			if (result.value) {
				Swal.fire(
				'Deleted!',
				'Your file has been deleted.',
				'success'
				)
			}
		})
	}
</script>