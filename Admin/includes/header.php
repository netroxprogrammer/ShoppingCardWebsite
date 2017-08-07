<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Admin Dashboard</title>
 <link href="includes/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="includes/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="includes/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="includes/css/font-awesome.min.css" rel="stylesheet" />
    <!-- full calendar css-->
    <link href="includes/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="includes/assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="includes/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="includes/css/owl.carousel.css" type="text/css">
    <link href="includes/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="includes/css/fullcalendar.css">
    <link href="includes/css/widgets.css" rel="stylesheet">
    <link href="includes/css/style.css" rel="stylesheet">
    <link href="includes/css/style-responsive.css" rel="stylesheet" />
    <link href="includes/css/xcharts.min.css" rel=" stylesheet">
    <link href="includes/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="includes/js/html5shiv.js"></script>
    <script src="includes/js/respond.min.js"></script>
    <script src="includes/js/lte-ie7.js"></script>
    <![endif]-->
</head>

<body>
<!-- container section start -->
<section id="container" class="">
  <header class="header dark-bg">
        <div class="toggle-nav">
            <div class="icon-reorder tooltips" data-original-title="Welcome" data-placement="bottom"><i class="icon_menu"></i></div>
        </div>
   <a href="index.html" class="logo">Welcome <span class="lite">Admin</span></a>
   <div class="top-nav notification-row">
            <!-- notificatoin dropdown start-->
            <ul class="nav pull-right top-menu">

                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="includes/img/profile.png">
                            </span>
                        <span class="username"><?php  echo $_SESSION["admin_Email"] ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>

                        <li>
                            <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!-- notificatoin dropdown end-->
        </div>
    </header>
   <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">
                <li class="active">
                    <a class="" href="index.html">
                        <i class="icon_house_alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon_desktop"></i>
                        <span>Products</span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
                    <ul class="sub">

                        <li><a class="" href="index.php">Add Product</a></li>
                        <li><a class="" href="ViewProducts.php">View Product</a></li>
                        <li><a class="" href="addCategories.php">Add Categories</a></li>
                        <li><a class="" href="viewCategories.php">View Categories</a></li>
                        <li><a class="" href="viewSubCategories.php">View Sub Categories</a></li>
                        <li><a class="" href="Users.php">View Users</a></li>
                        <li><a class="" href="TotalStack.php">Total Stock</a></li>
                        <li><a class="" href="checkStock.php">Count Selling</a></li>
                        <li><a class="" href="ViewLogo.php">View Logo</a></li>
                    </ul>
                </li>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="row">