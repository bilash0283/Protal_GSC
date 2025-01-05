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
<section class="py-3">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="container fluid">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card card-primary">
                        <div class="card-header top-fixed">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                                <img src="./dist/AdminLTELogo.png" alt="" class="img-fluid"
                                    style="width:65px;height:65px;">
                                <p class="card-title ml-3 mt-2">Let's help you study abroad and settle. Please fill in
                                    the following
                                    details and one of our specialists will contact you soon!</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <!-- input file start  -->
                                <div class="form-group">
                                    <label for="inputName">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="inputName" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputName"> Phone Number/WhatsApp <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="phone" id="inputName" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputProjectLeader">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="inputProjectLeader" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="inputProjectLeader">Interested Country <span
                                            class="text-danger">*</span></label>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="intre_country" value="Australia"
                                                    id="Australia">
                                                <label class="form-check-label" for="Australia">
                                                Australia
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="intre_country" value="Cyprus"
                                                    id="Cyprus" >
                                                <label class="form-check-label" for="Cyprus">
                                                Cyprus
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="intre_country" value="Canada"
                                                    id="Australia">
                                                <label class="form-check-label" for="Canada">
                                                Canada
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="intre_country" value="Denmark"
                                                    id="Denmark" >
                                                <label class="form-check-label" for="Denmark">
                                                Denmark
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="intre_country" value="Malaysia"
                                                    id="Malaysia">
                                                <label class="form-check-label" for="Malaysia">
                                                Malaysia
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="intre_country" value="New Zealand"
                                                    id="Zealand">
                                                <label class="form-check-label" for="Zealand">
                                                New Zealand
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Default checkbox
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Checked checkbox
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Default checkbox
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Checked checkbox
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Checked checkbox
                                                </label>
                                            </div>
                                        </div>
                                    </div>
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
                                    <label class="w-100" for="inputGroupFile01">Click Me To Upload Profile Image
                                    </label>
                                    <input type="file" name="profile_image" id="inputGroupFile01">
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany"> Company Name *</label>
                                    <input type="text" name="company_name" id="inputClientCompany" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="inputProjectLeader">Company Address *</label>
                                    <input type="text" name="company_address" id="inputProjectLeader"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Company Year of Establishment </label>
                                    <input type="text" name="company_year" id="inputClientCompany" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
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
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];

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
            $errors[] = "Company logo image should be JPG, JPEG, PNG, GIF or PDF";
        }
    }

    // Check company registration certificate
    if (!empty($company_reg_certificate)) {
        $cert_extension = strtolower(pathinfo($company_reg_certificate, PATHINFO_EXTENSION));
        if (!in_array($cert_extension, $allowed_extensions)) {
            $errors[] = "Company registration certificate image should be JPG, JPEG, PNG, GIF or PDF";
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