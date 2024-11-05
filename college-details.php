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
  <div class="ml-3">
    <h1 class="text-bold text-uppercase text-info">list off <span class="text-primary"><?php echo $country_name; ?></span> institutes</h1>

    <div class="mt-5">
      <div class="row">
        <?php
        $unity_info = "SELECT * FROM `university_info` WHERE country='$country_name' ";
        $uniinfo_query = mysqli_query($db, $unity_info);
        $infodata = mysqli_num_rows($uniinfo_query);



        while ($row = mysqli_fetch_assoc($uniinfo_query)) { ?>

          <div class="col-md-2">
            <div class="card">
              <img class="card-img-top rounded-full" src="<?php echo $row['img']; ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title mb-2"><?php echo $row['title']; ?></h5>
                <a href="collage-info.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Details</a>
              </div>
            </div>
          </div>

        <?php } ?>
      </div>
    </div>

  </div>
</div>
<!-- /.content-wrapper -->

<!-- /.main-footer -->
<?php include('dashboard_include/footer.php') ?>