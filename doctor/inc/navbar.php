<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-scrolled">
    <div class="container d-flex align-items-center justify-content-between">

     <a href="index.php" class="logo"><img src="../assets/img/purplelogo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li class="dropdown"><a href="#"><span>Clinic</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="clinicdetails.php?id=<?php echo $docid;?>">My Clinics</a></li>
              <li><a href="clinicregister.php?id=<?php echo $docid;?>">Add Clinic</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Username</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">View Profile</a></li>
              <li><a href="personaldetails.php?id=<?php echo $docid;?>">Edit Profile</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
