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
				<a class="btn btn-primary px-5" href="#">Show</a>
			</div>
			<div class="col-md-6" id="image_number">
				NUMBER
				<!-- Here goes number of all images in database -->
			</div>
		</div>
		
	</div>

	<div class="row">
		<div class="col-md-12 text-center m-3">
		<h3>Must liked images on site</h3>
		<hr>	
		</div>
		<div class="col-md-4">
        	<div class="card mb-4 shadow-sm">
            	<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
			</div>
		</div>
		<div class="col-md-4">
        	<div class="card mb-4 shadow-sm">
            	<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
			</div>
		</div>
		<div class="col-md-4">
        	<div class="card mb-4 shadow-sm">
            	<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
			</div>
		</div>
		<div class="col-md-4">
        	<div class="card mb-4 shadow-sm">
            	<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
			</div>
		</div>
		<div class="col-md-4">
        	<div class="card mb-4 shadow-sm">
            	<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
			</div>
		</div>
		<div class="col-md-4">
        	<div class="card mb-4 shadow-sm">
            	<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
			</div>
		</div>
		<div class="col-md-4">
        	<div class="card mb-4 shadow-sm">
            	<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
			</div>
		</div>
		<div class="col-md-4">
        	<div class="card mb-4 shadow-sm">
            	<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
			</div>
		</div>
		<div class="col-md-4">
        	<div class="card mb-4 shadow-sm">
            	<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
			</div>
		</div>
		<div class="col-md-4">
        	<div class="card mb-4 shadow-sm">
            	<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
			</div>
		</div>
	</div>

</div>



<?php require 'app/views/includes/footer.php'; ?>

