<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="icon" href="img/logo.webp" type="image/png" sizes="16">
    <meta name="author" content="">
    
    <link rel="icon" href="logo.webp" type="image/png" sizes="16">

    <title>Bakery Online Store</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="css/ingredient.css" type="text/css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-secondary bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                <i class="fa fa-coffee text-warning" aria-hidden="" ></i>
                </div>
                <div class="sidebar-brand-text mx-3 text-warning">Online Bakery <sup>Store</sup></div>
            </div>

            <li class="nav-item">
                <a class="nav-link" href="admin_template.php">
                <i class="fa fa-chart-bar" aria-hidden="true"></i>
                    <span>Dashboard</span></a>
            </li>

        

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                bakery admin
            </div>


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="categories.php">
                <i class="fa fa-list" aria-hidden="true"></i>
                    <span>Categories</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products.php">
                <i class="fa fa-box" aria-hidden="true"></i>
                    <span>Products</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="feedback.php">
                <i class="fa fa-comments" aria-hidden="true"></i>
                    <span>Feedbacks</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="bakers.php">
                <i class="fa fa-users" aria-hidden="true"></i>
                    <span>Bakers</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="contacts.php">
                <i class="fa fa-address-book" aria-hidden="true"></i>
                    <span>Contacts</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="promotions.php">
                <i class="fa fa-bullhorn" aria-hidden="true"></i>
                    <span>Promotions</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="order.php">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span>Orders</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="ingredients.php">
                <i class="fa fa-egg" aria-hidden="true"></i>
                    <span>Ingredients</span></a>
            </li>


            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="feedback.php" role="button" title="Feedback">
                                <i class="fas fa-bell fa-fw"></i>
                            </a>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="contacts.php" role="button" title="Contact">
                                <i class="fas fa-envelope fa-fw"></i>
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin Account</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="admin_logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->