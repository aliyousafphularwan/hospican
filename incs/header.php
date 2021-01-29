  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.php">Hospican</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="#about">About</a></li>
          <li class="drop-down"><a href="">Products</a>
            <ul>
              <?php
                $mc = mysqli_query($conn, "SELECT * FROM categories");
                while ($mcr = mysqli_fetch_assoc($mc)) {
                  ?>
                  <li class="drop-down"><a href="#"><?php echo $mcr['name'];?></a>
                    <ul>
                      <?php
                        $smc = mysqli_query($conn, "SELECT * FROM sub_categories WHERE main = '".$mcr['id']."'");
                        while ($smcr = mysqli_fetch_assoc($smc)) {
                          ?>
                          <li><a href="index.php?p=plist&cid=<?php echo $mcr['id']?>&scid=<?php echo $smcr['id'];?>"><?php echo $smcr['name'];?></a></li>
                          <?php
                        }
                      ?>
                    </ul>
                  </li>
                  <?php
                }
              ?>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <a href="index.php?p=cart" class="get-started-btn">
        <i class="fas fa-shopping-cart"></i>
        <span class="cartcount"></span>
      </a>

    </div>
  </header><!-- End Header -->