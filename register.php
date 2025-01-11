<?php 
include('login_include/header.php');
ob_start();
?>


<div class="login-logo mt-5">
    <a href="index.php" class="text-center">
      <b>Global Study Contacts</b>
    </a>
  </div>

<div class="card" style="width:365px;margin:0 auto;">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Full name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="confirm_password" class="form-control" placeholder="Retype password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <?php
        if (isset($_POST['submit'])) {
          $name = htmlspecialchars($_POST['name']);
          $email = htmlspecialchars($_POST['email']);
          $password = htmlspecialchars($_POST['password']);
          $confirm_password = htmlspecialchars($_POST['confirm_password']);

          // gscagents@gmail.com

          if ($password == $confirm_password) {
            $to = 'sadia.cigsc@gmail.com';
            $subject = "New Registration Request";
            $message = "Name: $name\Email: $email\Password: $password";
            $headers = "From: $email";

            if (mail($to, $subject, $message, $headers)) {
              echo "<div class='alert alert-success mt-2'>** Your request has been sent. Thank you! **</div>";
            } else {
              echo "<div class='alert alert-danger mt-2'>** Something went WRONG!! Try again later. **</div>";
            }
          } else {
            echo "<div class='alert alert-danger mt-2'>Password Doesn't Match!</div>";
          }
        }
      ?>

      <a href="index.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<?php 
ob_end_flush();
include('login_include/footer.php'); 
?>
