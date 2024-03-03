<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Passport</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/themes/light/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/themes/light/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/themes/light/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="/themes/light/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/themes/light/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="/themes/light/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/themes/light/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/themes/light/assets/images/logo-mini.svg" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="/"><img src="/themes/light/assets/images/logo.svg" alt="logo" /></a>
                <a class="sidebar-brand brand-logo-mini" href="/"><img src="/themes/light/assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <ul class="nav">
                <?php

                use models\User;

                if (isset($_SESSION['user'])) : ?>
                    <li class="nav-item profile">
                        <div class="profile-desc">
                            <div class="profile-pic">
                                <div class="count-indicator">
                                    <img class="img-xs rounded-circle " src="<?= $_SESSION['user']['img'] ?>" alt="">
                                    <span class="count bg-success"></span>
                                </div>
                                <div class="profile-name">
                                    <h5 class="mb-0 font-weight-normal"><?= $_SESSION['user']['name'] ?> <?= $_SESSION['user']['surname'] ?></h5>
                                    <span><?= $_SESSION['user']['city'] ?></span>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>
                <li class="nav-item nav-category">
                    <span class="nav-link">Navigation</span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="/">
                        <span class="menu-icon">
                            <i class="mdi mdi-file-document-box"></i>
                        </span>
                        <span class="menu-title">Головна</span>
                    </a>
                </li>
                <?php if (User::isAdmin()) : ?>
                    <li class="nav-item menu-items">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-icon">
                                <i class="mdi mdi-laptop"></i>
                            </span>
                            <span class="menu-title">Адмін сторінка</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="/admin/passports">Паспорти</a></li>
                                <li class="nav-item"> <a class="nav-link" href="/admin/pass_conf">Підтвердження</a></li>
                                <li class="nav-item"> <a class="nav-link" href="/admin/zak_passports">Закордонні паспорти</a></li>
                                <li class="nav-item"> <a class="nav-link" href="/admin/zak_pass_conf">Підтвердження закордонного</a></li>
                            </ul>
                        </div>
                    </li>
                <? endif; ?>
                <?php if (!User::isAdmin()) : ?>
                    <li class="nav-item menu-items">
                        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                            <span class="menu-icon">
                                <i class="mdi mdi-contacts"></i>
                            </span>
                            <span class="menu-title">Подати заявку</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="/passport/grom"> Паспорт громадянина </a></li>
                                <li class="nav-item"> <a class="nav-link" href="/passport/zakor"> Закордонний паспорт </a></li>
                            </ul>
                        </div>
                    </li>
                <? endif; ?>
                <?php if (!User::isAdmin()) : ?>
                    <li class="nav-item menu-items">
                    <a class="nav-link" href="/travel/traveled">
                        <span class="menu-icon">
                            <i class="mdi mdi-airplane"></i>
                        </span>
                        <span class="menu-title">Подорожі</span>
                    </a>
                </li>
                <? endif; ?>
        </nav>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="/themes/light/assets/images/logo-mini.svg" alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-settings d-none d-lg-block">
                            <a class="nav-link" href="/">
                                <i class="mdi mdi-view-grid"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <?php if (isset($_SESSION['user'])) : ?>
                                    <div class="navbar-profile">
                                        <img class="img-xs rounded-circle" src="<?= $_SESSION['user']['img'] ?>" alt="">
                                        <p class="mb-0 d-none d-sm-block navbar-profile-name"><?= $_SESSION['user']['name'] ?> <?= $_SESSION['user']['surname'] ?></p>
                                        <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                    </div>
                                <?php else : ?>
                                    <div class="navbar-profile">
                                        <img class="img-xs rounded-circle" src="/themes/light/assets/images/faces/face15.jpg" alt="">
                                        <p class="mb-0 d-none d-sm-block navbar-profile-name">Увійдіть в акаунт</p>
                                        <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                    </div>
                                <?php endif; ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0">Profile</h6>
                                <div class="dropdown-divider"></div>
                                <?php if (isset($_SESSION['user'])) : ?>
                                    <a class="dropdown-item preview-item" href="/user/logout">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi-logout text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject mb-1">Log out</p>
                                        </div>
                                    </a>
                                <?php else : ?>
                                    <a class="dropdown-item preview-item" href="/user/login">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi-login-variant text-success"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject mb-1">Login</p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item preview-item" href="/user/registration">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi mdi-lock-open-outline text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject mb-1">Registration</p>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <main class="main-panel">
                <?= $content ?>
            </main>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/themes/light/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/themes/light/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="/themes/light/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="/themes/light/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="/themes/light/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/themes/light/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/themes/light/assets/js/off-canvas.js"></script>
    <script src="/themes/light/assets/js/hoverable-collapse.js"></script>
    <script src="/themes/light/assets/js/misc.js"></script>
    <script src="/themes/light/assets/js/settings.js"></script>
    <script src="/themes/light/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/themes/light/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
</body>

</html>