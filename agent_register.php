<?php
include('./database/db.php');
ob_start();


$successfull = null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GSC | Agent Apply</title>
    <link rel="icon" href="dist/AdminLTELogoo.png" type="image/x-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <h1 class="text-center py-2"> New Agent Registration Form </h1>
                        <?php
                        // Success message
                        if (isset($_GET['success'])) {
                            echo "<div class='alert alert-success mt-2 text-center'>Registration Successful! Please wait for verification.</div>";
                        }
                        ?>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create New Agent</h3>

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
                                            <label for="inputClientCompany">Company Year of Establishment</label>
                                            <input type="text" name="year" id="inputClientCompany" class="form-control">
                                        </div>
                                        <a href="index.php" class="text-center ">I already have a Agent</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
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
                                            <label for="inputClientCompany">Company Year of Establishment</label>
                                            <input type="text" name="year" id="inputClientCompany" class="form-control">
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" value="Register Now" class="btn btn-md float-right m-3 btn-primary">
                                </div>
                                
                            </div>
                            <!-- /.card-body -->

                        </div>
                    </div>
                </div>

            </form>


            <!-- Form Submission Code -->
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
            <!-- Form Submission Code -->


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>

<?php
ob_end_flush();

?>