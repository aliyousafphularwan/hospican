<div class="container">
	
	<p>
		you are visiting &nbsp; <?php echo $_GET["page"];?> &nbsp; page.
	</p>

	<div class="form category-form">
		
		<form method="post" id="catform" enctype="multipart/form-data">
			<table class="table w-50">
				<tr>
					<td> <input class="form-control" type="text" id="subcatname" name="subcategory_name" placeholder="add category name"> </td>
					<td>
						<select class="form-control" name="maincat">
							<option class="form-control" value="0">select</option>
							<?php
							
								$select = "SELECT * FROM categories";
								$sres = mysqli_query($conn, $select);
								if (mysqli_num_rows($sres) > 0) {
									while ($row = mysqli_fetch_assoc($sres)) {
										?>
										<option value="<?php echo $row['id'];?>"><?php echo $row["name"];?></option>
										<?php
									}
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td> <input type="file" name="cmi" class="form-control"> </td>
					<td><input type="submit" name="subcatmit" id="subcatmit" class="form-control btn btn-success" value="add"></td>
				</tr>
			</table>
		</form>

	</div>

	<div id="subCategoryData">
		
	</div>

</div>

<?php

	if (isset($_POST["subcatmit"])) {

		$upload = "uploads/imgs/";
		
		$name = $_POST["subcategory_name"];
		$maincat = $_POST["maincat"];

		$file_name = $_FILES["cmi"]["name"];
		$file_size = $_FILES["cmi"]["size"];
		$file_temp = $_FILES["cmi"]["tmp_name"];
		$file_type = $_FILES["cmi"]["type"];

		$select = "SELECT * FROM sub_categories WHERE name = '$name' AND main = '$maincat'";
		$sres = mysqli_query($conn, $select);
		if (mysqli_num_rows($sres) == 0) {
			$insert = "INSERT INTO sub_categories (name, main, cimg) VALUES ('$name', '$maincat', '$file_name')";
			$ires = mysqli_query($conn, $insert);
			if ($ires) {
				move_uploaded_file($file_temp, $upload.$file_name) or die(mysqli_error($conn));
				echo "<script> alert('success'); </script>";
			}else{
				echo "<script> alert('failed'); </script>";
			}
		}else{
			echo "<script> alert('already exists'); </script>";
		}

	}

?>