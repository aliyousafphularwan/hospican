<?php 

	$getimgs = mysqli_query($conn, "SELECT * from mainbanner");

?>
<div class="main-page" style="position: relative;margin-top: 70px;">

		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
		    <!-- <div class="carousel-item active">
		      <img class="d-block w-100" src="imgs/banners/1.jpg" alt="First slide">
		    </div> -->
		    <?php
		    	$i = 0;
		    	foreach ($getimgs as $row) {
		    		$actives = '';
		    		if ($i == 0) {
		    			$actives = 'active';
		    		}
		    		?>
		    		<div class="carousel-item <?php echo $actives;?>">
		      			<img class="d-block w-100" src="admin/uploads/banners/<?php echo $row['img'];?>" alt="<?php echo $row['alt'];?>">
		    		</div>
		    		<?php
		    	$i++; }
		    ?>
		   
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	</div>