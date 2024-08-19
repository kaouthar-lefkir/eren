<?php
// Define the current page based on the file name
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg bg-white fixed-top py-3">
    <div class="container d-flex text-uppercase fw-light">
        <a class="navbar-brand" href="#">
            <img src="./img/logo-black.png" alt="Logo">
        </a>
        <div class="collapse navbar-collapse" id="navbarmenue">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link hover <?php if ($current_page == 'index.php') echo 'navactive'; ?>" href="/eren">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover <?php if ($current_page == 'filter.php') echo 'navactive'; ?>" href="./filter.php">
                        Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover <?php if ($current_page == 'blog.php') echo 'navactive'; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pages
                    </a>
                    <ul class="dropdown-menu">
                        <li class="container my-4">
                            <div class="row">
                                <div class="col-md-3 border-end">
                                    <h6 class="pb-4 fs-6"><span class="text-primary ">|</span> Blog</h6>
                                    <a class="fs-7 ps-1 <?php if ($current_page == 'blog.php') echo 'navactive'; ?>" href="./blog.php">Blog</a><hr>
                                </div>
                                <div class="col-md-3 border-end">
                                    <h6 class="pb-4 fs-6"><span class="text-primary ">|</span> Products Elements</h6>
                                    <ul style="list-style:none;" class="ps-1">
                                        <li><a class="fs-7 <?php if ($current_page == 'details.php') echo 'navactive'; ?>" href="./details.php">Products Details</a></li><hr>
                                        <li><a class="fs-7" href="#">Shopping Cart</a></li><hr>
                                    </ul>
                                </div>
                                <div class="col-md-3 border-end">
                                    <h6 class="pb-4 fs-6"><span class="text-primary ">|</span> Theme Elements</h6>
                                    <ul style="list-style:none;" class="ps-1">
                                        <li><a class="fs-7" href="#">Skills</a></li><hr>
                                        <li><a class="fs-7" href="#">Test & Testimonials</a></li><hr>
                                        <li><a class="fs-7" href="#">Error</a></li><hr>
                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    <img src="./img/mega-menu.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover <?php if ($current_page == 'about.php') echo 'navactive'; ?>" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover <?php if ($current_page == 'contact.php') echo 'navactive'; ?>" href="./contact.php">Contact US</a>
                </li>
            </ul>
        </div>
        <a href="#" class="hover"><i class="bi bi-cart-fill px-3" style="color:black;"></i></a>
        <a href="#" class="hover"><i class="bi bi-search" style="color:black;"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarmenue">
            <span class="navbar-toggler-icon"><i class="bi bi-list" style="color:black"></i></span>
        </button>
    </div>
</nav>
