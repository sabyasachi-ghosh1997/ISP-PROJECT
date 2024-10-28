<?php
session_start();
include("header.php");

if(isset($_REQUEST["submit"])){
  $EmpId=$_SESSION['EmpId'];
  $Selectqry="select * from Employee where Password='".$_REQUEST["OldPassword"]."'";
  $Qryresult=mysqli_query($con,$Selectqry);
  if($r=mysqli_fetch_array($Qryresult)){
    $Updateqry="UPDATE Employee SET Password='".$_REQUEST["NewPassword"]."' where EmpId='$EmpId'";
				mysqli_query($con,$Updateqry);
        header("location:Empdashboard.php");
			}
			else
			{
				echo "Invalid Password";
			}
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
    <style type="text/css">
      .gradient-custom { 
    background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,25,121,1) 35%, rgba(0,212,255,1) 100%);
    }
    </style>
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
                <h5 style=text-align:center;><?php echo "Well-Come"." ".$_SESSION["EmpName"]?></h5>
            </div>
        </nav>
        <div>
            <center>
                 <section class="vh-100 gradient-custom">
            <div class="container w-25 bg-danger text-white my-5" style="border-radius:1rem;">
                <form method="post" >
                    <div class="row">
                        <h1 style="color: gold;" class="pt-2">Change Password</h1>
                        <div class="col pb-2 pt-5">
                            <label for=""><h4 style="color: gold;">Enter Old Password</h4></label>
                            <input type="password" name="OldPassword">
                        </div>
                        <div class="col pb-5 pt-5">
                        <label for=""><h4 style="color: gold;">Enter New Password</h4></label>
                            <input type="password" name="NewPassword">
                        </div>
                        <button type="submit" name="submit" class="btn btn-dark">Done</button><br><br>

                    </div>
                </form>
            </div>
        </section>
            </center>
    </div>
    </div>
    
</body>
</html>