<?php
global $db;
ob_start();
include('dashboard_include/header.php');
include('dashboard_include/top_header.php');
include('dashboard_include/sidebar.php');

// Pagination setup
$limit = 5; // Number of rows per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page number
$offset = ($page - 1) * $limit; // Calculate the offset for SQL query

// Search setup
$search_query = ""; // Initialize search query
$search = ""; // Initialize search term

if (isset($_GET['search_btn'])) {
    // Remove spaces from the search input
    $search = str_replace(' ', '', $_GET['search']);
    // Sanitize the input for SQL safety
    $search = mysqli_real_escape_string($db, $search);
    // Create the search query
    $search_query = "AND (REPLACE(name, ' ', '') LIKE '%$search%' OR REPLACE(company, ' ', '') LIKE '%$search%' OR REPLACE(email, ' ', '') LIKE '%$search%' OR REPLACE(phone, ' ', '') LIKE '%$search%')";
}

// Fetch total row count
$total_query = "SELECT COUNT(*) as total FROM agents WHERE status = 2 && role = 2";
$total_result = mysqli_query($db, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_agents = $total_row['total'];

// Calculate total pages
$total_pages = ceil($total_agents / $limit);

// Fetch agents for the current page, with search query if needed
$agents_query = "SELECT * FROM agents WHERE status = 2 && role = 2 $search_query ORDER BY id DESC LIMIT $limit OFFSET $offset";
$agents_result = mysqli_query($db, $agents_query);
?>

<?php if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) { ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Revoked Agents</h1>
                    </div>
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
                                    <th>Student Status</th>
                                    <th>Image</th>
                                    <th>Company</th>
                                    <th>Details/Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Apply Date</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Profile</th>
                                    <?php if ($_SESSION['role'] == 1) { ?>
                                        <th>Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($agents_result) > 0) {
                                    while ($row = mysqli_fetch_assoc($agents_result)) {
                                        $id = $row['id'];
                                        $image = $row['image'];
                                        $name = $row['name'];
                                        $email = $row['email'];
                                        $phone = $row['phone'];
                                        $company = $row['company'];
                                        $joining = $row['joining'];
                                        $status = $row['status'];
                                        $role = $row['role'];
                                        $add_std = $row['add_std'];
                                        ?>
                                        <tr>
                                            <td><a href="agent-student.php?email=<?php echo $email; ?>"><i class="fas fa-eye"></i></a></td>
                                            <td>
                                                <?php if (empty($image)) { ?>
                                                    <img src="dist/img/avatar5.png" width="40px">
                                                <?php } else { ?>
                                                    <img src="dist/img/agent_image/<?php echo $image; ?>" width="50px" alt="">
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $company; ?></td>
                                            <td><a href="view_agent.php?id=<?php echo $id; ?>"><i class="fas fa-eye pr-2"></i><?php echo $name; ?></a></td>
                                            <td><?php echo $phone; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $joining; ?></td>
                                            <td><?php echo ($status == 1) ? "<div class='badge bg-success'>Active</div>" : "<div class='badge bg-secondary'>Inactive</div>"; ?></td>
                                            <td><?php echo ($role == 1) ? "<div class='badge bg-success'>Admin</div>" : "<div class='badge bg-warning'>Agent</div>"; ?></td>
                                            <td><?php echo ($add_std == 0) ? "<div class='badge bg-success'>Complete</div>" : "<div class='badge bg-danger'>Incomplete</div>"; ?></td>
                                            <?php if ($_SESSION['role'] == 1) { ?>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="update_agent.php?edit=<?php echo $id ?>" class="btn btn-primary btn-sm">Edit</a>
                                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#id<?php echo $id ?>">Delete</a>
                                                    </div>
                                                </td>
                                            <?php } ?>
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="id<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete Agent</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure to delete <strong><?php echo $name; ?></strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="revoked_agent.php?delete=<?php echo $id ?>" class="btn btn-primary">Delete Agent</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr><td colspan="11">There are no Active Agents!</td></tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <?php if (isset($_GET['delete'])) {
                            $delete_id = $_GET['delete'];
                            $delete_sql = "DELETE FROM agents WHERE id = '$delete_id'";
                            $delete = mysqli_query($db, $delete_sql);
                            if ($delete) {
                                header('location:revoked_agent.php');
                            } else {
                                echo "<div class='alert alert-danger mt-2'>An Error Occurred While Deleting!</div>";
                            }
                        } ?>

                        <!-- Pagination Links -->
                        <nav>
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                    <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } else {
    echo "<div class='alert alert-danger mt-2 text-center'><h1>Only Admin Allowed!</h1></div>";
}
ob_end_flush();
include('dashboard_include/footer.php');
?>
