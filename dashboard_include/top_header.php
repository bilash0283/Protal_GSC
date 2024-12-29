<?php

$agentid          = $_SESSION['id'];
$agentname        = $_SESSION['name'];
$agentemail       = $_SESSION['email'];
$role             = $_SESSION['role'];

?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="dashboard.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="agent-message.php" class="nav-link">Message</a>
      </li>
      <li class="nav-item d-sm-inline-block">
        <a href="logout.php" class="nav-link">Logout</a>
      </li>
      <li class="nav-item d-sm-inline-block">
        <a href="contacts.php" class="nav-link">Contact Us</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

    <?php 

    if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) {
      
    //$agents = "SELECT * FROM notifications WHERE agent = '$agentname' AND email = '$agentemail' AND status = 'unread' ORDER BY time DESC";
    $agents = "SELECT * FROM notifications WHERE status = 'unread' AND value = 0 ORDER BY time DESC";
    $agents_query = mysqli_query($db, $agents);
    $count = mysqli_num_rows($agents_query);

    // Calculate the time difference for the latest notification
      $time_since_latest = "Just now"; // Default if no unread notifications

      if ($count > 0) {
          // Get the latest unread notification
          mysqli_data_seek($agents_query, 0); // Reset pointer to the first row if necessary
          $latest_notification = mysqli_fetch_assoc($agents_query);

          // Convert notification time to a timestamp
          $notification_time = strtotime($latest_notification['time']);
          $time_difference = time() - $notification_time;

          // Calculate time in a readable format
          if ($time_difference < 3600) {
              // Show in minutes for times less than an hour
              $minutes = floor($time_difference / 60);
              $time_since_latest = ($minutes > 0 ? $minutes : 0) . " mins ago";
          } else {
              // Show in hours for times one hour or more
              $hours = floor($time_difference / 3600);
              $time_since_latest = $hours . " hours ago";
          }
      }
    }  else {

    $agents = "SELECT * FROM notifications WHERE agent = '$agentname' AND email = '$agentemail' AND status = 'unread' AND value = 1 ORDER BY time DESC";
    $agents_query = mysqli_query($db, $agents);
    $count = mysqli_num_rows($agents_query);

    // Calculate the time difference for the latest notification
      $time_since_latest = "Just now"; // Default if no unread notifications

      if ($count > 0) {
          // Get the latest unread notification
          mysqli_data_seek($agents_query, 0); // Reset pointer to the first row if necessary
          $latest_notification = mysqli_fetch_assoc($agents_query);

          // Convert notification time to a timestamp
          $notification_time = strtotime($latest_notification['time']);
          $time_difference = time() - $notification_time;

          // Calculate time in a readable format
          if ($time_difference < 3600) {
              // Show in minutes for times less than an hour
              $minutes = floor($time_difference / 60);
              $time_since_latest = ($minutes > 0 ? $minutes : 0) . " mins ago";
          } else {
              // Show in hours for times one hour or more
              $hours = floor($time_difference / 3600);
              $time_since_latest = $hours . " hours ago";
          }
      }
      
    }
    
    
        
    ?>

    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?php echo $count; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?php echo $count; ?> Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="notification.php" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> <?php echo $count; ?> new updates
            <span class="float-right text-muted text-sm"><?php echo $time_since_latest; ?></span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="notification.php" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>

      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item d-none">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>