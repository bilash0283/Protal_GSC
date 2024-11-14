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
                                            <h3 class="card-title text-white">Edit Country</h3>
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
                                                <label for="inputProjectLeader">Institute Information (PDF file)</label>
                                                <input type="file" name="image" id="inputName">
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" name="submit" value="Add Country" class="btn btn-lg btn-sm btn-primary">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h2 class="text-bold">Country List</h1>
                                            <table class="table table-dark">
                                                <thead>
                                                    <tr class="bg-primary">
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Country Name</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT * FROM country_list ";
                                                    $sql_query = mysqli_query($db, $sql);
                                                    $sql_data = mysqli_num_rows($sql_query);
                                                    $id = 0;

                                                    while ($_row = mysqli_fetch_assoc($sql_query)) {
                                                        $id++;
                                                        $coun_id      = $_row['id'];
                                                        $country_name = $_row['country_name'];
                                                        $institute_img= $_row['country_flag'];
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $id; ?></th>
                                                            <td><?php echo $country_name; ?></td>

                                                            <td><a href="?delete_id=<?php echo $coun_id;?> && <?php echo $institute_img; ?>" onclick="alert('Are you sure you want to delete this Country?')"  name="deletebtn"><i class="fas fa-trash"></i></a></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <!-- delete funcation workding -->

                                <?php
                                if (isset($_GET['delete_id'])) {
                                  $did = $_GET['delete_id']; 
                                  $institute_img;

                                 
                                 $delete_sql = "DELETE FROM country_list WHERE id=$did ";
                                 $query = mysqli_query($db, $delete_sql);

                                 if ($query) {
                                     unlink("dist/Country_University/".$institute_img);
                                     echo "Delete Successfully!";
                                     header("location:create_country.php");
                                 } else {
                                     echo "Country Delete Failed!" . mysqli_error($db);
                                 }
                                


                                }
                                ?>

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
                        echo "This Country already Exists !" . mysqli_error($db);
                    } else {
                        // Check if the country name and the image are provided
                        if (!empty($countryName) && !empty($CountryFlag)) {

                            // Generate a unique name for the uploaded image
                            $rand = rand(0, 999999);
                            $final_image_name = $countryName . "_" . $rand . time() . basename($CountryFlag);

                            // Define the destination folder for the uploaded image
                            $upload_dir = 'dist/Country_University/';
                            $upload_path = $upload_dir . $final_image_name;

                            // Check if the upload directory exists, if not create it
                            if (!is_dir($upload_dir)) {
                                mkdir($upload_dir, 0777, true);  // Create the directory with full permissions
                            }

                            // Ensure that the file is an image (optional)
                            $allowed_exts = ['jpg', 'jpeg', 'png', 'pdf'];
                            $file_extension = pathinfo($CountryFlag, PATHINFO_EXTENSION);
                            if (!in_array(strtolower($file_extension), $allowed_exts)) {
                                echo "<div class='alert alert-danger mt-2'>Invalid image type! Only JPG, pdf, JPEG, PNG, GIF are allowed.</div>";
                                exit;
                            }

                            // Prepared SQL query to insert data into the database
                            $stmt = $db->prepare("INSERT INTO `country_list` (`country_name`, `country_flag`) VALUES (?, ?)");
                            $stmt->bind_param("ss", $countryName, $final_image_name);  // Bind parameters (string, string)


                            // Execute the query
                            if ($stmt->execute()) {
                                // Move the uploaded file to the destination folder
                                if (move_uploaded_file($temporary_location, $upload_path)) {
                                    header('Location: create_country.php');
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
                 <!-- this is a name of create country from submit  -->


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

<!-- careate country almost done  -->