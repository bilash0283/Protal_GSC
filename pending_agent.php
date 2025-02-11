<?php
global $db;
include('dashboard_include/header.php');
ob_start();
include('dashboard_include/top_header.php');
include('dashboard_include/sidebar.php');

if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) {

    $selectedValue = "5"; // Initialize variable
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selectedValue'])) {
        $selectedValue = $_POST['selectedValue']; // Store selected value in PHP variable
    }

    $limit = $selectedValue; // Number of rows per page
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1; // Get current page or default to 1
    $offset = ($page - 1) * $limit; // Calculate offset

    // Search functionality
    $search_query = "";
    $search = "";
    if (isset($_GET['search_btn'])) {
        // Remove spaces from the search input
        $search = str_replace(' ', '', $_GET['search']);
        // Sanitize the input for SQL safety
        $search = mysqli_real_escape_string($db, $search);
        // Create the search query
        $search_query = "AND (REPLACE(name, ' ', '') LIKE '%$search%' OR REPLACE(company, ' ', '') LIKE '%$search%' OR REPLACE(email, ' ', '') LIKE '%$search%' OR REPLACE(phone, ' ', '') LIKE '%$search%')";
    }

    // Total rows count
    $total_query = "SELECT COUNT(*) as total FROM agents WHERE status = 1 AND role = 2 AND add_std = 1 $search_query";
    $total_result = mysqli_query($db, $total_query);
    $total_rows = mysqli_fetch_assoc($total_result)['total'];
    $total_pages = ceil($total_rows / $limit); // Calculate total pages
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Pending Agents</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <form action="" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search Here"
                                        value="<?php echo htmlspecialchars($search); ?>">
                                    <button type="submit" name="search_btn" class="input-group-text">Search</button>
                                </div>
                            </form>
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
                                    <th scope="col">Student Status</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Details/Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Apply Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Profile</th>
                                    <?php if ($_SESSION['role'] == 1) { ?>
                                        <th scope="col">Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Fetch rows for the current page with search and pagination
                                $agents = "SELECT * FROM agents WHERE status = 1 AND role = 2 AND add_std = 1 $search_query ORDER BY id DESC LIMIT $offset, $limit";
                                $agents_query = mysqli_query($db, $agents);
                                $count = mysqli_num_rows($agents_query);

                                if ($count < 1) {
                                    echo "<tr><td colspan='11'>No Agents Found!</td></tr>";
                                } else {
                                    while ($row = mysqli_fetch_assoc($agents_query)) {
                                        $id = $row['id'];
                                        $image = $row['image'];
                                        $name = $row['name'];
                                        $email = $row['email'];
                                        $phone = $row['phone'];
                                        $company = $row['company'];
                                        $status = $row['status'];
                                        $role = $row['role'];
                                        $add_std = $row['add_std'];
                                        $joining = $row['joining'];
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="agent-student.php?email=<?php echo $email; ?>" target="_blank"><i
                                                        class="fas fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <?php if (empty($image)) { ?>
                                                    <img src='dist/img/avatar5.png' width='40px'>
                                                <?php } else { ?>
                                                    <img src="dist/img/agent_image/<?php echo $image; ?>" width="50px" alt="">
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $company; ?></td>
                                            <td><a href="view_agent.php?id=<?php echo $id; ?>" target="_blank"><i
                                                        class="fas fa-eye pr-2"></i><?php echo $name; ?></a></td>
                                            <td><?php echo $phone; ?></td>
                                            <td><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></td>
                                            <td><?php echo $joining; ?></td>
                                            <td>
                                                <?php echo $status == 1 ? "<div class='badge bg-success'>Active</div>" : "<div class='badge bg-secondary'>Inactive</div>"; ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($role == 1) {
                                                    echo "<div class='badge bg-success'>Admin</div>";
                                                } else if ($role == 2) {
                                                    echo "<div class='badge bg-warning'>Agent</div>";
                                                } else {
                                                    echo "<div class='badge bg-info'>Employee</div>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $add_std == 0 ? "<div class='badge bg-success'>Complete</div>" : "<div class='badge bg-danger'>Incomplete</div>"; ?>
                                            </td>
                                            <?php if ($_SESSION['role'] == 1) { ?>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="update_agent.php?edit=<?php echo $id ?>"
                                                            class="btn btn-primary btn-sm">Edit</a>
                                                        <a href="" class="btn btn-danger btn-sm" data-toggle="modal"
                                                            data-target="#id<?php echo $id ?>">Delete</a>
                                                    </div>
                                                </td>
                                            <?php } ?>

                                            <div class="modal fade" id="id<?php echo $id ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Agent</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure to delete <strong><?php echo $name ?></strong></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <a href="pending_agent.php?delete=<?php echo $id ?>"
                                                                class="btn btn-primary">Delete
                                                                Agent</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </tr>
                                    <?php }
                                } ?>
                            </tbody>
                        </table>

                        <?php if (isset($_GET['delete'])) {
                            $delete_id = $_GET['delete'];
                            $delete_sql = "DELETE FROM agents WHERE id = '$delete_id'";
                            $delete = mysqli_query($db, $delete_sql);
                            if ($delete) {
                                header('location:pending_agent.php');
                            } else {
                                echo "<div class='alert alert-danger mt-2'>An Error Occurred While Deleting!</div>";
                            }
                        } ?>

                        <!-- Pagination Links -->
                        <nav>
                            <ul class="pagination">
                                <li>
                                    <form method="post">
                                        <select class="form-control" name="selectedValue" id="mySelect"
                                            onchange="this.form.submit()">
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
                                    <li class="page-item"><a class="page-link"
                                            href="?page=<?php echo $page - 1; ?>&search=<?php echo $search; ?>">Previous</a>
                                    </li>
                                <?php } ?>
                                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                    <li class="page-item <?php echo $page == $i ? 'active' : ''; ?>">
                                        <a class="page-link"
                                            href="?page=<?php echo $i; ?>&search=<?php echo $search; ?>"><?php echo $i; ?></a>
                                    </li>
                                <?php } ?>
                                <?php if ($page < $total_pages) { ?>
                                    <li class="page-item"><a class="page-link"
                                            href="?page=<?php echo $page + 1; ?>&search=<?php echo $search; ?>">Next</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php
} else {
    echo "<div class='alert alert-danger mt-2 text-center'><h1>Only Admin Allowed!</h1></div>";
}
?>
<?php ob_end_flush(); ?>
<!-- /.main-footer -->
<?php include('dashboard_include/footer.php'); ?>