<?php include('dashboard_include/header.php') ?>
<?php ob_start(); ?>
<?php include('dashboard_include/top_header.php') ?>
<?php include('dashboard_include/sidebar.php') ?>

<?php if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) { ?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Agents</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Student Status</th>
                  <th scope="col">Image</th>
                  <th scope="col">Company</th>
                  <th scope="col">View Details / Name</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Email</th>
                  <th scope="col">Est.</th>
                  <th scope="col">Status</th>
                  <th scope="col">Role</th>
                  <?php if ($_SESSION['role'] == 1) { ?>
                    <th scope="col">Action</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php
                $selectedValue = "5"; // Initialize variable
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selectedValue'])) {
                  $selectedValue = $_POST['selectedValue']; // Store selected value in PHP variable
                }

                $limit = $selectedValue; // Rows per page
                $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                $offset = ($page - 1) * $limit;

                // Get total count for pagination
                $count_query = mysqli_query($db, "SELECT COUNT(*) AS total FROM agents WHERE role IN (1, 3)");
                $total_rows = mysqli_fetch_assoc($count_query)['total'];
                $total_pages = ceil($total_rows / $limit);

                // Fetch data with LIMIT and OFFSET
                $agents_query = mysqli_query($db, "SELECT * FROM agents WHERE role IN (1, 3) ORDER BY id DESC LIMIT $limit OFFSET $offset");
                $count = mysqli_num_rows($agents_query);

                if ($count < 1) {
                  echo "<tr><td colspan='9'>There are no Active Agents!!</td></tr>";
                } else {
                  while ($row = mysqli_fetch_assoc($agents_query)) {
                    $id = $row['id'];
                    $image = $row['image'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $phone = $row['phone'];
                    $company = $row['company'];
                    $year = $row['year'];
                    $status = $row['status'];
                    $role = $row['role'];
                    ?>
                    <tr>
                      <td><a href="agent-student.php?email=<?php echo $email; ?>"><i class="fas fa-eye"></i></a></td>
                      <td><img src="<?php echo empty($image) ? 'dist/img/avatar5.png' : 'dist/img/agent_image/' . $image; ?>"
                          width="40px"></td>
                      <td><?php echo $company; ?></td>
                      <td><a href="view_agent.php?id=<?php echo $id; ?>"><i
                            class="fas fa-eye pr-2"></i><?php echo $name; ?></a></td>
                      <td><?php echo $phone; ?></td>
                      <td><?php echo $email; ?></td>
                      <td><?php echo $year; ?></td>
                      <td>
                        <div class='badge <?php echo $status == 1 ? 'bg-success' : 'bg-secondary'; ?>'>
                          <?php echo $status == 1 ? 'Active' : 'Inactive'; ?>
                        </div>
                      </td>
                      <td>
                        <?php
                        if ($role == 1) {
                          echo "<div class='badge bg-success'>Admin</div>";
                        } elseif ($role == 2) {
                          echo "<div class='badge bg-warning'>Agent</div>";
                        } else if ($role == 3) {
                          echo "<div class='badge bg-info'>Employee</div>";
                        } else if ($role == 4) {
                          echo "<div class='badge bg-info'>Student</div>";
                        }
                        ?>
                      </td>
                      <?php if ($_SESSION['role'] == 1) { ?>
                        <td>
                          <div class="btn-group">
                            <a href="update_agent.php?edit=<?php echo $id ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                              data-target="#id<?php echo $id ?>">Delete</a>
                          </div>
                        </td>
                      <?php } ?>
                    </tr>
                    <div class="modal fade" id="id<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Delete Agent</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Are you sure to delete <strong><?php echo $name ?></strong></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="agent.php?delete=<?php echo $id ?>" class="btn btn-primary">Delete Agent</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php }
                } ?>
              </tbody>
            </table>

            <!-- Pagination -->
            <nav>
              <ul class="pagination">
                <li>
                  <form method="post">
                    <select class="form-control" name="selectedValue" id="mySelect" onchange="this.form.submit()">
                      <option value="5" <?php if ($selectedValue == "5")
                        echo "selected"; ?>>5</option>
                      <option value="10" <?php if ($selectedValue == "10")
                        echo "selected"; ?>>10</option>
                      <option value="20" <?php if ($selectedValue == "20")
                        echo "selected"; ?>>20</option>
                      <option value="30" <?php if ($selectedValue == "30")
                        echo "selected"; ?>>30</option>
                      <option value="50" <?php if ($selectedValue == "50")
                        echo "selected"; ?>>50</option>
                      <option value="100" <?php if ($selectedValue == "100")
                        echo "selected"; ?>>100</option>
                    </select>
                  </form>
                </li>
                <?php if ($page > 1) { ?>
                  <li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a></li>
                <?php } ?>
                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                  <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>"><a class="page-link"
                      href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>
                <?php if ($page < $total_pages) { ?>
                  <li class="page-item"><a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a></li>
                <?php } ?>
              </ul>
            </nav>

          </div>
        </div>

        <?php
        if (isset($_GET['delete'])) {
          $delete_id = $_GET['delete'];
          $delete_sql = "DELETE FROM agents WHERE id = '$delete_id'";
          $delete = mysqli_query($db, $delete_sql);
          if ($delete) {
            header('location:agent.php');
          } else {
            echo "<div class='alert alert-danger mt-2'>An Error Occurred While Deleting!</div>";
          }
        }
        ?>
      </div>
    </section>
  </div>
<?php } else {
  echo "<div class='alert alert-danger mt-2 text-center'><h1>Only Admin Allowed!</h1></div>";
} ?>
<?php ob_end_flush(); ?>
<?php include('dashboard_include/footer.php') ?>