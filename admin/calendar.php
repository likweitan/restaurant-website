<?php
  require("../config.php");
  session_start();
    


    //calendar PHP
    // Set your timezone
    date_default_timezone_set('Asia/Singapore');
    
    // Get prev & next month
    if (isset($_GET['ym'])) {
        $ym = $_GET['ym'];
    } else {
        // This month
        $ym = date('Y-m');
    }
    
    // Check format
    $timestamp = strtotime($ym . '-01');
    if ($timestamp === false) {
        $ym = date('Y-m');
        $timestamp = strtotime($ym . '-01');
    }
    
    // Today
    
    $today = date('Y-m-j', time());
    
    // For H3 title
    $html_title = date('Y / m', $timestamp);
    
    // Create prev & next month link     mktime(hour,minute,second,month,day,year)
    $prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
    $next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
    // You can also use strtotime!
    // $prev = date('Y-m', strtotime('-1 month', $timestamp));
    // $next = date('Y-m', strtotime('+1 month', $timestamp));
    
    // Number of days in the month
    $day_count = date('t', $timestamp);
    
    // 0:Sun 1:Mon 2:Tue ...
    $str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
    //$str = date('w', $timestamp);
    
    
    // Create Calendar!!
    $weeks = array();
    $week = '';
    
    // Add empty cell
    $week .= str_repeat('<td></td>', $str);
    
    for ( $day = 1; $day <= $day_count; $day++, $str++) {

      $date = $ym . '-' . $day;
      $sql = "SELECT booking_date,COUNT(booking_id) AS count FROM `bookingform` WHERE booking_status='approved'
      GROUP BY booking_date";
      $query_approved = mysqli_query($link,$sql);

      $sql = "SELECT booking_date,COUNT(booking_id) AS count FROM `bookingform` WHERE booking_status='pending'
      GROUP BY booking_date";
      $query_pending = mysqli_query($link,$sql);

        if ($today == $date) {
            $week .= '<td class="today">' . $day;

        } else {
            $week .= '<td>' . $day;
            while($row = mysqli_fetch_array($query_approved))
            {
              if($date==$row['booking_date']){
                $week .= '<br><h4 style="text-align: center; color:blue">';
                $week .= $row["count"];
                $week .= ' </h4>';
              }
            }
            while($row = mysqli_fetch_array($query_pending))
            {
              if($date==$row['booking_date']){
                $week .= '<h4 style="text-align: center; color:red">';
                $week .= $row["count"];
                $week .= ' </h4>';
              }
            }
      }
        $week .= '</td>';
         
        // End of the week OR End of the month
        if ($str % 7 == 6 || $day == $day_count) {
    
            if ($day == $day_count) {
                // Add empty cell
                $week .= str_repeat('<td></td>', 6 - ($str % 7));
            }
    
            $weeks[] = '<tr>' . $week . '</tr>';
    
            // Prepare for new week
            $week = '';
        }
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

    <!--Calendar CSS & JS -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <style>
        .calendar {
            font-family: 'Noto Sans', sans-serif;
            margin-top: 80px;
        }
        .calendar h3 {
            margin-bottom: 30px;
        }
        .calendar th {
            height: 30px;
            text-align: center;
        }
        .calendar td {
            height: 100px;
        }
        .calendar .today {
            background: orange;
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- font import -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-color:rgba(26, 24, 22, 0.8)">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" style ="font-family: 'Satisfy', sans-serif; font-size: 1.5em;" href="#">The Muffin House</a>
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
        <a class="nav-link" href="../logout.php">Sign out</a>
      </li>
    </ul>
  </div>

</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <span data-feather="file"></span>
              Bookings
            </a>
            <a class="nav-link active" href="calendar.php">
              <span data-feather="calendar"></span>
              Calendar
            </a>
          </li>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <!--calender test start -->
        
        <div class="calendar">
        <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a> <?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>">&gt;</a></h3>
        
        <div style="display: flex;">

          <ul class="navbar-nav">
            <li class="nav-item text-nowrap">
              <a class="nav-link" style="color:red">Pending </a>
            </li>
          </ul>

          <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
              <a class="nav-link">Approve</a>
            </li>
          </ul>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>S</th>
                <th>M</th>
                <th>T</th>
                <th>W</th>
                <th>T</th>
                <th>F</th>
                <th>S</th>
            </tr>
            <?php
                foreach ($weeks as $week) {
                    echo $week;
                }
            ?>
        </table>
    </div>

        <!--calender test end -->
    </main>
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
