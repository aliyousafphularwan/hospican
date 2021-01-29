<div class="container mt-3"> 
	<form method="post">
	<?php

		$bid = $_GET['bid'];

		$query = mysqli_query($conn, "SELECT img from mainbanner WHERE id = '$bid'");
		while ($row = mysqli_fetch_assoc($query)) {
			
			?>
			<img src="uploads/banners/<?php echo $row['img'];?>" class="img-fluid">
			<button name="btndel" class="btn btn-danger mt-2"><i class="fas fa-trash mr-2"></i>Delete</button>
			<?php
		}

	?>
	</form>

	<?php 

		if (isset($_POST['btndel'])) {
			$del = mysqli_query($conn, "DELETE FROM mainbanner WHERE id = '".$_GET['bid']."'");
		
			if ($del) {
				echo "<a href='index.php?page=mainbanner'>Go back</a>";
			}
		}

	?>

</div>
