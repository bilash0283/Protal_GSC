  <?php include('dashboard_include/header.php') ?>
  <!-- Navbar -->
  <?php include('dashboard_include/top_header.php') ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('dashboard_include/sidebar.php')?>

<?php

$agentid          = $_SESSION['id'];
$agentname        = $_SESSION['name'];
$agentemail       = $_SESSION['email'];

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">GSC Dashboard</h1>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Profile</h3>

                <p>Your Profile</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-contact"></i>
              </div>
              <a href="profile.php" class="small-box-footer">View Profile <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>STUDENT</h3>

                <p>Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>

              <?php 
              
              if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) { ?>
               <a href="gsc-add-student.php" class="small-box-footer">Apply <i class="fas fa-arrow-circle-right"></i></a> 
             <?php } else { ?>
              <a href="add-student.php" class="small-box-footer">Apply <i class="fas fa-arrow-circle-right"></i></a>
            <?php }

              ?>

              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>STATUS<sup style="font-size: 20px">%</sup></h3>

                <p>Students</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              

              <?php 
              
              if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) { ?>
               <a href="gsc-student.php" class="small-box-footer">Apply <i class="fas fa-arrow-circle-right"></i></a> 
             <?php } else { ?>
              <a href="student.php" class="small-box-footer">Apply <i class="fas fa-arrow-circle-right"></i></a>
            <?php }

              ?>
          </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Institutes</h3>

                <p>Visit Instutute </p>
              </div>
              <div class="icon">
              <i class="ion ion-university"></i>
                <!-- <i class="fa-solid fa-building-columns"></i> -->
              </div>
              <!-- <a href="https://gsc.co.com" class="small-box-footer">View Site <i class="fas fa-arrow-circle-right"></i></a> -->

              <a href="college-details.php?id=9999" class="small-box-footer">View Institutes <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <?php 
        
        if ($_SESSION['role'] == 1) {
          
          $agents = "SELECT * FROM newstudents";
          $agents_query = mysqli_query($db, $agents);
          $count = mysqli_num_rows($agents_query); 

          $studentonprocess = "SELECT * FROM newstudents WHERE status = '3'";
          $studentonprocess_query = mysqli_query($db, $studentonprocess);
          $count_process = mysqli_num_rows($studentonprocess_query);

          $studentpending = "SELECT * FROM newstudents WHERE status = '1'";
          $studentpending_query = mysqli_query($db, $studentpending);
          $count_pending = mysqli_num_rows($studentpending_query);

          $studentapprove = "SELECT * FROM newstudents WHERE status = '2'";
          $studentapprove_query = mysqli_query($db, $studentapprove);
          $count_approve = mysqli_num_rows($studentapprove_query);

          $studentdecline = "SELECT * FROM newstudents WHERE status = '4'";
          $studentdecline_query = mysqli_query($db, $studentdecline);
          $count_decline = mysqli_num_rows($studentdecline_query);
          
        ?>

          <div class="row mt-3">
          <div class="col-md-3"></div>
          <div class="col-md-6">
              <table class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Total No. Of Applicant</th>
                    <th scope="col"><?php echo $count; ?></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">On-Process (University Admission)</th>
                    <td><?php echo $count_process; ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Pending (Assessment in Progress)</th>
                    <td><?php echo $count_pending; ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Approved (Offer Letter Issued)</th>
                    <td><?php echo $count_approve; ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Declined (Rejected Applicants)</th>
                    <td><?php echo $count_decline; ?></td>
                  </tr>
                </tbody>
              </table>
          </div>
          <div class="col-md-3"></div>
        </div>

       <?php } else {

                $agents = "SELECT * FROM newstudents WHERE agent = '$agentname' AND agentemail = '$agentemail'";
                $agents_query = mysqli_query($db, $agents);
                $count = mysqli_num_rows($agents_query); 

                $studentonprocess = "SELECT * FROM newstudents WHERE agentemail = '$agentemail' AND status = '3'";
                $studentonprocess_query = mysqli_query($db, $studentonprocess);
                $count_process = mysqli_num_rows($studentonprocess_query);

                $studentpending = "SELECT * FROM newstudents WHERE agentemail = '$agentemail' AND status = '1'";
                $studentpending_query = mysqli_query($db, $studentpending);
                $count_pending = mysqli_num_rows($studentpending_query);

                $studentapprove = "SELECT * FROM newstudents WHERE agentemail = '$agentemail' AND status = '2'";
                $studentapprove_query = mysqli_query($db, $studentapprove);
                $count_approve = mysqli_num_rows($studentapprove_query);

                $studentdecline = "SELECT * FROM newstudents WHERE agentemail = '$agentemail' AND status = '4'";
                $studentdecline_query = mysqli_query($db, $studentdecline);
                $count_decline = mysqli_num_rows($studentdecline_query);

                ?>

                <div class="row mt-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">Total No. Of Applicant</th>
                          <th scope="col"><?php echo $count; ?></th>
                        </tr>
                      </thead>
                      <tbody>
                       <tr>
                        <th scope="row">Pending (Assessment in Progress)</th>
                        <td><?php echo $count_pending; ?></td>
                       </tr>
                       <tr>
                        <th scope="row">On-Process (University Admission)</th>
                        <td><?php echo $count_process; ?></td>
                       </tr>
                       <tr>
                        <th scope="row">Approved (Offer Letter Issued)</th>
                        <td><?php echo $count_approve; ?></td>
                       </tr>
                       <tr>
                        <th scope="row">Declined (Rejected Applicants)</th>
                        <td><?php echo $count_decline; ?></td>
                       </tr>
                      </tbody>
                    </table>
                </div>
                <div class="col-md-3"></div>
                </div>

                <?php


       }
        
        ?>


        <!-- <div class="row mt-3">
          <div class="col-md-3"></div>
          <div class="col-md-6">
              <table class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Total No. Of Applicant</th>
                    <th scope="col"><?php echo $count; ?></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">On-Process</th>
                    <td>Jacob</td>
                  </tr>
                  <tr>
                    <th scope="row">Pending</th>
                    <td>Larry</td>
                  </tr>
                  <tr>
                    <th scope="row">Approved</th>
                    <td>Larry</td>
                  </tr>
                  <tr>
                    <th scope="row">Declined</th>
                    <td>Larry</td>
                  </tr>
                </tbody>
              </table>
          </div>
          <div class="col-md-3"></div>
        </div> -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- /.main-footer -->
   <?php include('dashboard_include/footer.php') ?>

  