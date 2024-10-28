<?php
include("../connection.php");
session_start();
  if(isset($_REQUEST["submit"])){
    $PhNo=$_REQUEST["PhNo"];
    $Password=$_REQUEST["Password"];

    $qry="select * from admindetails where PhNo='".$PhNo."' AND Password='".$Password."'";

    $qryresult=mysqli_query($con,$qry);
    if($r=mysqli_fetch_array($qryresult)){
        $_SESSION["adminId"]=$r["Id"];
      header("location:index.php");
    }
    else
    {
        $Msg="<h5 class='MessageError'>Invalid Details</h5>";
    }
  }
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
    
<!-- login-register31:27-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login Register || limupa - Digital Products Store eCommerce Bootstrap 4 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
        <!-- Material Design Iconic Font-V2.2.0 -->
        <link rel="stylesheet" href="../frontend_assets/css/material-design-iconic-font.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../frontend_assets/css/font-awesome.min.css">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="../frontend_assets/css/fontawesome-stars.css">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="../frontend_assets/css/meanmenu.css">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="../frontend_assets/css/owl.carousel.min.css">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="../frontend_assets/css/slick.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="../frontend_assets/css/animate.css">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="../frontend_assets/css/jquery-ui.min.css">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="../frontend_assets/css/venobox.css">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="../frontend_assets/css/nice-select.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="../frontend_assets/css/magnific-popup.css">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="../frontend_assets/css/bootstrap.min.css">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="../frontend_assets/css/helper.css">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="../frontend_assets/css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="../frontend_assets/css/responsive.css">
        <!-- Modernizr js -->
        <script src="../frontend_assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            <header>
                <!-- Begin Header Top Area -->
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Top Left Area -->
                            <div class="col-lg-3 col-md-4">
                                <div class="header-top-left">
                                </div>
                            </div>
                            <!-- Header Top Left Area End Here -->
                            <!-- Begin Header Top Right Area -->
                            <div class="col-lg-9 col-md-8">
                                <div class="header-top-right">
                                    
                                </div>
                            </div>
                            <!-- Header Top Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Top Area End Here -->
                <!-- Begin Header Middle Area -->
                <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Logo Area -->
                            <div class="col-lg-3">
                                <div class="logo pb-sm-30 pb-xs-30">
                                    <a href="index.html">
                                        <img src="images/menu/logo/1.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- Header Logo Area End Here -->
                            
                        </div>
                    </div>
                </div>
                <!-- Header Bottom Area End Here -->
                <!-- Begin Mobile Menu Area -->
                <div class="mobile-menu-area d-lg-none d-xl-none col-12">
                    <div class="container"> 
                        <div class="row">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Area End Here -->
            </header>
            <!-- Header Area End Here -->
            <!-- Begin Login Content Area -->
            <div class="page-section mb-60">
                <div class="container d-flex align-items-center justify-content-center" style="margin-left:25%;">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                            <!-- Login Form s-->
                            <form action="#" >
                                <div class="login-form">
                                    <h4 class="login-title">Admin Login</h4>
                                    <div class="page-title-subheading"> 
                                          <?php 
                                            if(isset($Msg))
                                                echo $Msg;
                                            else 
                                                echo "&nbsp;";
                                        ?>
                                        </div>
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Email/Phone Number*</label>
                                            <input class="mb-0" type="text" name="PhNo" placeholder="Email Address">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Password*</label>
                                            <input class="mb-0" type="password" name="Password" placeholder="Password">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                                <input type="checkbox" id="remember_me">
                                                <label for="remember_me">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                            <a href="#"> Forgotten pasward?</a>
                                        </div>
                                        <div class="col-md-12">
                                            <button name="submit" class="register-button mt-0">Login</button>
                                            <button class="register-button mt-0 float-right">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Login Content Area End Here -->
        <!-- Body Wrapper End Here -->
        <!-- jQuery-V1.12.4 -->
        <script src="../frontend_assets/js/vendor/jquery-1.12.4.min.js"></script>
        <!-- Popper js -->
        <script src="../frontend_assets/js/vendor/popper.min.js"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="../frontend_assets/js/bootstrap.min.js"></script>
        <!-- Ajax Mail js -->
        <script src="../frontend_assets/js/ajax-mail.js"></script>
        <!-- Meanmenu js -->
        <script src="../frontend_assets/js/jquery.meanmenu.min.js"></script>
        <!-- Wow.min js -->
        <script src="../frontend_assets/js/wow.min.js"></script>
        <!-- Slick Carousel js -->
        <script src="../frontend_assets/js/slick.min.js"></script>
        <!-- Owl Carousel-2 js -->
        <script src="../frontend_assets/js/owl.carousel.min.js"></script>
        <!-- Magnific popup js -->
        <script src="../frontend_assets/js/jquery.magnific-popup.min.js"></script>
        <!-- Isotope js -->
        <script src="../frontend_assets/js/isotope.pkgd.min.js"></script>
        <!-- Imagesloaded js -->
        <script src="../frontend_assets/js/imagesloaded.pkgd.min.js"></script>
        <!-- Mixitup js -->
        <script src="../frontend_assets/js/jquery.mixitup.min.js"></script>
        <!-- Countdown -->
        <script src="../frontend_assets/js/jquery.countdown.min.js"></script>
        <!-- Counterup -->
        <script src="../frontend_assets/js/jquery.counterup.min.js"></script>
        <!-- Waypoints -->
        <script src="../frontend_assets/js/waypoints.min.js"></script>
        <!-- Barrating -->
        <script src="../frontend_assets/js/jquery.barrating.min.js"></script>
        <!-- Jquery-ui -->
        <script src="../frontend_assets/js/jquery-ui.min.js"></script>
        <!-- Venobox -->
        <script src="../frontend_assets/js/venobox.min.js"></script>
        <!-- Nice Select js -->
        <script src="../frontend_assets/js/jquery.nice-select.min.js"></script>
        <!-- ScrollUp js -->
        <script src="../frontend_assets/js/scrollUp.min.js"></script>
        <!-- Main/Activator js -->
        <script src="../frontend_assets/js/main.js"></script>
    </body>

<!-- login-register31:27-->
</html>
