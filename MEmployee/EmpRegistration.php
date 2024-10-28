<?php

         $con=mysqli_connect("localhost","root","");

              mysqli_select_db($con,"crmforisp");
      
      if(isset($_REQUEST["submit"]))
      {
          $EmpName=$_REQUEST["EmpName"];
          $Gender=$_REQUEST["Gender"];
          $Address=$_REQUEST["Address"];
          $Post=$_REQUEST["Post"];
          $PhNo=$_REQUEST["PhNo"];
          $Email=$_REQUEST["Email"];
          $Password=$_REQUEST["Password"];


          $qry="insert into employee(EmpName,Gender,Address,Post,PhNo,Email,Password) values('".$EmpName."', '".$Gender."', '".$Address."', '".$Post."', '".$PhNo."', '".$Email."', '".$Password."')";
          mysqli_query($con,$qry);
          header("location:Emplogin.php");
      }
?>
<html>
  <head>
    <style>
      *{
        
  padding: 0;
  margin: 0;
}
body{
  background: url(../images/40.jpg) no-repeat center fixed;
  background-size: cover;

}

.container{
  background-color: black;
  width: 350px;
  height: 400px;
  padding-bottom: 20px;
  position: absolute;
  top:50%;
  left: 50%;
  transform: translate(-50%, -50%);
  margin: auto;
  border: 2px solid blue;
  padding: 70px 50px 20px 50px;
}


.fl{
  float: left;
  width: 110px;
  line-height: 35px;
}

.fontLabel{
  color: gold;
  font-size: 12px;
}

.fr{
  float: right;
}

.clr{
  clear: both;
}

.box{
  width: 360px;
  height: 50px;
  margin-top: 10px;
  font-family: verdana;
  font-size: 14px;

}

.textBox{
  height: 35px;
  width: 190px;
  border: none;
  padding-left: 20px;
}

.new{
  float: left;
}

.iconBox{
  height: 35px;
  width: 40px;
  line-height: 38px;
  text-align: center;
  background: #ff6600;
}

.radio{
  color: white;
  background:black;
  line-height: 38px;
}

.terms{
  line-height: 35px;
  text-align: center;
  background:black;
  color: white;
}

.submit{
  float: right;
  border: none;
  color: white;
  width: 110px;
  height: 35px;
  background: #ff6600;
  text-transform: uppercase;
  cursor: pointer;
}

::-webkit-input-placeholder { /* Chrome/Opera/Safari */

}


    </style>
    <meta charset="utf-8">
    <title>Form</title>
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

      <h1 style="color:darkorange;text-align: center;border: solid;">EMPLOYEE  -  REGISTRATION:</h1>

    <!-- Body of Form starts -->
  	<div class="container">
      <form method="post" autocomplete="on">
        <!--First name-->
    		<div class="box">

          <label class="fl fontLabel"> Enter Your Name: </label>
    			<div class="new iconBox">
            <i class="fa fa-user" aria-hidden="true"></i>
          </div>
    			<div class="fr">
    					<input type="text" name="EmpName" placeholder="Enter Your Name" class="textBox" autofocus="on" required>
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!--First name-->
    
        <div class="box">
          <label class="fl fontLabel">Post: </label>
          <div class="new iconBox">
            <i class="fa fa-user" aria-hidden="true"></i>
          </div>
          <div class="fr">
              <input type="text" name="Post" placeholder="Employee Post"
              class="textBox" autofocus="on" required>
          </div>
          <div class="clr"></div>
        </div>


        <!--Adress-->
    		<div class="box">
          <label class="fl fontLabel"> Enter Address: </label>
    			<div class="fl iconBox"><i class="fa fa-user" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="text" required name="Address"
              placeholder="Enter Address" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!--Second name-->


    		<!---Phone No.------>
    		<div class="box">
          <label class="fl fontLabel"> Mobile No.: </label>
    			<div class="fl iconBox"><i class="fa fa-phone-square" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="tel" required name="PhNo" placeholder="Phone No." class="textBox" pattern="[0-9]{3}[0-9]{4}[0-9]{3}">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!---Phone No.---->


    		<!---Email ID---->
    		<div class="box">
          <label class="fl fontLabel"> Email ID: </label>
    			<div class="fl iconBox"><i class="fa fa-envelope" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="email" required name="Email" placeholder="Email Id" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!--Email ID----->


    		<!---Password------>
    		<div class="box">
          <label class="fl fontLabel"> Password </label>
    			<div class="fl iconBox"><i class="fa fa-key" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="Password" required name="Password" placeholder="Password" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!---Password---->

    		<!---Gender----->
    		<div class="box radio">
          <label for="gender" class="fl fontLabel"> Gender: </label>
    				<input type="radio" id="Gender" name="Gender" value="Male" required> Male &nbsp; &nbsp; &nbsp; &nbsp;
    				<input type="radio" id="Gender" name="Gender" value="Female" required> Female
    		</div>
    		<!---Gender--->


    		<!--Terms and Conditions------>
    		<div class="box terms">
    				<input type="checkbox" name="Terms" required> &nbsp; I accept the terms and conditions
    		</div>
        
    		<!--Terms and Conditions------>

    		<!---Submit Button------>
    				<input type="submit" name="submit" class="submit" value="SUBMIT"><br><br>
    		
    		<!---Submit Button----->
        <div>
          <p class="box terms">If you have already register <a href="Emplogin.php" class="text-green-50 fw-bold">Sign in</a></p>
        </div>
      </form>
  </div>
  <!--Body of Form ends--->
  </body>
</html>
