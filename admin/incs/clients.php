<div class="container mx-auto py-5">
	<h2> Catalog Request List </h2>

	<table class="table table-hover">
		<tr>
			<th> Name </th>
			<th> Company </th>
			<th> Email </th>
			<th> Website </th>
		</tr>
		<?php 
			$select = "SELECT * FROM catalogsent";
			$res = mysqli_query($conn, $select);
			if (mysqli_num_rows($res) > 0) {
				while ($row = mysqli_fetch_assoc($res)) {
					?>

					<tr>
						<td> <?php echo $row['name'];?> </td>
						<td> <?php echo $row['company'];?> </td>
						<td> <?php echo $row['email'];?> </td>
						<td> <?php echo $row['website'];?> </td>
					</tr>

					<?php
				}
			}
		?>
	</table>

</div>