<?php
include('login_include/header.php');
include('./database/db.php');
ob_start();
$successfull = null;
?>

<div class="text-center login-logo mt-3">
  <a href="index.php"><b>New Agent Registation Form</b></a>
</div>

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
                <h3 class="card-title"></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6 px-4">
                        <!-- input file start  -->
                        <div class="form-group">
                            <label for="inputName">Agent Name</label>
                            <input type="text" name="name" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName"> Phone</label>
                            <input type="text" name="phone" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputProjectLeader">Designation</label>
                            <input type="text" name="designation" id="inputProjectLeader" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputProjectLeader">Country</label>
                            <input type="text" name="country" id="inputProjectLeader" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="input-group-text w-100" for="inputGroupFile01">Click Me To Upload Profile Image</label>
                            <input type="file" class="form-control d-none" name="image" id="inputGroupFile01">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Email</label>
                            <input type="email" name="email" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Password</label>
                            <input type="password" name="password" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Confirm Password</label>
                            <input type="password" name="confirm_password" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputClientCompany"> Company Name</label>
                            <input type="text" name="company" id="inputClientCompany" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputProjectLeader">Company Address</label>
                            <input type="text" name="address" id="inputProjectLeader" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputClientCompany">Company Year of Establishment</label>
                            <input type="text" name="year" id="inputClientCompany" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Bank Name</label>
                            <input type="text" name="phone" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Bank Account Name</label>
                            <input type="text" name="phone" id="inputName" class="form-control">
                        </div>
                    </div>  
                     <!-- input file end(1) -->
                    <div class="col-12 col-md-6 px-4">
                        <div class="form-group">
                            <label for="inputName">Bank Account Number</label>
                            <input type="number" name="phone" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Bank Address</label>
                            <input type="text" name="phone" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Brance Name</label>
                            <input type="text" name="phone" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Bank Swift Code</label>
                            <input type="text" name="phone" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="input-group-text w-100" for="inputGroupFile01">Click Me To Upload Company Logo</label>
                            <input type="file" class="form-control d-none" name="image" id="inputGroupFile01">
                        </div>
                        <div class="form-group">
                            <label class="input-group-text w-100" for="inputGroupFile01">Company Registation Critificate</label>
                            <input type="file" class="form-control d-none" name="image" id="inputGroupFile01">
                        </div>
                        <div class="form-group">
                            <label for="inputProjectLeader">Designation</label>
                            <input type="text" name="designation" id="inputProjectLeader" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputClientCompany"> Company Name</label>
                            <input type="text" name="company" id="inputClientCompany" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputProjectLeader">Company Address</label>
                            <input type="text" name="address" id="inputProjectLeader" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputProjectLeader">Country</label>
                            <input type="text" name="country" id="inputProjectLeader" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="inputName">Email</label>
                            <input type="email" name="email" id="inputName" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="inputName">Password</label>
                            <input type="password" name="password" id="inputName" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="inputName">Confirm Password</label>
                            <input type="password" name="confirm_password" id="inputName" class="form-control">
                        </div>

                            <div class="form-group">
                                <label for="inputClientCompany">Company Year of Establishment</label>
                                <input type="text" name="year" id="inputClientCompany" class="form-control">
                            </div>
                        </div>
                        <input type="submit" name="submit" value="Register Now" class="btn btn-md float-right m-3 btn-primary">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Main content -->


<!-- form sumbmication  -->
<?php
$agent_mail_query = "SELECT email FROM agents";
$emailquery = mysqli_query($db, $agent_mail_query);
$res = mysqli_num_rows($emailquery);

while ($row = mysqli_fetch_assoc($emailquery)) {
$query_email = $row['email'];
};

if (isset($_POST['submit'])) {

// Collecting form data
$name             = $_POST['name'];
$email            = $_POST['email'];
$phone            = $_POST['phone'];
$password         = md5($_POST['password']);
$confirm_password = md5($_POST['confirm_password']);
$designation      = $_POST['designation'];
$company          = $_POST['company'];
$year             = $_POST['year'];
$address          = $_POST['address'];
$country          = $_POST['country'];
$status           = '2';
$role             = '2';
$image            = $_FILES['image']['name'];
$temporary_location = $_FILES['image']['tmp_name'];
$errors = [];

// 5. Validate image file (if uploaded)
if (!empty($image)) {
$allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
$image_extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));

// Check if the file is an allowed image type
if (!in_array($image_extension, $allowed_extensions)) {
$errors[] = "Only JPG, JPEG, PNG, and GIF images are allowed.";
}

// Check image size (max 2MB)
if ($_FILES['image']['size'] > 2 * 1024 * 1024) {
$errors[] = "Image size should not exceed 2MB.";
}
if ($query_email == $email) {
$errors[] = "This email is alerady Existed";
}
}

// If there are errors, display them and stop the insertion process
if (!empty($errors)) {
foreach ($errors as $error) {
echo "<div class='alert alert-danger mt-2'>$error</div>";
}
} else {
// If no errors, process the data and insert into the database
if ($password == $confirm_password) {

if ($query_email !== $email) {

if (!empty($image)) {
    // Generate a unique image name
    $rand = rand(0, 999999);
    $final_image_name = $name . "_" . $rand . time() . $image;

    // Move the uploaded image to the target directory
    move_uploaded_file($temporary_location, 'dist/img/agent_image/' . $final_image_name);

    // Insert data into the database
    $agent_insert = "INSERT INTO agents (name, email, password, phone, company, designation, year, 
    country, role, status, address, image, joining) VALUES('$name', '$email', '$password',
    '$phone', '$company', '$designation', '$year', '$country', '$role', '$status', '$address',
    '$final_image_name', now())";
} else {
    // If no image uploaded, insert data without image
    $agent_insert = "INSERT INTO agents (name, email, password, phone, company, designation, year, 
    country, role, status, address, joining) VALUES('$name', '$email', '$password',
    '$phone', '$company', '$designation', '$year', '$country', '$role', '$status', '$address',
    now())";
}

// Execute the query
$agent_sql = mysqli_query($db, $agent_insert);

// Check if the insertion was successful
if ($agent_sql) {
    
    header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
    exit();

    
} else {
    echo "<div class='alert alert-danger mt-2'>An error occurred while registering the agent. Please try again.</div>";
}
} else {
$errors[] = "This email is alerady Existed";
}
}
}
}
?>



<?php 
// Form Submission Code 


ob_end_flush();
include('login_include/footer.php'); 
?>



