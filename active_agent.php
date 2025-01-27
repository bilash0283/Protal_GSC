<?php 
global $db;
include('dashboard_include/header.php');
ob_start(); 
include('dashboard_include/top_header.php');
include('dashboard_include/sidebar.php');

if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) { 
    // Pagination setup
    $limit = 5; // Number of records per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    // Get total records
    $total_query = "SELECT COUNT(*) AS total FROM agents WHERE status = 1 AND role = 2 AND add_std = 0";
    $total_result = mysqli_query($db, $total_query);
    $total_row = mysqli_fetch_assoc($total_result);
    $total_records = $total_row['total'];

    // Calculate total pages
    $total_pages = ceil($total_records / $limit);

    // Fetch agents for current page
    $agents_query = "SELECT * FROM agents WHERE status = 1 AND role = 2 AND add_std = 0 ORDER BY id DESC LIMIT $limit OFFSET $offset";
    $agents_result = mysqli_query($db, $agents_query);

    ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Active Agents</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
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
                                <th>View Details/Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Apply Date</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Student Add</th>
                                <?php if ($_SESSION['role'] == 1) { ?>
                                    <th>Action</th>
                                <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (mysqli_num_rows($agents_result) > 0) {
                                while ($row = mysqli_fetch_assoc($agents_result)) {
                                    ?>
                                    <tr>
                                        <td><a href="agent-student.php?email=<?php echo $row['email']; ?>"><i class="fas fa-eye"></i></a></td>
                                        <td>
                                            <?php if (empty($row['image'])) {
                                                echo "<img src='dist/img/avatar5.png' width='40px'>";
                                            } else { ?>
                                                <img src="dist/img/agent_image/<?php echo $row['image']; ?>" width="50px" alt="">
                                            <?php } ?>
                                        </td>
                                        <td><?php echo $row['company']; ?></td>
                                        <td><a href="view_agent.php?id=<?php echo $row['id']; ?>"><i class="fas fa-eye pr-2"></i><?php echo $row['name']; ?></a></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['joining']; ?></td>
                                        <td>
                                            <?php echo ($row['status'] == 1) ? "<div class='badge bg-success'>Active</div>" : "<div class='badge bg-secondary'>Inactive</div>"; ?>
                                        </td>
                                        <td>
                                            <?php 
                                            if ($row['role'] == 1) {
                                                echo "<div class='badge bg-success'>Admin</div>";
                                            } elseif ($row['role'] == 2) {
                                                echo "<div class='badge bg-warning'>Agent</div>";
                                            } else {
                                                echo "<div class='badge bg-info'>Employee</div>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo ($row['add_std'] == 0) ? "<div class='badge bg-success'>Yes</div>" : "<div class='badge bg-danger'>No</div>"; ?>
                                        </td>
                                        <?php if ($_SESSION['role'] == 1) { ?>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="update_agent.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="agent.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                                </div>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='11'>No active agents found!</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                        <div>
                            <!-- Pagination Links -->
                            <nav>
                                <ul class="pagination">
                                    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                        <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
} else {
    echo "<div class='alert alert-danger text-center'><h1>Only Admin Allowed!</h1></div>";
}
include('dashboard_include/footer.php');
ob_end_flush();
?>
