<?php include('dashboard_include/header.php') ?>
<?php ob_start(); ?>
<?php

$agentname = $_SESSION['name'];
$agentemail = $_SESSION['email'];
$add_id = $_GET['add'];

?>
<!-- Navbar -->
<?php include('dashboard_include/top_header.php') ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include('dashboard_include/sidebar.php') ?>

<?php
if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3 || $_SESSION['role'] == 4) { ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">University & Program</h1>
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
    if (isset($_GET['add'])) {

      $get_id = $id;


      $visql = "SELECT * FROM newstudents WHERE id ='$get_id' ";
      $vi_res = mysqli_query($db, $visql);

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
                  <h3 class="card-title">Select University & Program</h3>

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
                        <label for="inputClientCompany">Preferable University</label>
                        <input type="text" value="<?php echo $gscuniversity; ?>" name="gscuniversity"
                          id="inputClientCompany" class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="inputProjectLeader">Please upload Student Picture (Profile / Passport Copy)</label>
                        <input type="file" name="profile" id="inputName" required>
                      </div>

                      <div class="form-group">
                        <label for="inputProjectLeader">Please upload Student's documents (CV) in a single PDF
                          File.</label>
                        <input type="file" name="image" id="inputName" required>
                      </div>


                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="card-body">

                      <div class="form-group">
                        <label for="inputClientCompany">Preferable Course</label>
                        <input type="text" value="<?php echo $subject; ?>" name="subject" id="inputClientCompany"
                          class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="inputStatus">Status</label>
                        <select id="inputStatus" name="status" class="form-control custom-select">
                          <option value="1" selected>Pending</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <input type="submit" name="submit" value="Add Student" class="btn btn-lg btn-primary">
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
          $status = $_POST['status'];
          $profile = $_FILES['profile']['name'];
          $profile_temporary_location = $_FILES['profile']['tmp_name'];
          $image = $_FILES['image']['name'];
          $temporary_location = $_FILES['image']['tmp_name'];

          if ($university != "") {

            if (!empty($image)) {

              if (!empty($profile)) {
                // -------------------------------
                $random = rand(0, 999999);
                $final_profile_name = 'Student_' . $name . "_Agent_" . $agentname . "_ID_" . $id . "_" . $random . time() . "_" . $profile;

                move_uploaded_file($profile_temporary_location, 'dist/student_profile/' . $final_profile_name);
                //  --------------------------------
                $rand = rand(0, 999999);
                $final_image_name = 'Agent_' . $agentname . "_Student_" . $name . "_ID_" . $id . "_" . $rand . time() . "_" . $image;

                move_uploaded_file($temporary_location, 'dist/student_file/' . $final_image_name);

                $agent_insert = "UPDATE newstudents SET subject = '$subject', gscuniversity = '$university', 
                    status = '$status', profile = '$final_profile_name', qualification = '$final_image_name' WHERE id = '$add_id'";

                $agent_sql = mysqli_query($db, $agent_insert);

                if ($agent_sql) {

                  $agentss = "SELECT * FROM newstudents WHERE id = '$add_id'";
                  $agents_queryyy = mysqli_query($db, $agentss);

                  while ($row = mysqli_fetch_assoc($agents_queryyy)) {
                    $id1 = $row['id'];
                    $name1 = $row['name'];
                    $agent1 = $row['agent'];
                    $email1 = $agentemail;
                    $message = 'Agent ' . $agent1 . ' added a new student ' . $name1;
                  }

                  $agent_insertt = "INSERT INTO notifications (id, agent, email, name, message, time) VALUES('$id1', '$agent1', '$email1', '$name1', '$message', now())";
                  $agent_sql = mysqli_query($db, $agent_insertt);

                   //header('location:stu_single_view.php');
                  echo "<div class='alert alert-success rounded-2 p-2'>successfully submit your document ! please view your document</div>";
                } else {
                  echo "<div class='alert alert-danger mt-2'>An Error Occured!</div>";
                }

              } else {
                echo "<div class='alert alert-danger mt-2'>Please Upload All Necessary Documents!</div>";
              }
            } else {
              header('Location:error.php');
              //echo "<div class='alert alert-danger mt-2'>Insert All Qualification File in One PDF Format!</div>";
            }

          } else {
            echo "<div class='alert alert-danger mt-2'>Please Select A University!</div>";
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