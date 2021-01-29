<div class="team">
	
	<?php
		if (isset($_GET['p']) == 'contact') {
		?>

		<p> <a href="index.php">Home</a> / Contact </p>

		<?php		
		}
	?>

</div>
<div class="contact-main">

	<div class="container-fluid">
		
		<div class="row">
			
			<div class="col-md-6">
				
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d944.2591437627065!2d74.54651079015038!3d32.500582220213055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391eeaf61911212f%3A0xfd72d23a5d2d44ef!2sIntrade%20International!5e0!3m2!1sen!2s!4v1605864549392!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

			</div>

			<div class="col-md-6">
				
				<h3> Contact information </h3>

				<div class="">
					<p class="p-0"> Intrade International 
				<br>Commissioner Road, Muhammad Pura, Sialkot-51310-Pakistan
				 <br><i class="fa fa-envelope"></i> <a href="mailto:info@intrade.com.pk" >info@intrade.com.pk</a> | <a href="mailto:a.ali@intrade.com.pk">a.ali@intrade.com.pk</a>
				 <br><i class="fa fa-phone"></i> +92-524-598233 
				<br><i class="fa fa-globe"></i> www.intrade.com.pk </p>
				</div>

				

				<form method="post">
					<table class="table ">
						<tr>
							<td> Name: <input type="text" class="form-control" name=""> </td>
							<td> Email: <input type="text" class="form-control" name=""> </td>
						</tr>
						<tr>
							<td colspan="2"> Message: <textarea class="form-control"></textarea> </td>
						</tr>
						<tr>
							
							<td colspan="2"> <button class="btn btn-success" style="float: right;">Send</button> </td>
						</tr>

					</table>
				</form>

			</div>

		</div>

	</div>
	
</div>