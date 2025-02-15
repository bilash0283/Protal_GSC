<?php
include('dashboard_include/header.php');
ob_start();
include('dashboard_include/top_header.php');
include('dashboard_include/sidebar.php');

if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) { ?>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All New Students</h1>
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
                                    <th scope="col">View Details</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
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
                                $rows_per_page = $selectedValue; // Number of rows per page
                                $current_page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                                $offset = ($current_page - 1) * $rows_per_page;

                                // Query to fetch limited rows with pagination
                                $agents = "SELECT * FROM agents WHERE role='4' ORDER BY id DESC LIMIT $offset, $rows_per_page";
                                $agents_query = mysqli_query($db, $agents);

                                $total_rows_query = mysqli_query($db, "SELECT COUNT(*) as total FROM agents WHERE role='4'");
                                $total_rows = mysqli_fetch_assoc($total_rows_query)['total'];
                                $total_pages = ceil($total_rows / $rows_per_page);

                                if (mysqli_num_rows($agents_query) < 1) {
                                    echo "<tr><td colspan='6'>No Active Agents Found!</td></tr>";
                                } else {
                                    while ($row = mysqli_fetch_assoc($agents_query)) {
                                        $id = $row['id'];
                                        $name = $row['name'];
                                        $email = $row['email'];
                                        $phone = $row['phone'];
                                        $status = $row['status'];
                                        $role = $row['role'];
                                        $joining = $row['joining'];

                                        $std_id = "SELECT * FROM newstudents WHERE email = '$email'";
                                        $std_ql = mysqli_query($db, $std_id);
                                        while ($row = mysqli_fetch_assoc($std_ql)) {
                                            $std_ql_id = $row['id'];
                                        }

                                        ?>

                                        <tr>
                                            <td><a href="stu_single_view.php?edit=<?php echo $std_ql_id; ?>"><i
                                                        class="fas fa-eye"></i></a>
                                            </td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $phone; ?></td>
                                            <td>
                                                <?php echo $status == 1 ? "<div class='badge bg-success'>checked</div>" : "<div class='badge bg-secondary'>uncheck</div>"; ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($role == 1)
                                                    echo "<div class='badge bg-success'>Admin</div>";
                                                elseif ($role == 2)
                                                    echo "<div class='badge bg-warning'>Agent</div>";
                                                elseif ($role == 3)
                                                    echo "<div class='badge bg-info'>Employee</div>";
                                                elseif ($role == 4)
                                                    echo "<div class='badge bg-info'>Student</div>";
                                                ?>
                                            </td>
                                            <?php if ($_SESSION['role'] == 1) { ?>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="std_status_update.php?edit=<?php echo $id ?>"
                                                            class="btn btn-primary btn-sm">Edit</a>
                                                        <!-- <a href="leed_student_show.php?delemail="
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this data?');">Delete</a> -->

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
                                                            <a href="leed_student_show.php?delete=<?php echo $id ?>"
                                                                class="btn btn-primary">Delete
                                                                Student</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php if (isset($_GET['delete'])) {
                                                $delete_id = $_GET['delete'];

                                                $std_ide = "SELECT * FROM agents WHERE id = '$delete_id'";
                                                $std_qle = mysqli_query($db, $std_ide);
                                                while ($row = mysqli_fetch_assoc($std_qle)) {
                                                    $std_email = $row['email'];
                                                }

                                                $std_idt = "SELECT * FROM newstudents WHERE email = '$std_email'";
                                                $std_qlt = mysqli_query($db, $std_idt);
                                                while ($row = mysqli_fetch_assoc($std_qlt)) {
                                                    $std_ql_idt = $row['id'];
                                                }

                                                $delete_sqlr = "DELETE FROM newstudents WHERE id = '$std_ql_idt'";
                                                $delete_stdr = mysqli_query($db, $delete_sqlr);

                                                $delete_sql = "DELETE FROM agents WHERE id = '$delete_id'";
                                                $delete = mysqli_query($db, $delete_sql);

                                                if ($delete and $delete_stdr) {
                                                    header('location:leed_student_show.php');
                                                } else {
                                                    echo "<div class='alert alert-danger mt-2'>An Error Occured While Deleting!</div>";
                                                }
                                            } ?>
                                        </tr>
                                    <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
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
                        <?php if ($current_page > 1) { ?>
                            <li class="page-item"><a class="page-link"
                                    href="?page=<?php echo $current_page - 1; ?>">Previous</a></li>
                        <?php } ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                            <li class="page-item <?php echo $i == $current_page ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php } ?>

                        <?php if ($current_page < $total_pages) { ?>
                            <li class="page-item"><a class="page-link" href="?page=<?php echo $current_page + 1; ?>">Next</a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </section>
    </div>
<?php } else {
    echo "<div class='alert alert-danger text-center'><h1>Only Admin Allowed!</h1></div>";
}

include('dashboard_include/footer.php');
ob_end_flush();
?>