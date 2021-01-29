<div class="container p-5">

	<h3> Add Main Banner Images </h3>

	<form method="post" enctype="multipart/form-data">
		<table class="table w-25">
			<tr>
				<td> <input class="form-control" id="banImg" type="file" name="bimg"> </td>
			</tr>
			<tr>
				<td> <input class="form-control" id="banAlt" type="text" name="alttxt" placeholder="alt text"> </td>
			</tr>
			<tr>
				<td> <input type="submit" name="banmit" value="submit" class="btnBan btn btn-success"> </td>
			</tr>
		</table>
	</form>

	<hr>

	<div class="showbannerdata">
	
	</div>

	<?php

	if (isset($_POST['imgpos'])) {
		echo $_POST['imgpos'];
	}

		if (isset($_POST['banmit'])) {
			$upload = "uploads/banners/";
			$file_name = $_FILES["bimg"]["name"];
			$file_size = $_FILES["bimg"]["size"];
			$file_temp = $_FILES["bimg"]["tmp_name"];
			$file_type = $_FILES["bimg"]["type"];

			$banAlt = $_POST['alttxt'];

			$insert = "INSERT INTO mainbanner (img, alt, position) VALUES ('$file_name', '$banAlt', 1)" or die(mysql_error());
			$ires = mysqli_query($conn, $insert);

			if ($ires) {
				move_uploaded_file($file_temp, $upload.$file_name);
				echo "<script> alert('image uploaded successfully...'); </script>";
			}else{
				echo "<script> alert('image unsuccessful...'); </script>";
			}

		}

	?>

</div>



