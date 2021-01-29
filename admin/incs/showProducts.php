<?php

	require 'dbc.php';

	$select = "SELECT * FROM products";
	$sres = mysqli_query($conn, $select);
	if (mysqli_num_rows($sres) > 0) {
		?>

		<form method="post">
		<table class="table w-100">
				<tr>
					<th> Name </th>
					<th> Artical # </th>
					<th> Category </th>
					<th> Image </th>
					<th> Action(s) </th>
				</tr>
				<?php

					while ($row = mysqli_fetch_assoc($sres)) {
						?>

						<tr>
					<td><?php echo $row["product_name"];?></td>
					<td><?php echo $row["product_art"];?></td>
					<td><?php echo $row["smcat"];?></td>
					<td><?php echo $row["product_img"];?></td>
					<td><a href="index.php?page=deletep&pid=<?php echo $row['id'];?>" class="btn btn-danger"><i class="fa fa-close">Delete</i></a>
						<a href="index.php?page=editp&pid=<?php echo $row['id'];?>" class="btn btn-info"><i class="fa fa-close">Edit</i></a></td>
				</tr>
						
						<?php
					}

				?>
			</table>
		</form>

		<?php
	}

?>