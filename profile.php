<?php include('dashboard_include/header.php') ?>

<?php ob_start(); ?>
<?php

$agentname        = $_SESSION['name'];
$agentemail       = $_SESSION['email'];
                    
                      $agents = "SELECT * FROM agents WHERE email = '$agentemail'";
                      $agents_query = mysqli_query($db, $agents);

                      $count = mysqli_num_rows($agents_query);

                      if ($count < 1) {
                        echo "There are no Active Agents!!";
                      } else {

                        while ($row = mysqli_fetch_assoc($agents_query)) {
                          $id           = $row['id'];
                          $image        = $row['image'];
                          $name         = $row['name'];
                          $email        = $row['email'];
                          $phone        = $row['phone'];
                          $company      = $row['company'];
                          $country      = $row['country'];
                          $address      = $row['address'];
                          $designation  = $row['designation'];
                          $joining      = $row['joining'];
                        
                        }
                      }

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
            <h1 class="m-0">My Profile</h1>
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

      <div class="continer">
        <div class="row">
            <div class="col-md-6">
                <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">

                <?php 
          
                if ($_SESSION['image'] == '') { ?>
                <img src="dist/img/agent_image/demo.png" class="profile-user-img img-fluid img-circle" alt="User Profile Picture">
                <?php } else { ?>
                  <img src="dist/img/agent_image/<?php echo $_SESSION['image']; ?>" class="profile-user-img img-fluid img-circle" alt="User Profile Picture">
                <?php }
                ?>

              </div>

              <?php 
              
              if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) { ?>
                <h3 class="profile-username text-center"><?php echo $_SESSION['name']; ?></h3>
                <p class="text-muted text-center"><?php echo $company; ?></p>
             <?php } else { ?>
              <h3 class="profile-username text-center"><?php echo $company; ?></h3>
              <p class="text-muted text-center"><?php echo $_SESSION['name']; ?></p>
             <?php }
              
              ?>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?php echo $email; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone</b> <a class="float-right"><?php echo $phone; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Designation</b> <a class="float-right"><?php echo $designation; ?></a>
                  </li>
                </ul>

                <?php 
                
                if ($_SESSION['role'] == 2){ ?>
                  <a href="add-student.php" class="btn btn-primary btn-block"><b>Add Student</b></a>
               <?php } else { ?>
                <a href="gsc-add-student.php" class="btn btn-primary btn-block"><b>Add Student</b></a>
              <?php }

                ?>

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <div class="col-md-6">
                <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i>Company</strong>

                <p class="text-muted">
                <?php echo $company; ?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                <p class="text-muted">
                  <?php echo $address; ?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">
                  <?php echo $country; ?>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i>Joining Date</strong>
                
                <p class="text-muted">
                <?php echo $joining; ?>
                </p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>
      </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  
  <?php
    ob_end_flush();
   ?>
  <!-- /.main-footer -->
   <?php include('dashboard_include/footer.php') ?>

  