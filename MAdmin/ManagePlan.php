<?php
include("../connection.php");
session_start();
   if(!isset($_SESSION["id"])){
     header("location:adminlogin.php");
     die();
   }
   if(isset($_REQUEST["did"]))
{
    $id=$_REQUEST["did"];

      
        $qry="DELETE FROM plan WHERE PlanId=$id";
        mysqli_query($con, $qry);
        
        $Msg="<h2 class='MessageNormal'>Successfully Deleted.</h2>";
    }

if(isset($_REQUEST["sid"]))
{
    $id=$_REQUEST["sid"];
    $st=$_REQUEST["st"];
    
    if($st==1)
        $newst=0;
    else
        $newst=1;

    $qry="UPDATE plan SET Status=$newst WHERE PlanId=$id";

    mysqli_query($con, $qry);
    $Msg="<h2 class='MessageNormal'>Status Successfully Changed.</h2>";
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
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div>Manage Plan
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
                                <div class="page-title-actions">                                  
                                    <div class="d-inline-block dropdown">
                                        <a  href="CreatePlan.php" class="btn-shadow  btn btn-info">Add New Plan</a>    
                                    </div>
                                </div>    
                            </div>
                        </div>            
                        <div class="row">
                             
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">
                                      Audio List 

                                    </h5>
                                        <div class="table-responsive">
                                            
                                            <table class="mb-0 table  table-bordered table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th>S.No.</th>
                                                    <th>Photo</th>
                                                    <th>Plan Name</th>
                                                    <th>Price</th>
                                                    <th>Duration</th>
                                                    <th>Speed</th>
                                                    <th>Decription</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>

<?php
$i=1; 
$qry="SELECT * FROM plan";
$tbl=mysqli_query($con,$qry);
while ($row=mysqli_fetch_array($tbl)) {
?>
        <tr>
            <th scope="row"><?php echo $i++; ?></th>
            <td>
                <img src="<?php echo "../backend_assets/images/Plan/".$row["Photo"]; ?>" alt="plan" width="100px">
            </td>
            <td><?php echo $row["PlanName"]; ?></td>
            <td><?php echo $row["Price"]; ?></td>
            <td><?php echo $row["Duration"]; ?></td>
            <td><?php echo $row["Speed"]; ?></td>
            <td><?php echo $row["Description"]; ?></td>
            <td><?php if ($row["Status"]==1) echo "Active"; else echo "Inactive"; ?></td>
            <td><a href='ManagePlan.php?st=<?php echo $row["Status"]; ?>&sid=<?php echo $row["PlanId"]; ?>'> <?php if ($row["Status"]==1) echo "Set Inactive"; else echo " Set Active"; ?> </a></td>
            <td><a href='EditPlan.php?id=<?php echo $row["PlanId"]; ?>'> Edit </a></td>
            <td><a onclick="return RUSure();" href='ManagePlan.php?did=<?php echo $row["PlanId"]; ?>'> Delete </a></td>
        </tr>
<?php 
}
?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
</div>
</div>
<script type="text/javascript" src="../backend_assets/scripts/main.js"></script>
<script type="text/javascript" src="../backend_assets/scripts/ValidJS.js"></script>
</body>
</html>
