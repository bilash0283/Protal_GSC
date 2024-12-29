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
            <div class="row" style="width:100%;min-height:300px;">
                <div class="col-md-4">
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
                                    <i class="nav-icon fas fas fa-phone-outline pr-4"></i>
                                </div>
                                <div>
                                    <h6><strong>Phone</strong></h6>
                                    <p class="">
                                        +880 1990225993
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="">
                                    <i class="icon icon-email pr-4"></i>
                                </div>
                                <div>
                                    <h6><strong>General Support</strong></h6>
                                    <p class="">
                                        info@ci-gsc.com
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d711.9072812349184!2d90.4168984695041!3d23.781220825900064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b88fc4ea7a57%3A0xdd2167088c032fc8!2sGlobal%20Study%20Contacts%20(GSC)%20%2C%20Contacts%20International!5e1!3m2!1sen!2sbd!4v1735466798228!5m2!1sen!2sbd"
                                widht="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
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