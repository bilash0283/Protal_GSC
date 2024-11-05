<?php include('dashboard_include/header.php') ?>
<?php ob_start(); ?>
<!-- Navbar -->
<?php include('dashboard_include/top_header.php') ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include('dashboard_include/sidebar.php') ?>


<?php
$country = "SELECT * FROM country_list ";
$country_query = mysqli_query($db, $country);
$country_list = mysqli_num_rows($country_query);

$_row = mysqli_fetch_assoc($country_query);
$country_table_name = $_row['country_name'];

    if ($_SESSION['role'] == 1) { ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Country</h1>
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
                                                <input type="text" name="country_name" id="inputName" require placeholder="Enter Country Name" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputName"> Country Flag</label>
                                                <input type="file" require name="flag_img" id="inputName" class="form-control">
                                            </div>


                                            <div class="form-group">
                                                <input type="submit" name="submit" value="Add Country" class="btn btn-lg btn-primary">
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
                $country_name = $_POST['country_name'];

                
                $country_name             = $_POST['country_name'];
                $flag_img                 = $_FILES['flag_img']['name'];
                $temporary_location       = $_FILES['flag_img']['tmp_name'];

                if (!empty($flag_img)) {
                    $rand = rand(0, 999999);
                    $final_image_name = 'agent_photo' . "_" . $rand . time() . $flag_img;

                    $country_insert = "INSERT INTO country_list (country_name,country_flag) VALUES ('$country_name','$final_image_name' ";

                    $country_sql = mysqli_query($db, $country_insert);

                    if ($country_sql) {
                        //   header('location:create_country.php');
                        echo "Country Create Successfull";
                        move_uploaded_file($temporary_location, 'dist/img/country_flag/' . $final_image_name);
                    } else {
                        echo "<div class='alert alert-danger mt-2'>Country Create Failed!</div>";
                    }
                } else {
                    echo "Country Create Failed";
                }

            } else {
                echo "Password Doesn't Match";
            }
        }

            ?>

            <!-- Form Submission Code -->


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    ?>


    <?php
    ob_end_flush();
    ?>

    <!-- /.main-footer -->
    <?php include('dashboard_include/footer.php') ?>