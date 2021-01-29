<div class="container" style="margin: 35px 0px;">
	
	<h3> Edit Sub Category(s) </h3>


<?php

	$id = $_GET['subid'];
	// echo "Product selected is " . $id;

	$select = "SELECT * FROM sub_categories WHERE id = '$id'";
	$sres = mysqli_query($conn, $select);
	if (mysqli_num_rows($sres) > 0) {
		while ($row = mysqli_fetch_assoc($sres)) {
			?>

			<form method="post" enctype="multipart/form-data">
	
				<table>
					<tr>
						<td> Name:  <input type="text" class="form-control" name="esubcatname" value="<?php echo $row['name'];?>"> </td>
					</tr>
					<tr>
						<td> <input type="file" name="cimg"> <input type="submit" name="esubcat" class="btn btn-info"> </td>
					</tr>
				</table>

			</form>

			<?php
		}
	}

?>

</div>

<div class="container">
	
	<?php

	if (isset($_POST['esubcat'])) {
		$upload = "uploads/imgs/";
		$id = $_GET['subid'];

		$esubcat = $_POST['esubcatname'];

		$file_name = $_FILES["cimg"]["name"];
		$file_size = $_FILES["cimg"]["size"];
		$file_temp = $_FILES["cimg"]["tmp_name"];
		$file_type = $_FILES["cimg"]["type"];

		$update = "UPDATE sub_categories SET name = '$esubcat', cimg = '$file_name' WHERE id = '$id'" or die(mysqli_error());
		$ures = mysqli_query($conn, $update);
		if (!$ures) {
			echo "error" . die(mysqli_error($conn));
		}else{
			move_uploaded_file($file_temp, $upload.$file_name);
			echo "successfully update sub category record.";
			echo "<br><a class='btn btn-success' href='index.php?page=subcategory'> Go Back </a>";
		}

	}

?>
	
</div>