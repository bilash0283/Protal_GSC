<?php include('dashboard_include/header.php') ?>
<?php ob_start(); ?>
<!-- Navbar -->
<?php include('dashboard_include/top_header.php') ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include('dashboard_include/sidebar.php') ?>


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
        <?php
        include('login_include/header.php');
        include('./database/db.php');
        ob_start();
        $successfull = null;
        ?>
        <?php
        // Success message
        if (isset($_GET['success'])) {
            echo "<div class='alert alert-success mt-2 text-center'>Registration Successful! Please wait for verification.</div>";
        }
        ?>


        <!-- Main content -->
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="container fluid">
                <div class="card card-primary">
                    <div class="card-header text-center top-fixed">
                        <h3 class="card-title">Agent Registation </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 px-2">
                                <!-- input file start  -->
                                <div class="form-group">
                                    <label for="inputName">Agent Name *</label>
                                    <input type="text" name="agent_name" id="inputName" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputName"> Phone *</label>
                                    <input type="text" name="phone" id="inputName" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputProjectLeader">Designation*</label>
                                    <input type="text" name="designation" id="inputProjectLeader" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="inputProjectLeader">Country *</label>
                                    <input type="text" name="country" id="inputProjectLeader" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Email *</label>
                                    <input type="email" name="email" id="inputName" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Password *</label>
                                    <input type="password" name="password" id="inputName" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Confirm Password *</label>
                                    <input type="password" name="confirm_password" id="inputName" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label class="input-group w-100" for="inputGroupFile01">Click Me To Upload Profile
                                        Image</label>
                                    <input type="file"  name="profile_image"
                                        id="inputGroupFile01">
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany"> Company Name *</label>
                                    <input type="text" name="company_name" id="inputClientCompany" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="inputProjectLeader">Company Address *</label>
                                    <input type="text" name="company_address" id="inputProjectLeader" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Company Year of Establishment</label>
                                    <input type="text" name="company_year" id="inputClientCompany" class="form-control"
                                        >
                                </div>
                            </div>
                            <!-- input file end(1) -->
                            <div class="col-12 col-md-6 px-2">
                                <div class="form-group">
                                    <label for="inputName">Bank Name </label>
                                    <input type="text" name="bank_name" id="inputName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Bank Account Name </label>
                                    <input type="text" name="bank_acc_name" id="inputName" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Bank Account Number </label>
                                    <input type="number" name="bank_acc_number" id="inputName" class="form-control"
                                        >
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Bank Address </label>
                                    <input type="text" name="bank_address" id="inputName" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Branch Name </label>
                                    <input type="text" name="branch_name" id="inputName" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Bank Swift Code </label>
                                    <input type="text" name="swift_code" id="inputName" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label class=" w-100" for="company_logo_img1">Click Me To Upload Company
                                        Logo</label>
                                    <input type="file"  name="company_logo_img"
                                        id="company_logo_img1">
                                </div>
                                <div class="form-group">
                                    <label class=" w-100" for="company_reg_certificate2">Company
                                        Registration Certificate</label>
                                    <input type="file" name="company_reg_certificate"
                                        id="company_reg_certificate2">
                                </div>
                                <div class="form-group">
                                    <label for="inputProjectLeader">Facebook URL</label>
                                    <input type="url" name="fb_url" id="inputProjectLeader" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Website URL</label>
                                    <input type="url" name="website_url" id="inputClientCompany" class="form-control">
                                </div>
                                <p class="mb-0">
                                    <a href="index.php" class="text-center">I already have an Agent</a>
                                </p>
                                <button type="submit" name="submit" class="btn btn-primary btn-block btn-arrow px-4 mt-3">
                                    Register Now <i class="fas fa-arrow-right ml-3"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Main content -->


        <!-- form sumbmication  -->
        <?php
        // Query to get all emails from the database
        $agent_mail_query = "SELECT email FROM agents";
        $emailquery = mysqli_query($db, $agent_mail_query);
        $existing_emails = [];
        while ($row = mysqli_fetch_assoc($emailquery)) {
            $existing_emails[] = $row['email'];
        }

        // Check if form is submitted
        if (isset($_POST['submit'])) {

            // Collecting form data
            $agent_name = $_POST['agent_name'];
            $phone = $_POST['phone'];
            $designation = $_POST['designation'];
            $country = $_POST['country'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $confirm_password = md5($_POST['confirm_password']);
            $company_name = $_POST['company_name'];
            $company_address = $_POST['company_address'];
            $company_year = $_POST['company_year'];
            $bank_name = $_POST['bank_name'];
            $bank_acc_name = $_POST['bank_acc_name'];
            $bank_acc_number = $_POST['bank_acc_number'];
            $bank_address = $_POST['bank_address'];
            $branch_name = $_POST['branch_name'];
            $swift_code = $_POST['swift_code'];
            $status = '2'; // default value
            $role = '2'; // default value
            $fb_url = $_POST['fb_url'];
            $website_url = $_POST['website_url'];

            $profile_image = $_FILES['profile_image']['name'];
            $company_logo_img = $_FILES['company_logo_img']['name'];
            $company_reg_certificate = $_FILES['company_reg_certificate']['name'];

            // Temporary file locations
            $profile_temp = $_FILES['profile_image']['tmp_name'];
            $logo_temp = $_FILES['company_logo_img']['tmp_name'];
            $cert_temp = $_FILES['company_reg_certificate']['tmp_name'];

            // Error array
            $errors = [];

            // Validate image files
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif','pdf'];

            // Check profile image
            if (!empty($profile_image)) {
                $profile_extension = strtolower(pathinfo($profile_image, PATHINFO_EXTENSION));
                if (!in_array($profile_extension, $allowed_extensions)) {
                    $errors[] = "Profile image should be JPG, JPEG, PNG, GIF or PDF";
                }
            }

            // Check company logo image
            if (!empty($company_logo_img)) {
                $logo_extension = strtolower(pathinfo($company_logo_img, PATHINFO_EXTENSION));
                if (!in_array($logo_extension, $allowed_extensions)) {
                    $errors[] = "Company logo image should be JPG, JPEG, PNG, or GIF.";
                }
            }

            // Check company registration certificate
            if (!empty($company_reg_certificate)) {
                $cert_extension = strtolower(pathinfo($company_reg_certificate, PATHINFO_EXTENSION));
                if (!in_array($cert_extension, $allowed_extensions)) {
                    $errors[] = "Company registration certificate image should be JPG, JPEG, PNG, or GIF.";
                }
            }

            // Check if email already exists
            if (in_array($email, $existing_emails)) {
                $errors[] = "This email is already registered.";
            }

            // Password validation
            if ($password !== $confirm_password) {
                $errors[] = "Passwords do not match.";
            }

            // If no errors, insert data into the database
            if (empty($errors)) {

                // Generate unique filenames for uploaded files
                $rand = rand(0, 999999);
                $final_profile_image = time() . "_" . $rand . "_" . $profile_image;
                $final_logo_image = time() . "_" . $rand . "_" . $company_logo_img;
                $final_cert_image = time() . "_" . $rand . "_" . $company_reg_certificate;

                // Define directories
                $upload_dir_profile = 'dist/img/agent_image/';
                $upload_dir_logo = 'dist/img/agent_company_logo/';
                $upload_dir_cert = 'dist/img/agent_registation_cartificate/';

                // Move uploaded files to their respective directories
                if (!empty($profile_image)) {
                    if (!move_uploaded_file($profile_temp, $upload_dir_profile . $final_profile_image)) {
                        $errors[] = "Error uploading profile image.";
                    }
                }
                if (!empty($company_logo_img)) {
                    if (!move_uploaded_file($logo_temp, $upload_dir_logo . $final_logo_image)) {
                        $errors[] = "Error uploading company logo image.";
                    }
                }
                if (!empty($company_reg_certificate)) {
                    if (!move_uploaded_file($cert_temp, $upload_dir_cert . $final_cert_image)) {
                        $errors[] = "Error uploading company registration certificate.";
                    }
                }

                // If no errors occurred during the upload process
                if (empty($errors)) {
                    // Insert data into the database
                    $agent_insert = "INSERT INTO agents 
            (name, email, password, phone, company, designation, year, country, role, status, address, image, joining, bank_name, bank_acc_name, bank_acc_number, bank_address, branch_name, swift_code, company_logo, company_reg_cert, fb_url, web_url) 
            VALUES 
            ('$agent_name', '$email', '$password', '$phone', '$company_name', '$designation', '$company_year', '$country', '$role', '$status', '$company_address', '$final_profile_image', NOW(), '$bank_name', '$bank_acc_name', '$bank_acc_number', '$bank_address', '$branch_name', '$swift_code', '$final_logo_image', '$final_cert_image', '$fb_url', '$website_url')";

                    $agent_sql = mysqli_query($db, $agent_insert);

                    // Check if the insertion was successful
                    if ($agent_sql) {
                        header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
                        exit();
                    } else {
                        echo "<div class='alert alert-danger mt-2'>An error occurred while registering the agent. Please try again.</div>";
                    }
                } else {
                    // Display errors
                    foreach ($errors as $error) {
                        echo "<div class='alert alert-danger mt-2'>$error</div>";
                    }
                }
            } else {
                // Display errors
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger mt-2'>$error</div>";
                }
            }


        }
        ?>

        <!--  Form Submission -->





        <?php
        ob_end_flush();
        include('login_include/footer.php');
        ?>




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