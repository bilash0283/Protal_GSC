<?php
include('dashboard_include/header.php');
ob_start();
include('dashboard_include/top_header.php');
include('dashboard_include/sidebar.php');
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
                <div class="col-md-10 mx-auto">
                  <div class="card-body">

                    <!-- <div class="form-group">
                      <label for="inputName">Student Full Name</label>
                      <input type="text" name="name" readonly value="" id="inputName"
                        class="form-control" required>
                    </div> 

                    <div class="form-group">
                      <label for="inputName">Passport No.</label>
                      <input type="text" readonly name="passport" value="" id="inputName"
                        class="form-control" required>
                    </div> -->

                    <div class="form-group">
                      <label for="inputName">Upload the following documents</label>
                      <select name="document_type" id="" class="form-control" required>
                        <option value="SSC_Certificate">SSC/O-Level Certificate</option>
                        <option value="SSC_Transcript">SSC/O-Level Transcript</option>
                        <option value="HSC_Certificate">HSC/A-Level Certificate</option>
                        <option value="HSC_Transcript">HSC/A-Level Transcript</option>
                        <option value="Bachelor_Certificate">Bachelor Certificate</option>
                        <option value="Bachelor_Transcript">Bachelor Transcript</option>
                        <option value="Master_Certificate">Master Certificate</option>
                        <option value="Master_Transcript">Master Transcript</option>
                        <option value="Language_Proficiency">Language Proficiency Test
                          [IELTS,PTE & other]</option>
                        <option value="Recommendation1">Recommendation Letter 1</option>
                        <option value="Recommendation2">Recommendation Letter 2</option>
                        <option value="Recommendation3">Recommendation Letter 3</option>
                        <option value="Testimonial1">Testimonial 1</option>
                        <option value="Testimonial2">Testimonial 2</option>
                        <option value="Job_Letter">Job Letter</option>
                        <option value="CV">CV</option>
                        <option value="Others">Others</option>
                      </select>
                    </div>
                    <h6 class="text-success" role="">
                      <?php if (isset($_SESSION['document_name'])) {
                        echo $_SESSION['document_name'] . '   Uploaded Successfully. Please upload more Documents !';
                      } ?>
                    </h6>
                    <div class="form-group">
                      <label for="inputProjectLeader"></label>
                      <input type="file" name="image" id="inputName" class="form-control" required>
                    </div>

                    <div class="form-group d-flex gap-3 justify-content-between align-items-center">
                      <input type="submit" name="submit" value="Upload" class="btn btn-md btn-primary ">
                      <a href="view-student.php?edit=<?php echo $edit_id; unset($_SESSION['document_name']);?>" class="btn btn-info btn-md ">Finish</a>
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
        $name = $sname;
        $passport = $spassport;
        $document = $_POST['document_type'];
        $image = $_FILES['image']['name'];
        $temporary_location = $_FILES['image']['tmp_name'];
        $_SESSION['document_name'] = $_POST['document_type'];



        $agents = "SELECT * FROM newstudents WHERE name = '$name' AND agent = '$agentname' AND passport = '$passport'";
        $agents_query = mysqli_query($db, $agents);

        $count = mysqli_num_rows($agents_query);

        if ($count < 1) {
          echo "<div class='alert alert-danger mt-2'>No Applicant Found!</div>";
        } else {

          if (!empty($image)) {
            $rand = rand(0, 9999);
            $final_image_name = $document .'_' . $rand . "_" .time().'_'. $image;

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
                header('location:add-file.php?message=' . $document_type_name);
              } else {
                header('location:add-file.php?edit=' . $edit_id);
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