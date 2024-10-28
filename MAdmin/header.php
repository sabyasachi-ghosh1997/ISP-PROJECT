<?php
   include("../connection.php");
   if(!isset($_SESSION["adminId"])){
     header("location:adminlogin.php");
     die();
   }
   $qry="select * from admindetails where Id='".$_SESSION["adminId"]."'";
    $qryresult=mysqli_query($con,$qry);
    if($r=mysqli_fetch_array($qryresult)){
        $_SESSION["id"]=$r["Id"];
        $_SESSION["dp"]=$r["dp"];
        $_SESSION["bio"]=$r["bio"];
        $_SESSION["Name"]=$r["Name"];
        $_SESSION["Email"]=$r["Email"];
        $_SESSION["PhNo"]=$r["PhNo"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../backend_assets/css/main.css" rel="stylesheet"></head>

    <title>Document</title>
</head>
<body>
<div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src" style="margin-bottom:20px;">
                <a class="navbar-brand" href="../index.php">
                    <img src="../backend_assets/images/logo.png" alt="logo" width="30" height="24">
                    <span>CENTURYLINK</span>
                </a>
                </div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    
            <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                    </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="70px" class="rounded-circle" src="<?php echo "../backend_assets/images/Admin/".$r["dp"]; ?>" alt="dp">
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <button type="button" tabindex="0" class="dropdown-item">
                                            <a href="admineditpro.php" style="text-decoration:none;">Edit Profile</a>
                                            </button>
                                            <button type="button" tabindex="0" class="dropdown-item">
                                            <a href="../logout.php" style="text-decoration:none;">Change Password</a>
                                            </button>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <button type="button" tabindex="0" class="dropdown-item" href="../logout.php">
                                                <a href="adminlogout.php" style="text-decoration:none;">Logout</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                      <?php echo $_SESSION["Name"];?>
                                    </div>
                                    <div class="widget-subheading">
                                    <?php echo $_SESSION["bio"];?>
                                    </div>
                                </div>     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
</body>
</html>