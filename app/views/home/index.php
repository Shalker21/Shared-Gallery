<?php require 'app/views/includes/header.php'; ?>

<div class="container">
<?php require 'app/views/includes/navbar.php'; ?>


	<div class="jumbotron p-4 p-md-5 text-white rounded bg-dark text-center">
		<div class="col-md-6 mx-auto">
			<h1 class="display-4 font-italic"><?=$data['title']?></h1>
			<p class="lead my-3"><?=$data['description']?></p>
		</div>
	</div>

	<div class="col-md-12 border rounded p-3 mb-3">
		<div class="col-md-12 my-3">
			<span class=" bg-light p-2 rounded border">See how many images we count on site</span>
		</div>
		<div class="row">
			<div class="col-md-6">
				<button onclick="ajaxRequest()" class="btn btn-primary px-5">Show</button>
			</div>
			<div class="col-md-6" id="image_number">
				NUMBER: <span id="imageNumber"></span>
			</div>
		</div>
		
	</div>

	<div class="row">
		<div class="col-md-12 text-center m-3">
		<h3>10 Must liked images on site</h3>
		<hr>	
		</div>
		<?php $number = 0;?>
		<?php foreach($data['images'] as $image): ?>
			<?php 
				$number++;
				if($number>10) {
				break;
				}
			?>
			<div class="col-md-4">
				<div class="card mb-4 shadow-sm">
					<img src="<?php echo URLROOT."/public/images/".$image->file_name; ?>" height="100%" width="100%">
				</div>
			</div>
		<?php endforeach; ?>
	</div>

</div>



<?php require 'app/views/includes/footer.php'; ?>

<script>
	function ajaxRequest() {
		$.ajax({
			type: 'GET',
			url: '<?=URLROOT?>/app/controllers/Home?function=imageNumber',
			success: function(data) {
				$('#imageNumber').html(data);
			}
		});
	}
</script>

