<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard.php" class="brand-link">
    <img src="dist/AdminLTELogo.png" alt="GSC Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Global Study Contacts</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image"><?php


            if ($_SESSION['image'] == '') { ?>
          <img src="dist/img/agent_image/demo.png" class="" width="50px" alt="User Image">
        <?php } else { ?>
          <img src="dist/img/agent_image/<?php echo $_SESSION['image']; ?>" class="" width="50px" alt="User Image">
        <?php }
        ?>
      </div>

      <?php

      if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) { ?>
        <div class="info">
          <a href="profile.php" class="d-block"><?php echo $_SESSION['name']; ?></a>
        </div>
      <?php } else { ?>
        <div class="info">
          <a href="profile.php" class="d-block"><?php echo $_SESSION['company']; ?></a>
        </div>
      <?php }

      ?>

    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fas fa-user"></i>
            <p>
              Profile
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="profile.php" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>My Profile</p>
              </a>
            </li>
          </ul>

          <?php

          if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) {
          ?>

        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fas fa-user-secret"></i>
            <p>
              Agents
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="agent.php" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>All Agents</p>
              </a>
            </li>
            <?php

            if ($_SESSION['role'] == 1) { ?>
              <li class="nav-item">
                <a href="create_agent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Agent</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="active_agent.php" class="nav-link bg-success">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Agent</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="inactive_agent.php" class="nav-link bg-danger">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Agent</p>
                </a>
              </li>
            <?php }
            ?>

          </ul>
        </li>

      <?php  }

      ?>




      <li class="nav-item menu-open">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-user-graduate"></i>
          <p>
            Students
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">

          <?php

          if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) {
          ?>

            <li class="nav-item">
              <a href="all-student.php" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>All Students</p>
              </a>
            </li>
          <?php  }

          ?>

          <?php
          if ($_SESSION['role'] == 2) { ?>

            <li class="nav-item">
              <a href="add-student.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Student</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="student.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Students Status</p>
              </a>
            </li>

          <?php }

          ?>

        </ul>
      </li>

      <?php

      if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) {
      ?>

        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fas fa-user-graduate"></i>
            <p>
              GSC Students
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="gsc-add-student.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Student</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="gsc-student.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Students Status</p>
              </a>
            </li>
          </ul>
        </li>

      <?php  }

      ?>

      <?php
      if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) {
      ?>

        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fas fa-file"></i>
            <p>
              Add Missing File
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="edit-file.php" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Edit Files</p>
              </a>
            </li>
          </ul>

          <?php if ($_SESSION['role'] == 1) { ?>
        <li class="nav-item">
          <a href="gsc-notifications.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>GSC notifications</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="create_country.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Add Country & Info</p>
          </a>
        </li>

    <?php }
        } ?>
    </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>