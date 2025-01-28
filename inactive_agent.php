<?php
global $db;
include('dashboard_include/header.php');
?>
<?php ob_start(); ?>
<!-- Navbar -->
<?php include('dashboard_include/top_header.php'); ?>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<?php include('dashboard_include/sidebar.php'); ?>

<?php
if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) {
    // Pagination setup
    $limit = 5; // Number of rows per page
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1; // Get current page or default to 1
    $offset = ($page - 1) * $limit; // Calculate offset

    // Total rows count
    $total_query = "SELECT COUNT(*) as total FROM agents WHERE status = 1 AND role = 2 AND add_std = 1";
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
                        <h1 class="m-0">All Inactive Agents</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <input type="text" name="search" placeholder="Search hear" class="form-control">
                        <input type="submit" btn btn-success >

                        <ol class="breadcrumb float-sm-right">
                           
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
                                    <th scope="col">Student Add</th>
                                    <?php if ($_SESSION['role'] == 1) { ?>
                                        <th scope="col">Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Fetch rows for the current page
                                $agents = "SELECT * FROM agents WHERE status = 1 AND role = 2 AND add_std = 1 ORDER BY id DESC LIMIT $offset, $limit";
                                $agents_query = mysqli_query($db, $agents);
                                $count = mysqli_num_rows($agents_query);

                                if ($count < 1) {
                                    echo "<tr><td colspan='11'>There are no Active Agents!!</td></tr>";
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
                                                <a href="agent-student.php?email=<?php echo $email; ?>"><i
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
                                            <td><a href="view_agent.php?id=<?php echo $id; ?>"><i
                                                        class="fas fa-eye pr-2"></i><?php echo $name; ?></a></td>
                                            <td><?php echo $phone; ?></td>
                                            <td><?php echo $email; ?></td>
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
                                                <?php echo $add_std == 0 ? "<div class='badge bg-success'>Yes</div>" : "<div class='badge bg-danger'>No</div>"; ?>
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
                                                            <a href="inactive_agent.php?delete=<?php echo $id ?>"
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
                                header('location:inactive_agent.php');
                            } else {
                                echo "<div class='alert alert-danger mt-2'>An Error Occured While Deleting!</div>";
                            }
                        } ?>



                        <!-- Pagination Links -->
                        <nav>
                            <ul class="pagination">
                                <?php if ($page > 1) { ?>
                                    <li class="page-item"><a class="page-link"
                                            href="?page=<?php echo $page - 1; ?>">Previous</a></li>
                                <?php } ?>
                                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                    <li class="page-item <?php echo $page == $i ? 'active' : ''; ?>">
                                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                    </li>
                                <?php } ?>
                                <?php if ($page < $total_pages) { ?>
                                    <li class="page-item"><a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a>
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