<div class="team">
	
	<?php
		if (isset($_GET['p']) == 'cart') {
		?>

		<p> <a href="index.php">Home</a> / Shopping Cart </p>

		<?php		
		}
	?>

</div>
<div class="container p-5">

	<h5> Product Inquiry </h5>

	<form method="post">	
		<table class="table w-75">
		<tr>
			<th> Art # </th>
			<th> Name </th>
			<th> Category </th>
			<th> Quantity </th>
			<th> Color </th>
			<th> Action(s) </th>
		</tr>
	<?php

	if (isset($_SESSION["shop"])) {

		// echo count($_SESSION["shop"]);

		foreach ($_SESSION["shop"] as $key => $value) {
			?>

			<div class="container">
				
								
					<tr>
						<td> <?php echo $value["id"];?> </td>
						<td> <?php echo $value["name"];?> </td>
						<td> <?php echo $value["main"];?> </td>
						<td> <?php echo $value["qty"];?> </td>
						<td> <div style="height: 25px;width:25px;border-radius:20px;background: <?php echo $value["color"];?>"> </td>
						<td> <a href="index.php?p=cart&cid=<?php echo $value['id'];?>" name="cdel" class="btn btn-danger"><i class="fa fa-trash"></i></a> </td>
					</tr>

			<?php
		}
	}else{
		echo "No Product(s) in the Cart";
	}

?>


					<tr>
						<td colspan="6"><button name="sendin" class="btn btn-success" style="float: right;"><i class="fa fa-paper-plane"></i> Send Inquiry </button> &nbsp; &nbsp;
						<button name="cflash" class="btn btn-danger" style="float: right;margin-right: 10px;"><i class="fa fa-trash"></i> Clear </button></td>
					</tr>
				</table>
				</form>
			</div>

<?php 

	

	if (isset($_POST["cflash"])) {
		
		unset($_SESSION['shop']);
		session_unset($_SESSION['shop']);
		session_destroy();

	}

?>