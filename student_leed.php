<?php
include('login_include/header.php');
include('./database/db.php');
ob_start();
$successfull = null;
?>

<?php
// Success message
if (isset($_GET['message'])) {
    $mes = $_GET['message'];

    print_r($_GET);
}
?>


<!-- Main content -->
<section class="py-3">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="container fluid">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card card-primary">
                        <div class="card-header top-fixed">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                                <img src="./dist/AdminLTELogo.png" alt="" class="img-fluid"
                                    style="width:65px;height:65px;">
                                <p class="card-title ml-3 mt-2">Let's help you study abroad and settle. Please fill in
                                    the following
                                    details and one of our specialists will contact you soon!</p>
                            </div>
                        </div>

                        <!-- <div class='alert alert-success mt-2 text-center'></div> -->
                        
                        <div class="card-body">
                            <div>
                                <!-- input file start  -->
                                <div class="form-group">
                                    <label for="inputName">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="inputName" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputName"> Phone Number/WhatsApp <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="phone" id="inputName" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputProjectLeader">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="inputProjectLeader" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="inputProjectLeader">Interested Country <span
                                            class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="intre_country[]"
                                                    value="Australia" id="Australia">
                                                <label class="form-check-label" for="Australia">Australia</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="intre_country[]"
                                                    value="Cyprus" id="Cyprus">
                                                <label class="form-check-label" for="Cyprus">Cyprus</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="intre_country[]"
                                                    value="Canada" id="Canada">
                                                <label class="form-check-label" for="Canada">Canada</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="intre_country[]"
                                                    value="Denmark" id="Denmark">
                                                <label class="form-check-label" for="Denmark">Denmark</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="intre_country[]"
                                                    value="Malaysia" id="Malaysia">
                                                <label class="form-check-label" for="Malaysia">Malaysia</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="intre_country[]"
                                                    value="New Zealand" id="Zealand">
                                                <label class="form-check-label" for="Zealand">New Zealand</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" name="intre_country[]" type="checkbox"
                                                    value="UK" id="UK">
                                                <label class="form-check-label" for="UK">UK</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="intre_country[]" type="checkbox"
                                                    value="USA" id="USA">
                                                <label class="form-check-label" for="USA">USA</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="intre_country[]" type="checkbox"
                                                    value="South Korea" id="South Korea">
                                                <label class="form-check-label" for="South Korea">South Korea</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="intre_country[]" type="checkbox"
                                                    value="Sweden" id="Sweden">
                                                <label class="form-check-label" for="Sweden">Sweden</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="intre_country[]" type="checkbox"
                                                    value="Finland" id="Finland">
                                                <label class="form-check-label" for="Finland">Finland</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Last Education Qualification <span
                                            class="text-danger">*</span></label>
                                    <select name="last_qulification" id="inputName" class="form-control">
                                        <option value="">----Select Options----</option>
                                        <option value="SSC / O Level">SSC / O Level</option>
                                        <option value="HSC / A Level">HSC / A Level</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Bachelor">Bachelor</option>
                                        <option value="Master">Master</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pass_year">Passing Year <span class="text-danger">*</span></label>
                                    <input type="number" name="pass_year" id="pass_year" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="gpa">GPA/CGPA <span class="text-danger">*</span></label>
                                    <input type="number" name="gpa" id="gpa" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="language"> Language Score (Ex. IELTS, PTE & Others) </label>
                                    <input type="text" name="language" id="language" class="form-control">
                                </div>
                                <button class="btn btn-success btn-block" type="submit" name="btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<!-- Main content -->




<!-- form sumbmication  -->
<?php

if (isset($_POST['btn'])) {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $last_qualification = $_POST['last_qulification'];
    $pass_year = $_POST['pass_year'];
    $gpa = $_POST['gpa'];
    $language = $_POST['language'];

    if (isset($_POST['intre_country']) && !empty($_POST['intre_country'])) {
        $selected_countries = $_POST['intre_country'];
        $countries_str = implode(", ", $selected_countries);
    } else {
        $countries_str = '';
    }

    $sql = "INSERT INTO student_leed (name, phone, email, interested_country, last_qualification, pass_year, gpa, language_score) VALUES ('$name','$phone','$email','$countries_str','$last_qualification','$pass_year','$gpa','$language')";

    $res = mysqli_query($db, $sql);
    if ($res) {
        header('location:?message = Submit Successful , Thank You!');
    } else {
        echo "data not save";
    }

}
?>

<!--  Form Submission -->



<?php
ob_end_flush();
include('login_include/footer.php');
?>