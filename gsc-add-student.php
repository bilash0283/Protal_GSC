
<?php include('dashboard_include/header.php')?>
<?php ob_start(); ?>
<?php

$agentname        = $_SESSION['name'];
$agentemail       = $_SESSION['email'];

?>
  <!-- Navbar -->
<?php include('dashboard_include/top_header.php')?>
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
                <h1 class="m-0">Add a Student</h1>
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
            <form action="" method="POST" enctype="multipart/form-data">

              <div class="row">

                <div class="col-md-12">
                    <div class="card card-primary">

                      <div class="card-header">
                        <h3 class="card-title">ADD STUDENT</h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="card-body">
                            <div class="form-group">
                              <label for="inputName">Student Full Name</label>
                              <input type="text" name="name" id="inputName" class="form-control" required>
                            </div>

                            <div class="form-group">
                              <label for="inputName">Student Phone No.</label>
                              <input type="text" name="phone" id="inputName" class="form-control" required>
                            </div>

                            <div class="form-group">
                              <label for="inputProjectLeader">Date Of Birth (DD-MM-YY)</label>
                              <input type="text" name="dob" id="inputProjectLeader" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                              <label for="inputClientCompany">Gender</label>
                              <input type="text" name="gender" id="inputClientCompany" class="form-control" required>
                            </div>
                            

                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="card-body">
                          <div class="form-group">
                              <label for="inputName">Email</label>
                              <input type="email" name="email" id="inputName" class="form-control" required>
                            </div>

                            <div class="form-group">
                              <label for="inputProjectLeader">Student Nationality</label>
                              <input type="text" name="nationality" id="inputProjectLeader" class="form-control" required>
                            </div>

                            <div class="form-group">
                              <label for="inputName">Passport No.</label>
                              <input type="text" name="passport" id="inputName" class="form-control" required>
                            </div>

                            <div class="form-group">
                              <label for="inputProjectLeader">Address (According To Passport)</label>
                              <input type="text" name="address" id="inputProjectLeader" class="form-control" required>
                            </div>

                            <div class="form-group">
                              <input type="submit" name="submit" value="Next" class="btn btn-lg btn-primary">
                            </div>

                            
                          </div>
                        </div>
                      </div>
                      <!-- /.card-body -->

                    </div>

                  </div>
              
              </div>

            </form>


          <!-- Form Submission Code -->

            <?php
            
            if(isset($_POST['submit'])){

              $name             = $_POST['name'];
              $email            = $_POST['email'];
              $phone            = $_POST['phone'];
              $dob              = $_POST['dob'];
              $gender           = $_POST['gender'];
              $passport         = $_POST['passport'];
              $address          = $_POST['address'];
              $nationality      = $_POST['nationality'];


                $agent_insert = "INSERT INTO newstudents (agent, agentemail, name, email, phone, dob, 
                  gender, nationality, address, passport) VALUES('$agentname', '$agentemail', '$name', '$email', '$phone', 
                  '$dob', '$gender', '$nationality', '$address', '$passport')";
        
                  $agent_sql = mysqli_query($db, $agent_insert);

                  $student_get = "SELECT * FROM newstudents WHERE name = '$name' AND email = '$email'";
                  $student_query = mysqli_query($db, $student_get);
            
                                while ($row = mysqli_fetch_assoc($student_query)) {
                                    $id   = $row['id'];
                                }
        
                  if ($agent_sql){
                    header('location:gsc-add-qualification.php?add=' . $id);
                  } else {
                    echo "<div class='alert alert-danger mt-2'>An Error Occured!</div>";
                  }
            
            }
              
            ?>

          <!-- Form Submission Code -->


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

  