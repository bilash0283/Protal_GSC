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
                                    <label for="inputName">Agent Name <span class="text-danger">*</span></label>
                                    <input type="text" name="agent_name" id="inputName" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputName"> Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" id="inputName" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputProjectLeader">Designation <span class="text-danger">*</span></label>
                                    <input type="text" name="designation" id="inputProjectLeader" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="inputProjectLeader">Country <span class="text-danger">*</span></label>
                                    <select name="country" id="inputProjectLeader" class="form-control" required>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Eswatini">Eswatini</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="North Korea">North Korea</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palestine">Palestine</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="inputName" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" id="inputName" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Confirm Password <span class="text-danger">*</span></label>
                                    <input type="password" name="confirm_password" id="inputName" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label class="input-group w-100" for="inputGroupFile01">Click Me To Upload Profile
                                        Image</label>
                                    <input type="file" name="profile_image" id="inputGroupFile01">
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany"> Company Name <span class="text-danger">*</span></label>
                                    <input type="text" name="company_name" id="inputClientCompany" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="inputProjectLeader">Company Address <span class="text-danger">*</span></label>
                                    <input type="text" name="company_address" id="inputProjectLeader" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Company Year of Establishment</label>
                                    <input type="text" name="company_year" id="inputClientCompany" class="form-control">
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
                                    <input type="text" name="bank_acc_name" id="inputName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Bank Account Number </label>
                                    <input type="number" name="bank_acc_number" id="inputName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Bank Address </label>
                                    <input type="text" name="bank_address" id="inputName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Branch Name </label>
                                    <input type="text" name="branch_name" id="inputName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Bank Swift Code </label>
                                    <input type="text" name="swift_code" id="inputName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class=" w-100" for="company_logo_img1">Click Me To Upload Company
                                        Logo</label>
                                    <input type="file" name="company_logo_img" id="company_logo_img1">
                                </div>
                                <div class="form-group">
                                    <label class=" w-100" for="company_reg_certificate2">Company
                                        Registration Certificate</label>
                                    <input type="file" name="company_reg_certificate" id="company_reg_certificate2">
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
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'webp'];

            // Check profile image
            if (!empty($profile_image)) {
                $profile_extension = strtolower(pathinfo($profile_image, PATHINFO_EXTENSION));
                if (!in_array($profile_extension, $allowed_extensions)) {
                    $errors[] = "Profile image should be JPG, JPEG, PNG, GIF ,WEBP or PDF";
                }
            }

            // Check company logo image
            if (!empty($company_logo_img)) {
                $logo_extension = strtolower(pathinfo($company_logo_img, PATHINFO_EXTENSION));
                if (!in_array($logo_extension, $allowed_extensions)) {
                    $errors[] = "Profile image should be JPG, JPEG, PNG, GIF ,WEBP or PDF";
                }
            }

            // Check company registration certificate
            if (!empty($company_reg_certificate)) {
                $cert_extension = strtolower(pathinfo($company_reg_certificate, PATHINFO_EXTENSION));
                if (!in_array($cert_extension, $allowed_extensions)) {
                    $errors[] = "Profile image should be JPG, JPEG, PNG, GIF ,WEBP or PDF";
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