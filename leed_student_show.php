<?php include('dashboard_include/header.php') ?>
<?php ob_start(); ?>
  <!-- Navbar -->
  <?php include('dashboard_include/top_header.php') ?>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <?php include('dashboard_include/sidebar.php')?>

  <?php
    if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) { ?>
        <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">All Leed Students</h1>
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
            <div class="col-md-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Phone / Whatapp</th>
                      <th scope="col">E-mail</th>
                      <th scope="col">Interested Country</th>
                      <th scope="col">last Qualification</th>
                      <th scope="col">Passing year</th>
                      <th scope="col">CGPA</th>
                      <th scope="col">Language Score</th>
                      <?php 
                        if ($_SESSION['role'] == 1) { ?>
                          <th scope="col">Action</th>
                      <?php  }
                      ?>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    
                      $agents = "SELECT * FROM student_leed ORDER BY id DESC";
                      $agents_query = mysqli_query($db, $agents);

                      $count = mysqli_num_rows($agents_query);

                      if ($count < 1) {
                        echo "There are no Student!!";
                      } else {
                        $sl = 1;
                        while ($row = mysqli_fetch_assoc($agents_query)) {
                          $id                           = $row['id'];
                          $name                          = $row['name'];
                          $phone                         = $row['phone'];
                          $email                         = $row['email'];
                          $interested_country            = $row['interested_country'];
                          $last_qualification            = $row['last_qualification'];
                          $pass_year                      = $row['pass_year'];
                          $gpa                              = $row['gpa'];
                          $language_score                = $row['language_score'];

?>
                          <tr>
                            <td><?php echo $sl ++; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $phone; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $interested_country; ?></td>
                            <td><?php echo $last_qualification; ?></td>
                            <td><?php echo $pass_year; ?></td>
                            <td><?php echo $gpa; ?></td>
                            <td><?php echo $language_score; ?></td>
                            
                              <?php 
                              
                              if ($_SESSION['role'] == 1) { ?>
                                <td>

                                <div class="btn-group">
                                  <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#id<?php echo $id?>">Delete</a>
                                </div>
  
                              </td>
                             <?php }
                              
                              ?>

                           

                            <div class="modal fade" id="id<?php echo $id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are you sure to delete <strong><?php echo $name?></strong></p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="leed_student_show.php?delete=<?php echo $id?>" class="btn btn-primary">Delete </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </tr>
                          <?php
                        }
                      }
                    ?>
                  </tbody>
                </table>

            </div>
          </div>

            <?php
              if(isset($_GET['delete'])){
                $delete_id = $_GET['delete'];
                $delete_sql = "DELETE FROM student_leed WHERE id = '$delete_id'";
                $delete = mysqli_query($db,$delete_sql);
                if($delete){
                  header('location:leed_student_show.php');
                } else {
                  echo "<div class='alert alert-danger mt-2'>An Error Occured While Deleting!</div>";
                }
              }
            ?>
            
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

  