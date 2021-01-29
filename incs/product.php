<?php

	$smcat;
	$desc;

?>
<div class="team">
	<?php
		if (isset($_GET['p']) == 'product') {
		?>

		<p> <a href="index.php">Home</a> / Product Details </p>

		<?php		
		}
	?>
</div>

	<div class="container p-2">
		<div class="row cr">
			<div class="col-md-3">
				<h5>Categories</h5>
				<div class="sandwich2">
					<i class="fa fa-bars fa-x2"></i>
				</div>
				<hr>
				<?php 

					$select = "SELECT * FROM sub_categories ORDER BY name ASC";
					$sres = mysqli_query($conn, $select);
					if (mysqli_num_rows($sres) > 0) {
						echo "<ul class='navbar-nav dul catnav'>";

						while ($row = mysqli_fetch_assoc($sres)) {
							?>
							<li><a href="index.php?p=plist&pid=<?php echo $row['id'];?>"> <?php echo $row["name"];?> </a></li>
							<?php
						}

						echo "</ul>";
					}

				?>
			</div>
			<div class="col-md-9 p-2">

				<img src="imgs/pslider.png" class="img-fluid w-100">

				<hr>

				<h4 class="text-center mb-5"> Product Details </h4>

				<div class="row rp">
					<?php 
						$id = $_GET['spid'];
						$select = "SELECT * FROM products WHERE id = '$id'";
						$sres = mysqli_query($conn, $select);
						if (mysqli_num_rows($sres) > 0) {
							while ($row = mysqli_fetch_assoc($sres)) {
								$smcat = $row['smcat'];
								$desc = $row['product_desc'];
								?>
								
								<div class="col-md-6 img4res p-img-box">
									
									<img class="w-100 img-fluid" src="admin/uploads/products/<?php echo $row['product_img'];?>">
									
								</div>

								<div class="col-md-6 img4lg p-img-box">
									<figure class="zoo-item img-responsive" data-zoo-image="admin/uploads/products/<?php echo $row['product_img'];?>"></figure>
								</div>

								<!-- <span style="height: 100vh; width: 1px; background: #333;"></span> -->
								<div class="col-md-6">
									<form method="post">
									<div class="product-top">
										<h5> <?php echo $row['product_name'];?> </h5>
										<div class="row">
											<div class="col-md-6">
												<p> <b>Article #</b>: <?php echo $row['product_art'];?> </p>
											</div>
											<div class="col-md-6">
												<!-- <p> <b>Catalog Page #</b>: <?php echo $row['product_pageno'];?> </p> -->
											</div>
										</div>
										
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<hr>
									</div>

									<div>
										
										<p> <b>Categories</b>: <a href="index.php?page=plist&pid=<?php echo $row['product_sub_cat'];?>"><?php echo $row['smcat'];?></a> </p>
										<p><b>Tags</b>: 
											<a href="index.php?p=plist&pid=<?php echo $row['product_sub_cat'];?>"><?php echo $row['smcat'];?></a>
										</p>
										<hr>
										<p> Origin: <b> Pakistan </b> </p>

										<p> Brand: <b> <a href="#"> Hospican International </a> </b> </p>
									</div>

									<div>
										<input type="hidden" name="hid" value="<?php echo $row['product_art'];?>">
										<input type="hidden" name="hpname" value="<?php echo $row['product_name'];?>">
										<input type="hidden" name="hpmcat" value="<?php echo $row['product_sub_cat'];?>">
										<input type="hidden" name="hpscat" value="<?php echo $row['smcat'];?>">

										<div class="row">
											<div class="col-sm-4 px-3"> Quantity: </div>
											<div class="col-sm-8"> 
											<input type="text" name="pqty" class="form-control w-100" value="1"> </div>
											<div class="row">
												<div class="col-sm-12 m-2">	
											<input type="submit" class="btn btn-success" value="Inquire" name="a2c">
											</div>
											</div>
										</div>
									</div>
								</form>

								</div>

								<?php
							}
						}


					?>
					
				</div>

				<div class="para py-5">
					<p> <b>Description</b>:<?php echo $desc;?> </p>
				</div>

			</div>

		</div>
	</div>

	<hr>

	<div class="container w-100 ">
		
		<h5 class="text-center"> Related Products </h5>
		
		<div class="row text-center">
			<?php 

				$spid = $_GET['spid'];
				// echo $spid;

				$select2 = "SELECT * FROM products WHERE smcat = '$smcat' ORDER BY RAND() LIMIT 5" or die(mysqli_error());
				$sres2 = mysqli_query($conn, $select2);
				if (mysqli_num_rows($sres2) > 0) {
					while ($row2 = mysqli_fetch_assoc($sres2)) {
						?>

						<div class="col-md-2 my-2 mx-auto">
							<div class="card">
								<div class="card-body">
									<a style="text-decoration: none;color:#000;" href="index.php?p=product&spid=<?php echo $row2['id'];?>">
										<img src="admin/uploads/products/<?php echo $row2['product_img'];?>" class="card-img-top img-fluid">
									<p class="card-title"><?php echo $row2['product_name'];?></p>
									<p class="card-text"><?php echo $row2['product_art'];?></p>
									</a>
								</div>
							</div>
						</div>

						<?php
					}
				}

			?>

		</div>

	</div>

<?php

	// if (isset($_POST['pcolor'])) {
	// 	echo "selected color is ".$_POST['pcolor'];
	// }

	if (isset($_POST['a2c'])) {

		// session_start();
		
		//echo "<script> alert('button clicked'); </script>";

		$id = $_POST['hid'];
		$name = $_POST['hpname'];
		$main = $smcat;
		$sub = $_POST['hpscat'];
		$pqty = $_POST["pqty"];

		if (isset($_SESSION["shop"])) {
			$item_arr_id = array_column($_SESSION['shop'], 'id');
			if (!in_array($id, $item_arr_id)) {
				$count = count($_SESSION['shop']);
				$item_arr = array(
					'id'=>$id,
					'name'=>$name,
					'main'=>$main,
					'sub'=>$sub,
					'qty'=>$pqty
				);
				$_SESSION['shop'][$count] = $item_arr;
				print_r($item_arr);
			}else{
				echo "<script> alert('item already add to cart'); </script>";
			}
		}else{
			$item_arr = array(
					'id'=>$id,
					'name'=>$name,
					'main'=>$main,
					'sub'=>$sub,
					'qty'=>$pqty,
				);
				$_SESSION['shop'][0] = $item_arr;
		}

	}

?>