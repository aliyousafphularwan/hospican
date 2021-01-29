<div class="py-5">
	
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
 
	  <div class="carousel-inner">
	    	<?php 
	    		$slider = mysqli_query($conn, "SELECT * FROM mainbanner");
	    		while ($ban = mysqli_fetch_assoc($slider)) {
	    			
	    			?>
	    			
	  				<div class="carousel-item active" style="border: solid #555 1px;">
				      <img class="d-block w-100 img-fluid" src="admin/uploads/banners/<?php echo $ban['img'];?>" alt="First slide">
				    </div>
	  
	    			<?php
	    		}
	    	?>
	    </div>
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only" style="color: #555;">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only" style="color: #555;">Next</span>
	  </a>
	</div>

</div>