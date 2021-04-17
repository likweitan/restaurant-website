<?php
  require("../config.php");
  session_start();

  if(isset($_SESSION['id']))
  {
      $sql = "SELECT * FROM bookingform
              WHERE booking_date >= DATE(CURRENT_TIMESTAMP())
              ORDER BY booking_create_at DESC";
      $query = mysqli_query($link,$sql);
  }
  
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Admin Dashboard - The Muffin House</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- font import -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-color:rgba(26, 24, 22, 0.8)">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" style ="font-family: 'Satisfy', sans-serif; font-size: 1.5em;" href="../welcome.php">The Muffin House</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div style="display: flex;">

    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="../welcome.php">Go To Welcome Page</a>
      </li>
    </ul>

    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="../logout.php">Log out</a>
      </li>
    </ul>
  </div>

</header>
<?php
  if(isset($_SESSION['id']))
  {
      $sql = "SELECT * FROM bookingform
              #WHERE booking_date >= DATE(CURRENT_TIMESTAMP())
              ORDER BY booking_create_at DESC";
      $query = mysqli_query($link,$sql);
  };
?>
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="file"></span>
              Bookings
            </a>
            <a class="nav-link" href="calendar.php">
              <span data-feather="calendar"></span>
              Calendar
            </a>
          </li>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">   
        <h1 class="h2">Bookings</h1>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
            <th scope="col">#</th>
      <th scope="col">Full Name</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Booking Date</th>
      <th scope="col">Booking Time</th>
      <th scope="col">Amount of People</th>
      <th scope="col">Booking Status</th>
      <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php  

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
          echo "<td>";
          echo $row['booking_status'];
          echo "</td>";
          
          if($row['booking_status']=='pending')
          {
            echo "<td style='display:flex'>";
            echo '<form action="approve_booking.php" method="get">';
            echo '<input hidden type="text" name="booking_id" value=';
            echo $row['booking_id'];
            echo '>';
            echo "<button type='submit' class='btn btn-primary' style='font-size: 12px; width: 75px;'>";
            echo "Approve</button>";
            echo "</form>";
            echo "<br>";
            echo '<form action="cancel_booking.php" method="get">';
            echo '<input hidden type="text" name="booking_id" value=';
            echo $row['booking_id'];
            echo '>';
            echo "<button type='submit' class='btn btn-danger' style='font-size: 12px; width: 75px'>";
            echo "Cancel</button>";
            echo "</form>";
            echo "</td>";
          }
          else if($row['booking_status']=='cancelled'){
            echo "<td>";
            echo '<form action="approve_booking.php" method="get">';
            echo '<input hidden type="text" name="booking_id" value=';
            echo $row['booking_id'];
            echo '>';
            echo "<button type='submit' class='btn btn-primary' style='font-size: 12px; width: 75px'>";
            echo "Approve</button>";
            echo "</form>";
            echo "</td>";
          }
          else
          {
            echo "<td>";
            echo '<form action="cancel_booking.php" method="get">';
            echo '<input hidden type="text" name="booking_id" value=';
            echo $row['booking_id'];
            echo '>';
            echo "<button type='submit' class='btn btn-danger' style='font-size: 12px; width: 75px'>";
            echo "Cancel</button>";
          }
          echo "</form>";
          echo "</td>";
      echo '</tr>';
}
?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
