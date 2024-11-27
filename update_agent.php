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
                        <h1 class="m-0">Update Agent</h1>
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
                                    <h3 class="card-title">Update Agent</h3>

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
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="inputName">Agent Name</label>
                                                <input type="text" name="name" value="<?php echo $name; ?>" id="inputName"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputProjectLeader">Designation</label>
                                                <input type="text" name="designation" value="<?php echo $designation; ?>"
                                                    id="inputProjectLeader" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputClientCompany"> Company Name</label>
                                                <input type="text" name="company" value="<?php echo $company; ?>"
                                                    id="inputClientCompany" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputProjectLeader">Company Address</label>
                                                <input type="text" name="address" value="<?php echo $address; ?>"
                                                    id="inputProjectLeader" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputProjectLeader">Company Year of Establishment </label>
                                                <input type="text" name="year" value="<?php echo $company_year; ?>"
                                                    id="inputProjectLeader" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputProjectLeader">Country Name</label>
                                                <input type="text" name="country" value="<?php echo $country; ?>"
                                                    id="inputProjectLeader" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputName"> Phone</label>
                                                <input type="text" name="phone" value="<?php echo $phone; ?>" id="inputName"
                                                    class="form-control">
                                            </div>


                                            <div class="form-group">
                                                <label for="inputProjectLeader">Email</label>
                                                <input type="email" disabled name="email" value="<?php echo $email; ?>"
                                                    id="inputProjectLeader" class="form-control">
                                            </div>
                                            <div>
                                                <?php
                                                if (empty($image)) {
                                                    echo "<img src='dist/img/avatar5.png' width='70px'>";
                                                } else { ?>
                                                    <img src="dist/img/agent_image/<?php echo $image; ?>" width="70px" alt="">
                                                <?php }
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputProjectLeader">Profile Image</label>
                                                <input type="file" name="image" id="inputName">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputName">Bank Name</label>
                                                <input type="text" name="bank_name" value="<?php echo $bank_name; ?>" id="inputName"
                                                    class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputName">Bank Account Name</label>
                                                <input type="text" name="bank_acc_name" value="<?php echo $bank_acc_name; ?>" id="inputName"
                                                    class="form-control">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="inputName">Bank Account Number</label>
                                                <input type="text" name="bank_acc_number" value="<?php echo $bank_acc_number; ?>" id="inputName"
                                                    class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputName">Bank Address</label>
                                                <input type="text" name="bank_address" value="<?php echo $bank_address; ?>" id="inputName"
                                                    class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputName">Branch Name</label>
                                                <input type="text" name="branch_name" value="<?php echo $branch_name; ?>" id="inputName"
                                                    class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputName">Bank Swift Code</label>
                                                <input type="text" name="swift_code" value="<?php echo $branch_name; ?>" id="inputName"
                                                    class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputName">Facebook URL</label>
                                                <input type="url" name="fb_url" value="<?php echo $fb_url; ?>"
                                                    id="inputName" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputName">Website URL</label>
                                                <input type="url" name="web_url"
                                                    value="<?php echo $website_url; ?>" id="inputName" class="form-control">
                                            </div>

                                            <div>
                                                <?php
                                                if (empty($company_logo_img)) {
                                                    echo "<img src='dist/img/avatar5.png' width='70px'>";
                                                } else { ?>
                                                    <img src="dist/img/agent_company_logo/<?php echo $company_logo_img; ?>" width="70px" alt="">
                                                <?php }
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputProjectLeader">Company Logo</label>
                                                <input type="file" name="company_logo" id="inputName">
                                            </div>

                                            <div>
                                                <?php
                                                if (empty($company_reg_certificate)) {
                                                    echo "<img src='dist/img/avatar5.png' width='70px'>";
                                                } else { ?>
                                                    <img src="dist/img/agent_registation_cartificate/<?php echo $company_reg_certificate; ?>" width="70px" alt="">
                                                <?php }
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputProjectLeader">Company Registation Cartificate</label>
                                                <input type="file" name="company_reg_cart" id="inputName">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputStatus">Role</label>
                                                <select id="inputStatus" name="role" class="form-control custom-select">
                                                    <option <?php if ($role == 1) {
                                                        echo "selected";
                                                    } ?> value="1">Admin</option>
                                                    <option <?php if ($role == 2) {
                                                        echo "selected";
                                                    } ?> value="2">Agent</option>
                                                    <option <?php if ($role == 3) {
                                                        echo "selected";
                                                    } ?> value="3">Employee
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputStatus">Status</label>
                                                <select id="inputStatus" name="status" class="form-control custom-select">
                                                    <option <?php if ($status == 1) {
                                                        echo "selected";
                                                    } ?> value="1">Active
                                                    </option>
                                                    <option <?php if ($status == 2) {
                                                        echo "selected";
                                                    } ?> value="2">Inactive
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" name="submit" value="Update Agent"
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

                    $name = $_POST['name'];
                    $designation = $_POST['designation'];
                    $company = $_POST['company'];
                    $address = $_POST['address'];
                    $company_year = $_POST['year'];
                    $country = $_POST['country'];
                    $phone = $_POST['phone'];
                    $fb_url = $_POST['fb_url'];
                    $web_url = $_POST['web_url'];
                    $bank_name = $_POST['bank_name'];
                    $bank_acc_name = $_POST['bank_acc_name'];
                    $bank_acc_number = $_POST['bank_acc_number'];
                    $bank_address = $_POST['bank_address'];
                    $branch_name = $_POST['branch_name'];
                    $swift_code = $_POST['swift_code'];
                    $status = $_POST['status'];
                    $role = $_POST['role'];




                    // Handle Image upload
                    $image = $_FILES['image']['name'];
                    $image_tmp_location = $_FILES['image']['tmp_name'];
                    $final_image_name = '';

                    // Handle Company Logo upload
                    $company_logo = $_FILES['company_logo']['name'];
                    $company_logo_tmp_location = $_FILES['company_logo']['tmp_name'];
                    $final_company_logo_name = '';

                    // Handle Company Registration Certificate upload
                    $company_reg_cart = $_FILES['company_reg_cart']['name'];
                    $company_reg_cart_tmp_location = $_FILES['company_reg_cart']['tmp_name'];
                    $final_company_reg_cart_name = '';

                    // Generate random file names if files are uploaded
                    if (!empty($image)) {
                        $rand = rand(0, 999999);
                        $final_image_name = 'agent_photo_' . $rand . time() . $image;
                        move_uploaded_file($image_tmp_location, 'dist/img/agent_image/' . $final_image_name);
                    }

                    if (!empty($company_logo)) {
                        $rand = rand(0, 999999);
                        $final_company_logo_name = 'agent_company_logo_' . $rand . time() . $company_logo;
                        move_uploaded_file($company_logo_tmp_location, 'dist/img/agent_company_logo/' . $final_company_logo_name);
                    }

                    if (!empty($company_reg_cart)) {
                        $rand = rand(0, 999999);
                        $final_company_reg_cart_name = 'agent_company_reg_cart_' . $rand . time() . $company_reg_cart;
                        move_uploaded_file($company_reg_cart_tmp_location, 'dist/img/agent_registation_cartificate/' . $final_company_reg_cart_name);
                    }

                    // Construct the SQL query to update the agent's information
                    $update_agent = "UPDATE agents SET 
                        name = '$name', 
                        designation = '$designation', 
                        company = '$company', 
                        address = '$address', 
                        year = '$company_year',
                        country = '$country', 
                        phone = '$phone', 
                        fb_url = '$fb_url',
                        web_url = '$web_url',
                        bank_name = '$bank_name',
                        bank_acc_name = '$bank_acc_name',
                        bank_acc_number = '$bank_acc_number',
                        bank_address = '$bank_address',
                        branch_name = '$branch_name',
                        swift_code = '$swift_code',
                        status = '$status', 
                        role = '$role'";


                    // Include file upload fields in the query if files are uploaded
                    if (!empty($final_image_name)) {
                        $update_agent .= ", image = '$final_image_name'";
                    }

                    if (!empty($final_company_logo_name)) {
                        $update_agent .= ", company_logo = '$final_company_logo_name'";
                    }

                    if (!empty($final_company_reg_cart_name)) {
                        $update_agent .= ", company_reg_cert = '$final_company_reg_cart_name'";
                    }

                    // Add WHERE condition to update specific agent
                    $update_agent .= " WHERE id = '$edit_id'";

                    // Execute the query
                    $agent_sql = mysqli_query($db, $update_agent);

                    // Check if the query was successful and redirect
                    if ($agent_sql) {
                        header('Location: agent.php');
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