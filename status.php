<?php
  require("config.php");
  session_start();
    if(isset($_SESSION['id']))
    {
        $sql = "SELECT * FROM bookingform
        WHERE user_id =".$_SESSION['id']." AND booking_date >= DATE(CURRENT_TIMESTAMP())
        ORDER BY booking_create_at DESC";
        $query = mysqli_query($link,$sql);

        $sql_pass = "SELECT * FROM bookingform
        WHERE user_id =".$_SESSION['id']." AND booking_date <= DATE(CURRENT_TIMESTAMP()) AND booking_status = 'approved'
        ORDER BY booking_create_at DESC";
        $query_pass = mysqli_query($link,$sql_pass);     
        
        $sql_admin = "SELECT * FROM users
        WHERE user_id =".$_SESSION['id'];
        $query_admin = mysqli_query($link,$sql_admin);
        if($query_admin)
        {
        while($row = mysqli_fetch_array($query_admin))
          {
            $myRole = $row['role'];
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
  <section id="topbar" class="d-flex align-items-center fixed-top topbar-transparent" style="background-color: #35322d">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start justify-content-between">
      <i class="bi bi-phone d-flex align-items-center"><span>+06-603 0565</span></i>
      <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Tue-Sun: 10:00 AM - 22:00 PM</span></i>
	  

    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent" style="background-color: #35322d">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo me-auto">
        <h1><a href="status.php">Status</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="welcome.php">Home</a></li>
          <li><a class="nav-link scrollto" href="welcome.php">Menu</a></li>
          <li><a class="nav-link scrollto" href="welcome.php">Gallery</a></li>
          <li><a class="nav-link scrollto" href="welcome.php">Contact</a></li>
		  <li><a class="nav-link scrollto active" href="status.php">Status</a></li>
		  <li><a class="nav-link scrollto" href="logout.php">Log Out</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <?php if($myRole=='admin'){echo '<a  class = "book-a-table-btn bi ms-4 d-lg-flex d-none" href="index.php" style="background: #DC143C;" >Admin Site</a>';}?>

      <a href="bookingform.php" class="book-a-table-btn scrollto">Book a table</a>

    </div>
  </header><!-- End Header -->
  <!-- Content -->

  <section id="book-a-table" class="menu" >
      <div class="container" style="padding:20px ">
      </div>
  </section>
  <br>
  <div class="container">
  <h2>Recent Bookings</h2>
  <?php 
  if($query->num_rows > 0){
  echo '
  <div class="table-responsive">
  <table class="table table-sm " style="margin-top: 2em; font-size:0.8em">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Full Name</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Booking Date</th>
      <th scope="col">Booking Time</th>
      <th scope="col">Amount of People</th>
      <th scope="col">Booking Status</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>';

  while($row = mysqli_fetch_array($query))
  {
    echo "
        <tr>
            <td>";
            echo $row['booking_id'];
            echo "</td>";
            echo "<td>";
            echo $row['booking_fullname'];
            echo "</td>";
            echo "<td>";
            echo $row['booking_contact'];
            echo "</td>";
            echo "<td>";
            echo $row['booking_date'];
            echo "</td>";
            echo "<td>";
            echo $row['booking_time'];
            echo "</td>";
            echo "<td>";
            echo $row['numberPerson'];
            echo "</td>";
            echo "<td><a style='color:#ffb03b'>";
            echo $row['booking_status'];
            echo "</a>";
            echo "<td>";
            if($row['booking_status'] == 'pending')
            {
            echo '<form action="cancel_booking.php" method="get">';
            echo '<input hidden type="text" name="booking_id" value=';
            echo $row['booking_id'];
            echo '>';
            echo "<button type='submit' class='btn btn-danger' style='font-size: 12px;'>";
            echo "Cancel</button>";
            echo "</form>";
            }
            else{
              echo "";
            }
            echo "</td>";
        echo '</tr>';
}
  }
  else{
    echo '<br>';
    echo '<p>No bookings has been made by you yet.</p>';
  }
?>
  </tbody>
</table>
</div>

</div>

<!-- ALREADY PASS TABLE -->
<?php
if($query_pass->num_rows > 0){
  echo '<section id="book-a-table" class="book-a-table d-flex align-items-center" style="background-color: #35322d">
      <div class="container">
      
      </div>
  </section>

  <div class="container">
  <br>
  <h2>Past Bookings</h2>
  <div class="table-responsive">
<table class="table" style="margin-top: 2em;">
    
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Full Name</th>
        <th scope="col">Contact Number</th>
        <th scope="col">Booking Date</th>
        <th scope="col">Booking Time</th>
        <th scope="col">Amount of People</th>
        
      </tr>
    </thead>
    <tbody>';

  


  while($row = mysqli_fetch_array($query_pass))
  {
    echo "
        <tr>
            <td>";
            echo $row['booking_id'];
            echo "</td>";
            echo "<td>";
            echo $row['booking_fullname'];
            echo "</td>";
            echo "<td>";
            echo $row['booking_contact'];
            echo "</td>";
            echo "<td>";
            echo $row['booking_date'];
            echo "</td>";
            echo "<td>";
            echo $row['booking_time'];
            echo "</td>";
            echo "<td>";
            echo $row['numberPerson'];
            echo "</td>";
        echo '</tr>';
}

  echo '</tbody>
  </table>
  </div>';
}
  
?>
</div>

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
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>