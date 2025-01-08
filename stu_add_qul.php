
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
    if ($_SESSION['role'] == 4) { ?>
      
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Add Student Qualification</h1>
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

        <?php 
        if(isset($_GET['add'])){

           $get_id = $id;
          

        $visql = "SELECT * FROM newstudents WHERE id ='$get_id' ";
        $vi_res = mysqli_query($db,$visql);

        while ($row = mysqli_fetch_assoc($vi_res)) {
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $last_pass_year = $row['last_pass_year'];
            $last_gpa = $row['last_gpa'];
            $intre_country = $row['intre_country'];
            $last_qulification = $row['last_qulification'];
            $phone = $row['phone'];
            $dob = $row['dob'];
            $gender = $row['gender'];
            $nationality = $row['nationality'];
            $address = $row['address'];
            $passport = $row['passport'];

            $ssc = $row['ssc'];
            $hsc = $row['hsc'];
            $diploma = $row['diploma'];
            $undergrad = $row['undergrad'];
            $level = $row['level'];
            $sscyear = $row['sscyear'];
            $hscyear = $row['hscyear'];
            $diplomayear = $row['diplomayear'];
            $undergradyear = $row['undergradyear'];
            $qualificationyear = $row['qualificationyear'];
            
            $ielts = $row['ielts'];
            $semester = $row['semester'];
            $destination = $row['destination'];
            $gscdestination = $row['gscdestination'];
            $program = $row['program'];
            $status = $row['status'];
            $comment = $row['comment'];
            $subject = $row['subject'];
            $university = $row['university'];
            $gscuniversity = $row['gscuniversity'];
            $qualification = $row['qualification'];
            $profile = $row['profile'];
          }
        }
        ?>



        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <form action="" method="POST" enctype="multipart/form-data">

              <div class="row">

                <div class="col-md-12">
                    <div class="card card-primary">

                      <div class="card-header">
                        <h3 class="card-title">ADD Qualification</h3>

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
                              <label for="inputName">SSC / O Level's GPA & Group</label>
                              <input type="text" name="ssc" value="<?php echo $ssc; ?>" id="inputName" class="form-control" required>
                            </div> 

                            <div class="form-group">
                              <label for="inputName">HSC / A Level's GPA & Group</label>
                              <input type="text" name="hsc" value="<?php echo $hsc; ?>" id="inputName" class="form-control" required>
                            </div> 

                            <div class="form-group">
                              <label for="inputName">Diploma Course & GPA</label>
                              <input type="text" name="diploma" id="inputName" value="<?php echo $diploma; ?>" class="form-control" required>
                            </div> 

                            <div class="form-group">
                              <label for="inputName">Bachelor's Major & CGPA</label>
                              <input type="text" name="undergrad" value="<?php echo $undergrad; ?>" id="inputName" class="form-control">
                            </div> 

                            <div class="form-group">
                              <label for="inputClientCompany">Masters's Major & CGPA</label>
                              <input type="text" name="level" value="<?php echo $level; ?>" id="inputClientCompany" class="form-control">
                            </div>

                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="card-body">

                          <div class="form-group">
                              <label for="inputName">SSC / O Level's Year Of Passing</label>
                              <input type="text" value="<?php echo $sscyear; ?>" name="sscyear" id="inputName" class="form-control" required>
                            </div> 

                            <div class="form-group">
                              <label for="inputName">HSC / A Level's Year Of Passing</label>
                              <input type="text" value="<?php echo $hscyear; ?>" name="hscyear" id="inputName" class="form-control" required>
                            </div> 

                            <div class="form-group">
                              <label for="inputName">Diploma Year Of Passing</label>
                              <input type="text" value="<?php echo $diplomayear; ?>" name="diplomayear" id="inputName" class="form-control" required>
                            </div> 

                            <div class="form-group">
                              <label for="inputName">Bachelor's Year Of Passing</label>
                              <input type="text" value="<?php echo $undergradyear; ?>" name="undergradyear" id="inputName" class="form-control">
                            </div> 

                            <div class="form-group">
                              <label for="inputClientCompany">Masters's Year Of Passing</label>
                              <input type="text" value="<?php echo $qualificationyear; ?>" name="qualificationyear" id="inputClientCompany" class="form-control">
                            </div>

                            <div class="form-group">
                              <input type="submit"  name="submit" value="Next" class="btn btn-lg btn-primary">
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

              $ssc                    = $_POST['ssc'];
              $hsc                    = $_POST['hsc'];
              $diploma                = $_POST['diploma'];
              $undergrad              = $_POST['undergrad'];
              $qualification          = $_POST['level'];
              $sscyear                = $_POST['sscyear'];
              $hscyear                = $_POST['hscyear'];
              $diplomayear            = $_POST['diplomayear'];
              $undergradyear          = $_POST['undergradyear'];
              $qualificationyear      = $_POST['qualificationyear'];


                $agent_insert = "UPDATE newstudents SET ssc = '$ssc', hsc = '$hsc', diploma = '$diploma', undergrad = '$undergrad',
                  level = '$qualification', sscyear = '$sscyear', hscyear = '$hscyear', diplomayear = '$diplomayear', 
                  undergradyear = '$undergradyear', qualificationyear = '$qualificationyear' WHERE id = '$add_id'";
        
                  $agent_sql = mysqli_query($db, $agent_insert);
        
                  if ($agent_sql){
                   header('location:gsc-add-destination.php?add=' . $add_id);
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

  