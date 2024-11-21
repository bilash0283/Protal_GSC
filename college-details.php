<?php include('dashboard_include/header.php') ?>
<?php ob_start(); ?>
<?php
$agentname        = $_SESSION['name'];
$agentemail       = $_SESSION['email'];

if (isset($_GET['id'])) {
  $id = $_GET['id'];


$country = "SELECT * FROM `country_list` WHERE id='$id' ";
$country_query = mysqli_query($db, $country);
$data = mysqli_num_rows($country_query);
$country_data = mysqli_fetch_assoc($country_query);

$id           = $country_data['id'];
$country_name = $country_data['country_name'];
$country_flag = $country_data['country_flag'];

}

?>
  <!-- Navbar -->
  <?php include('dashboard_include/top_header.php') ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('dashboard_include/sidebar_college.php')?>

  <?php 
    if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) { ?>
        <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0">list off <?php echo $country_name; ?> institutes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- main content  -->
  <div class="ml-2">
    <div class="mt-1">
      <div class="row" style="height:1000px;">
          <div class="col h-100">
            <iframe class="w-100 h-100" src="dist/Country_University/<?php echo $country_flag; ?>" frameborder="0"></iframe>
          </div>
      </div>
    </div>
  </div>
<!-- main content  -->


  </div>
  <!-- /.content-wrapper -->
  <?php } else {
      echo "<div class='alert alert-danger mt-2 text-center'><h1>Only Admin Allowed!</h1></div>";
    }

  ?>



  <!-- /.main-footer -->
   <?php include('dashboard_include/footer.php') ?>

  



