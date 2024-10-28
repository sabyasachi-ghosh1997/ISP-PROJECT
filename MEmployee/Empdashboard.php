<?php
session_start();
if(!isset($_SESSION["EmpId"])){
  header("location:Emplogin.php");
  die();
}  
include("../connection.php");

$qry="select * from employee where EmpId='".$_SESSION["EmpId"]."'";
    $qryresult=mysqli_query($con,$qry);
    if($r=mysqli_fetch_array($qryresult)){
        $_SESSION["EmpName"]=$r["EmpName"];
    }
include("EmpSidebar.php");
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
     <div class="hero_area" id="main">
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <button class="openbtn" onclick="openNav()">&#9776;</button>  
                <a class="navbar-brand" href="../index.php">
                    <img src="../images/logo.png" alt="logo" width="30" height="24">
                    <span>
                        CENTURYLINK
                      </span>
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
                <h5 style=text-align:center;><?php echo "WellCome"." ".$_SESSION["EmpName"]?></h5>
            </div>
        </nav>
    </div>
</body>
</html>  