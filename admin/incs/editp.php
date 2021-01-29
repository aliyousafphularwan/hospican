<style type="text/css">
	table td{
		padding:5px 10px;
	}
</style>
<div class="container" style="margin: 35px 0px;">
	
	<h3> Edit Product Entry </h3>


<?php

	$id = $_GET['pid'];
	echo "Product selected is " . $id;

	$select = "SELECT * FROM products WHERE id = '$id'";
	$sres = mysqli_query($conn, $select);
	if (mysqli_num_rows($sres) > 0) {
		while ($row = mysqli_fetch_assoc($sres)) {
			?>

			<form method="post" enctype="multipart/form-data">
	
				<table>
					<tr>
						<td> Product Name <span style="color: #f55;">*</span> </td>
						<td> Product Artical # <span style="color: #f55;">*</span> </td>
						<td> Product Page # <span style="color: #f55;">*</span> </td>
					</tr>
					<tr>
						<td> <input type="text" name="pname" class="form-control" value="<?php echo $row['product_name']?>"> </td>
						<td> <input type="text" name="partno" class="form-control" value="<?php echo $row['product_art']?>"> </td>
						<td> <input type="text" name="pageno" class="form-control" value="<?php echo $row['product_pageno']?>"> </td>
					</tr>
					<tr>
						<td> Product Main Category <span style="color: #f55;">*</span> </td>
						<td> Product Sub Category # <span style="color: #f55;">*</span> </td>
						<td> Product Category </td>
					</tr>
					<tr>
						<td>
							<select class="form-control" name="pmaincat">
					<?php
							$mcat = "SELECT * FROM categories";
							$mcatres = mysqli_query($conn, $mcat);
							if (mysqli_num_rows($mcatres) > 0) {
								while ($mrow = mysqli_fetch_assoc($mcatres)) {
									?>

										<option value="<?php echo $mrow['id'];?>"><?php echo $mrow['name'];?></option>
										
									<?php
								}
							}
						?>
						</select>
						</td>
						<td>
							<select class="form-control" name="psubcat">
								<?php 

								$subcat = "SELECT * FROM sub_categories";
								$subcatres = mysqli_query($conn, $subcat);
								if (mysqli_num_rows($subcatres) > 0) {
									while ($subrow = mysqli_fetch_assoc($subcatres)) {
										?>
										<option value="<?php echo $subrow['id'];?>"><?php echo $subrow['name'];?></option>
										<?php
									}
								}

								?>
							</select>
						</td>
						<td> <input type="text" name="psmcat" class="form-control" value="<?php echo $row['smcat'];?>"> </td>
					</tr>
					<tr>
						<td> Product origin <span style="color: #f55;">*</span> </td>
						<td> Product Image <span style="color: #f55;">*</span> </td>
					</tr>

					<tr>
						<td> <input type="text" class="form-control" name="porigin" placeholder="Product Origin"> </td>
						<td> <input type="file" name="pimg"> </td>
    					<td> <input type="text" class="form-control" name="palt" value="<?php echo $row['product_alt'];?>"> </td>
					</tr>

					<tr>
						<td class="3"> Product Description <span style="color: #f55;">*</span> </td>
					</tr>
					<tr>
						<td colspan="3"> <textarea id="elm1" name="pdesc" class="form-control">
							<?php echo $row['product_desc'];?>
						</textarea> </td>
					</tr>
					<tr>
						<td colspan="3"><input type="submit" name="eproduct" class="btn btn-info" style="float: right;margin: 10px 0px;"></td>
					</tr>
				</table>

			</form>

			<?php
		}
	}

?>

</div>

<?php

	if (isset($_POST['eproduct'])) {
		
		$id = $_GET['pid'];

		$upload = "uploads/products/";

		$pname = $_POST['pname'];
		$part = $_POST['partno'];
		$ppage = $_POST['pageno'];
		$pmaincat = $_POST['pmaincat'];
		$psubcat = $_POST['psubcat'];
		$psmcat = $_POST['psmcat'];
		$porigin = $_POST['porigin'];
		$pdesc = $_POST['pdesc'];
		$palt = $_POST['palt'];

		$file_name = $_FILES["pimg"]["name"];
		$file_size = $_FILES["pimg"]["size"];
		$file_temp = $_FILES["pimg"]["tmp_name"];
		$file_type = $_FILES["pimg"]["type"];

		$update = "UPDATE products SET product_name = '$pname', product_art ='$part', product_pageno ='$ppage', product_main_cat = '$pmaincat', product_sub_cat = '$psubcat', smcat = '$psmcat',product_origin = '$porigin', product_desc ='$pdesc', product_img = '$file_name',product_alt='$palt' WHERE id = '$id'" or die(mysqli_error());
		$ures = mysqli_query($conn, $update);
		
		if (!$ures) {
			echo "<script> alert('product update failed.'); </script>";
		}else{
			move_uploaded_file($file_temp, $upload.$file_name);
			echo "<script> alert('success'); </script>";
		}

	}

?>