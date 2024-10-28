<?php
include("../connection.php");
session_start();
   if(!isset($_SESSION["adminId"])){
     header("location:adminlogin.php");
     die();
   }

   if(isset($_REQUEST['btn_Submit']))
   {
       $fn=$_FILES["FU_dp"]["name"];
       $size=$_FILES["FU_dp"]["size"];
       $type=$_FILES["FU_dp"]["type"];
       $spath=$_FILES["FU_dp"]["tmp_name"];
   
       if(strlen($fn)==0)
       {
           $Update="UPDATE admindetails SET bio='".$_REQUEST["txt_bio"]."', Name='".$_REQUEST["txt_Name"]."', Email='".$_REQUEST["txt_Email"]."',PhNo='".$_REQUEST["txt_PhNo"]."' where Id='".$_SESSION["adminId"]."'";
           mysqli_query($con,$Update);
       }
       else
       {
           //UploadFile
           $id= $con->insert_id;
           $ext=substr($fn, strripos($fn,"."));
           $dpath="../backend_assets/images/Admin/".$id.$ext;
           move_uploaded_file($spath, $dpath);
       
           $Update="UPDATE admindetails SET dp='".$id.$ext."', bio='".$_REQUEST["txt_bio"]."', Name='".$_REQUEST["txt_Name"]."', Email='".$_REQUEST["txt_Email"]."',PhNo='".$_REQUEST["txt_PhNo"]."' where Id='".$_SESSION["adminId"]."'";
           mysqli_query($con,$Update);
       }
   
       $Msg="<h2 class='MessageNormal'>Successfully Updated.</h2>";
       header("location:admineditpro.php");
   }
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Analytics Dashboard - This is an example dashboard created using build-in elements and components.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
<link href="../backend_assets/css/main.css" rel="stylesheet"></head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php include("header.php") ?>
        <div class="ui-theme-settings">
            <div class="theme-settings__inner">
                <div class="scrollbar-container">
                </div>
            </div>
        </div>
        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
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
                <?php include("menu.php"); ?>
                </div>
                <div class="app-main__outer">
                    <form method="post" enctype="multipart/form-data"> 
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    
                                    <div>Edit Profile
                                        <div class="page-title-subheading"> 
                                          <?php 
                                            if(isset($Msg))
                                                echo $Msg;
                                            else 
                                                echo "&nbsp;";
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>            
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                <div class="main-card mb-2 card" style="width: 25rem;">
                <div class="card-body"><h5 class="card-title">Choose Photo</h5>
                <center>
              <div class="col-4 image-upload pb-2">
              <label for="file-input">
              <img src="<?php echo "../backend_assets/images/Admin/".$r["dp"]?>" class="img-thumbnail" alt="dp" width="100px" height="100px">
              <input id="file-input" type="file" name="FU_dp"  style="display:none";/>
            </label>  
              </div>
                </center>
                </div>
                </div>
                    <div class="card-body"><h5 class="card-title">Re-Enter Details For Update</h5>
                        <div class="">
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Name</label>
                                <input name="txt_Name" id="txt_Title" value="<?php echo $r["Name"]; ?>" type="text" class="form-control" required/>
                            </div>
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Bio</label>
                                <input name="txt_bio" id="txt_Description" value="<?php echo $r["bio"]; ?>" type="text" class="form-control" required>
                            </div>
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Email</label>
                                <input name="txt_Email" id="txt_Link" value="<?php echo $r["Email"]; ?>" type="text" class="form-control" required>
                            </div>
                             <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Phone Number</label>
                                <input name="txt_PhNo" id="txt_Link" value="<?php echo $r["PhNo"]; ?>" class="form-control" required>
                            </div>
                            <button name="btn_Submit"  onclick="return IsDelete();" class="mt-1 btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </form>        
</div>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
</div>
</div>
<script type="text/javascript" src="../backend_assets/scripts/main.js"></script>
</body>
</html>
