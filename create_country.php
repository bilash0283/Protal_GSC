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
                        <h1 class="m-0">Create an Country</h1>
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
                                    <h3 class="card-title">Add Country</h3>

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
                                                <label for="inputName">Country Name</label>
                                                <input type="text" name="country_name" id="inputName" class="form-control">
                                            </div>


                                            <div class="form-group">
                                                <label for="inputProjectLeader">Country Flag</label>
                                                <input type="file" name="image" id="inputName">
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" name="submit" value="Add Country" class="btn btn-lg btn-sm btn-primary">
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

                    // Getting form input values
                    $country_name = $_POST['country_name'];
                    $countryName = strtoupper($country_name);
                    $CountryFlag = $_FILES['image']['name'];
                    $temporary_location = $_FILES['image']['tmp_name'];

                    $Cuntry_query_database = "SELECT country_name FROM country_list WHERE country_name = '$countryName'";
                    $country_query = mysqli_query($db, $Cuntry_query_database);
                    $row = mysqli_fetch_assoc($country_query);
                    $country_name_data = $row['country_name'];

                    // country name query check hear 
                    if ($country_name_data == $countryName) {
                        echo "This Country already Exists !".mysqli_error($db);
                        
                    } else {
                        // Check if the country name and the image are provided
                        if (!empty($countryName) && !empty($CountryFlag)) {

                            // Generate a unique name for the uploaded image
                            $rand = rand(0, 999999);
                            $final_image_name = 'agent_photo' . "_" . $rand . time() . basename($CountryFlag);

                            // Define the destination folder for the uploaded image
                            $upload_dir = 'dist/img/country_flag/';
                            $upload_path = $upload_dir . $final_image_name;

                            // Check if the upload directory exists, if not create it
                            if (!is_dir($upload_dir)) {
                                mkdir($upload_dir, 0777, true);  // Create the directory with full permissions
                            }

                            // Ensure that the file is an image (optional)
                            $allowed_exts = ['jpg', 'jpeg', 'png', 'gif'];
                            $file_extension = pathinfo($CountryFlag, PATHINFO_EXTENSION);
                            if (!in_array(strtolower($file_extension), $allowed_exts)) {
                                echo "<div class='alert alert-danger mt-2'>Invalid image type! Only JPG, JPEG, PNG, GIF are allowed.</div>";
                                exit;
                            }

                            // Prepared SQL query to insert data into the database
                            $stmt = $db->prepare("INSERT INTO `country_list` (`country_name`, `country_flag`) VALUES (?, ?)");
                            $stmt->bind_param("ss", $countryName, $final_image_name);  // Bind parameters (string, string)


                            // Execute the query
                            if ($stmt->execute()) {
                                // Move the uploaded file to the destination folder
                                if (move_uploaded_file($temporary_location, $upload_path)) {
                                    header('Location: index.php');
                                    exit;  // Ensure no further code is executed after the redirect
                                } else {
                                    echo "<div class='alert alert-danger mt-2'>Failed to upload the image.</div>";
                                }
                            } else {
                                echo "<div class='alert alert-danger mt-2'>Country Creation Failed!</div>";
                            }


                            // Close the prepared statement
                            $stmt->close();
                        } else {
                            echo "<div class='alert alert-danger mt-2'>Please fill in all fields.</div>";
                        }
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
    echo "<div class='alert alert-danger mt-2 text-center'><h1>Only Admin Allowed!</h1></div>";
}

?>


<?php
ob_end_flush();
?>

<!-- /.main-footer -->
<?php include('dashboard_include/footer.php') ?>