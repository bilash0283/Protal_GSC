<?php include('login_include/header.php') ?>
<?php 
session_start();
ob_start(); 
?>
  <?php
  
  if ($_SESSION['role']) { ?>
    <!-- /.login-logo -->
    <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <?php

        if (isset($_POST['submit'])) {
          $input_password         = md5($_POST['password']);
          $input_confirm_password = md5($_POST['confirm_password']);
          $email                  = $_SESSION['email'];

          if ($input_password == $input_confirm_password) {

            $agent_insert = "UPDATE agents SET password = '$input_password' WHERE email = '$email'";
        
                  $agent_sql = mysqli_query($db, $agent_insert);
        
                  if ($agent_sql){
                  header('location:index.php');
                  } else {
                    echo "<div class='alert alert-danger mt-2'>An Error Occured!</div>";
                  }
            
          } else {
            echo "<div class='alert alert-danger mt-2'>Password Doesn't Match!</div>";
          }
          
        }

      ?>

      <p class="mt-3 mb-1">
        <a href="index.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

  <?php } else {
   echo "<div class='alert alert-danger mt-2'>No USER Found!</div>";
  }
  
  ?>


  
<?php
    ob_end_flush();
   ?>

<?php include('login_include/footer.php') ?>

