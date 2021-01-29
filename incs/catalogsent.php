<div class="container p-5">
	
	<h4 class="text-center"> Catalog Request </h4>
	<hr>

	<?php

		if (isset($_POST['sendcat'])) {
			
			$name = $_POST['cname'];
			$email = $_POST['cmail'];
			$company = $_POST['ccom'];
			$cweb = $_POST['cweb'];

			$res = mysqli_query($conn, "SELECT * FROM catalogsent WHERE email = '$email'");
			$count = mysqli_num_rows($res);
			if ($count > 0) {
				?>

					<div class="container">
						<p> Hi, <b><?php echo $name;?></b> </p>
						<p> Your request for catalog has been recieved, our concerned department will send you our catalog asap. </p>
						<div style="line-height: 5px;">
							<p>Regards</p>
							<p><b>Intrade International</b></p>
						</div>
					</div>

				<?php

			}else{
				$i = mysqli_query($conn, "INSERT INTO catalogsent (name, email, company, website) VALUES ('$name', '$email', '$company', '$cweb')");
				if ($i) {
					?>

					<div class="container">
						<p> Hi, <b><?php echo $name;?></b> </p>
						<p> Your request for catalog has been recieved, our concerned department will send you our catalog asap. </p>
						<div style="line-height: 5px;">
							<p>Regards</p>
							<p><b>Intrade International</b></p>
						</div>
					</div>

					<?php
				}
			}

		}

	?>

</div>