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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Status Of Our Students</h1>
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
                          $destination  = $row['destination'];
                          $university   = $row['university'];
                          $status       = $row['status'];
                          $comment      = $row['comment'];
                        ?>

                          

                          <tr>
                          <td><?php ?>
                            
                            <a href="view-student.php?edit=<?php echo $id; ?>"><i class="fas fa-eye"></i></a>
                            <?php 
                            ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $phone; ?></td>
                            <td><?php echo $nationality; ?></td>
                            <td>
                            <?php
                             
                             if ($destination == 1) {
                                 echo "USA";
                             } else if ($destination == 2) {
                                 echo "UK";
                             } else if ($destination == 3) {
                                 echo "Canada";
                             } else if ($destination == 4) {
                                 echo "Australia";
                             } else if ($destination == 5) {
                                 echo "Denmark";
                             } else if ($destination == 6) {
                                 echo "Cyprus";
                             } else if ($destination == 7) {
                                 echo "Ireland";
                             } else if ($destination == 8) {
                                 echo "Malaysia";
                             } else if ($destination == 9) {
                                 echo "Dubai";
                             } else if ($destination == 10) {
                                 echo "Hungary";
                             } else if ($destination == 11) {
                                 echo "Bulgaria";
                             } else if ($destination == 12) {
                                 echo "Malta";
                             } else if ($destination == 13) {
                                 echo "Romania";
                             } else if ($destination == 14) {
                                 echo "Russia";
                             } else if ($destination == 15) {
                                 echo "Turkey";
                             } else if ($destination == 16) {
                                 echo "Georgia";
                             } else if ($destination == 17) {
                                 echo "China";
                             } else if ($destination == 18) {
                                 echo "Latvia";
                             } else if ($destination == 19) {
                                 echo "Netherland";
                             } else if ($destination == 20) {
                                echo "Poland";
                             } else if ($destination == 21) {
                                echo "France";
                             } else if ($destination == 22) {
                                echo "Spain";
                             }
                             
                             ?>
                             
                            </td>
                            <td><?php echo $university; ?></td>
                            <td><?php ?>
                            
                            <a href="add-file.php?edit=<?php echo $id; ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add</a>
                            <?php 
                            ?></td>
                            <td>
                            <?php
                              
                              if ($status == 2) {
                                echo "<div class='badge bg-success'>Visa Approved</div>";
                              } else if ($status == 1) {
                                echo "<div class='badge bg-warning'>Pending</div>";
                              } else if ($status == 3) {
                                echo "<div class='badge bg-info'>On-Process</div>";
                              } else if ($status == 4) {
                                echo "<div class='badge bg-secondary'>Uncomplete Profile</div>";
                              } else if ($status == 5) {
                                echo "<div class='badge bg-primary'>Applied for Admission</div>";
                              } else if ($status == 6) {
                                echo "<div class='badge bg-secondary'>Conditional Offer Received</div>";
                              } else if ($status == 7) {
                                echo "<div class='badge bg-primary'>Final Offer Received</div>";
                              } else if ($status == 8) {
                                echo "<div class='badge bg-warning'>Visa Applied</div>";
                              } else if ($status == 9) {
                                echo "<div class='badge bg-danger'>Visa Rejected</div>";
                              } else if ($status == 10) {
                                echo "<div class='badge bg-dark'>Not Eligible</div>";
                              } else {
                                echo "<div class='badge bg-danger'>Declined</div>";
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

  <!-- /.main-footer -->
   <?php include('dashboard_include/footer.php'); ?>

  