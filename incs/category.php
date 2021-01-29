<div class="team">

	<?php
		if (isset($_GET['p']) == 'category') {
			
		?>

		<p> <a href="index.php">Home</a> / Category </p>

		<?php		
		}
	?>

</div>
<div class="container p-5">
	
	<div class="row">
		<div class="dul col-md-3 ">
			<h5> Categories </h5>

			<div class="sandwich2">
				<i class="fa fa-bars fa-x2"></i>
			</div>
			<hr>
			<ul class="navbar-nav catnav">
				<?php 
					$selectSubCat = "SELECT * FROM sub_categories ORDER BY name ASC";
					$subCatRes = mysqli_query($conn, $selectSubCat);
					if (mysqli_num_rows($subCatRes) > 0) {
						while ($subCatRow = mysqli_fetch_assoc($subCatRes)) {
							?>
							<li class="nav-item"><a class="nav-link" href="index.php?p=plist&pid=<?php echo $subCatRow['id'];?>"> <?php echo $subCatRow['name'];?> </a></li>
							<?php	
						}
					}
				?>
			</ul>
		</div>
		
		<div class="col-md-9">
			<img src="imgs/pslider.png" class="img-fluid w-100 mb-2">
			<!-- <h4 style="background: #f55;padding: 10px;text-align: center;color: #fff;"> Product Categories </h4> -->
			<div class="row w-100 mx-auto">

				<?php 
					if (!isset($_GET['pid'])) {
						$selectSubCat = "SELECT * FROM sub_categories ORDER BY name ASC";
						$subCatRes = mysqli_query($conn, $selectSubCat);
						if (mysqli_num_rows($subCatRes) > 0) {
							while ($catsRow = mysqli_fetch_assoc($subCatRes)) {
								?>

								<div class="col-md-4 text-center">
									<a href="index.php?p=plist&pid=<?php echo $catsRow['id'];?>">
										<div class="card">
										  <img class="card-img-top img-fluid pimg" src="admin/uploads/imgs/<?php echo $catsRow['cimg'];?>" alt="Card image cap">
										  <div class="card-body">
										    <p class="card-text"><?php echo $catsRow['name'];?></p>
										  </div>
										</div>
									</a>
								</div>

								<?php
							}
						}
					}
				?>

			</div>
		</div>

	</div>

</div>