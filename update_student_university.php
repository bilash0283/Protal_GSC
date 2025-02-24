<?php include('dashboard_include/header.php');
ob_start(); 
$agentname = $_SESSION['name'];
$agentemail = $_SESSION['email'];
include('dashboard_include/top_header.php');
include('dashboard_include/sidebar.php');

if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) { ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update University & Program</h1>
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
                  <h3 class="card-title">Select University & Program</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>

                <?php
                if (isset($_GET['edit'])) {

                  $edit_id = $_GET['edit'];

                  $agents = "SELECT * FROM newstudents WHERE id = '$edit_id'";
                  $agents_query = mysqli_query($db, $agents);

                  while ($row = mysqli_fetch_assoc($agents_query)) {


                    $id = $edit_id;
                    $name = $row['name'];
                    $agentname = $row['agent'];
                    $subject = $row['subject'];
                    $university = $row['university'];
                    $gscuniversity = $row['gscuniversity'];
                    $destination = $row['destination'];
                    $profile = $row['profile'];
                    $profilee = $row['profile'];

                  }
                }

                ?>

                <div class="row">
                  <div class="col-md-6">
                    <div class="card-body">

                      <?php

                      if ($university != '') { ?>
                        <div class="form-group">
                          <label for="inputClientCompany">Preferable University</label>
                          <input type="text" name="gscuniversity" value="<?php echo $university; ?>" id="inputClientCompany"
                            class="form-control">
                        </div>
                      <?php } else { ?>
                        <div class="form-group">
                          <label for="inputClientCompany">Preferable University</label>
                          <input type="text" name="gscuniversity" value="<?php echo $gscuniversity; ?>"
                            id="inputClientCompany" class="form-control">
                        </div>
                      <?php }

                      ?>

                      <div>
                        <?php
                        if (empty($profile)) {
                          echo "<img src='dist/img/avatar5.png' width='70px'>";
                        } else { ?>
                          <img src="dist/student_profile/<?php echo $profile; ?>" width="70px" alt="">
                        <?php }
                        ?>
                      </div>

                      <div class="form-group">
                        <label for="inputProjectLeader">Profile Image</label>
                        <input type="file" name="profile" id="inputName">
                      </div>




                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="card-body">

                      <div class="form-group">
                        <label for="inputClientCompany">Preferable Course</label>
                        <input type="text" name="subject" value="<?php echo $subject; ?>" id="inputClientCompany"
                          class="form-control">
                      </div>

                      <div class="form-group">
                        <input type="submit" name="submit" value="Update Student" class="btn btn-lg btn-primary">
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

        if (isset($_POST['submit'])) {


          $subject = $_POST['subject'];
          $university = $_POST['gscuniversity'];
          $gscuniversity = $_POST['gscuniversity'];
          $profile = $_FILES['profile']['name'];
          $profile_temporary_location = $_FILES['profile']['tmp_name'];


          if (!empty($profile)) {

            $path02 = 'dist/student_profile/' . $profilee;
            unlink($path02);

            $random = rand(0, 999999);
            $final_profile_name = 'Student_' . $name . "_Agent_" . $agentname . "_ID_" . $id . "_" . $random . time() . "_" . $profile;

            move_uploaded_file($profile_temporary_location, 'dist/student_profile/' . $final_profile_name);

            $update_agent = "UPDATE newstudents SET subject = '$subject', profile = '$final_profile_name', university = '$university', gscuniversity = '$gscuniversity' WHERE id = '$edit_id'";

            $agent_sql = mysqli_query($db, $update_agent);

            if ($agent_sql) {

              $agentss = "SELECT * FROM newstudents WHERE id = '$edit_id'";
              $agents_queryyy = mysqli_query($db, $agentss);

              while ($row = mysqli_fetch_assoc($agents_queryyy)) {
                $id1 = $row['id'];
                $name1 = $row['name'];
                $agent1 = $row['agent'];
                $email1 = $row['agentemail'];
                $message = 'GSC added a new Update on Student: ' . $name1;
                $value = 1;
              }

              $agent_insertt = "INSERT INTO notifications (id, agent, email, name, message, time, value) 
                      VALUES('$id1', '$agent1', '$email1', '$name1', '$message', now(), '$value')";
              $agent_sql = mysqli_query($db, $agent_insertt);

              header('location:all-student.php');
            } else {
              echo "<div class='alert alert-danger mt-2'>An Error Occured!</div>";
            }
          } else {
            $update_agent = "UPDATE newstudents SET subject = '$subject', university = '$university', gscuniversity = '$gscuniversity' WHERE id = '$edit_id'";

            $agent_sql = mysqli_query($db, $update_agent);

            if ($agent_sql) {

              $agentss = "SELECT * FROM newstudents WHERE id = '$edit_id'";
              $agents_queryyy = mysqli_query($db, $agentss);

              while ($row = mysqli_fetch_assoc($agents_queryyy)) {
                $id1 = $row['id'];
                $name1 = $row['name'];
                $agent1 = $row['agent'];
                $email1 = $row['agentemail'];
                $message = 'GSC added a new Update on Student: ' . $name1;
                $value = 1;
              }

              $agent_insertt = "INSERT INTO notifications (id, agent, email, name, message, time, value) 
                      VALUES('$id1', '$agent1', '$email1', '$name1', '$message', now(), '$value')";
              $agent_sql = mysqli_query($db, $agent_insertt);

              header('location:all-student.php');
            } else {
              echo "<div class='alert alert-danger mt-2'>An Error Occured!</div>";
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
  echo "<div class='alert alert-danger mt-2 text-center'><h1>Only Admin Allowed!</h1></div>";
}

?>




<?php
ob_end_flush();
?>

<!-- /.main-footer -->
<?php include('dashboard_include/footer.php') ?>