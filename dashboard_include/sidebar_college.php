<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
        <img src="dist/AdminLTELogo.png" alt="GSC Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Institute Information</span>
    </a>

    

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- SidebarSearch Form -->
        <div class="form-inline mt-2">
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

        <?php
        include './database/db.php';
        $country = "SELECT * FROM country_list ";
        $country_query = mysqli_query($db, $country);
        $country_list = mysqli_num_rows($country_query);


        while ($_row = mysqli_fetch_assoc($country_query)) { ?>

                <li class="nav-item ">
                    <a href="?id=<?php echo $_row['id']; ?> " class="nav-link">
                        <!-- <img class="w-2 h-2 rounded-full" src="https://images.pexels.com/photos/53957/striped-core-butterflies-butterfly-brown-53957.jpeg?auto=comp" alt=""> -->
                        <?php echo $_row['country_name']; ?>
                    </a>
                </li>

                <?php } ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


