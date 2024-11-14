<?php include('dashboard_include/header.php')?>
<?php ob_start(); ?>
  <!-- Navbar -->
<?php include('dashboard_include/top_header.php')?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('dashboard_include/sidebar.php')?>


  <?php 
  
    if ($_SESSION['role'] == 1) { ?>
      
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Create an Agent</h1>
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
                        <h3 class="card-title">Create Agent</h3>

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
                              <label for="inputName">Agent Name</label>
                              <input type="text" name="name" id="inputName" class="form-control">
                            </div>

                            <div class="form-group">
                              <label for="inputName"> Phone</label>
                              <input type="text" name="phone" id="inputName" class="form-control">
                            </div>

                            <div class="form-group">
                              <label for="inputProjectLeader">Designation</label>
                              <input type="text" name="designation" id="inputProjectLeader" class="form-control">
                            </div>
                            
                            <div class="form-group">
                              <label for="inputClientCompany"> Company Name</label>
                              <input type="text" name="company" id="inputClientCompany" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="inputProjectLeader">Company Address</label>
                              <input type="text" name="address" id="inputProjectLeader" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="inputProjectLeader">Country</label>
                              <input type="text" name="country" id="inputProjectLeader" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="inputProjectLeader">Profile Image</label>
                              <input type="file" name="image" id="inputName">
                            </div>

                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="card-body">
                          <div class="form-group">
                              <label for="inputName">Email</label>
                              <input type="email" name="email" id="inputName" class="form-control">
                            </div>

                            <div class="form-group">
                              <label for="inputName">Password</label>
                              <input type="password" name="password" id="inputName" class="form-control">
                            </div>

                            <div class="form-group">
                              <label for="inputName">Confirm Password</label>
                              <input type="password" name="confirm_password" id="inputName" class="form-control">
                            </div>

                            <div class="form-group">
                              <label for="inputClientCompany">Company Year of Establishment</label>
                              <input type="text" name="year" id="inputClientCompany" class="form-control">
                            </div>

                            

                            <div class="form-group">
                              <label for="inputStatus">Role</label>
                              <select id="inputStatus" name="role" class="form-control custom-select">
                                <option selected="">Select one</option>
                                  <option value="1">Admin</option>
                                  <option value="2">Agent</option>
                                  <option value="3">Employee</option>
                              </select>
                            </div>

                            <div class="form-group">
                              <label for="inputStatus">Status</label>
                              <select id="inputStatus" name="status" class="form-control custom-select">
                                <option selected="">Select one</option>
                                  <option value="1">Active</option>
                                  <option value="2">Inactive</option>
                              </select>
                            </div>

                            <div class="form-group">
                              <input type="submit" name="submit" value="Add Client" class="btn btn-lg btn-primary">
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
              $password         = md5($_POST['password']);
              $confirm_password = md5($_POST['confirm_password']);
              $designation      = $_POST['designation'];
              $company          = $_POST['company'];
              $year             = $_POST['year'];
              $address          = $_POST['address'];
              $country          = $_POST['country'];
              $status           = $_POST['status'];
              $role             = $_POST['role'];
              $image            = $_FILES['image']['name'];
              $temporary_location = $_FILES['image']['tmp_name'];

              if ($password == $confirm_password) {
              
                if (!empty($image)) {
                  $rand = rand(0,999999);
                  $final_image_name = 'agent_photo'."_".$rand.time().$image;
        
                  move_uploaded_file($temporary_location, 'dist/img/agent_image/'.$final_image_name);
        
                  $agent_insert = "INSERT INTO agents (name, email, password, phone, company, designation, year, 
                  country, role, status, address, image, joining) VALUES('$name', '$email', '$password',
                  '$phone', '$company', '$designation', '$year', '$country', '$role', '$status', '$address',
                  '$final_image_name', now())";
        
                  $agent_sql = mysqli_query($db, $agent_insert);
        
                  if ($agent_sql){
                  header('location:agent.php');
                  } else {
                    echo "<div class='alert alert-danger mt-2'>An Error Occured!</div>";
                  }
                } else {
                  
                  $agent_insert = "INSERT INTO agents (name, email, password, phone, company, designation, year, 
                  country, role, status, address, joining) VALUES('$name', '$email', '$password',
                  '$phone', '$company', '$designation', '$year', '$country', '$role', '$status', '$address',
                  now())";
        
                  $agent_sql = mysqli_query($db, $agent_insert);
        
                  if ($agent_sql){
                  header('location:agent.php');
                  } else {
                    echo "<div class='alert alert-danger mt-2'>An Error Occured!</div>";
                  }
                }
      
              } else {
                echo "Password Doesn't Match";
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

  