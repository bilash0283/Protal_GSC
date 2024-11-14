<?php include('dashboard_include/header.php') ?>
<?php ob_start(); ?>

<?php 
$agentname        = $_SESSION['name'];
$agentemail       = $_SESSION['email'];
?>
  <!-- Navbar -->
  <?php include('dashboard_include/top_header.php') ?>
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
                    <h1 class="m-0">Update Student Information And Qualification</h1>
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
                                <h3 class="card-title">Update Student</h3>

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

                                  $name               = $row['name'];
                                  $email              = $row['email'];
                                  $phone              = $row['phone'];
                                  $dob                = $row['dob'];
                                  $gender             = $row['gender'];
                                  $nationality        = $row['nationality'];
                                  $address            = $row['address'];
                                  $passport           = $row['passport'];
                                  $ssc                = $row['ssc'];
                                  $hsc                = $row['hsc'];
                                  $diploma            = $row['diploma'];
                                  $undergrad          = $row['undergrad'];
                                  $level              = $row['level'];
                                  $sscyear            = $row['sscyear'];
                                  $hscyear            = $row['hscyear'];
                                  $diplomayear        = $row['diplomayear'];
                                  $undergradyear      = $row['undergradyear'];
                                  $qualificationyear  = $row['qualificationyear'];
                                  $ielts              = $row['ielts'];
                                  $semester           = $row['semester'];
                                  $gscdestination     = $row['gscdestination'];
                                  $gscuniversity      = $row['gscuniversity'];
                                  $destination        = $row['destination'];
                                  $university         = $row['university'];
                                  $program            = $row['program'];
                                  $subject            = $row['subject'];
                                  $status             = $row['status'];
                                  $comment            = $row['comment'];
                                  

                                }
                            }
                            
                            ?>

                        <div class="row">
                        <div class="col-md-6">
                          <div class="card-body">

                          <div class="form-group">
                            <label for="inputStatus">Status</label>
                            <select id="inputStatus" name="status" class="form-control custom-select">
                                <option <?php if($status == 1){echo "selected";} ?> value="1">pending</option>
                                <option <?php if($status == 3){echo "selected";} ?> value="3">on-process</option>
                                <option <?php if($status == 2){echo "selected";} ?> value="2">approved</option>
                                <option <?php if($status == 4){echo "selected";} ?> value="4">declined</option>
                            </select>
                         </div>

                            <div class="form-group">
                              <label for="inputName">Student Full Name</label>
                              <input type="text" name="name" value="<?php echo $name;?>" id="inputName" class="form-control">
                            </div>

                            <div class="form-group">
                              <label for="inputName">Student Phone No.</label>
                              <input type="text" name="phone" value="<?php echo $phone;?>" id="inputName" class="form-control">
                            </div>

                            <div class="form-group">
                              <label for="inputProjectLeader">Date Of Birth</label>
                              <input type="text" name="dob" value="<?php echo $dob;?>" id="inputProjectLeader" class="form-control">
                            </div>
                            
                            <div class="form-group">
                              <label for="inputClientCompany">Gender</label>
                              <input type="text" name="gender" value="<?php echo $gender;?>" id="inputClientCompany" class="form-control">
                            </div>

                            <div class="form-group">
                              <label for="inputName">SSC / O Level's GPA & Group</label>
                              <input type="text" name="ssc" value="<?php echo $ssc;?>" id="inputName" class="form-control">
                            </div> 

                            <div class="form-group">
                              <label for="inputName">HSC / A Level's GPA & Group</label>
                              <input type="text" name="hsc" value="<?php echo $hsc;?>" id="inputName" class="form-control">
                            </div> 

                            <div class="form-group">
                              <label for="inputName">Diploma Course & GPA</label>
                              <input type="text" name="diploma" value="<?php echo $diploma;?>" id="inputName" class="form-control">
                            </div> 

                            <div class="form-group">
                              <label for="inputName">Bachelor's Major & CGPA</label>
                              <input type="text" name="undergrad" value="<?php echo $undergrad;?>" id="inputName" class="form-control">
                            </div> 

                            <div class="form-group">
                              <label for="inputClientCompany">Masters's Major & CGPA</label>
                              <input type="text" name="level" value="<?php echo $level;?>" id="inputClientCompany" class="form-control">
                            </div>

                            <div class="form-group">
                              <label for="inputName">English Test Result (Language Proficiency Tests)</label>
                              <input type="text" name="ielts" value="<?php echo $ielts; ?>" id="inputName" class="form-control">
                            </div> 

                            <div class="form-group">
                              <label for="inputStatus">Preferable Program</label>
                              <select id="inputStatus" name="program" class="form-control custom-select">
                                  <option <?php if($program == 1){echo "selected";} ?> value="1">Foundation</option>
                                  <option <?php if($program == 2){echo "selected";} ?> value="2">Bachelor's</option>
                                  <option <?php if($program == 3){echo "selected";} ?> value="3">Master's</option>
                                  <option <?php if($program == 4){echo "selected";} ?> value="4">Pre-Master's</option>
                              </select>
                            </div>

                            
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="card-body">

                          <div class="form-group">
                              <label for="inputName">Comments</label>
                              <input type="text" name="comment" value="<?php echo $comment;?>" id="inputName" class="form-control">
                            </div> 

                            <div class="form-group">
                              <label for="inputName">Email</label>
                              <input type="email" name="email" value="<?php echo $email;?>" id="inputName" class="form-control">
                            </div>

                            <div class="form-group">
                              <label for="inputProjectLeader">Student Nationality</label>
                              <input type="text" name="nationality" value="<?php echo $nationality;?>" id="inputProjectLeader" class="form-control">
                            </div>

                            <div class="form-group">
                              <label for="inputName">Passport No.</label>
                              <input type="text" name="passport" value="<?php echo $passport;?>" id="inputName" class="form-control">
                            </div>

                            <div class="form-group">
                              <label for="inputProjectLeader">Address (According To Passport)</label>
                              <input type="text" name="address" value="<?php echo $address;?>" id="inputProjectLeader" class="form-control">
                            </div>

                            <div class="form-group">
                              <label for="inputName">SSC / O Level's Year Of Passing</label>
                              <input type="text" name="sscyear" value="<?php echo $sscyear;?>" id="inputName" class="form-control">
                            </div> 

                            <div class="form-group">
                              <label for="inputName">HSC / A Level's Year Of Passing</label>
                              <input type="text" name="hscyear" value="<?php echo $hscyear;?>" id="inputName" class="form-control">
                            </div> 

                            <div class="form-group">
                              <label for="inputName">Diploma Year Of Passing</label>
                              <input type="text" name="diplomayear" value="<?php echo $diplomayear;?>" id="inputName" class="form-control">
                            </div>

                            <div class="form-group">
                              <label for="inputName">Bachelor's Year Of Passing</label>
                              <input type="text" name="undergradyear" value="<?php echo $undergradyear;?>" id="inputName" class="form-control">
                            </div> 

                            <div class="form-group">
                              <label for="inputClientCompany">Masters's Year Of Passing</label>
                              <input type="text" name="qualificationyear" value="<?php echo $qualificationyear;?>" id="inputClientCompany" class="form-control">
                            </div>

                            <?php if ($gscdestination == '') { ?>
                              <div class="form-group">
                              <label for="inputStatus">Study Destination</label>
                              <select id="inputStatus" name="destination" class="form-control custom-select">
                                  <option <?php if($destination == 1){echo "selected";} ?> value="1">USA</option>
                                  <option <?php if($destination == 2){echo "selected";} ?> value="2">UK</option>
                                  <option <?php if($destination == 3){echo "selected";} ?> value="3">Canada</option>
                                  <option <?php if($destination == 4){echo "selected";} ?> value="4">Australia</option>
                                  <option <?php if($destination == 5){echo "selected";} ?> value="5">Denmark</option>
                                  <option <?php if($destination == 6){echo "selected";} ?> value="6">Cyprus</option>
                                  <option <?php if($destination == 7){echo "selected";} ?> value="7">Ireland</option>
                                  <option <?php if($destination == 8){echo "selected";} ?> value="8">Malaysia</option>
                                  <option <?php if($destination == 9){echo "selected";} ?> value="9">Dubai</option>
                                  <option <?php if($destination == 10){echo "selected";} ?> value="10">Hungury</option>
                                  <option <?php if($destination == 11){echo "selected";} ?> value="11">Bulgaria</option>
                                  <option <?php if($destination == 12){echo "selected";} ?> value="12">Malta</option>
                                  <option <?php if($destination == 13){echo "selected";} ?> value="13">Romania</option>
                                  <option <?php if($destination == 14){echo "selected";} ?> value="14">Russia</option>
                                  <option <?php if($destination == 15){echo "selected";} ?> value="15">Turkey</option>
                                  <option <?php if($destination == 16){echo "selected";} ?> value="16">Georgia</option>
                                  <option <?php if($destination == 17){echo "selected";} ?> value="17">China</option>
                                  <option <?php if($destination == 18){echo "selected";} ?> value="18">Latvia</option>
                                  <option <?php if($destination == 19){echo "selected";} ?> value="19">Netherland</option>
                                  <option <?php if($destination == 20){echo "selected";} ?> value="20">Poland</option>
                                  <option <?php if($destination == 21){echo "selected";} ?> value="21">France</option>
                                  <option <?php if($destination == 22){echo "selected";} ?> value="22">Spain</option>
                              </select>
                            </div>
                           <?php } else { ?>

                            <div class="form-group">
                              <label for="inputClientCompany">Study Destination</label>
                              <input type="text" name="gscdestination" value="<?php echo $gscdestination;?>" id="inputClientCompany" class="form-control">
                            </div>
                            
                           <?php }?>
                            

                            <div class="form-group">
                              <label for="inputClientCompany">Preferable Intake</label>
                              <input type="text" name="semester" value="<?php echo $semester;?>" id="inputClientCompany" class="form-control">
                            </div>



                            <div class="form-group">
                              <input type="submit" name="submit" value="Update University" class="btn btn-lg btn-primary">
                            </div>

                            
                          </div>
                        </div>
                      </div>
                            <!-- /.card-body -->

                            </div>

                        </div>
                    
                    </div>

                    </form>

        <!-- Form Updating Code -->
            <?php
        
                if(isset($_POST['submit'])){

                  $name               = $_POST['name'];
                  $email              = $_POST['email'];
                  $phone              = $_POST['phone'];
                  $dob                = $_POST['dob'];
                  $gender             = $_POST['gender'];
                  $nationality        = $_POST['nationality'];
                  $address            = $_POST['address'];
                  $passport           = $_POST['passport'];
                  $ssc                = $_POST['ssc'];
                  $hsc                = $_POST['hsc'];
                  $diploma            = $_POST['diploma'];
                  $undergrad          = $_POST['undergrad'];
                  $level              = $_POST['level'];
                  $sscyear            = $_POST['sscyear'];
                  $hscyear            = $_POST['hscyear'];
                  $diplomayear        = $_POST['diplomayear'];
                  $undergradyear      = $_POST['undergradyear'];
                  $qualificationyear  = $_POST['qualificationyear'];
                  $ielts              = $_POST['ielts'];
                  $semester           = $_POST['semester'];
                  $destination        = $_POST['destination'];
                  $gscdestination     = $_POST['gscdestination'];
                  $program            = $_POST['program'];
                  $status             = $_POST['status'];
                  $comment            = $_POST['comment'];
                
                
                        $update_agent = "UPDATE newstudents SET name = '$name', email = '$email', phone = '$phone',
                        dob = '$dob', gender = '$gender', passport = '$passport', address = '$address', 
                        nationality = '$nationality', ssc = '$ssc', hsc = '$hsc', diploma = '$diploma', undergrad = '$undergrad', level = '$level', 
                        sscyear = '$sscyear', hscyear = '$hscyear', diplomayear = '$diplomayear', undergradyear = '$undergradyear', qualificationyear = '$qualificationyear', 
                        ielts = '$ielts', semester = '$semester', destination = '$destination', gscdestination = '$gscdestination',  
                        program = '$program', status = '$status', comment = '$comment' WHERE id = '$edit_id'";
                
                        $agent_sql = mysqli_query($db, $update_agent);
            
                    if ($agent_sql){

                      $agentss = "SELECT * FROM newstudents WHERE id = '$edit_id'";
                      $agents_queryyy = mysqli_query($db, $agentss);

                      while ($row = mysqli_fetch_assoc($agents_queryyy)) {
                        $id1           = $row['id'];
                        $name1         = $row['name'];
                        $agent1        = $row['agent'];
                        $email1        = $row['agentemail']; 
                        $status        = $row['status'];
                        $comment       = $row['comment'];
                        $message       = 'GSC added a new status with the Following Comment: '. $comment;
                        $value         = 1;
                      }

                      $agent_insertt = "INSERT INTO notifications (id, agent, email, name, message, time, value) 
                      VALUES('$id1', '$agent1', '$email1', '$name1', '$message', now(), '$value')";
                      $agent_sql = mysqli_query($db, $agent_insertt);
                    
                    header('location:update_student_university.php?edit=' . $edit_id);
                    } else {
                      echo "<div class='alert alert-danger mt-2'>An Error Occured!</div>";
                    }
                    
                
                }
                
            ?>
        <!-- Form Updating Code -->
      
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

  