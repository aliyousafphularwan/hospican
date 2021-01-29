<div class="team">
	
	<?php
		if (isset($_GET['p']) == 'inquiry') {
		?>

		<p> <a href="index.php">Home</a> / Inquiry </p>

		<?php		
		}
	?>

</div>
<div class="container p-2">
	
	<h5> Send Inquiry </h5>

	<div class="row">
		<div class="col-md-6">
			<form method="post">

				<div>
					<p> Your Name </p>
					<input type="text" name="sname" class="form-control" placeholder="eg. Ali Yousaf" required> 			
				</div>

				<div>
					<p> Your Email </p>
					<input type="email" name="smail" class="form-control" placeholder="eg. user@company.domain" required> 			
				</div>

				<div>
					<p> Your Company </p>
					<input type="text" name="scom" class="form-control" placeholder="eg. Google Inc" required> 			
				</div>
				<div>
					<p> Message </p>
					 <textarea name="smsg" cols="5" rows="10" class="form-control" required>

					
					<table class="table">
						<tr>
							<th> Art # </th>
							<th> Name </th>
							<th> Category </th>
							<th> Quantity </th>
						</tr>
												<?php 

										if (isset($_SESSION["shop"])) {
											foreach ($_SESSION["shop"] as $key => $value) {
													?>							
						<tr>
							<td> <?php echo $value['id'];?> </td>
							<td> <?php echo $value['name'];?> </td>
							<td> <?php echo $value['main'];?> </td>
							<td> <?php echo $value['qty'];?> </td>
						</tr>
									<?php
												}	
										}else{
											echo "cart is empty";
										}

									?>
					</table>
					</textarea>
				</div>

				<div>
					<button name="sendin" class="btn btn-success" style="margin: 20px; float: right;"> <i class="fa fa-paper-plane"></i> &nbsp;Send </button>
				</div>
				
			</form>
		</div>

		<!-- <div class="col-md-6">
			<table class="table">
				<tr>
					<th> Art # </th>
					<th> Name </th>
					<th> Category </th>
					<th> Quantity </th>
				</tr>
			<?php 

				if (isset($_SESSION["shop"])) {
					foreach ($_SESSION["shop"] as $key => $value) {
							?>

							
								<tr>
									<td> <?php echo $value['id'];?> </td>
									<td> <?php echo $value['name'];?> </td>
									<td> <?php echo $value['main'];?> </td>
									<td> <?php echo $value['qty'];?> </td>
								</tr>
							

							<?php
						}	
				}else{
					echo "cart is empty";
				}

			?>
			</table>
		</div> -->

	</div>

</div>

<?php 

	if (isset($_POST["sendin"])) {
		
		$mailto = "victamoflove@gmail.com";

		$name = $_POST["sname"];
		$email = $_POST["smail"];
		$company = $_POST["scom"];
		$msg = "<br>".$_POST["smsg"]."<br>";
		$headers = "From: Intrade International <no-reply@intrade.com.pk";

		?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-center">Inquiry Email</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<p> <h6> Hello, Intrade International </h6> </p>
					<p> My name is <b><?php echo $name;?></b>, I am representing <b><?php echo $company;?></b>. We are interested in your following products. Please quote us your price for these. </p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php echo $msg;?>
					<p> We are waiting for your reply. </p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div style="line-height: 5px;">
						<p> <b>Regards</b> </p>
						<p> <?php echo $name;?> </p>
						<p> <?php echo $email;?> </p>
					</div>	
				</div>
			</div>
		</div>

		<?php

		// if (mail($mailto, $company, $msg, $headers)) {
		// 	echo "<script> alert('Email Sent Successfully'); </script>";
		// }else{
		// 	echo "<script> alert('Email not Sent'); </script>";
		// }

	}

?>