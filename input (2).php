<?php	
	session_start();
    $mysqli = new mysqli('localhost', 'root', '', 'viplab');
    
    // Check connection
    if($mysqli === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }
	
	$usertype = $username = $password = "";
	$usertype_err = $username_err = $password_err = "";
	if(isset($_POST['userlogin'])){
        $usertype = $_POST['usertype'];
        $username = $_POST['username'];
        $password =$_POST['password'];
      
        
        $sql="SELECT * FROM sign_up  WHERE username = '$username' AND password = '$password' LIMIT 1";
			if($result = $mysqli->query($sql))
			{
				if($result->num_rows > 0)
				{
					echo "you have successfully login";

					header("location:input.php");
				}
				else
				{
					echo "Username or Password is wrong!";
					header("location: index.php");
				}
			}
      
    }
    $mysqli->close();
  
    ?>
