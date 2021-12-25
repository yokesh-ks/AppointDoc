<?php  
session_start();
require('config/connect.php');

if (isset($_POST['email']) and isset($_POST['password'])){

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $query = "SELECT * FROM `register` WHERE email='$email' and password='$password'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);

    if ($count == 1){
		
        $_SESSION['email'] = $email;
		
		$fetchresult = mysqli_fetch_array($result);
		$userid = $fetchresult['userid'];
		if($fetchresult['type']=="doctor"){
			header("location:doctor/index.php?id=$userid");
		}
		else if($fetchresult['type']=="patient"){
			header("location:patient/index.php?id=$userid");
		}
    }
    else{
        $error = "Invalid Login Credentials.";
    }
}
?>

<?php include('inc/head.php')?>
<body>
<div class="container">
	
    <!-- ======= Contact Us Section ======= -->
<section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Login</h2>
        </div>
		
        <div class="row">
          <div class="col-lg-6 m-auto" data-aos="fade-up" data-aos-delay="300">
            <form action="" method="post" role="form" class="php-email-form">              
              <div class="row">
				<div class="form-group text-center">
					<img src="assets/img/purplelogo.png" alt="AppointDoc" height="60px">
				</div> 
				<?php if(isset($error)){ ?>
					<div class="alert alert-danger" role="alert"> 
						<?php echo $error; ?> 
					</div>
				<?php } ?> 
                <div class="form-group">
                  <input type="text" name="email" class="form-control" id="email" placeholder="Enter your Email" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password" required>
                </div>
                
              </div>
              
              <div class="text-center">
				  <button type="submit">Login</button>
				</div>
              <div class="text-center mt-4">
                  <span>Not registered yet? </span><a href="register.php">Create an Account</a>
              </div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->
    </div>
</div>
  <?php include('inc/footer.php')?>
