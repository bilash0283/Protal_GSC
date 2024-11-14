<?php include('dashboard_include/header.php') ?>
<?php ob_start(); ?>
<?php

$agentid          = $_SESSION['id'];
$agentname        = $_SESSION['name'];
$agentemail       = $_SESSION['email'];
$role             = $_SESSION['role'];

?>

            <?php
             
             if (isset($_GET['read_id'])) {
                $read_id = (int) $_GET['read_id'];
                $update_agent = "UPDATE notifications SET status='read' WHERE id='$read_id'";
                $agent_sql = mysqli_query($db, $update_agent);
            }

             ?>

  <!-- Navbar -->
  <?php include('dashboard_include/top_header.php') ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('dashboard_include/sidebar.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Notifications</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <div class="row">
        <div class="col-md-12">

        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Updates</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
          
          <?php 
          
            if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) { 

            $agents = "SELECT * FROM notifications WHERE value = 0 ORDER BY time DESC";
            $agents_query = mysqli_query($db, $agents);

            while ($row = mysqli_fetch_assoc($agents_query)) {
                
                $message            = $row['message'];
                $time               = $row['time']; 
                $status             = $row['status']; ?>
                
                <tr class="<?php echo $row['status'] == 'unread' ? 'table-warning' : ''; ?>">
                <td><?php echo $row['time']; ?></td>
                <td><?php echo htmlspecialchars($row['message']); ?></td>
                
                <td>
                <?php if ($row['status'] == 'unread'): ?>
                <a href="?read_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Mark as Read</a>
                <?php else: ?>
                <span class="badge badge-success">Read</span>
                <?php endif; ?>
                </td>
                </tr>

        <?php    }
            
                
             } else {
              
            $agents = "SELECT * FROM notifications WHERE agent = '$agentname' AND email = '$agentemail' AND value = 1 ORDER BY time DESC";
            $agents_query = mysqli_query($db, $agents);

            while ($row = mysqli_fetch_assoc($agents_query)) {
                
                $message            = $row['message'];
                $time               = $row['time']; 
                $status             = $row['status']; ?>
                
                <tr class="<?php echo $row['status'] == 'unread' ? 'table-warning' : ''; ?>">
                <td><?php echo $row['time']; ?></td>
                <td><?php echo htmlspecialchars($row['message']); ?></td>
                
                <td>
                <?php if ($row['status'] == 'unread'): ?>
                <a href="?read_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Mark as Read</a>
                <?php else: ?>
                <span class="badge badge-success">Read</span>
                <?php endif; ?>
                </td>
                </tr>

        <?php    }

             }

          ?>
          </tbody>
          </table>

        </div>
      </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  


  <?php
    ob_end_flush();
  ?>


  <!-- /.main-footer -->
   <?php include('dashboard_include/footer.php') ?>