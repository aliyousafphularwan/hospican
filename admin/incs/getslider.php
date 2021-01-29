<form method="POST">
<table class="table w-100">
	<tr>
		<th> Image </th>
		<th> Position </th>
		<th> Action </th>
	</tr>

	<?php
		require 'dbc.php';
		$getdata = mysqli_query($conn, "SELECT * FROM mainbanner");
		while ($imgs = mysqli_fetch_assoc($getdata)) {
			?>		
			<tr>
				<td> <?php echo $imgs['img'];?> </td>
				<td> <input type="text" name="imgpos" class="form-control w-25"> </td>
				<td> 
					<a href="index.php?page=editbanner&bid=<?php echo $imgs['id'];?>" class="btn btn-info"><i class="fa fa-pencil">Edit</i></a> 
					<a href="index.php?page=delbanner&bid=<?php echo $imgs['id'];?>" class="btn btn-danger"><i class="fa fa-pencil">Delete</i></a> 
				</td>
			</tr>
					
		<?php
		}

	?>
</table>
</form>

