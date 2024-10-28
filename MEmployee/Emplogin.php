<?php
session_start();
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"crmforisp");

if(isset($_REQUEST["submit"])){   
  $PhNo=$_REQUEST["PhNo"];
  $Password=$_REQUEST["Password"];
  $qry="select * from employee where PhNo='".$PhNo."' AND Password='".$Password."'";
  $qryresult=mysqli_query($con,$qry);
  if($r=mysqli_fetch_array($qryresult)){
    $_SESSION["EmpId"]=$r["EmpId"];
    $_SESSION["Status"]=$r["Status"];
    if($_SESSION["Status"]==1){
      header("location:Empdashboard.php");
    }
    else{
      echo "Wait! Your Approvel is panding";
    }
  }
  else{
    echo "Invalid Phone number or Password";
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
    <title>Employee-Login</title>
    <style type="text/css">
      .gradient-custom { 
    background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,25,121,1) 35%, rgba(0,212,255,1) 100%);
    }
    </style>
</head>
<body>
     <div class="">
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container">
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
            </div>
          </nav>
          <center>
            <section class="vh-100 gradient-custom">
              <div class="container">
                <br>
                <div class="row d-flex justify-content-center align-items-center h-100">
                  <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                      <div class="mb-md-5 mt-md-4 pt-10 pb-10">
                        <h2 class="fw-bold mb-2 text-uppercase">Employee Access</h2>
                        <p class="text-white-50 mb-5">Please enter your E-mail and Password!</p>
                        <form class="my-5 mx-5" method="post">
                          <div class="mb-3">
                            <label class="form-label">Enter Phone Number</label>
                            <input type="tel" name="PhNo" class="form-control">
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Enter Password</label>
                            <input type="password" name="Password" class="form-control">
                          </div>
                          <div>
                            <p class="mb-2"><a href="Adminrecoverpass.php" class="text-green-50 fw-bold">Forget Password?</a></p>
                          </div>
                          <button type="submit" name="submit" class="btn btn-primary">Submit</button><br><br>
                          <div>
                            <p class="mb-2">If you have registered not! <a href="EmpRegistration.php" class="text-green-50 fw-bold">Sign Up</a></p>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
              </div>
            </section>
          </center>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
