<?php
global $db;
ob_start();
include('dashboard_include/header.php');
include('dashboard_include/top_header.php');
include('dashboard_include/sidebar.php');

$selectedValue = "10"; // Initialize variable
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selectedValue'])) {
    $selectedValue = $_POST['selectedValue']; // Store selected value in PHP variable
}

$limit = $selectedValue; // Number of rows per page
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1; // Current page number
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

if (isset($_POST['search_coun_btn'])) {
    echo $country_search = $_POST['country_search'];
     $agents_query = "SELECT * FROM agents WHERE status = 2 AND role = 2 AND country = '$country_search' ORDER BY id DESC";
     $agents_result = mysqli_query($db, $agents_query);
 }

?>

<?php if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) { ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Inactive Agents</h1>
                    </div>
                    <div class="col-sm-6">
                    <div class="row">
                            <div class="col-md-6">
                                <form action="" method="POST">
                                    <div class="input-group">
                                        <select name="country_search" class="form-control" required>
                                            <option value="">Select Country</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="Brunei">Brunei</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Eswatini">Eswatini</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran">Iran</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="North Korea">North Korea</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palestine">Palestine</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Korea">South Korea</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syria">Syria</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                        <button name="search_coun_btn" type="submit"
                                            class="btn btn-success btn-sm">Search</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form action="" method="GET">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search Here"
                                            value="<?php echo htmlspecialchars($search); ?>">
                                        <button type="submit" name="search_btn" class="input-group-text">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                                    <th>Country</th>
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
                                        $country = $row['country'];
                                        $phone = $row['phone'];
                                        $company = $row['company'];
                                        $joining = $row['joining'];
                                        $status = $row['status'];
                                        $role = $row['role'];
                                        $add_std = $row['add_std'];
                                        ?>
                                        <tr>
                                            <td><a href="agent-student.php?email=<?php echo $email; ?>" target="_blank"><i
                                                        class="fas fa-eye"></i></a></td>
                                            <td>
                                                <?php if (empty($image)) { ?>
                                                    <img src="dist/img/avatar5.png" width="40px">
                                                <?php } else { ?>
                                                    <img src="dist/img/agent_image/<?php echo $image; ?>" width="50px" alt="">
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $company; ?></td>
                                            <td><a href="view_agent.php?id=<?php echo $id; ?>" target="_blank"><i
                                                        class="fas fa-eye pr-2"></i><?php echo $name; ?></a></td>
                                            <td><?php echo $phone; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $country; ?></td>
                                            <td><?php echo $joining; ?></td>
                                            <td><?php echo ($status == 1) ? "<div class='badge bg-success'>Active</div>" : "<div class='badge bg-secondary'>Inactive</div>"; ?>
                                            </td>
                                            <td><?php echo ($role == 1) ? "<div class='badge bg-success'>Admin</div>" : "<div class='badge bg-warning'>Agent</div>"; ?>
                                            </td>
                                            <td><?php echo ($add_std == 0) ? "<div class='badge bg-success'>Complete</div>" : "<div class='badge bg-danger'>Incomplete</div>"; ?>
                                            </td>
                                            <?php if ($_SESSION['role'] == 1) { ?>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="update_agent.php?edit=<?php echo $id ?>"
                                                            class="btn btn-primary btn-sm">Edit</a>
                                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                                            data-target="#id<?php echo $id ?>">Delete</a>
                                                    </div>
                                                </td>
                                            <?php } ?>
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="id<?php echo $id ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete Agent</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure to delete <strong><?php echo $name; ?></strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <a href="inactive_agent.php?delete=<?php echo $id ?>"
                                                                class="btn btn-primary">Delete Agent</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="11">There are no Active Agents!</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <?php if (isset($_GET['delete'])) {
                            $delete_id = $_GET['delete'];
                            $delete_sql = "DELETE FROM agents WHERE id = '$delete_id'";
                            $delete = mysqli_query($db, $delete_sql);
                            if ($delete) {
                                header('location:inactive_agent.php');
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
                                    <li class="page-item <?php if ($i == $page)
                                        echo 'active'; ?>">
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