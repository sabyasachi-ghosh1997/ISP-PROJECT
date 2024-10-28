<?php
session_start();
include("header.php");
 if(isset($_REQUEST['Submit']))
     {
       $Update="UPDATE employee SET EmpName='".$_REQUEST["EmpName"]."', Address='".$_REQUEST["Address"]."', Email='".$_REQUEST["Email"]."',PhNo='".$_REQUEST["PhNo"]."' where EmpId='".$_SESSION["EmpId"]."'";
       mysqli_query($con,$Update);
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
<body class="gradient-custom">
<div id=main>
        <nav class="navbar navbar-expand-lg bg-primary">
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
                 <a class="btn" href="Empdashboard.php">
                <?php echo $_SESSION["EmpName"]?>
               </a>            
        </nav>
        <div class="container pt-5 vh-100">
          <center>
            <script type="text/javascript"></script>
            <div class="row">
            <form  method="post" enctype="multipart/form-data>
              <center>
              <div class="col-4 image-upload pb-2">
            
              </div>
              <div class="col-8" >
              <table border=2px class="table bg-danger">
                <tr class="table-primary">
                  <td>Id</td>
                  <td><?php echo $r["EmpId"] ?></td>
                </tr>
                <tr class="table-primary">
                  <td>Name</td>
                  <td><input type="text" name="EmpName" value="<?php echo $r["EmpName"]; ?>" /></td>
                </tr>
                <tr class="table-primary">
                  <td>Address</td>
                  <td><input type="text" name="Address" value="<?php echo $r["Address"]; ?>"/></td>
                </tr>
                <tr class="table-primary">
                  <td>Email</td>
                  <td><input type="text" name="Email" value="<?php echo $r["Email"]; ?>" /></td>
                </tr>
                <tr class="table-primary">
                  <td>Phone Number</td>
                  <td><input type="text" name="PhNo" value="<?php echo $r["PhNo"]; ?>" /></td>
                </tr>      
          </table>
          <tr><td><input class="btn btn-danger" type="submit" name="Submit" value="Update" /></td></tr>
</form>
          </center>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>