<?php include('dashboard_include/header.php') ?>
<?php ob_start(); ?>
<!-- Navbar -->
<?php include('dashboard_include/top_header.php') ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include('dashboard_include/sidebar.php') ?>

<?php
$agentname = $_SESSION['name'];
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Student Information And Qualification</h1>
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
    if (isset($_GET['edit'])) {

        $edit_id = $_GET['edit'];

        $agents = "SELECT * FROM newstudents WHERE id = '$edit_id'";
        $agents_query = mysqli_query($db, $agents);

        while ($row = mysqli_fetch_assoc($agents_query)) {

            $agent = $row['agent'];
            $name = $row['name'];
            $email = $row['email'];
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
            $intre_country = $row['intre_country'];
        }

        $students = "SELECT * FROM missingfiles WHERE passport = '$passport' AND student = '$name' AND agent = '$agent'";
        $students_query = mysqli_query($db, $students);
        $count = mysqli_num_rows($students_query);

    }

    ?>



    <section class="content">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">

                                    <?php

                                    if ($profile == null) { ?>
                                        <img src="dist/img/agent_image/demo.png"
                                            class="profile-user-img img-fluid img-circle" alt="User Profile Picture">
                                    <?php } else { ?>
                                        <img src="dist/student_profile/<?php echo $profile; ?>"
                                            class="profile-user-img img-fluid img-circle" alt="User Profile Picture">
                                    <?php }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary">

                            <div class="card-header">
                                <h3 class="card-title">Student's Information</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">

                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Status</th>
                                                <td><?php
                                                switch ($status) {
                                                    case 1:
                                                        echo "Pending";
                                                        break;
                                                    case 2:
                                                        echo "Approved";
                                                        break;
                                                    case 3:
                                                        echo "On-Process";
                                                        break;
                                                    case 4:
                                                        echo "Declined";
                                                        break;
                                                }
                                                ?></td>
                                            </tr>

                                            <tr>
                                                <th>Comments</th>
                                                <td><?php echo htmlspecialchars($comment); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Student Full Name</th>
                                                <td><?php echo htmlspecialchars($name); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Email</th>
                                                <td><?php echo htmlspecialchars($email); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Student Phone No.</th>
                                                <td><?php echo htmlspecialchars($phone); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Date Of Birth</th>
                                                <td><?php echo htmlspecialchars($dob); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Gender</th>
                                                <td><?php echo htmlspecialchars($gender); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Address (According To Passport)</th>
                                                <td><?php echo htmlspecialchars($address); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Student Nationality</th>
                                                <td><?php echo htmlspecialchars($nationality); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Passport No.</th>
                                                <td><?php echo htmlspecialchars($passport); ?></td>
                                            </tr>

                                            <tr>
                                                <th>SSC / O Level's GPA & Group</th>
                                                <td><?php echo htmlspecialchars($ssc); ?></td>
                                            </tr>

                                            <tr>
                                                <th>SSC / O Level's Year Of Passing</th>
                                                <td><?php echo htmlspecialchars($sscyear); ?></td>
                                            </tr>

                                            <tr>
                                                <th>HSC / A Level's GPA & Group</th>
                                                <td><?php echo htmlspecialchars($hsc); ?></td>
                                            </tr>

                                            <tr>
                                                <th>HSC / A Level's Year Of Passing</th>
                                                <td><?php echo htmlspecialchars($hscyear); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Diploma Course & GPA</th>
                                                <td><?php echo htmlspecialchars($diploma); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Diploma Year Of Passing</th>
                                                <td><?php echo htmlspecialchars($diplomayear); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Bachelor's Major & CGPA</th>
                                                <td><?php echo htmlspecialchars($undergrad); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Bachelor's Year Of Passing</th>
                                                <td><?php echo htmlspecialchars($undergradyear); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Master's Major & CGPA</th>
                                                <td><?php echo htmlspecialchars($level); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Master's Year Of Passing</th>
                                                <td><?php echo htmlspecialchars($qualificationyear); ?></td>
                                            </tr>

                                            <tr>
                                                <th>English Test Result (Language Proficiency Tests)</th>
                                                <td><?php echo htmlspecialchars($ielts); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Preferable Program</th>
                                                <td><?php
                                                switch ($program) {
                                                    case 1:
                                                        echo "Foundation";
                                                        break;
                                                    case 2:
                                                        echo "Bachelor's";
                                                        break;
                                                    case 3:
                                                        echo "Master's";
                                                        break;
                                                    case 4:
                                                        echo "Pre-Master's";
                                                        break;
                                                }
                                                ?></td>
                                            </tr>

                                            <tr>
                                                <th>Preferable Intake</th>
                                                <td><?php echo htmlspecialchars($semester); ?></td>
                                            </tr>
                                            
                                            <tr>
                                                <th>Study Destination</th>
                                             <td><?php echo $intre_country; ?></td>
                                            </tr>
                                            
                                            <tr>
                                                <th>Preferable University</th>
                                                <td>
                                                    <?php

                                                    if ($university == '') {
                                                        echo htmlspecialchars($gscuniversity);
                                                    } else {
                                                        echo htmlspecialchars($university);
                                                    }

                                                    ?>

                                                </td>
                                            </tr>


                                            <tr>
                                                <th>Preferable Subject</th>
                                                <td><?php echo htmlspecialchars($subject); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Student's Profile Picture</th>
                                                <td>
                                                    <?php
                                                    $profilename = $profile;
                                                    $profile_url = 'dist/student_profile/' . $profilename;
                                                    ?>
                                                    <a href="#"
                                                        onclick="showPreviewModalProfile('<?php echo $profile_url; ?>'); return false;"><?php echo $profilename; ?></a>

                                                    <!-- Modal for Profile Picture Preview -->
                                                    <div id="previewModalProfile"
                                                        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0, 0, 0, 0.8); align-items:center; justify-content:center;">
                                                        <div
                                                            style="background:rgba(255, 255, 255, 0.9); padding:20px; border-radius:8px; max-width:500px; text-align:center; box-shadow:0 4px 10px rgba(0, 0, 0, 0.3);">
                                                            <img id="previewImageProfile" src="" alt="Profile Picture"
                                                                style="max-width:100%; height:auto; border-radius:8px;">
                                                            <a id="downloadLinkProfile" href="#" download>
                                                                <button type="button"
                                                                    style="margin-top:10px;">Download</button>
                                                            </a>
                                                            <button type="button" onclick="closePreviewModalProfile()"
                                                                style="margin-top:10px;">Cancel</button>
                                                        </div>
                                                    </div>

                                                    <script>
                                                        function showPreviewModalProfile(profileUrl) {
                                                            document.getElementById("previewImageProfile").src = profileUrl;
                                                            document.getElementById("downloadLinkProfile").href = profileUrl;
                                                            document.getElementById("previewModalProfile").style.display = "flex";
                                                        }

                                                        function closePreviewModalProfile() {
                                                            document.getElementById("previewModalProfile").style.display = "none";
                                                        }
                                                    </script>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Documents of Student (Initial File Upload)</th>
                                                <td>
                                                    <?php
                                                    if ($count < 1) {
                                                        $filename = $qualification;
                                                        $file_url = 'dist/student_file/' . $filename;
                                                        ?>
                                                        <a href="#"
                                                            onclick="showPreviewModalDocuments('<?php echo $file_url; ?>'); return false;"><?php echo $filename; ?></a>
                                                    <?php } else {
                                                        $i = 1;
                                                        $filename = $qualification;
                                                        $file_url = 'dist/student_file/' . $filename;
                                                        ?>
                                                        <a href="#"
                                                            onclick="showPreviewModalDocuments('<?php echo $file_url; ?>'); return false;"><?php echo $i . ". " . $filename; ?></a>

                                                        <?php
                                                        $students = "SELECT * FROM missingfiles WHERE passport = '$passport' AND agent = '$agent' AND student = '$name'";
                                                        $students_query = mysqli_query($db, $students);

                                                        while ($row = mysqli_fetch_assoc($students_query)) {
                                                            $file = $row['missing'];
                                                            $file_url = 'dist/student_file_missing_documents/' . $file;
                                                            $i++;
                                                            ?>
                                                            <br>
                                                            <a href="#"
                                                                onclick="showPreviewModalDocuments('<?php echo $file_url; ?>'); return false;"><?php echo $i . ". " . $file; ?></a>
                                                        <?php }
                                                    } ?>
                                                </td>
                                            </tr>

                                            <!-- Modal for Document Preview -->
                                            <div id="previewModalDocuments"
                                                style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0, 0, 0, 0.8); align-items:center; justify-content:center;">
                                                <div
                                                    style="background:rgba(255, 255, 255, 0.9); padding:20px; border-radius:8px; max-width:500px; text-align:center; box-shadow:0 4px 10px rgba(0, 0, 0, 0.3);">
                                                    <iframe id="previewFrameDocuments" src=""
                                                        style="width:100%; height:400px; border:none;"></iframe>
                                                    <a id="downloadLinkDocuments" href="#" download>
                                                        <button type="button" style="margin-top:10px;">Download</button>
                                                    </a>
                                                    <button type="button" onclick="closePreviewModalDocuments()"
                                                        style="margin-top:10px;">Cancel</button>
                                                </div>
                                            </div>

                                            <script>
                                                function showPreviewModalDocuments(fileUrl) {
                                                    document.getElementById("previewFrameDocuments").src = fileUrl;
                                                    document.getElementById("downloadLinkDocuments").href = fileUrl;
                                                    document.getElementById("previewModalDocuments").style.display = "flex";
                                                }

                                                function closePreviewModalDocuments() {
                                                    document.getElementById("previewModalDocuments").style.display = "none";
                                                }
                                            </script>

                                        </table>

                                    </div>
                                </div>
                            </div>


                            <!-- /.card-body -->

                        </div>

                    </div>

                </div>

            </form>


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