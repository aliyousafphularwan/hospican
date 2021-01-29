<div class="team">

	<?php
		if (isset($_GET['p']) == 'scat') {
		?>

		<p> <a href="index.php">Home</a> / Product Details </p>

		<?php		
		}
	?>

</div>

<div class="container p-5">
	
	<div class="row">
		<div class="dul col-md-3">
			<h5> Category<span style="font-size: 9pt;">(s)</span> </h5>
			<ul class="navbar-nav">
				<?php 
					$selectSubCat = "SELECT * FROM sub_categories";
					$subCatRes = mysqli_query($conn, $selectSubCat);
					if (mysqli_num_rows($subCatRes) > 0) {
						while ($subCatRow = mysqli_fetch_assoc($subCatRes)) {
							?>
							<li class="nav-item"><a class="nav-link" href="index.php?p=category&pid=<?php echo $subCatRow['id'];?>"> <?php echo $subCatRow['name'];?> </a></li>
							<?php	
						}
					}
				?>
			</ul>
		</div>
		<div class="col-md-9">
		<form method="post">
			<div class="row">
				
				<div class="col-md-6 w-100 mx-auto">
					<img src="#" class="img-fluids">
				</div>

				<div class="col-md-6">
					<div class="product-details">
						<h5> Product Name </h5>
						<p> Product Artical # </p>
						<ul class="navbar-nav pd-rate">
							<li class="nav-item"><i style="color: #d1c145" class="fa fa-star"></i></li>
							<li class="nav-item"><i style="color: #d1c145" class="fa fa-star"></i></li>
							<li class="nav-item"><i style="color: #d1c145" class="fa fa-star"></i></li>
							<li class="nav-item"><i class="fa fa-star"></i></li>
							<li class="nav-item"><i class="fa fa-star"></i></li>
						</ul>
						<h5>Description</h5>
						<p> description here </p>
					</div>
				</div>

			</div>
		</div>
	</form>
</div>