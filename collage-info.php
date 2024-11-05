<?php include('dashboard_include/header.php') ?>

<?php ob_start(); ?>
<?php

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $institute = "SELECT * FROM university_info WHERE id = '$id'";
  $institute_query = mysqli_query($db, $institute);

  $count = mysqli_num_rows($institute_query);

  if ($count < 1) {
    echo "There are no Active Agents!!";
  } else {

    while ($row = mysqli_fetch_assoc($institute_query)) {
      $id           = $row['id'];
      $country      = $row['country'];
      $img          = $row['img'];
      $title        = $row['title'];
      $description  = $row['description'];
    }
  }
}

?>


<!-- Main Sidebar Container -->
<?php include('dashboard_include/sidebar_info.php') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="ml-3">
    <h1> Institute Details Informatoins</h1>

    <div class="col-md-12">
      <a href="collage-info.php?<?php echo "id=" . $i ?>" class="card">
        <div class="card-body">
          <img class="w-100 h-auto img-fluid" src="<?php echo $img; ?>" />
          <h3 class="my-2"><?php echo $title; ?></h3>
          <p class="my-2"><?php echo $description; ?></p>
        </div>
      </a>
    </div>

  </div>
</div>
<!-- /.content-wrapper -->

<!-- /.main-footer -->
<?php include('dashboard_include/footer.php') ?>