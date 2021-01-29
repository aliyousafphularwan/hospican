<div class="container" style="margin-top: 35px;">
	
	<h3> Delete Product Entry </h3>


<?php

	$id = $_GET['pid'];
	$sel = "DELETE FROM products WHERE id = '$id'" or die(mysqli_error($container));
	$sres = mysqli_query($conn, $sel);
	if ($sres) {
		echo "Product Record has Deleted Successfully";
		echo "<br><a class='btn btn-success' href='index.php?page=addproduct'> Go Back </a>";
	}else{
		echo "product has not Deleted." . die(mysqli_error($container));
	}

?>

</div>