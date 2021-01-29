<?php 
	require 'dbc.php';
	$select = "SELECT * FROM sub_categories";
	$sres = mysqli_query($conn, $select);
	if (mysqli_num_rows($sres) > 0) {
		echo "
		<table class='table w-75'>
				<tr>
					<th> Id </th>
					<th> Name </th>
					<th> Image </th>
					<th> Action(s) </th>
				</tr>
		";
		while ($row = mysqli_fetch_assoc($sres)) {
			?>
			<tr>
				<td><?php echo $row['id'];?></td>
				<td><?php echo $row['name'];?></td>
				<td> <img src="../uploads/imgs/<?php echo $row['cimg'];?>" class="img-fluid" > </td>
				<td> <a href="index.php?page=deletesubc&subid=<?php echo $row['id'];?>" class="btn btn-danger"><i class="fa fa-close">Delete</i></a>
						<a href="index.php?page=editsubc&subid=<?php echo $row['id'];?>" class="btn btn-info"><i class="fa fa-close">Edit</i></a> </td>
			</tr>
			
			<?php
		}
		echo "</table>";
	}

?>