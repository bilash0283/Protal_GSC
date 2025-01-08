
<?php include('dashboard_include/header.php')?>
<?php ob_start(); ?>

  <!-- Navbar -->
<?php include('dashboard_include/top_header.php')?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('dashboard_include/sidebar.php')?>
      

  <?php 
    if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3 || $_SESSION['role'] == 4) { ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Add a Basic Information</h1>
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
        
        $ses_email = $_SESSION['email'];

        $visql = "SELECT * FROM newstudents WHERE email ='$ses_email' ";
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
                        <h3 class="card-title">ADD Information</h3>

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
                              <input type="text" value="<?php echo $name; ?>" name="name" id="inputName" class="form-control" required>
                            </div>

                            <div class="form-group">
                              <label for="inputName">Student Phone No.</label>
                              <input type="text" name="phone" id="inputName" value="<?php echo $phone; ?>" class="form-control" required>
                            </div>

                            <div class="form-group">
                              <label for="inputProjectLeader">Date Of Birth (DD-MM-YY)</label>
                              <input type="text" name="dob" id="inputProjectLeader" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                              <label for="inputClientCompany">Gender</label>
                              <select name="gender" class="form-control" id="">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                              </select>
                            </div>
                            

                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="card-body">
                          <div class="form-group">
                              <label for="inputName">Email</label>
                              <input type="email" value="<?php echo $email;?>" readonly id="inputName" class="form-control" required>
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
              $phone            = $_POST['phone'];
              $dob              = $_POST['dob'];
              $gender           = $_POST['gender'];
              $passport         = $_POST['passport'];
              $address          = $_POST['address'];
              $nationality      = $_POST['nationality'];


              $agent_insert = "UPDATE newstudents 
              SET name='$name', phone='$phone', 
                  dob='$dob', 
                  gender='$gender', 
                  nationality='$nationality', 
                  address='$address', 
                  passport='$passport' 
              WHERE email='$email'";
        
                  $agent_sql = mysqli_query($db, $agent_insert);

                  $student_get = "SELECT * FROM newstudents WHERE name = '$name' AND email = '$email'";
                  $student_query = mysqli_query($db, $student_get);
            
                      while ($row = mysqli_fetch_assoc($student_query)) {
                        $id   = $row['id'];
                      }
        
                  if ($agent_sql){
                    // header('location:gsc-add-qualification.php?add=' . $id);
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

  