<!DOCTYPE html>



<head>
<link rel="stylesheet" href="css\style.css" type="text/css">

<script type="text/javascript" src="js\jquery-1.6.1.min.js"></script>

 <link rel="icon" href="images\logo2.png" type="image/png" sizes="16x16"> 

<title>e-Registration of SUB</title>
</head>

<body>
   <div id="maincontent">

<div id="headermain">

<div id="headercover" style="padding: 10px 0;">

<div id="logo">
<img src="images\logo2.png" height="55"> 
</div>
<div id="headerright">
<h2>Stamford Unversity Bangladesh</h2>
<span>Online Course Registration Portal</span>
</div>
</div>

<div id="subheadercover" align="center">

<marquee behavior="ALTERNATE">Welcome to Online Course Registration Portal !</marquee>

</div>

</div>

<div id="content">
<h3>Login Information</h3>
<form action="input.php" method="post">
<table border="0" cellpadding="2" cellspacing="0" align="center" id="logintable">
<tr>

<td>User Type</td>

<td></td>

<td><select name="usertype">

<option value="1">Student</option>
<option value="2">Teacher</option>
<option value="3">Admin</option>





</select></td>

</tr>



<tr>

<td>User ID</td>

<td></td>

<td><input type="text" placeholder="ex:CSE00000000" required name="username" id="username"></td>

</tr>

<tr>
<td>Password</td>

<td></td>

<td><input type="password" required  name="password" id="inputpassword"></td>

</tr>



<tr>

<td></td>

<td></td>

<td><input type="submit" name="userlogin" value="Login" id="userloginbutton"></td>
<td><button class="button"><a href="sign_up.php" style="color: white"> Sign Up</a> </button></td>

</tr>

<tr>

<td></td>

<td></td>

<td><a href="recoverpassword.php" style="color: #da70d8; font-weight: bold;">Forgot your Password?</a></td>

</tr>



</table>



</form>



</div>







<div id="footer">
&copy; 2019 SUB, All Rights Reserved. Maintained by Stamford Unversity Bangladesh .
</div>

</div> 
</body>

</html>