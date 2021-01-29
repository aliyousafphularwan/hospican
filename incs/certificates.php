<div class="team">
	
  <?php
      if (isset($_GET['p']) == 'certificates') {
      ?>

      <p> <a href="index.php">Home</a> / Certifications & Memberships </p>

      <?php   
      }
  ?>

</div>
<div class="container" style="margin-bottom: 30px;">
	
	<h4 class="my-5"> <u>Our Certificates & Memberships </u></h4>

	<div class="row">

		<div class="col-md-2">
			<a data-toggle="modal" data-target="#ceModel" href="#">
				<div class="card">
					<img src="imgs/certs/ce.png" class="w-100">
					<a href="#" class="btn btn-info" data-toggle="modal" data-target="#ceModel">View</a>
				</div>
			</a>
		</div>

		<div class="col-md-2">
			<a data-toggle="modal" data-target="#isoModel" href="#">
				<div class="card">
					<img src="imgs/certs/iso 9001.png" class="w-100">
					<a href="#" class="btn btn-info" data-toggle="modal" data-target="#ceModel">View</a>
				</div>
			</a>
		</div>

    <div class="col-md-2">
      <a data-toggle="modal" data-target="#scciModel" href="#">
        <div class="card">
          <img src="imgs/certs/scci.png" class="img-fluid w-100">
          <a href="#" class="btn btn-info" data-toggle="modal" data-target="#ceModel">View</a>
        </div>
      </a>
    </div>

    <div class="col-md-2">
      <a data-toggle="modal" data-target="#simapModel" href="#">
        <div class="card">
          <img src="imgs/certs/simap.png" class="img-fluid w-100">
          <a href="#" class="btn btn-info" data-toggle="modal" data-target="#ceModel">View</a>
        </div>
      </a>
    </div>

	</div>

</div>

</div>

<!-- CE Modal -->
<div class="modal fade" id="ceModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="imgs/certs/ce_lg.jpg" class="img-fluid">
      </div>
    </div>
  </div>
</div>

<!-- ISO Modal -->
<div class="modal fade" id="isoModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="imgs/certs/iso_lg.jpg" class="img-fluid">
      </div>
    </div>
  </div>
</div>

<!-- SCCI Modal -->
<div class="modal fade" id="scciModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="imgs/certs/scci_lg.jpg" class="img-fluid">
      </div>
    </div>
  </div>
</div>

<!-- simap Modal -->
<div class="modal fade" id="simapModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="imgs/certs/simap_lg.jpg" class="img-fluid">
      </div>
    </div>
  </div>
</div>