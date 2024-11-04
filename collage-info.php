<?php include('dashboard_include/header.php') ?>

<?php ob_start(); ?>
<?php

$id = isset($_GET['id']) && $_GET['id'];

?>


<!-- Main Sidebar Container -->
<?php  include('dashboard_include/sidebar_college.php') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="ml-3">
    <h1> Collage Informatoins</h1> <?php echo $id ?>

    <div class="col-md-12">
      <a href="collage-info.php?<?php echo "id=" . $i ?>" class="card">
        <div class="card-body">
          <img class="w-100" src="https://ssl.du.ac.bd/fontView/images/slider/16310906631624519003DU_Curzon_Hall_2_1.jpg" />
          <h3>USA Public Universiy</h3>
        </div>
      </a>
    </div>

  </div>
</div>
<!-- /.content-wrapper -->

<!-- /.main-footer -->
<?php include('dashboard_include/footer.php') ?>