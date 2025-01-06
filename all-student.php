<?php include('dashboard_include/header.php') ?>
<?php ob_start(); ?>
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
              <div class="col-sm-9">
                <h1 class="m-0">All Students (Direct Student + Agent Student)</h1>
              </div><!-- /.col -->
              <div class="col-sm-3">
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
                      <th scope="col">Image</th>
                      <th scope="col">Agent Name</th>
                      <th scope="col">Student Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">D.O.B</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Nationality</th>
                      <th scope="col">Address</th>
                      <th scope="col">Passport</th>
                      <th scope="col">SSC/O Level Result</th>
                      <th scope="col">SSC/O Level Year</th>
                      <th scope="col">HSC/A Level Result</th>
                      <th scope="col">HSC/A Level Year</th>
                      <th scope="col">Diploma Result</th>
                      <th scope="col">Diploma Year</th>
                      <th scope="col">Bachelors Result</th>
                      <th scope="col">Bachelors Year</th>
                      <th scope="col">Masters Result</th>
                      <th scope="col">Masters Year</th>
                      <th scope="col">English Result</th>
                      <th scope="col">Intake</th>
                      <th scope="col">Destination</th>
                      <th scope="col">University</th>
                      <th scope="col">Program</th>
                      <th scope="col">Course/Subject</th>
                      <th scope="col">Status</th>
                      <th scope="col">Comments</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    
                      $agents = "SELECT * FROM newstudents ORDER BY id DESC";
                      $agents_query = mysqli_query($db, $agents);

                      $count = mysqli_num_rows($agents_query);

                      
                      if ($count < 1) {
                        echo "There are no Active Students!!";
                      } else {

                        while ($row = mysqli_fetch_assoc($agents_query)) {
                          $id                 = $row['id'];
                          $agentname          = $row['agent'];
                          $name               = $row['name'];
                          $email              = $row['email'];
                          $phone              = $row['phone'];
                          $dob                = $row['dob'];
                          $gender             = $row['gender'];
                          $nationality        = $row['nationality'];
                          $address            = $row['address'];
                          $passport           = $row['passport'];
                          $ssc                = $row['ssc'];
                          $hsc                = $row['hsc'];
                          $diploma            = $row['diploma'];
                          $undergrad          = $row['undergrad'];
                          $level              = $row['level'];
                          $sscyear            = $row['sscyear'];
                          $hscyear            = $row['hscyear'];
                          $diplomayear        = $row['diplomayear'];
                          $undergradyear      = $row['undergradyear'];
                          $qualificationyear  = $row['qualificationyear'];
                          $ielts              = $row['ielts'];
                          $semester           = $row['semester'];
                          $gscdestination     = $row['gscdestination'];
                          $gscuniversity      = $row['gscuniversity'];
                            $destination      = $row['destination'];
                            $university       = $row['university'];
                          $program            = $row['program'];
                          $subject            = $row['subject'];
                          $status             = $row['status'];
                          $comment            = $row['comment'];
                          $qualification      = $row['qualification'];
                          $profile            = $row['profile'];
                          
                          ?>

                          

                          <tr>
                          <td><?php ?>
                            
                            <a href="view-student.php?edit=<?php echo $id; ?>"><i class="fas fa-eye"></i></a>
                            <?php 
                            ?></td>
                            <td>
                            <?php
                                if (empty($profile)) {
                                  echo "<img src='dist/img/avatar5.png' width='40px'>";
                                } else{ ?>
                                  <img src="dist/student_profile/<?php echo $profile;?>" width="60px" class="img-circle mr-3" alt="">
                                <?php }
                              ?>
                            </td>
                            <td><?php echo $agentname; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $phone; ?></td>
                            <td><?php echo $dob; ?></td>
                            <td><?php echo $gender; ?></td>
                            <td><?php echo $nationality; ?></td>
                            <td><?php echo $address; ?></td>
                            <td><?php echo $passport; ?></td>
                            <td><?php echo $ssc; ?></td>
                            <td><?php echo $sscyear; ?></td>
                            <td><?php echo $hsc; ?></td>
                            <td><?php echo $hscyear; ?></td>
                            <td><?php echo $diploma; ?></td>
                            <td><?php echo $diplomayear; ?></td>
                            <td><?php echo $undergrad; ?></td>
                            <td><?php echo $undergradyear; ?></td>
                            <td><?php echo $level; ?></td>
                            <td><?php echo $qualificationyear; ?></td>
                            <td><?php echo $ielts; ?></td>
                            <td><?php echo $semester; ?></td>
                            <td>
                              <?php 
                                if ($row['gscdestination'] != '') { 
                                   echo $gscdestination;
                                } else {
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
                              }
                              ?>
                              
                            </td>
                            <td><?php 
                              if ($row['university'] == '') {
                                echo $gscuniversity;
                              } else {
                                echo $university;
                              }
                            ?></td>
                            <td><?php 
                            if ($program == 1) {
                              echo "Foundation";
                            } else if ($program == 2){
                              echo "Bachelors";
                            } else if ($program == 3) {
                              echo "Masters";
                            } else if ($program == 4) {
                              echo "Pre-Masters";
                            }
                            ?></td>
                            <td><?php echo $subject; ?></td>
                            <td>
                            <?php
                              
                              if ($status == 2) {
                                echo "<div class='badge bg-success' >Approved</div>";
                              } else if ($status == 1){
                                echo "<div class='badge bg-warning' >pending</div>";
                              } else if ($status ==4) {
                                echo "<div class='badge bg-danger' >Declined</div>";
                              } else {
                                echo "<div class='badge bg-info' >on-process</div>";
                              }

                              ?>
                            </td>
                            
                            <td><?php echo $comment; ?></td>

                            <td>

                              <div class="btn-group">
                                <a href="update_student.php?edit=<?php echo $id?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#id<?php echo $id?>">Delete</a>
                              </div>

                            </td>

                            <div class="modal fade" id="id<?php echo $id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are you sure to delete <strong><?php echo $name?></strong></p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="all-student.php?delete=<?php echo $id?>" class="btn btn-primary">Delete Student</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </tr>
                          <?php
                        }
                      }
                    ?>
                  </tbody>
                </table>

            </div>
          </div>

            <?php
              if(isset($_GET['delete'])){

                $delete_id = $_GET['delete'];

                $agentss = "SELECT * FROM newstudents WHERE id = '$delete_id'";
                $agentss_query = mysqli_query($db, $agentss);
                while ($row = mysqli_fetch_assoc($agentss_query)) {
                  $qualification      = $row['qualification'];
                  $profile            = $row['profile'];
                  $passport           = $row['passport'];
                  $student            = $row['name'];
                }

                // $agentsss = "SELECT * FROM missingfiles WHERE student = '$student' AND passport = '$passport'";
                // $agentsss_query = mysqli_query($db, $agentsss);
                // while ($row = mysqli_fetch_assoc($agentsss_query)) {
                //   $file          = $row['missing'];

                // $delete_sql = "DELETE FROM missingfiles WHERE id = '$delete_id'";
                // $delete = mysqli_query($db,$delete_sql);
                // }

                
                $delete_sql = "DELETE FROM newstudents WHERE id = '$delete_id'";
                $delete = mysqli_query($db,$delete_sql);

                if($delete){

                  $path01 = 'dist/student_file/' . $qualification;
                  $path02 = 'dist/student_profile/' . $profile;

                  if (!unlink($path01)) {
                    echo "<div class='alert alert-danger mt-2'>An Error Occured While!</div>";
                  } else if (!unlink($path02)) {
                    echo "<div class='alert alert-danger mt-2'>An Error Occured While!</div>";
                  } else {
                    header('location:all-student.php'); 
                  }
                } else {
                  echo "<div class='alert alert-danger mt-2'>An Error Occured While!</div>";
                }
              }
            ?>

            
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
    <?php } else {
      echo "<div class='alert alert-danger mt-2 text-center'><h1>Only Admin Allowed!</h1></div>";
    }

  ?>


  

  <?php
    ob_end_flush();
   ?>

  <!-- /.main-footer -->
   <?php include('dashboard_include/footer.php') ?>

  