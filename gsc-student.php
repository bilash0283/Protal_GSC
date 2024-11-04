<?php include('dashboard_include/header.php') ?>

<?php ob_start(); ?>
<?php

$agentname        = $_SESSION['name'];
$agentemail       = $_SESSION['email'];

?>
  <!-- Navbar -->
  <?php include('dashboard_include/top_header.php') ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('dashboard_include/sidebar.php')?>

  <?php 
    if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) { ?>
        <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Status Of Your Students</h1>
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

                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">View</th>
                      <th scope="col">Student Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Country</th>
                      <th scope="col">Applied For</th>
                      <th scope="col">University</th>
                      <th scope="col">Add Documents</th>
                      <th scope="col">Status</th>
                      <th scope="col">Comments</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                      $agents = "SELECT * FROM newstudents WHERE agent = '$agentname' AND agentemail = '$agentemail' ORDER BY id DESC";
                      $agents_query = mysqli_query($db, $agents);

                      $count = mysqli_num_rows($agents_query);

                      if ($count < 1) {
                        echo "There are no Active Students!!";
                      } else {

                        while ($row = mysqli_fetch_assoc($agents_query)) {
                          $id           = $row['id'];
                          $name         = $row['name'];
                          $email        = $row['email'];
                          $phone        = $row['phone'];
                          $nationality  = $row['nationality'];
                          $destination  = $row['gscdestination'];
                          $university   = $row['gscuniversity'];
                          $status       = $row['status'];
                          $comment      = $row['comment'];
                        ?>

                          

                          <tr>
                          <td><?php ?>
                            
                            <a href="gsc-view-student.php?edit=<?php echo $id; ?>"><i class="fas fa-eye"></i></a>
                            <?php 
                            ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $phone; ?></td>
                            <td><?php echo $nationality; ?></td>
                            <td><?php echo $destination; ?></td>
                            <td><?php echo $university; ?></td>
                            <td><?php ?>
                            
                            <a href="add-file.php?edit=<?php echo $id; ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
                            <?php 
                            ?></td>
                            <td>
                            <?php
                              
                              if ($status == 2) {
                                echo "<div class='badge bg-success' >Approved</div>";
                              } else if ($status == 1){
                                echo "<div class='badge bg-warning' >Pending</div>";
                              } else if ($status == 3){
                                echo "<div class='badge bg-info' >On-Process</div>";
                              } else {
                                echo "<div class='badge bg-danger' >Declined</div>";
                              }

                              ?>
                            </td>
                            <td><?php echo $comment; ?></td>
                            
                            
                          </tr>
                          <?php
                        }
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
  <?php } else {
      echo "<div class='alert alert-danger mt-2 text-center'><h1>Only Admin Allowed!</h1></div>";
    }

  ?>



  <!-- /.main-footer -->
   <?php include('dashboard_include/footer.php') ?>

  