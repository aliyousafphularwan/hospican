<div class="team">

	<?php
		if (isset($_GET['p']) == 'plist') {
			if (isset($_GET['cid'])) {
				$pid1 = $_GET['cid'];
				$q1 = "SELECT * FROM products WHERE product_sub_cat = '$pid1' LIMIT 1";
				$qres = mysqli_query($conn, $q1);
				if (mysqli_num_rows($qres) > 0) {
					while ($r1 = mysqli_fetch_assoc($qres)) {
						?>
						<p> <a href="index.php">Home</a> / <a href="index.php?p=category">Product</a> / <?php echo $r1['smcat'];?> </p>						
						<?php
					}
				}else{
					echo "<p> <a href='index.php'>Home</a> / Product List </p>";
				}
			}
		?>

		

		<?php		
		}
	?>

</div>
<div class="container p-5">
	
	<div class="row">
		<div class="dul col-md-3">
			<h5> Categories </h5>
			<div class="sandwich2">
				<i class="fa fa-bars fa-x2"></i>
			</div>
			<hr>
			<ul class="navbar-nav catnav">
				<?php 

					$selectSubCat = "SELECT * FROM sub_categories WHERE main = '".$_GET['cid']."' ORDER BY name ASC";
					$subCatRes = mysqli_query($conn, $selectSubCat);
					if (mysqli_num_rows($subCatRes) > 0) {
						while ($subCatRow = mysqli_fetch_assoc($subCatRes)) {
							?>
							<li class="nav-item"><a class="nav-link" href="index.php?p=plist&cid=<?php echo $subCatRow['main']?>&scid=<?php echo $subCatRow['id'];?>"> <?php echo $subCatRow['name'];?> </a></li>
							<?php	
						}
					}
				?>
			</ul>
		</div>
		
		<div class="col-md-9">
			<img src="imgs/pslider.png" class="img-fluid w-100 mb-2">
			<!-- <h4 style="background: #f55;padding: 10px;text-align: center;color: #fff;"> Products </h4> -->
			
			<div class="row w-100 mx-auto">

				<?php 
					if (isset($_GET['scid'])) {

						$limit = 12;
						
						if (isset($_GET['pgno'])) {
							$pgno = $_GET['pgno'];
						}else{
							$pgno = 1;
						}

						$offset = ($pgno - 1) * $limit;

						$id = $_GET['scid'];
						$selectSubCat = "SELECT * FROM products WHERE product_sub_cat = '$id' LIMIT {$offset},{$limit}" or die(mysqli_error());
						$subCatRes = mysqli_query($conn, $selectSubCat);
						if (mysqli_num_rows($subCatRes) > 0) {
							while ($catsRow = mysqli_fetch_assoc($subCatRes)) {
								?>

								<div class="col-md-3 my-2 text-center">
									<a style="text-decoration: none;color: #000;" href="index.php?p=product&spid=<?php echo $catsRow['id'];?>">
										<div class="card">
										  <img class="card-img-top img-fluid" src="admin/uploads/products/<?php echo $catsRow['product_img'];?>" alt="Card image cap">
										  <div class="card-body">
										    <p class="card-text"><b><?php echo $catsRow['product_name'];?></b></p>

										    <p class=""><?php echo $catsRow['product_art'];?></p>
										  </div>
										</div>
									</a>
								</div>

								<?php
							}
						}else{
							echo "<p style='color: #f55;'> no related product found </p>";
						}
					}
				?>

			</div>

			<?php 

				$pid = $_GET['scid'];
				// echo "catgory id is: " . $pid;
				// if (isset($_GET['pgno'])) {
				// 	$pgno = $_GET['pgno'];
				// }else{
				// 	$pgno = 1;
				// }

				$cp = "SELECT * FROM products WHERE product_sub_cat = '$pid'";
				$cpr = mysqli_query($conn, $cp);
				$cnt = mysqli_num_rows($cpr);

				$ttl_pgs = ceil($cnt / $limit);

				echo "<ul class='pagination m-2'>";
				if ($pgno > 1) {
					?>
					<li class="page-item"><a href="index.php?p=plist&pid=<?php echo $pid?>&pgno=<?php echo $pgno - 1;?>" class="page-link"><i class="fa fa-arrow-left"></i></a></li>
					<?php
				}

				for ($i=1; $i < $ttl_pgs; $i++) { 

					if ($i == $pgno) {
						$active = 'pg-active';
					}else{
						$active = '';
					}

					?>
					<li class="page-item <?php echo $active;?>"><a class="page-link" href="index.php?p=plist&pid=<?php echo $pid;?>&pgno=<?php echo $i;?>"> <?php echo $i;?> </a></li>
					<?php
				}
				if ($ttl_pgs > $pgno) {
					?>
					<li class="page-item"><a href="index.php?page=plist&pid=<?php echo $pid?>&pgno=<?php echo $pgno + 1;?>" class="page-link"><i class="fa fa-arrow-right"></i></a></li>
					<?php
				}
				echo "</ul>";

			?>
		</div>

	</div>

</div>