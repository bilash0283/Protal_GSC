<?php include('dashboard_include/header.php') ?>

<?php ob_start(); ?>
<?php



$agentname        = $_SESSION['name'];
$agentemail       = $_SESSION['email'];

if(isset($_GET['name'])){
  $country = $_GET['name'];
}


?>




<!-- Main Sidebar Container -->
<?php include('dashboard_include/sidebar_college.php') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="ml-3">
    <h1 class="text-bold text-uppercase text-info">list off <span class="text-primary"><?php echo $country; ?></span>  institutes</h1>

    <div class="mt-5">
      <div class="row">
        <?php 
        include './database/db.php';
          $unity_info = "SELECT * FROM `university_info` WHERE country='$country' ";
          $uniinfo_query = mysqli_query($db, $unity_info);
          $infodata = mysqli_num_rows($uniinfo_query);
         

        while ($row = mysqli_fetch_assoc($uniinfo_query))

        { ?>
          <div class="col-md-2">
            <a href="collage-info.php?id=<?php $row['id'];?><?php echo $row['id']; ?>" class="card">
              <div class="card-body">
                <img class="w-100 rounded-md" src="<?php echo $row['img']; ?>" />
                <h4 class="mt-2 text-black"><?php echo $row['title']; ?></h3>
                <p class="text-gray"><?php echo $row['description']; ?></p>
              </div>
            </a>
          </div> 

        <?php } ?>
      </div>
    </div>

  </div>
</div>
<!-- /.content-wrapper -->

<!-- /.main-footer -->
<?php include('dashboard_include/footer.php') ?>