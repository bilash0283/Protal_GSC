<?php include('dashboard_include/header.php') ?>
<?php ob_start(); ?>
<!-- Navbar -->
<?php include('dashboard_include/top_header.php') ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include('dashboard_include/sidebar.php') ?>

<?php
$agentname = $_SESSION['name'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Agent Information </h1>
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


    <?php
    if (isset($_GET['id'])) {

        $view_id = $_GET['id'];

        $agents = "SELECT * FROM agents WHERE id = $view_id ";
        $agents_query = mysqli_query($db, $agents);

        while ($row = mysqli_fetch_assoc($agents_query)) {

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
    <section class="content">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">

                                    <?php


                                    if ($profile_image == '') { ?>
                                        <img src="dist/img/agent_image/demo.png"
                                            class="profile-user-img img-fluid img-circle" alt="User Profile Picture">
                                    <?php } else { ?>
                                        <img src="dist/img/agent_image/<?php echo $profile_image; ?>" class="profile-user-img img-fluid img-circle" alt="User Profile Picture">
                                        <iframe class="w-100 h-100" src="dist/img/agent_image/<?php echo $profile_image; ?>" frameborder="0"></iframe>
                                    <?php }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary">

                            <div class="card-header">
                                <h3 class="card-title">Agent Details Information</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">

                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Agent Name</th>
                                                <td><?php echo $agent_name; ?></td>
                                            </tr>

                                            <tr>
                                                <th>Phone Number</th>
                                                <td><?php echo htmlspecialchars($phone); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Designation</th>
                                                <td><?php echo htmlspecialchars($designation); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Email</th>
                                                <td><?php echo htmlspecialchars($email); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Country</th>
                                                <td><?php echo htmlspecialchars($country); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Company Name</th>
                                                <td><?php echo htmlspecialchars($company_name); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Company Address</th>
                                                <td><?php echo htmlspecialchars($company_address); ?></td>
                                            </tr>

                                            <tr>
                                                <th>company Year</th>
                                                <td><?php echo htmlspecialchars($company_year); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Bank Name</th>
                                                <td><?php echo htmlspecialchars($bank_name); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Bank Account Name</th>
                                                <td><?php echo htmlspecialchars($bank_acc_name); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Bank Account Number</th>
                                                <td><?php echo htmlspecialchars($bank_acc_number); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Bank Address</th>
                                                <td><?php echo htmlspecialchars($bank_address); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Branch Name</th>
                                                <td><?php echo htmlspecialchars($branch_name); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Bank Swift Code</th>
                                                <td><?php echo htmlspecialchars($swift_code); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Facebook URL</th>
                                                <td><?php echo htmlspecialchars($fb_url); ?></td>
                                            </tr>

                                            <tr>
                                                <th>Website URL</th>
                                                <td><?php echo htmlspecialchars($website_url); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Agent Profile Picture</th>
                                                <td>
                                                    <?php
                                                    $profilename = $profile_image;
                                                    $profile_url = 'dist/img/agent_image/' . $profilename;
                                                    ?>
                                                    <a href="#"
                                                        onclick="showPreviewModalProfile('<?php echo $profile_url; ?>'); return false;"><?php echo $profilename; ?></a>

                                                    <!-- Modal for Profile Picture Preview -->
                                                    <div id="previewModalProfile"
                                                        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0, 0, 0, 0.8); align-items:center; justify-content:center;">
                                                        <div
                                                            style="background:rgba(255, 255, 255, 0.9); padding:20px; border-radius:8px; max-width:500px; text-align:center; box-shadow:0 4px 10px rgba(0, 0, 0, 0.3);">
                                                            <img id="previewImageProfile" src="" alt="Profile Picture"
                                                                style="max-width:100%; height:auto; border-radius:8px;">
                                                            <a id="downloadLinkProfile" href="#" download>
                                                                <button type="button"
                                                                    style="margin-top:10px;">Download</button>
                                                            </a>
                                                            <button type="button" onclick="closePreviewModalProfile()"
                                                                style="margin-top:10px;">Cancel</button>
                                                        </div>
                                                    </div>

                                                    <script>
                                                        function showPreviewModalProfile(profileUrl) {
                                                            document.getElementById("previewImageProfile").src = profileUrl;
                                                            document.getElementById("downloadLinkProfile").href = profileUrl;
                                                            document.getElementById("previewModalProfile").style.display = "flex";
                                                        }

                                                        function closePreviewModalProfile() {
                                                            document.getElementById("previewModalProfile").style.display = "none";
                                                        }
                                                    </script>
                                                </td>
                                            </tr>
                                            <th>Company Logo</th>
                                            <td>
                                                <?php
                                                $profilename = $company_logo_img;
                                                $profile_url = 'dist/img/agent_company_logo/' . $profilename;
                                                ?>
                                                <a href="#"
                                                    onclick="showPreviewModalProfile('<?php echo $profile_url; ?>'); return false;"><?php echo $profilename; ?></a>

                                                <!-- Modal for Profile Picture Preview -->
                                                <div id="previewModalProfile"
                                                    style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0, 0, 0, 0.8); align-items:center; justify-content:center;">
                                                    <div
                                                        style="background:rgba(255, 255, 255, 0.9); padding:20px; border-radius:8px; max-width:500px; text-align:center; box-shadow:0 4px 10px rgba(0, 0, 0, 0.3);">
                                                        <img id="previewImageProfile" src="" alt="Profile Picture"
                                                            style="max-width:100%; height:auto; border-radius:8px;">
                                                        <a id="downloadLinkProfile" href="#" download>
                                                            <button type="button"
                                                                style="margin-top:10px;">Download</button>
                                                        </a>
                                                        <button type="button" onclick="closePreviewModalProfile()"
                                                            style="margin-top:10px;">Cancel</button>
                                                    </div>
                                                </div>

                                                <script>
                                                    function showPreviewModalProfile(profileUrl) {
                                                        document.getElementById("previewImageProfile").src = profileUrl;
                                                        document.getElementById("downloadLinkProfile").href = profileUrl;
                                                        document.getElementById("previewModalProfile").style.display = "flex";
                                                    }

                                                    function closePreviewModalProfile() {
                                                        document.getElementById("previewModalProfile").style.display = "none";
                                                    }
                                                </script>
                                            </td>
                                            </tr>
                                            <th>Company Registation Certificate</th>
                                            <td>
                                                <?php
                                                $profilename = $company_reg_certificate;
                                                $profile_url = 'dist/img/agent_registation_cartificate/' . $profilename;
                                                ?>
                                                <a href="#"
                                                    onclick="showPreviewModalProfile('<?php echo $profile_url; ?>'); return false;"><?php echo $profilename; ?></a>

                                                <!-- Modal for Profile Picture Preview -->
                                                <div id="previewModalProfile"
                                                    style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0, 0, 0, 0.8); align-items:center; justify-content:center;">
                                                    <div
                                                        style="background:rgba(255, 255, 255, 0.9); padding:20px; border-radius:8px; max-width:500px; text-align:center; box-shadow:0 4px 10px rgba(0, 0, 0, 0.3);">
                                                        <img id="previewImageProfile" src="" alt="Profile Picture"
                                                            style="max-width:100%; height:auto; border-radius:8px;">
                                                        <a id="downloadLinkProfile" href="#" download>
                                                            <button type="button"
                                                                style="margin-top:10px;">Download</button>
                                                        </a>
                                                        <button type="button" onclick="closePreviewModalProfile()"
                                                            style="margin-top:10px;">Cancel</button>
                                                    </div>
                                                </div>

                                                <iframe src="<?php echo $profile_url; ?>" frameborder="0"></iframe>

                                                <script>
                                                    function showPreviewModalProfile(profileUrl) {
                                                        document.getElementById("previewImageProfile").src = profileUrl;
                                                        document.getElementById("downloadLinkProfile").href = profileUrl;
                                                        document.getElementById("previewModalProfile").style.display = "flex";
                                                    }

                                                    function closePreviewModalProfile() {
                                                        document.getElementById("previewModalProfile").style.display = "none";
                                                    }
                                                </script>
                                            </td>
                                            </tr>

                                        </table>

                                    </div>
                                </div>
                            </div>


                            <!-- /.card-body -->

                        </div>

                    </div>

                </div>

            </form>


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
ob_end_flush();
?>

<!-- /.main-footer -->
<?php include('dashboard_include/footer.php') ?>