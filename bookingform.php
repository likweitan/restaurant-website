<?php
  require("config.php");
  // Initialize the session
  session_start();
  if(isset($_SESSION['id']))
  {
      $sql = "SELECT *
              FROM users
              WHERE user_id =".$_SESSION['id'];
      $query = mysqli_query($link,$sql);
      if($query)
      {
          while($row = mysqli_fetch_array($query))
          {
              $user_fullname = $row['user_fullname'];
          }
      }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
   
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Welcome to The Muffin House</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/icon.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Top Bar ======= -->

  <section id="topbar" class="d-flex align-items-center fixed-top">

      <div class="logo me-auto">
        <h1><a href="bookingform.php">Book A Table</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="welcome.php">Home</a></li>
          <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
		  <li><a class="nav-link scrollto" href="status.php">Status</a></li>
		  <li><a class="nav-link scrollto" href="logout.php">Log Out</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="bookingform.php" class="book-a-table-btn scrollto">Book a table</a>

    </div>

    </div>
  </section>

    </header><!-- End Header -->
  
  <!-- ======= Book A Table Section ======= -->
	
    <section id="book-a-table" class="book-a-table">
      <div class="container">

        <div class="section-title">
          <h2>Booking<span>Form</span></h2>
          <p></p>
        </div>
        <?php require_once 'config.php'; ?>
        <form action="booking.inc.php" method="POST" role="form" class="php-email-form">
          <div class="row">
            <div class="col-sm-4 col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="<?php echo $user_fullname; ?>" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
           
            <div class="col-sm-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="contact" id="phone" placeholder="Your Contact Number" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>

          <div class="col-sm-4 col-md-6 form-group mt-3 mt-md-0">
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='date' class="form-control" name="date_input" id="date_input" placeholder="Date">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>

                    <input type='time' min="10:00:00" max="22:00:00"class="form-control" name="time_input" id="time_input" placeholder="Time">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        
              <!--            
              <script type="text/javascript">
               $(function () {
                 $('#datetimepicker1').datetimepicker({
                      minDate:new Date()
                  });
               });
             </script>
              -->
         </div>
         
            <div class="col-sm-4 col-md-6 form-group mt-3 mt-md-0 ">   
             <div class="form-group" "select-dropdown">			
				        <select type='people ' class="form-control" name="num_people" id="num_people" placeholder="Amount of People">
                     <option selected="selected">Amount of People</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                 </select>
                </div>
            </div>
            <div class="mb-3">           
            <div class="loading">Loading</div>
            <div class="error-message">There is an error</div>
            <div class="sent-message">Your booking request was sent.Please check the status page to confirm your reservation. Thank you!</div>
          
            <?php
              if(isset($_GET["error"])){
              if($_GET["error"]=='failed') {
                  echo '<div class="error-message d-block">Please fill in with correct details. Thank you.</div>';
              }

            }
            ?>
            </div>
          <div class="text-center"><button type="submit" name="savecont">Send Message</button></div>
        </form>
      </div>
    </section><!-- End Book A Table Section -->
  

    <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>The Muffin House</h3>
      <p></p>
      <div class="social-links">
        <a href="https://www.facebook.com/themuffinhouse/" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com/themuffinhouses2/" class="instagram"><i class="bx bxl-instagram"></i></a>
      </div>
     
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <!--<script src="assets/vendor/php-email-form/validate.js"></script>-->
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>