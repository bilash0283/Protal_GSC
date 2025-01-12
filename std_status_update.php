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
                        <h1 class="m-0">Update Student Status</h1>
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
                                    <h3 class="card-title">Update Student Status</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <?php
                                if (isset($_GET['edit'])) {

                                    $edit_id = $_GET['edit'];

                                    $agents = "SELECT * FROM agents WHERE id = '$edit_id'";
                                    $agents_query = mysqli_query($db, $agents);

                                    while ($row = mysqli_fetch_assoc($agents_query)) {
                                        $id = $row['id'];
                                        $image = $row['image'];
                                        $name = $row['name'];
                                        $email = $row['email'];
                                        $phone = $row['phone'];
                                        $company = $row['company'];
                                        $year = $row['year'];
                                        $designation = $row['designation'];
                                        $status = $row['status'];
                                        $role = $row['role'];
                                        $address = $row['address'];
                                        $country = $row['country'];
                                        $joining = $row['joining'];
                                        $fb_url = $row['fb_url'];
                                        $website_url = $row['web_url'];
                                        $company_logo_img = $row['company_logo'];
                                        $company_reg_certificate = $row['company_reg_cert'];

                                        $agent_name = $row['name'];
                                        $phone = $row['phone'];
                                        $designation = $row['designation'];
                                        $country = $row['country'];
                                        $email = $row['email'];
                                        $company_name = $row['company'];
                                        $company_address = $row['address'];
                                        $company_year = $row['year'];
                                        $bank_name = $row['bank_name'];
                                        $bank_acc_name = $row['bank_acc_name'];
                                        $bank_acc_number = $row['bank_acc_number'];
                                        $bank_address = $row['bank_address'];
                                        $branch_name = $row['branch_name'];
                                        $swift_code = $row['swift_code'];
                                        $fb_url = $row['fb_url'];
                                        $website_url = $row['web_url'];
                                        $profile_image = $row['image'];
                                        $company_logo_img = $row['company_logo'];
                                        $company_reg_certificate = $row['company_reg_cert'];

                                    }
                                }

                                ?>
                                <div class="row">
                                    <div class="col-md-6 mx-auto">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="">Role</label>
                                                <input readonly type="text" class="form-control" value="<?php 
                                                if($role == 4){
                                                    echo "Student";
                                                }
                                                
                                                ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputStatus">Status</label>
                                                <select id="inputStatus" name="status" class="form-control custom-select">
                                                    <option <?php if ($status == 1) {
                                                        echo "selected";
                                                    } ?> value="1">Check
                                                    </option>
                                                    <option <?php if ($status == 2) {
                                                        echo "selected";
                                                    } ?> value="2">Uncheck
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="submit" value="Update Student Status"
                                                    class="btn btn-lg btn-primary px-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Form Updating Code -->
                <?php

                if (isset($_POST['submit'])) {
                    
                    $status = $_POST['status'];

                    $update_agent = "UPDATE agents SET status = '$status' WHERE id='$edit_id' ";
                    $agent_sql = mysqli_query($db, $update_agent);

                    // Check if the query was successful and redirect
                    if ($agent_sql) {
                        header('Location: leed_student_show.php');
                        exit();
                    } else {
                        echo "<div class='alert alert-danger mt-2'>An Error Occurred!</div>";
                    }
                }
                ?>

                <!-- Form Updating Code -->

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