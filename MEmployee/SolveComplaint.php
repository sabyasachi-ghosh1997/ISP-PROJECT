<?php
session_start();
include("header.php");

if(isset($_REQUEST["ComplaintId"])){
    if($_REQUEST["Status"]==0){
        $UpdateQry="Update Complaint set Status=1 WHERE Cmpid=".$_REQUEST["ComplaintId"];
        mysqli_query($con,$UpdateQry);
    }
    if($_REQUEST["Status"]==1){
        $UpdateQry="Update Complaint set Status=0 WHERE Cmpid=".$_REQUEST["ComplaintId"];
        mysqli_query($con,$UpdateQry);
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
                <a class="btn" href="EmpDashboard.php">
              
                <?php echo $_SESSION["EmpName"]?>
               </a>
            </div>
        </nav>
        <center>
        <div class="container w-100 text-white my-5 bg-light" style="border-radius:1rem;">
        <table class="table table-light">
            <tr>
                <td>Complaint Id</td>
                <td>Customer Id</td>
                <td>Customer Id</td>
                <td>Date</td>
                <td>Description</td>
                <td>Status</td>
                
                
            </tr>
<?php
    $Selectqry="select * from Complaint WHERE Status=0";
    $Qryresult=mysqli_query($con,$Selectqry);
    while($r=mysqli_fetch_array($Qryresult)){

?>
            <tr>
                <td><?php echo $r["Cmpid"]; ?></td>
                <td><?php echo $r["Cstmrid"]; ?></td>
                <td><?php echo $r["Cstmrname"]; ?></td>
                <td><?php echo $r["Date"]; ?></td>
                <td><?php echo $r["Description"]; ?></td>
                <td><?php echo $r["Status"]; ?></td>
            
                <td><a href="SolveComplaint.php?ComplaintId=<?php echo $r["Cmpid"];?>& Status=<?php echo $r["Status"];?>"><?php if($r["Status"]==1) echo "Active"; else echo"Deactive";?></a></td>

            </tr>
<?php
  }
?>
        </table>
       </div>
       </center>
</div><!--End Main-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>