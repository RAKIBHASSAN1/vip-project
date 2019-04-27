
<?php
$mysqli = new mysqli("localhost", "root", "", "onlinecourse");
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
if (isset($_POST['userlogin'])){


$usertype = $_POST['usertype'];
$username = $_POST['username'];
$password =$_POST['password'];


 
$sql = "SELECT * FROM sign_up  WHERE username = '$username' AND password = '$password'";  
  
if($mysqli->query($sql)=== true){
    if($numrows!=0){

echo " login success";

} 
}
else {
echo "ERROR: Could not able to execute $sql. " . $mysqli->error; 
}
}

   
?> 