<div class="container">

	<div class="addproduct">
		
		<h2> Add Product </h2>

		<form method="post" class="form-group" enctype="multipart/form-data">
			
			<table class="table w-70">
				
				<tr>
					<td> <input class="form-control" type="text" name="pname" placeholder="Product name"> </td>
					<td> <input class="form-control" type="text" name="partno" placeholder="Artical #"> </td>
					<td> <input class="form-control" type="text" name="ppageno" placeholder="Page #"> </td>
				</tr>

				<tr>
					<td>
						<select class="form-control" id="maincatid" name="pmaincat">
							<option value="0">Main Mategory</option>
							<?php 
								$select = "SELECT * FROM categories";
								$sres = mysqli_query($conn, $select);
								if (mysqli_num_rows($sres) > 0) {
									while ($row = mysqli_fetch_assoc($sres)) {
										?>
										<option value="<?php echo $row['id'];?>"> <?php echo $row['name'];?> </option>
										<?php
									}
								}
							?>
						</select>
					</td>
					<td>
						<select name="psubcat" class="form-control">
							<option value="0">Sub Category</option>
							<?php 
								$select = "SELECT * FROM sub_categories";
								$sres = mysqli_query($conn, $select);
								if (mysqli_num_rows($sres) > 0) {
									while ($row = mysqli_fetch_assoc($sres)) {
										?>
										<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
										<?php
									}
								}
							?>
						</select>
					</td>
					<td> <input type="text" name="smcat" placeholder="category" class="form-control"> </td>
				</tr>
				<tr>
					<td colspan=""> <input type="file" class="form-control" name="pimg"> </td>
					<td> <input type="text" class="form-control" name="porig" placeholder="Product Origin"> </td>
					<td> <input type="text" class="form-control" name="palt" placeholder="Image Alt Text"> </td>
				</tr>

				<tr>
					<td colspan="3"> <textarea id="elm1" name="pdesc" class="form-control" placeholder="product Description"></textarea> </td>
				</tr>

				<tr>
					<td> <input type="submit" name="pmit" class="btn btn-success" value="Add Product"> </td>
				</tr>

			</table>

		</form>

	</div>

	<div id="showProducts">
		
	</div>

</div>

<?php

	if (isset($_POST["pmit"])) {

		$upload = "uploads/products/";

		$name = $_POST["pname"];
		$artno = $_POST["partno"];
		$pageno = $_POST["ppageno"];
		$maincat = $_POST["pmaincat"];
		$smcat = $_POST["smcat"];
		$subcat = $_POST["psubcat"];
		$porig = $_POST['porig'];
		$descr = $_POST["pdesc"];
		$alttxt = $_POST["palt"];

		$file_name = $_FILES["pimg"]["name"];
		$file_size = $_FILES["pimg"]["size"];
		$file_temp = $_FILES["pimg"]["tmp_name"];
		$file_type = $_FILES["pimg"]["type"];

	
		$select = "SELECT * FROM products WHERE product_art = '$artno'";
		$sres = mysqli_query($conn, $select);
		if (mysqli_num_rows($sres) == 0) {
			$insert = "INSERT INTO products (product_name, product_art, product_pageno, product_main_cat, product_sub_cat, smcat,product_origin, product_desc, product_img, product_alt) VALUES ('$name', '$artno','$pageno', '$maincat', '$subcat','$smcat','$porig', '$descr', '$file_name','$alttxt')" or die(mysql_error());
			$ires = mysqli_query($conn, $insert);

			if ($ires) {
				move_uploaded_file($file_temp, $upload.$file_name);
				echo "<script> alert('success'); </script>";
			}else{
				echo "<script> alert('failed'); </script>".die(mysqli_error());
			}
		}else{
			echo "<script> alert('product with same artical no, already added'); </script>";
		}

		// if (move_uploaded_file($file_temp, $upload.$file_name)) {
		// 	echo "<script> alert('success'); </script>";
		// }else{
		// 	echo "<script> alert('failed'); </script>";
		// }




	}


?>