<?php
session_start();
if(!isset($_SESSION["id"])){
  header("location:Adminlogin.php");
  die();
}
if(!isset($_REQUEST["PlanId"])){
  header("location:ViewPlan.php");
  die();
}
include("ADSidebar.php");
$con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"crmforisp");

$Selectqry="select * from plan where PlanId=".$_REQUEST["PlanId"];
$Qryresult=mysqli_query($con,$Selectqry);
if($r=mysqli_fetch_array($Qryresult)){       
}

if(isset($_REQUEST["Update"])){
    $PlanName=$_REQUEST["PlanName"];
    $PlanPrice=$_REQUEST["PlanPrice"];
    $PlanDuration=$_REQUEST["PlanDuration"];
    $PlanSpeed=$_REQUEST["Speed"];
    $PlanDescription=$_REQUEST["PlanDescription"];
    $PlanStatus=$_REQUEST["PlanStatus"];

    $Update="UPDATE plan SET PlanName='".$PlanName."', Price='".$PlanPrice."', Duration='".$PlanDuration."', Speed='".$PlanSpeed."', Description='".$PlanDescription."',Status='".$PlanStatus."'  where PlanId='".$_REQUEST["PlanId"]."'";
    mysqli_query($con,$Update);
    header("location:ViewPlan.php");

}
if(isset($_REQUEST["Delete"])){
    $Delete="DELETE FROM plan where PlanId='".$_REQUEST["PlanId"]."'";
    mysqli_query($con,$Delete);
    header("location:ViewPlan.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/customstyle.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Home</title>
</head>
<body>
    <div id=main>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <button class="openbtn" onclick="openNav()">&#9776;</button>
                <a class="navbar-brand" href="../index.php">
                    <img src="../images/logo.png" alt="logo" width="30" height="24">
                    <span>CENTURYLINK</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        </li>
                        <li class="nav-item">
                        </li>
                    </ul>
                </div>
                <a class="btn" href="AdminDashboard.php">
                <img src="<?php echo $_SESSION["dp"]; ?>" class="img-thumbnail" alt="dp" style="width:50px; height:50px;">
                <?php echo $_SESSION["Name"]?>
               </a>
            </div>
        </nav>
        <div>
            <div class="container w-50 pt-5 text-white my-1" style="border-radius:2rem;">
            <div>
                <center>
                <h2>Edit/Delete Plan</h2>
                <form action="" method="post">
                <table class="table-danger bg-dark mt-2 " border=5px>
                <tr class="table-dark">
                        <td class="pt-3">Plan Id</td>
                        <td><?php echo $r["PlanId"]; ?></td>
                    </tr>
                    <tr class="table-dark">
                        <td class="pt-3">Enter Plan Name</td>
                        <td><input type="text" name="PlanName" Value="<?php echo $r["PlanName"];?>"></td>
                    </tr>
                    <tr class="table-dark">
                        <td class="pt-3">Enter Plan Price</td>
                        <td><input type="text" name="PlanPrice" value="<?php echo $r["Price"];?>"></td>
                    </tr>
                    <tr class="table-dark">
                        <td class=pt-3> Plan Duration</td>
                        <td>
                            <select name="PlanDuration">
                            <option><?php echo $r["Duration"];?></option>     
                                <option value="1 Month">1 Month</option>
                                <option value="2 Months">2 Months</option>
                                <option value="3 Months">3 Months</option>
                                <option value="6 Months">6 Months</option>
                                <option value="1 Year">1 Year</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="table-dark">
                        <td class=pt-3>Internet Speed</td>
                        <td>
                            <select name="Speed">
                                 <option><?php echo $r["Speed"];?></option>     
                                <option value="Up to 20Mbps">Up to 20Mbps</option>
                                <option value="Up to 40Mbps">Up to 40Mbps</option>
                                <option value="Up to 100Mbps">Up to 100Mbps</option>
                                <option value="Up to 200Mbps">Up to 200Mbps</option>
                                <option value="Up to 300Mbps">Up to 300Mbps</option>
                                <option value="Up to 1Gbps">Up to 1Gbps</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="table-dark">
                        <td class="pt-3">Enter Plan Description</td>
                        <td><input type="text" name="PlanDescription" value="<?php echo $r["Description"];?>"></td>
                    </tr>  
                    <tr class="table-dark">
                    <td rowspan="2">Update Status</td>
                    <td><input type="radio" name="PlanStatus" value="1" <?php if($r["Status"]=='1'){?>checked="checked"<?php }?>/>Active</td>
                    </tr>
                    <tr class="table-dark">
                    <td><input type="radio" name="PlanStatus" value="0" <?php if($r["Status"]=='0'){?>checked="checked"<?php }?> />Deactive</td>
                     </tr>
                    </tr>
                </table>
                    <div class="row">
                        <div class=col>
                            <button type="submit" name="Update" class="btn btn-danger mt-3">Update</button>
                        </div>
                        <div class=col>
                            <button type="submit" name="Delete" class="btn btn-danger mt-3">Delete</button>
                        </div>
                    </div>
                </form>
            </center>
            </div>
           </div>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>