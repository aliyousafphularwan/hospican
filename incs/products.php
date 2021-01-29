<div class="team">
	
	<?php
		if (isset($_GET['page']) == 'products') {
		?>

		<p> <a href="index.php">Home</a> / Product Category(s) </p>

		<?php		
		}
	?>

</div>
	<div class="container p-2">
		<div class="row cr">
			<div class="col-md-3">
				<h5>Categories</h5>
				<hr>
				<?php 

					$selectSubCat = "SELECT * FROM sub_categories ORDER BY name ASC";
					$subCarRes = mysqli_query($conn, $selectSubCat);
					if (mysqli_num_rows($subCarRes) > 0) {
						echo "<ul class='navbar-nav dul'>";
						while ($subCatRow = mysqli_fetch_assoc($subCarRes)) {
							?>
							<li><a href="index.php?page=products&pid=<?php echo $subCatRow['id'];?>"> <?php echo $subCatRow["name"];?> </a></li>
							<?php
						}

						echo "</ul>";
					}else{
						echo "no categories found";
					}

				?>
			</div>
			<div class="col-md-9">

				<img src="imgs/pslider.png" class="img-fluid w-100">

				<hr>

				<h4 class="text-center"> Products </h4>

				<div class="row rp">

					<?php 

						if (!isset($_GET["pid"])) {
							
							$subcatSet = "SELECT * FROM sub_categories";
							$sres2 = mysqli_query($conn, $subcatSet);
							if (mysqli_num_rows($sres2) > 0) {
								while ($row2 = mysqli_fetch_assoc($sres2)) {
									?>

									<div class="col-md-4 my-2">
										<div class="card text-center">
										  <div class="card-body">
										  	<a class="nav-link" href="index.php?page=products&pid=<?php echo $row2['id'];?>">
										  	<img src="admin/uploads/imgs/<?php echo $row2['cimg'];?>" class="img-fluid pimg w-100">
										    <h6 class="my-2"><?php echo $row2['name'];?></h6>
										    </a>
										  </div>
										</div>
									</div>

									<?php
								}
							}else{
								echo "no category found.";
							}
						}
					?>
				</div>

				<div class="row">
					
					<?php

						$id = $_GET['pid'];

							$pgn = "SELECT * FROM products WHERE product_sub_cat = '$id'";
							$pgnres = mysqli_query($conn, $pgn);
							if (mysqli_num_rows($pgnres) > 0) {
								while ($pgrow = mysqli_fetch_assoc($pgnres)) {
									?>
										<div class="col-md-4 my-2">
											<div class="card text-center">
											  <div class="card-body">
											  	<img src="admin/uploads/products/<?php echo $pgrow['product_img'];?>" class="img-fluid pimg">
											    <h4 class="card-title"><?php echo $pgrow['product_name'];?></h4>
											    <p class="card-text"><?php echo $pgrow['product_art'];?></p>
											    <a href="#" class="btn btn-success"><i class="fa fa-heart"></i> &nbsp; Favorite</a>
											    <a href="index.php?page=product&spid=<?php echo $pgrow['id'];?>" class="btn btn-info"><i class="fa fa-info"></i> &nbsp; Details</a>
											  </div>
											</div>
										</div>

									<?php
								}
							}else{
								echo "no products found";
							}

					?>

				</div>

			</div>

		</div>

	</div>