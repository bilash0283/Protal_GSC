<?php
include('dashboard_include/header.php');
ob_start();
include('dashboard_include/top_header.php');
include('dashboard_include/sidebar.php');

// Check user role
if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) {

    $selectedValue = "5";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selectedValue'])) {
        $selectedValue = $_POST['selectedValue']; // Store selected value in PHP variable
    }

    $rows_per_page = $selectedValue;
    $current_page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $offset = ($current_page - 1) * $rows_per_page;

    // Initialize search query
    $search = isset($_GET['search']) ? mysqli_real_escape_string($db, $_GET['search']) : '';

    // Fetch the total number of rows with search filter
    $search_query = "SELECT COUNT(*) AS total FROM newstudents ";
    if (!empty($search)) {
        $search_query .= "WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%' OR agent LIKE '%$search%' ";
    }
    $result = mysqli_query($db, $search_query);
    $total_rows = mysqli_fetch_assoc($result)['total'];

    // Calculate total pages
    $total_pages = ceil($total_rows / $rows_per_page);

    // Fetch data for the current page with search filter
    $agents_query_string = "SELECT * FROM newstudents ";
    if (!empty($search)) {
        $agents_query_string .= "WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%' OR agent LIKE '%$search%' ";
    }
    $agents_query_string .= "ORDER BY id DESC LIMIT $rows_per_page OFFSET $offset";
    $agents_query = mysqli_query($db, $agents_query_string);
    $count = mysqli_num_rows($agents_query);

    ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-9">
                        <h1 class="m-0">All Students (Direct Student + Agent Student)</h1>
                    </div>
                    <div class="col-sm-3">
                        <ol class="breadcrumb float-sm-right">
                            <form action="" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="Search by Name, Email, Phone, Agent"
                                        value="<?php echo htmlspecialchars($search); ?>">
                                    <button type="submit" class="input-group-text">Search</button>
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
                                    <th scope="col">View</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Agent Name</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">D.O.B</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Nationality</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Passport</th>
                                    <th scope="col">SSC/O Level Result</th>
                                    <th scope="col">SSC/O Level Year</th>
                                    <th scope="col">HSC/A Level Result</th>
                                    <th scope="col">HSC/A Level Year</th>
                                    <th scope="col">Diploma Result</th>
                                    <th scope="col">Diploma Year</th>
                                    <th scope="col">Bachelors Result</th>
                                    <th scope="col">Bachelors Year</th>
                                    <th scope="col">Masters Result</th>
                                    <th scope="col">Masters Year</th>
                                    <th scope="col">English Result</th>
                                    <th scope="col">Intake</th>
                                    <th scope="col">Destination</th>
                                    <th scope="col">University</th>
                                    <th scope="col">Program</th>
                                    <th scope="col">Course/Subject</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Comments</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($count < 1) {
                                    echo "<tr><td colspan='30'>No Students Found!</td></tr>";
                                } else {
                                    while ($row = mysqli_fetch_assoc($agents_query)) {
                                        $id = $row['id'];
                                        $name = $row['name'];
                                        $gscdestination = $row['gscdestination'];
                                        $destination = $row['destination'];
                                        $program = $row['program'];
                                        $status = $row['status'];
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="view-student.php?edit=<?php echo $row['id']; ?>"><i
                                                        class="fas fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <?php
                                                if (empty($row['profile'])) {
                                                    echo "<img src='dist/img/avatar5.png' width='40px'>";
                                                } else {
                                                    echo "<img src='dist/student_profile/{$row['profile']}' width='60px' class='img-circle mr-3'>";
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $row['agent']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['dob']; ?></td>
                                            <td><?php echo $row['gender']; ?></td>
                                            <td><?php echo $row['nationality']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['passport']; ?></td>
                                            <td><?php echo $row['ssc']; ?></td>
                                            <td><?php echo $row['sscyear']; ?></td>
                                            <td><?php echo $row['hsc']; ?></td>
                                            <td><?php echo $row['hscyear']; ?></td>
                                            <td><?php echo $row['diploma']; ?></td>
                                            <td><?php echo $row['diplomayear']; ?></td>
                                            <td><?php echo $row['undergrad']; ?></td>
                                            <td><?php echo $row['undergradyear']; ?></td>
                                            <td><?php echo $row['level']; ?></td>
                                            <td><?php echo $row['qualificationyear']; ?></td>
                                            <td><?php echo $row['ielts']; ?></td>
                                            <td><?php echo $row['semester']; ?></td>
                                            <td><?php
                                            if ($gscdestination != '') {
                                                echo htmlspecialchars($gscdestination);
                                            } else {
                                                switch ($destination) {
                                                    case 1:
                                                        echo "USA";
                                                        break;
                                                    case 2:
                                                        echo "UK";
                                                        break;
                                                    case 3:
                                                        echo "Canada";
                                                        break;
                                                    case 4:
                                                        echo "Australia";
                                                        break;
                                                    case 5:
                                                        echo "Denmark";
                                                        break;
                                                    case 6:
                                                        echo "Cyprus";
                                                        break;
                                                    case 7:
                                                        echo "Ireland";
                                                        break;
                                                    case 8:
                                                        echo "Malaysia";
                                                        break;
                                                    case 9:
                                                        echo "Dubai";
                                                        break;
                                                    case 10:
                                                        echo "Hungary";
                                                        break;
                                                    case 11:
                                                        echo "Bulgaria";
                                                        break;
                                                    case 12:
                                                        echo "Malta";
                                                        break;
                                                    case 13:
                                                        echo "Romania";
                                                        break;
                                                    case 14:
                                                        echo "Russia";
                                                        break;
                                                    case 15:
                                                        echo "Turkey";
                                                        break;
                                                    case 16:
                                                        echo "Georgia";
                                                        break;
                                                    case 17:
                                                        echo "China";
                                                        break;
                                                    case 18:
                                                        echo "Latvia";
                                                        break;
                                                    case 19:
                                                        echo "Netherland";
                                                        break;
                                                    case 20:
                                                        echo "Poland";
                                                        break;
                                                    case 21:
                                                        echo "France";
                                                        break;
                                                    case 22:
                                                        echo "Spain";
                                                        break;
                                                }
                                            }

                                            ?></td>
                                            <td><?php echo $row['university']; ?></td>
                                            <td><?php
                                            switch ($program) {
                                                case 1:
                                                    echo "Foundation";
                                                    break;
                                                case 2:
                                                    echo "Bachelor's";
                                                    break;
                                                case 3:
                                                    echo "Master's";
                                                    break;
                                                case 4:
                                                    echo "Pre-Master's";
                                                    break;
                                                case 5:
                                                    echo "Foundation with Bachelor";
                                                    break;
                                            }
                                            ?></td>
                                            <td><?php echo $row['subject']; ?></td>
                                            <td><?php
                                            switch ($status) {
                                                case 1:
                                                    echo "Pending";
                                                    break;
                                                case 2:
                                                    echo "Approved";
                                                    break;
                                                case 3:
                                                    echo "On-Process";
                                                    break;
                                                case 4:
                                                    echo "Declined";
                                                    break;

                                            }
                                            ?></td>
                                            <td><?php echo $row['comment']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="update_student.php?edit=<?php echo $row['id']; ?>"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#id<?php echo $id ?>">Delete</a>
                                                </div>
                                            </td>

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
                                                            <a href="all-student.php?delete=<?php echo $id ?>"
                                                                class="btn btn-primary">Delete Agent</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </tr>
                                    <?php }
                                }
                                ?>
                            </tbody>
                        </table>

                        <?php if (isset($_GET['delete'])) {
                            $delete_id = $_GET['delete'];

                            $delete_sql = "DELETE FROM newstudents WHERE id = '$delete_id'";
                            $delete = mysqli_query($db, $delete_sql);

                            if ($delete) {
                                header('location:all-student.php');
                            } else {
                                echo "<div class='alert alert-danger mt-2'>An Error Occurred While Deleting!</div>";
                            }
                        } ?>

                        <!-- Pagination -->
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
                                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                    <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                                        <a class="page-link"
                                            href="?page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($search); ?>"><?php echo $i; ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
} else {
    echo "<div class='alert alert-danger mt-2 text-center'><h1>Only Admin Allowed!</h1></div>";
}
ob_end_flush();
include('dashboard_include/footer.php');
?>