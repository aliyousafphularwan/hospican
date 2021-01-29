<?php

	$selectCategories = "SELECT * FROM categories";
	$mainCatRes = mysqli_query($conn, $selectCategories);
	$countMainCat = mysqli_num_rows($mainCatRes);

	$selectSubCategories = "SELECT * FROM sub_categories";
	$subCatRes = mysqli_query($conn, $selectSubCategories);
	$countSubCat = mysqli_num_rows($subCatRes);

	$selectProduct = "SELECT * FROM products";
	$prodRes = mysqli_query($conn, $selectProduct);
	$countProducts = mysqli_num_rows($prodRes);

?>

<div class="container">
	
	<div class="row mx-auto my-5">
		
		<div class="col-md-4">
			<div class="card text-center">
				<div class="card-title"> <h3>No of Category<span style="font-size: 12pt;">(s)</span></h3> </div>
				<div class="card-body"> <?php echo $countMainCat;?> </div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card text-center">
				<div class="card-title"> <h3>No of Sub Category<span style="font-size: 12pt;">(s)</span></h3> </div>
				<div class="card-body"> <?php echo $countSubCat;?> </div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card text-center">
				<div class="card-title"> <h3>No of Product<span style="font-size: 12pt;">(s)</span></h3> </div>
				<div class="card-body"> <?php echo $countProducts;?> </div>
			</div>
		</div>

	</div>

</div>