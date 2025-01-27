<?php
// Include necessary files
include('dashboard_include/header.php');
ob_start();
include('dashboard_include/top_header.php');
include('dashboard_include/sidebar.php');

// Check user role
if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) {
    // Determine current page and set rows per page
    $rows_per_page = 6;
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($current_page - 1) * $rows_per_page;

    // Fetch the total number of rows
    $total_rows_query = "SELECT COUNT(*) AS total FROM newstudents";
    $result = mysqli_query($db, $total_rows_query);
    $total_rows = mysqli_fetch_assoc($result)['total'];

    // Calculate total pages
    $total_pages = ceil($total_rows / $rows_per_page);

    // Fetch data for the current page
    $agents_query = mysqli_query($db, "SELECT * FROM newstudents ORDER BY id DESC LIMIT $rows_per_page OFFSET $offset");
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
                                    echo "<tr><td colspan='30'>There are no Active Students!!</td></tr>";
                                } else {
                                    while ($row = mysqli_fetch_assoc($agents_query)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="view-student.php?edit=<?php echo $row['id']; ?>"><i class="fas fa-eye"></i></a>
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
                                            <td><?php echo $row['email']; ?></td>
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
                                            <td><?php echo $row['destination']; ?></td>
                                            <td><?php echo $row['university']; ?></td>
                                            <td><?php echo $row['program']; ?></td>
                                            <td><?php echo $row['subject']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td><?php echo $row['comment']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="update_student.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#id<?php echo $row['id']; ?>">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- Pagination -->
                        <nav>
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                    <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
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
    <?php
} else {
    echo "<div class='alert alert-danger mt-2 text-center'><h1>Only Admin Allowed!</h1></div>";
}
ob_end_flush();
include('dashboard_include/footer.php');
?>
