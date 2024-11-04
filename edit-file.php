<?php include('dashboard_include/header.php') ?>

<?php ob_start(); ?>
<?php

$agentname        = $_SESSION['name'];
$agentemail       = $_SESSION['email'];

?>
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
            <h1 class="m-0">Re-Uploaded Files Of Students</h1>
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
                      <th scope="col">#</th>
                      <th scope="col">Agent Name</th>
                      <th scope="col">Student Name</th>
                      <th scope="col">Passport</th>
                      <th scope="col">File</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                      $agents = "SELECT * FROM missingfiles ORDER BY id DESC";
                      $agents_query = mysqli_query($db, $agents);

                      $count = mysqli_num_rows($agents_query);

                      if ($count < 1) {
                        echo "There are no Missing Documents of Students!!";
                      } else {

                        while ($row = mysqli_fetch_assoc($agents_query)) {
                          $id            = $row['id'];
                          $agent         = $row['agent'];
                          $student       = $row['student'];
                          $passport      = $row['passport'];
                          $file          = $row['missing'];

                          $newstudent = "SELECT status FROM newstudents WHERE passport = '$passport'";
                          $newstudent_query = mysqli_query($db, $newstudent);

                          if ($newstudent_query) {
                            while ($rows = mysqli_fetch_assoc($newstudent_query)) {
                                $status             = $rows['status'];
                            }
                          }


                        ?>

                          

                          <tr>
                            <th scope="row"><?php echo $id; ?></th>
                            <td><?php echo $agent; ?></td>
                            <td><?php echo $student; ?></td>
                            <td><?php echo $passport; ?></td>
                            <td><?php echo $file; ?></td>
                            <td>
                            <?php
                              
                              if ($status == 2) {
                                echo "<div class='badge bg-success' >Approved</div>";
                              } else if ($status == 1){
                                echo "<div class='badge bg-warning' >Pending</div>";
                              } else if ($status == 3){
                                echo "<div class='badge bg-info' >On-Process</div>";
                              } else if ($status == 4){
                                echo "<div class='badge bg-danger' >Declined</div>";
                              }

                              ?>
                            </td>
                            <td>

                            <div class="btn-group">
                                <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#id<?php echo $id?>">Delete</a>
                              </div>

                            </td>

                            <div class="modal fade" id="id<?php echo $id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Student File</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are you sure to delete <strong><?php echo $student." File"?></strong></p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="edit-file.php?delete=<?php echo $id?>" class="btn btn-primary">Delete Student File</a>
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

                $agentss = "SELECT * FROM missingfiles WHERE id = '$delete_id'";
                $agentss_query = mysqli_query($db, $agentss);
                while ($row = mysqli_fetch_assoc($agentss_query)) {
                  $file          = $row['missing'];
                }

                $delete_sql = "DELETE FROM missingfiles WHERE id = '$delete_id'";
                $delete = mysqli_query($db,$delete_sql);
                if($delete){

                  $path01 = 'dist/student_file_missing_documents/' . $file;

                  if (!unlink($path01)) {
                    echo "<div class='alert alert-danger mt-2'>An Error Occured While!</div>";
                  } else {
                    header('location:edit-file.php');
                  }

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


  <!-- /.main-footer -->
   <?php include('dashboard_include/footer.php') ?>

  