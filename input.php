
<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "onlinecourse");
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

if (isset($_POST['userlogin'])){



    $usertype = $username =$password="";
	$usertype_err = $password_err = $username_err="";
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	
		if(empty(trim($_POST["usertype"]))){
			$username_err = "Please select user type.";
		} else{
			$username = trim($_POST["usertype"]);
        }
        if(empty(trim($_POST["username"]))){
			$username_err = "Please enter username.";
		} else{
			$username = trim($_POST["usertype"]);
		}
		// Check if password is empty
		if(empty(trim($_POST["password"]))){
			$password_err = "Please enter your password.";
		} else{
      $password = trim($_POST["password"]);
      $password = md5($password,PASSWORD_DEFAULT);
		}
        if(empty($username_err) && empty($password_err)){
            $sql = "SELECT * FROM sign_up  WHERE usertype = '$usertype' AND username = '$username' AND password = '$password' LIMIT 1";
          
                if($result = $mysqli->query($sql))
                {
                    if($result->num_rows > 0)
                    {
                        echo "you have successfully login";
                        $_SESSION['sess_user']=$user; 
                        header("location: after_login.php");
                    }
                    else
                    {
                        echo "Username or Password is wrong!";
                        header("location: login.php");
                    }
                }
            }
        }
    
?> 