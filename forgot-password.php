<?php 
include('login_include/header.php');
session_start();
ob_start();
?>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="company" class="form-control" placeholder="Company Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <?php
      
        if (isset($_POST['submit'])) {
          $input_email   = $_POST['email'];
          $input_company = $_POST['company'];

          $select_user = "SELECT * FROM agents WHERE email = '$input_email' AND company = '$input_company'";
          $user_sql = mysqli_query($db, $select_user);

          $count_user = mysqli_num_rows($user_sql);


          if ($count_user < 1) {
            echo "<div class='alert alert-danger mt-2'>No Email or Company Found!</div>";
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
  
              header('location:recover-password.php');
  
            }

            }
          }
      
      ?>




      <p class="mt-3 mb-1">
        <a href="index.php">Login</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php 
ob_end_flush();
include('login_include/footer.php'); 
?>