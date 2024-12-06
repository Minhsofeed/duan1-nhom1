<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Autima - Car Accessories Shop HTML Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="client/assets/img/favicon.ico">

    <!-- CSS 
    ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="client/assets/css/bootstrap.min.css">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="client/assets/css/owl.carousel.min.css">
    <!--slick min css-->
    <link rel="stylesheet" href="client/assets/css/slick.css">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="client/assets/css/magnific-popup.css">
    <!--font awesome css-->
    <link rel="stylesheet" href="client/assets/css/font.awesome.css">
    <!--ionicons min css-->
    <link rel="stylesheet" href="client/assets/css/ionicons.min.css">
    <!--animate css-->
    <link rel="stylesheet" href="client/assets/css/animate.css">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="client/assets/css/jquery-ui.min.css">
    <!--slinky menu css-->
    <link rel="stylesheet" href="client/assets/css/slinky.menu.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="client/assets/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="client/assets/css/style.css">

    <!--modernizr min js here-->
    <script src="client/assets/js/vendor/modernizr-3.7.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</head>

<body>
    <header class="header_area">
        <!--header top start-->
        <div class="header_top">
            <div class="container">
                <div class="top_inner">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="top_right text-end">
                                <ul>
                                    <?php if (isset($_SESSION['user'])): ?>

                                        <li class="top_links">
                                            <a href="#">
                                                <i class="ion-android-person"></i>
                                                <?php echo ($_SESSION['user']['ho_ten']); ?>
                                                <i class="ion-ios-arrow-down"></i>
                                            </a>
                                            <ul class="dropdown_links">
                                                <li><a href="?act=check-out">Thanh Toán</a></li>
                                                <li><a href="?act=profiles">Tài Khoản</a></li>
                                                <li><a href="?act=cart">Giỏ Hàng</a></li>
                                                <li>
                                                    <form action="?act=logout" method="post">
                                                        <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php else: ?>
                                        <li class="top_links">
                                            <a href="?act=signin">
                                                <i class="ion-android-person"></i> Đăng Nhập
                                            </a>
                                        </li>
                                        <li class="top_links">
                                            <a href="?act=register">
                                                <i class="ion-android-person"></i> Đăng Ký
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header_middle">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-3 col-md-6">
                        <div class="logo">
                            <a href="index.php"><img src="client/assets/img/logo/g1.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="middel_right d-flex justify-content-center">
                            <div class="search-container">
                                <form action="" method="GET">
                                    <div class="search_box">
                                        <input name="act" placeholder="Tìm kiếm sản phẩm..." type="hidden" value="search-product">
                                        <input name="keyword" placeholder="Tìm kiếm sản phẩm..." type="text" required>
                                        <button type="submit">
                                            <i class="ion-ios-search-strong"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                    </div>
                </div>
            </div>
        </div>
    </header>
  