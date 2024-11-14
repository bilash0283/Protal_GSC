
<?php include('dashboard_include/header.php')?>
<?php ob_start(); ?>
<?php

$agentname        = $_SESSION['name'];
$agentemail       = $_SESSION['email'];
$add_id           = $_GET['add'];
 
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
                <h1 class="m-0">Study Destination</h1>
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
                        <h3 class="card-title">ADD Study Destination</h3>

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
                              <label for="inputName">English Test Result (Language Proficiency Tests)</label>
                              <input type="text" name="ielts" id="inputName" class="form-control">
                            </div> 

                            <div class="form-group">
                              <label for="inputStatus">Preferable Program</label>
                              <select id="inputStatus" name="program" class="form-control custom-select" required>
                                <option selected="">Select one</option>
                                  <option value="1">Foundation</option>
                                  <option value="2">Bachelor's</option>
                                  <option value="3">Master's</option>
                                  <option value="4">Pre-Master's</option>
                              </select>
                            </div>

                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="card-body">

                            <div class="form-group">
                              <label for="inputClientCompany">Study Destination</label>
                              <input type="text" name="gscdestination" id="inputClientCompany" class="form-control">
                            </div>

                            <div class="form-group">
                              <label for="inputClientCompany">Preferable Intake</label>
                              <input type="text" name="semester" id="inputClientCompany" class="form-control">
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

              $ielts           = $_POST['ielts'];
              $program         = $_POST['program'];
              $destination     = $_POST['gscdestination'];
              $semester        = $_POST['semester'];

              if ($destination != "") {
               
               $agent_insert = "UPDATE newstudents SET ielts = '$ielts', program = '$program', 
                gscdestination = '$destination', semester = '$semester' WHERE id = '$add_id'";
        
                  $agent_sql = mysqli_query($db, $agent_insert);
        
                  if ($agent_sql){
                  header('location:gsc-add-university.php?add=' . $add_id);
                  } else {
                    echo "Error";
                  }
              } else {
                echo "<div class='alert alert-danger mt-2'>Please Select A Destination!</div>";
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

  