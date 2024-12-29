<?php include('dashboard_include/header.php') ?>
<?php ob_start(); ?>
<?php

$agentid = $_SESSION['id'];
$agentemail = $_SESSION['email'];

?>
<!-- Navbar -->
<?php include('dashboard_include/top_header.php') ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include('dashboard_include/sidebar.php') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Contacts Information</h1>
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
            <div class="row">
                <div class="col-md-6">
                    <div class="card bg-dark p-5">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="">
                                    <i class="ion ion-location pr-4"></i>
                                </div>
                                <div>
                                    <h6><strong>Address</strong></h6>
                                    <p class="">House no.-54/A(3rd Floor), Road-132,
                                        Gulshan-1, <br> Dhaka-1212
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="">
                                    <i class="ion ion-location pr-4"></i>
                                </div>
                                <div>
                                    <h6><strong>Address</strong></h6>
                                    <p class="">House no.-54/A(3rd Floor), Road-132,
                                        Gulshan-1, <br> Dhaka-1212
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                </div>
            </div>
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