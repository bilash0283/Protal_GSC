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







<!-- Main Sidebar Container -->
<?php include('dashboard_include/sidebar_college.php') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="ml-2">
    <h1 class="text-bold text-uppercase text-info"> list off <span class="text-primary"><?php echo $country_name; ?></span> institutes</h1>

    <div class="mt-1">
      <div class="row" style="height:1000px;">
          <div class="col h-100">
            <iframe class="w-100 h-100" src="dist/Country_University/<?php echo $country_flag; ?>" frameborder="0"></iframe>
          </div>
      </div>
    </div>

  </div>
</div>
<!-- /.content-wrapper -->

<!-- /.main-footer -->
<?php include('dashboard_include/footer.php') ?>