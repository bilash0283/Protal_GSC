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

    if ($_SESSION['role'] == 2) { ?>
      
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
                              <label for="inputStatus">Preferable University</label>
                              <select id="inputStatus" name="university" class="form-control custom-select" required>
                                <option selected="" value="0">Select one</option>

                                <?php
                          
                                    $student_get = "SELECT * FROM newstudents WHERE id = '$add_id '";
                                    $student_query = mysqli_query($db, $student_get);
                
                                    while ($row = mysqli_fetch_assoc($student_query)) {
                                        $name        = $row['name'];
                                        $id          = $row['id'];
                                        $destination = $row['destination'];
                                    }

                                    if ($destination == 1) {?>
                                        <option value="Middle Tennessee State University">Middle Tennessee State University</option>
                                        <option value="Westcliff University">Westcliff University</option>
                                        <option value="Lake Washington Institute of Technology">Lake Washington Institute of Technology</option>
                                        <option value="Gannon University">Gannon University</option>
                                        <option value="Trine University">Trine University</option>
                                        <option value="Midwestern State University">Midwestern State University</option>
                                        <option value="Wichita State University">Wichita State University</option>
                                        <option value="Whitter College">Whitter College</option>
                                        <option value="College of the Canyons">College of the Canyons</option>
                                        <option value="Marist College">Marist College</option>
                                        <option value="Mississippi College">Mississippi College</option>
                                        <option value="MIU City University">MIU City University</option>
                                        <option value="Moorpark College">Moorpark College</option>
                                        <option value="Tacoma Community College">Tacoma Community College</option>
                                        <option value="Green River College">Green River College</option>
                                    <?php } else if ($destination == 2) {?>
                                        <option value="Ulster University">Ulster University</option>
                                        <option value="University of Winchester">University of Winchester</option>
                                        <option value="London Metropolitan University">London Metropolitan University</option>
                                        <option value="Cardiff and Vale College">Cardiff and Vale College</option>
                                        <option value="University of Chester">University of Chester</option>
                                        <option value="Wrexham Glyndwr University">Wrexham Glyndwr University</option>
                                        <option value="University of Suffolk and Global Banking School">University of Suffolk and Global Banking School</option>
                                        <option value="University of Creative Arts">University of Creative Arts</option>
                                        <option value="University of Bedfordshire">University of Bedfordshire</option>
                                        <option value="London South Bank University">London South Bank University</option>
                                        <option value="BPP University">BPP University</option>
                                        <option value="University of Portsmouth">University of Portsmouth</option>
                                        <option value="Harrow College">Harrow College</option>
                                        <option value="Uxbridge College">Uxbridge College</option>
                                        <option value="University of South Wales">University of South Wales</option>
                                    <?php } else if ($destination == 3) {?>
                                        <option value="Lakehead University">Lakehead University</option>
                                        <option value="Trent University">Trent University</option>
                                        <option value="University Canada West">University Canada West</option>
                                        <option value="Yorkville University">Yorkville University</option>
                                        <option value="Kwantlen Polytechnic University">Kwantlen Polytechnic University</option>
                                        <option value="Cape Briton University">Cape Briton University</option>
                                        <option value="Laurentian University">Laurentian University</option>
                                        <option value="University of Regina">University of Regina</option>
                                        <option value="QUEST University Canada">QUEST University Canada</option>
                                        <option value="Lambton College">Lambton College</option>
                                        <option value="Centennial College">Centennial College</option>
                                        <option value="Georgian College">Georgian College</option>
                                        <option value="Evergreen College">Evergreen College</option>
                                        <option value="Blyth Academy">Blyth Academy</option>
                                        <option value="Code Core College">Code Core College</option>
                                        <option value="Tamwood International College">Tamwood International College</option>
                                        <option value="TAIE International Institute">TAIE International Institute</option>
                                        <option value="Campbell River Schools International">Campbell River Schools International</option>
                                        <option value="Pures College of Technology">Pures College of Technology</option>
                                        <option value="London International Academy">London International Academy</option>
                                        <option value="The Great Lakes College of Toronto">The Great Lakes College of Toronto</option>
                                        <option value="Columbia International College">Columbia International College</option>
                                        <option value="Braemar College">Braemar College</option>
                                        <option value="Parkland College">Parkland College</option>
                                        <option value="St. Clair College">St. Clair College</option>
                                    <?php } else if ($destination == 4) {?>
                                        <option value="Victoria University">Victoria University</option>
                                        <option value="Swinburne University of Technology">Swinburne University of Technology</option>
                                        <option value="University of Tasmania">University of Tasmania</option>
                                        <option value="UTS - College / University of Technology Sydney">UTS - College / University of Technology Sydney</option>
                                        <option value="Gold Coast Institute of TAFE">Gold Coast Institute of TAFE</option>
                                        <option value="AIBI - Australian Institute of Business Intelligence">AIBI - Australian Institute of Business Intelligence</option>
                                        <option value="University of Sunshine Coast Australia">University of Sunshine Coast Australia</option>
                                        <option value="Australian Institute of Higher Education">Australian Institute of Higher Education</option>
                                        <option value="University of Canberra">University of Canberra</option>
                                        <option value="Stanley College">Stanley College</option>
                                        <option value="James Cook University">James Cook University</option>
                                        <option value="University of Wollongong">University of Wollongong</option>
                                        <option value="Griffin College">Griffin College</option>
                                        <option value="SKILLS Australia Institute">SKILLS Australia Institute</option>
                                        <option value="APIC - Asia Pacific Int. College">APIC - Asia Pacific Int. College</option>
                                    <?php } else if ($destination == 5) {?>
                                        <option value="International Business Academy">International Business Academy</option>
                                        <option value="Aarhus University">Aarhus University</option>
                                    <?php } else if ($destination == 6) {?>
                                        <option value="Americanos College">Americanos College</option>
                                        <option value="College of Tourism & Hotel Management">College of Tourism & Hotel Management</option>
                                        <option value="Global International College">Global International College</option>
                                        <option value="Inter College">Inter College</option>
                                        <option value="Alexander College">Alexander College</option>
                                        <option value="Larnaca College">Larnaca College</option>
                                        <option value="Cyprus College">Cyprus College</option>
                                        <option value="European University">European University</option>
                                        <option value="Nicosia University">Nicosia University</option>
                                        <option value="Atlantic College">Atlantic College</option>
                                        <option value="CDA College">CDA College</option>
                                        <option value="The CTL Euro College">The CTL Euro College</option>
                                        <option value="Frederick University">Frederick University</option>
                                        <option value="Neapolis University Paphos">Neapolis University Paphos</option>
                                        <option value="Lidra College">Lidra College</option>
                                        <option value="CASA College">CASA College</option>
                                        <option value="Girne American University (Turkey/North Cyprus)">Girne American University (Turkey/North Cyprus)</option>
                                        <option value="The Cyprus International University (Turkey/North Cyprus)">The Cyprus International University (Turkey/North Cyprus)</option>
                                        <option value="METU (Turkey/North Cyprus)">METU (Turkey/North Cyprus)</option>
                                        <option value="European University of Lefke (Turkey/North Cyprus)">European University of Lefke (Turkey/North Cyprus)</option>
                                    <?php } else if ($destination == 7) {?>
                                        <option value="Dundalk Institute of Technology">Dundalk Institute of Technology</option>
                                        <option value="Technological University Dublin">Technological University Dublin</option>
                                        <option value="Holmes Institute Dublin">Holmes Institute Dublin</option>
                                    <?php } else if ($destination == 8) {?>
                                        <option value="City University Malaysia">City University Malaysia</option>
                                        <option value="INTI">INTI</option>
                                        <option value="FTMS">FTMS</option>
                                        <option value="Curtin University">Curtin University</option>
                                        <option value="SEGi University">SEGi University</option>
                                        <option value="One Academy">One Academy</option>
                                        <option value="Nilai University">Nilai University</option>
                                        <option value="MUST- Malaysia University of Science & Technology">MUST- Malaysia University of Science & Technology</option>
                                        <option value="Binary University">Binary University</option>
                                        <option value="APU- Asia Pacific University">APU- Asia Pacific University</option>
                                        <option value="Curtin University">Curtin University</option>
                                    <?php } else if ($destination == 9) {?>
                                        <option value="GBS">GBS</option>
                                    <?php } else if ($destination == 10) {?>
                                        <option value="University of Debrecen">University of Debrecen</option>
                                        <option value="Budapest Metropolitan University">Budapest Metropolitan University</option>
                                        <option value="University of Sopron">University of Sopron</option>
                                    <?php } else if ($destination == 11) {?>
                                        <option value="University of Pleven">University of Pleven</option>
                                        <option value="Technical University of VARNA">Technical University of VARNA</option>
                                        <option value="Varna University of Management">Varna University of Management</option>
                                    <?php } else if ($destination == 12) {?>
                                        <option value="Global College">Global College</option>
                                        <option value="GBC">GBC</option>
                                        <option value="St Edwards College">St Edward's College</option>
                                        <option value="International American University">International American University</option>
                                        <option value="Malita International College">Malita International College</option>
                                        <option value="GATEWAY INSTITUTE OF LEARNING">GATEWAY INSTITUTE OF LEARNING</option>
                                        <option value="Learnkey Institute - Malta Campus">Learnkey Institute - Malta Campus</option>
                                        <option value="SSM Group">SSM Group</option>
                                    <?php } else if ($destination == 13) {?>
                                        <option value="Bioterra University">Bioterra University</option>
                                    <?php } else if ($destination == 14) {?>
                                        <option value="Industrial University of Tyumen">Industrial University of Tyumen</option>
                                        <option value="Synergy University">Synergy University</option>
                                        <option value="PEOPLE'S FRIENDSHIP UNIVERSITY OF RUSSIA">PEOPLE'S FRIENDSHIP UNIVERSITY OF RUSSIA</option>
                                    <?php } else if ($destination == 15) {?>
                                        <option value="YASAR University">YASAR University</option>
                                        <option value="TED University">TED University</option>
                                        <option value="Middle East Technical University">Middle East Technical University</option>
                                        <option value="Antalya Vocational Institute">Antalya Vocational Institute</option>
                                        <option value="ANTALYA BİLİM UNIVERSITY">ANTALYA BİLİM UNIVERSITY</option>
                                        <option value="Istambul Zaim University">Istambul Zaim University</option>
                                        <option value="Kadir Has University">Kadir Has University</option>
                                    <?php } else if ($destination == 16) {?>
                                        <option value="East European University">East European University</option>
                                        <option value="ILIA STATE UNIVERSITY">ILIA STATE UNIVERSITY</option>
                                        <option value="Caucasus International University">Caucasus International University</option>
                                        <option value="University of Georgia">University of Georgia</option>
                                        <option value="TBILISI TEACHING UNIVERSITY GORGASALI">TBILISI TEACHING UNIVERSITY GORGASALI</option>
                                        <option value="Kutaisi International University">Kutaisi International University</option>
                                    <?php } else if ($destination == 17) {?>
                                        <option value="Shanghai Jiao Tong University">Shanghai Jiao Tong University</option>
                                        <option value="Jilin University">Jilin University</option>
                                        <option value="East China University of Science & Technology">East China University of Science & Technology</option>
                                        <option value="Sichuan University">Sichuan University</option>
                                        <option value="The Sino-British College, USST (Shanghai)">The Sino-British College, USST (Shanghai)</option>
                                        <option value="Shenyang Aerospace University">Shenyang Aerospace University</option>
                                        <option value="Zhejiang University of Science & Technology">Zhejiang University of Science & Technology</option>
                                        <option value="Shijiazhuang Tiedao University">Shijiazhuang Tiedao University</option>
                                        <option value="Donghua University">Donghua University</option>
                                        <option value="Wuhan University Of Technology">Wuhan University Of Technology</option>
                                    <?php } else if ($destination == 18) {?>
                                        <option value="Riga Technical University">Riga Technical University</option>
                                        <option value="RISEBA University">RISEBA University</option>
                                    <?php } else if ($destination == 19) {?>
                                        <option value="Wittenborg University of Applied Sciences">Wittenborg University of Applied Sciences</option>
                                        <option value="Webster University Leiden Campus">Webster University Leiden Campus</option>
                                    <?php } else if ($destination == 20) {?>
                                        <option value="Warsaw University of Business">Warsaw University of Business</option>
                                        <option value="University of Information Technology and Management (Rzeszow)">University of Information Technology and Management (Rzeszow)</option>
                                    <?php } else if ($destination == 21) {?>
                                        <option value="PPA Business School - BSBI">PPA Business School - BSBI</option>
                                        <option value="Schiller International University">Schiller International University</option>
                                    <?php } else if ($destination == 22) {?>
                                        <option value="CETT Barcelona School of Tourism, Hospitality and Gastronomy">CETT Barcelona School of Tourism, Hospitality and Gastronomy</option>
                                        <option value="CEDEU">CEDEU</option>
                                    <?php }
                          
                                ?>

                                  


                              </select>
                            </div>

                            <div class="form-group">  
                              <label for="inputProjectLeader">Please upload Student Picture (Profile / Passport Copy)</label>
                              <input type="file" name="profile" id="inputName" required>
                            </div>

                            <div class="form-group">  
                              <label for="inputProjectLeader">Please upload Student's document (CV) in a single PDF File.</label>
                              <input type="file" name="image" id="inputName" required>
                            </div>


                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="card-body">

                          <div class="form-group">
                              <label for="inputClientCompany">Preferable Course</label>
                              <input type="text" name="subject" id="inputClientCompany" class="form-control">
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
            
            if(isset($_POST['submit'])){

              
              $subject            = $_POST['subject'];
              $university         = $_POST['university'];
              $status             = $_POST['status'];
              $profile            = $_FILES['profile']['name'];
              $profile_temporary_location = $_FILES['profile']['tmp_name']; 
              $image              = $_FILES['image']['name'];
              $temporary_location = $_FILES['image']['tmp_name']; 

              if ($university != "0") {

                if (!empty($image)) {

                  if (!empty($profile)) {
                    // -------------------------------
                    $random = rand(0,999999);
                    $final_profile_name = 'Student_'.$name."_Agent_".$agentname."_ID_".$id."_".$random.time()."_".$profile;
          
                    move_uploaded_file($profile_temporary_location, 'dist/student_profile/'.$final_profile_name);
                  //  --------------------------------
                    $rand = rand(0,999999);
                    $final_image_name = 'Agent_'.$agentname."_Student_".$name."_ID_".$id."_".$rand.time()."_".$image;
          
                    move_uploaded_file($temporary_location, 'dist/student_file/'.$final_image_name);
          
                    $agent_insert = "UPDATE newstudents SET subject = '$subject', university = '$university', 
                    status = '$status', profile = '$final_profile_name', qualification = '$final_image_name' WHERE id = '$add_id'";
          
                    $agent_sql = mysqli_query($db, $agent_insert);
          
                    if ($agent_sql){

                      $agentss = "SELECT * FROM newstudents WHERE id = '$add_id'";
                      $agents_queryyy = mysqli_query($db, $agentss);

                      while ($row = mysqli_fetch_assoc($agents_queryyy)) {
                        $id1           = $row['id'];
                        $name1         = $row['name'];
                        $agent1        = $row['agent'];
                        $email1        = $agentemail; 
                        $message       = 'Agent '. $agent1 .' added a new student '. $name1;
                      }

                    $agent_insertt = "INSERT INTO notifications (id, agent, email, name, message, time) VALUES('$id1', '$agent1', '$email1', '$name1', '$message', now())";
                    $agent_sql = mysqli_query($db, $agent_insertt);

                    header('location:student.php');
                    } else {
                      echo "<div class='alert alert-danger mt-2'>An Error Occured!</div>";
                    }

                  } else {
                    echo "<div class='alert alert-danger mt-2'>Please Upload All Necessary Documents!</div>";
                  }
                } else{
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
      echo "<div class='alert alert-danger mt-2 text-center'><h1>Only Agents Allowed!</h1></div>";
    }

  ?>




   <?php
    ob_end_flush();
   ?>

  <!-- /.main-footer -->
  <?php include('dashboard_include/footer.php') ?>