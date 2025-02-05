<?php include('dashboard_include/header.php');
ob_start();

?>
<!-- Navbar -->
<?php include('dashboard_include/top_header.php') ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include('dashboard_include/sidebar.php') ?>

<?php

$agentname = $_SESSION['name'];
$agentemail = $_SESSION['email'];

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add Missing File</h1>
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

      <?php
      if (isset($_GET['edit'])) {

        $edit_id = $_GET['edit'];

        $agents = "SELECT * FROM newstudents WHERE id = '$edit_id'";
        $agents_query = mysqli_query($db, $agents);

        while ($row = mysqli_fetch_assoc($agents_query)) {
          $sname = $row['name'];
          $spassport = $row['passport'];
        }
      }

      ?>

      <form action="" method="POST" enctype="multipart/form-data">

        <div class="row">

          <div class="col-md-12">
            <div class="card card-primary">

              <div class="card-header">
                <h3 class="card-title">ADD STUDENT INFORMATION AND FILES</h3>

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
                      <input type="text" name="name" value="<?php echo $sname; ?>" id="inputName" class="form-control"
                        required>
                    </div>

                    <div class="form-group">
                      <label for="inputName">Document Type (Ex - Passport, Transcript, Certificates)</label>
                      <input type="text" name="document_type" id="inputName" class="form-control" required>
                    </div>

                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card-body">

                    <div class="form-group">
                      <label for="inputName">Passport No.</label>
                      <input type="text" name="passport" value="<?php echo $spassport; ?>" id="inputName"
                        class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label for="inputProjectLeader">Please upload all Missing/Updated documents in a single PDF File.
                        (CV, Passport, All Academic Certificates and Transcript,
                        LOR/Testimonials, English Test Results and etc)</label>
                      <input type="file" name="image" id="inputName" required>
                    </div>

                    <div class="form-group">
                      <input type="submit" name="submit" value="Attach File" class="btn btn-lg btn-primary">
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

        $name = $_POST['name'];
        $passport = $_POST['passport'];
        $document = $_POST['document_type'];
        $image = $_FILES['image']['name'];
        $temporary_location = $_FILES['image']['tmp_name'];

        $agents = "SELECT * FROM newstudents WHERE name = '$name' AND agent = '$agentname' AND passport = '$passport'";
        $agents_query = mysqli_query($db, $agents);

        $count = mysqli_num_rows($agents_query);

        if ($count < 1) {
          echo "<div class='alert alert-danger mt-2'>No Applicant Found!</div>";
        } else {

          if (!empty($image)) {
            $rand = rand(0, 999999);
            $final_image_name = 'Document_' . $document . '_Agent_' . $agentname . "_Student_" . $name . "_Passport_" . $passport . "_" . $rand . time() . "_" . $image;

            move_uploaded_file($temporary_location, 'dist/student_file_missing_documents/' . $final_image_name);

            $agent_insert = "INSERT INTO missingfiles (agent, student, passport, missing) VALUES('$agentname', '$name', '$passport', '$final_image_name')";

            $agent_sql = mysqli_query($db, $agent_insert);

            if ($agent_sql) {

              $agentss = "SELECT * FROM newstudents WHERE id = '$edit_id'";
              $agents_queryyy = mysqli_query($db, $agentss);

              while ($row = mysqli_fetch_assoc($agents_queryyy)) {
                $id1 = $row['id'];
                $name1 = $row['name'];
                $agent1 = $row['agent'];
                $email1 = $agentemail;
                $message = 'Agent ' . $agent1 . ' added a new document for Student ' . $name1;
              }

              $agent_insertt = "INSERT INTO notifications (id, agent, email, name, message, time) VALUES('$id1', '$agent1', '$email1', '$name1', '$message', now())";
              $agent_sql = mysqli_query($db, $agent_insertt);


              if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) {
                header('location:gsc-student.php');
              } else {
                header('location:student.php');
              }


            } else {
              echo "<div class='alert alert-danger mt-2'>An Error Occured!</div>";
            }
          } else {
            header('Location:error.php');
          }

        }

      }

      ?>


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