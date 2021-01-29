<div class="team">
	
	<?php
		if (isset($_GET['p']) == 'search') {
		?>

		<p> <a href="index.php">Home</a> / Search Result </p>

		<?php		
		}
	?>

</div>
<div class="container p-5">
	


	<?php

		if (isset($_POST['srchmit']) || isset($_POST['search'])) {
			
			$search = $_POST["search"];

			$select = "SELECT * FROM products WHERE product_name LIKE '%$search%' OR product_art LIKE '%$search%' OR smcat LIKE '%$search%' OR product_desc LIKE '%$search%'" OR die(mysqli_error());
			$sres = mysqli_query($conn, $select);
			if (mysqli_num_rows($sres) > 0) {
				echo "<h6 class='mb-5'> Search Result for <u><b>".$search."</b></u> </h6><hr>";
				while ($srow = mysqli_fetch_assoc($sres)) {
					
					?>

					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<img style="float: right;" src="admin/uploads/products/<?php echo $srow['product_img'];?>" class="img-fluid w-50">
							</div>
							<div class="col-md-6">
								<h4> <?php echo $srow['product_name'];?> </h4>
								<p> <?php echo $srow['product_art'];?> </p>
								<p> <?php echo $srow['product_desc'];?> </p>
								<a href="index.php?p=product&spid=<?php echo $srow['id'];?>"> Read more </a>
							</div>
						</div>
					</div>

					<?php

				}
			}else{
				echo "nothing matching found";
			}


		}

	?>

</div>