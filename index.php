<?php include('login_include/header.php');
session_start();


$defaultUser = "bilash@gmail.com";
$defaultPass = "123456789";
?>
<?php ob_start(); ?>
<!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>


      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" value="<?php echo $defaultUser ?>" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" value="<?php echo $defaultPass ?>" placeholder="Password">
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
            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <?php

        
        if(!empty($_SESSION["id"])){
          header('location:dashboard.php');
        }
      
        if (isset($_POST['submit'])) {
          $input_email    = $_POST['email'];
          $input_password = md5($_POST['password']);

          $select_user = "SELECT * FROM agents WHERE email = '$input_email'";
          $user_sql = mysqli_query($db, $select_user);

          $count_user = mysqli_num_rows($user_sql);

          if ($count_user < 1) {
            echo "<div class='alert alert-danger mt-2'>No Email Found!</div>";
          } else {

              
            while ($row = mysqli_fetch_assoc($user_sql)) {
              $_SESSION['id']           = $row['id'];
              $_SESSION['image']        = $row['image'];
              $_SESSION['name']         = $row['name'];
              $_SESSION['email']        = $row['email'];
              $password                 = $row['password'];
              $_SESSION['phone']        = $row['phone'];
              $_SESSION['company']      = $row['company'];
              $_SESSION['year']         = $row['year'];
              $_SESSION['designation']  = $row['designation'];
              $_SESSION['status']       = $row['status'];
              $_SESSION['role']         = $row['role'];
              $_SESSION['joining']      = $row['joining'];

              if ($input_password == $password) {
                header('location:dashboard.php');
              } else {
                echo "<div class='alert alert-danger mt-2'>Wrong Password!</div>";
              }

            }

          }
        }
      
      ?>

      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

  <?php
    ob_end_flush();
  ?>
<!-- /.login-box -->
<?php include('login_include/footer.php') ?>
