<?php 
include('login_include/header.php');
session_start();
ob_start();
?>
<h1>Hello World</h1>
<div class="text-center login-logo my-5">
  <a href="index.php"><b>Global Study Contacts</b></a>
</div>

<div class="container fluid">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-12 col-md-5">
        <div class="card shadow-lg border-0 rounded-4 px-2" style="min-height:370px;">
          <div class="card-body text-center">
            <div class="d-flex justify-content-center align-item-center gap-3 mb-3">
            <img class="card-img-top rounded-4 mt-5" src="./dist/img/call_y22jrr.png" alt="Card image cap" style="width:100px;height:100px;" />
            </div>
            <a href="agent_register.php" class="btn btn-primary mt-5">New Agent Registation</a>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-5">
        <div class="card shadow-lg border-0 rounded-4 px-2" style="min-height:370px;">
          <div class="card-body">
            <!-- <h2 class="text-bold text-dark pb-3 text-center">Sign in Here</h2> -->
            <div class="d-flex justify-content-center align-item-center gap-3 mb-3">
              <img src="./dist/AdminLTELogo.png" alt="" style="width:70px;height:70px;">
            </div>
            <!-- Success Message -->
            <?php if (isset($_SESSION['registration_successfull'])) { ?>
              <div class="alert alert-success text-center py-2">
                <?php echo $_SESSION['registration_successfull']; ?>
              </div>
            <?php } ?>

            <!-- Sign-in Form -->
            <form action="" method="post">
              <!-- Email Field -->
              <div class="form-outline mb-4">
                <input type="email" name="email" id="form3Example3" placeholder="E-mail" class="form-control" required />
              </div>

              <!-- Password Field -->
              <div class="form-outline mb-4">
                <input type="password" name="password" id="form3Example4" placeholder="Password" class="form-control" required />
              </div>

              <!-- Submit Button -->
              <button type="submit" name="submit" class="btn btn-primary btn-block mb-4 w-100">
                Sign In
              </button>

              <?php
              if (!empty($_SESSION["id"])) {
                header('location:dashboard.php');
              }

              if (isset($_POST['submit'])) {
                $input_email = $_POST['email'];
                $input_password = md5($_POST['password']);

                $select_user = "SELECT * FROM agents WHERE email = '$input_email'";
                $user_sql = mysqli_query($db, $select_user);

                $count_user = mysqli_num_rows($user_sql);

                if ($count_user < 1) {
                  echo "<div class='alert alert-danger mt-2 text-center'>No Email Found!</div>";
                } else {
                  while ($row = mysqli_fetch_assoc($user_sql)) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['image'] = $row['image'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $password = $row['password'];
                    $_SESSION['phone'] = $row['phone'];
                    $_SESSION['company'] = $row['company'];
                    $_SESSION['year'] = $row['year'];
                    $_SESSION['designation'] = $row['designation'];
                    $_SESSION['status'] = $row['status'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['joining'] = $row['joining'];

                    if ($input_password == $password && $_SESSION['status'] == 1) {
                      header('location:dashboard.php');
                    } else if ($input_password == $password && $_SESSION['status'] != 1) {
                      echo "<div class='alert alert-danger mt-2 text-center'>Your Account is Not Verified. Please Contact Administrator.</div>";
                    } else {
                      echo "<div class='alert alert-danger mt-2 text-center '>Wrong Password!</div>";
                    }
                  }
                }
              }
              ?>

              <!-- Forgot Password & Register Links -->
              <div class="text-center mt-4">
                <p class="mb-1">
                  <a href="forgot-password.php">I forgot my password</a>
                </p>
                <p class="mb-0">
                  <a href="register.php" class="text-center">Register a new membership</a>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

<?php 
ob_end_flush();
include('login_include/footer.php'); 
?>
























