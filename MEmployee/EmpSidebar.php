<?php  
   include("../connection.php");
   if(!isset($_SESSION["EmpId"])){
     header("location:Emplogin.php");
     die();
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
    <title>Document</title>
    </head>
<body>
<div id="mySidebar" class="sidebar">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
      <div>
          <a href="Empdashboard.php" class="btn dropbtn dropdown-container btn-primary btn-sm">Dashboard</a>
      </div>
      <div class="dropdown">
        <button class="dropbtn style">Profile</button>
        <div class="dropdown-container">
          <a href="EmpEditPro.php">Edit Profile</a>
          <a href="EmpChangePass.php">Change Password</a>
          <a href="../logout.php">Logout</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">Plan Management</button>
        <div class="dropdown-container">
          <a href="ViewPlan.php">View All Plan</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">Customer Management</button>
        <div class="dropdown-container">
          
          <a href="customer.php">View All Customer</a>
          <a href="Complaint.php">View Customer Complaint</a>
          <a href="SolveComplaint.php">View Solved Complaint</a>
          <a href="PandingComplaint.php">View Panding Complaint</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">Other Management</button>
        <div class="dropdown-container">
          <a href="ContacMessages.php">Contact With Admin</a>
        </div>
      </div>
    </div>
        <script>
        function openNav() {
          document.getElementById("mySidebar").style.width = "250px";
          document.getElementById("main").style.marginLeft = "250px";
        }
        
        function closeNav() {
          document.getElementById("mySidebar").style.width = "0";
          document.getElementById("main").style.marginLeft= "0";
        }
        </script>
        <script>
        var dropdown = document.getElementsByClassName("dropbtn");
        var i;
        for (i = 0; i < dropdown.length; i++) {
          dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
              dropdownContent.style.display = "none";
            } else {
              dropdownContent.style.display = "block";
            }
          });
          }
          </script>
</body>
</html>