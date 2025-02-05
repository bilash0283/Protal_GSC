<?php include('dashboard_include/header.php');
ob_start(); 
$agentname        = $_SESSION['name'];
$agentemail       = $_SESSION['email'];
$add_id           = $_GET['add'];

include('dashboard_include/top_header.php');
include('dashboard_include/sidebar.php');

?>

  <?php if ($_SESSION['role'] == 2) { ?>
      
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
                              <label for="inputName">Language Proficiency Tests & Score</label>
                              <input type="text" name="ielts" id="inputName" class="form-control">
                            </div> 

                            <div class="form-group">
                              <label for="inputStatus">Preferable Program</label>
                              <select id="inputStatus" name="program" class="form-control custom-select" required>
                                <option selected="">---select options---</option>
                                  <option value="1">Foundation</option>
                                  <option value="5">Foundation with Bachelor</option>
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
                              <label for="inputStatus">Study Destination</label>
                              <select id="inputStatus" name="destination" class="form-control custom-select" required>
                                  <option selected="" value="0">Select one</option>
                                  <option value="1">USA</option>
                                  <option value="2">UK</option>
                                  <option value="3">Canada</option>
                                  <option value="4">Australia</option>
                                  <option value="5">Denmark</option>
                                  <option value="6">Cyprus</option>
                                  <option value="7">Ireland</option>
                                  <option value="8">Malaysia</option>
                                  <option value="9">Dubai</option>
                                  <option value="10">Hungury</option>
                                  <option value="11">Bulgaria</option>
                                  <option value="12">Malta</option>
                                  <option value="13">Romania</option>
                                  <option value="14">Russia</option>
                                  <option value="15">Turkey</option>
                                  <option value="16">Georgia</option>
                                  <option value="17">China</option>
                                  <option value="18">Latvia</option>
                                  <option value="19">Netherland</option>
                                  <option value="20">Poland</option>
                                  <option value="21">France</option>
                                  <option value="22">Spain</option>
                              </select>
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
              $destination     = $_POST['destination'];
              $semester        = $_POST['semester'];

              if ($destination == 0) {
                echo "<div class='alert alert-danger mt-2'>Please Select A Destination!</div>";
              } else {
                $agent_insert = "UPDATE newstudents SET ielts = '$ielts', program = '$program', 
                destination = '$destination', semester = '$semester' WHERE id = '$add_id'";
        
                  $agent_sql = mysqli_query($db, $agent_insert);
        
                  if ($agent_sql){
                  header('location:add-university.php?add=' . $add_id);
                  } else {
                    echo "Error";
                  }
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
      echo "<div class='alert alert-danger mt-2 text-center'><h1>Only Agents Allowed!</h1></div>";
    }

  ?>




   <?php
    ob_end_flush();
   ?>

  <!-- /.main-footer -->
   <?php include('dashboard_include/footer.php') ?>

  