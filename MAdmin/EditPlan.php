<?php
include("../connection.php");
session_start();
   if(!isset($_SESSION["id"])){
     header("location:adminlogin.php");
     die();
   }

   if(isset($_REQUEST['btn_Update']))
{
    $fn=$_FILES["FU_Photo"]["name"];
    $size=$_FILES["FU_Photo"]["size"];
    $type=$_FILES["FU_Photo"]["type"];
    $spath=$_FILES["FU_Photo"]["tmp_name"];

    $Title=$_REQUEST["txt_Title"];
    $Description=$_REQUEST["txt_Description"];
    $Link=$_REQUEST["txt_Link"];
    $AudioId=$_REQUEST["id"];

    if(strlen($fn)==0)
    {
        $qry="UPDATE tbl_audio SET Title='$Title', Description='$Description' , Link='$Link' WHERE AudioId=$AudioId";
        mysqli_query($con,$qry);
    }
    else
    {
        //UploadFile
        $id= $con->insert_id;
        $ext=substr($fn, strripos($fn,"."));
        $dpath="../PhotoVideo/".$id.$ext;
        move_uploaded_file($spath, $dpath);
    
        $qry="UPDATE tbl_audio SET Title='$Title', Description='$Description' , Link='$Link', Photo='PhotoAudio/".$id.$ext."' WHERE AudioId = $AudioId";
        mysqli_query($con, $qry);
    }

    $Msg="<h2 class='MessageNormal'>Successfully Updated.</h2>";
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
                    <?php 
                        $qry="SELECT * FROM plan where PlanId=".$_REQUEST["id"];
                        $tbl=mysqli_query($con,$qry);
                        while ($row=mysqli_fetch_array($tbl)) 
                        {
                        ?>
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    
                                    <div>Edit Plan 
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
              <img src="../backend_assets/images/dp.png" class="img-thumbnail" alt="dp" style="width:100px; height:100px;">
              <input id="file-input" type="file" name="FU_Photo"  style="display:none";/>
            </label>  
              </div>
                </center>
                </div>
                </div>
                    <div class="card-body"><h5 class="card-title">Enter Plan Details</h5>
                        <div class="">
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Plan Name</label>
                                <input name="txt_PlanName" id="txt_Title"  type="text" placeholder="Enter Plan Name" type="text" value="<?php echo $row['PlanName']; ?>" class="form-control" required/>
                            </div>
                            

                        <div class="position-relative form-group">
                        <label class="">Duration</label>
                        <select name="DDL_Duration"  class="form-control" >
                        <option value="<?php echo $row['Duration']; ?>" selected><?php echo $row['Duration']; ?></option>
                            <option value="1 Month">1 Month</option>
                            <option value="2 Months">2 Months</option>
                            <option value="3 Months">3 Months</option>
                            <option value="6 Months">6 Months</option>
                            <option value="1 Year">1 Year</option>
                        </select>
                       </div>

                       <div class="position-relative form-group">
                        <label class="">Speed</label>
                        <select name="DDL_Speed"  class="form-control" >
                            <option value="Up to 20 Mbps">Up to 20 Mbps</option>
                            <option value="Up to 40 Mbps">Up to 40 Mbps</option>
                            <option value="Up to 100 Mbps">Up to 100 Mbps</option>
                            <option value="Up to 200 Mbps">Up to 200 Mbps</option>
                            <option value="Up to 300 Mbps">Up to 300 Mbps</option>
                            <option value="Up to 1 Gbps">Up to 1 Gbps</option>
                        </select>
                       </div>
                        <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Price</label>
                                <input name="txt_Price" id="txt_Link"  type="text" class="form-control" required>
                            </div>
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Description</label>
                                <input name="txt_Description" id="txt_Description"  type="text" class="form-control" required>
                            </div>
                            <button name="btn_Submit"  onclick="return IsDelete();" class="mt-1 btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </form>        
</div>
<?php
}
?>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
</div>
</div>
<script type="text/javascript" src="../backend_assets/scripts/main.js"></script>
</body>
</html>
