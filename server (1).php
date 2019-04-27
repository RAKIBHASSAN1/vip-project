<?php
    /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    session_start();
    $mysqli = new mysqli("localhost", "root", "", "crud");
    
    // Check connection
    if($mysqli === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }
    $name = "";
	$address = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];

		$mysqli->query("INSERT INTO info (name, address) VALUES ('$name', '$address')"); 
        $_SESSION['message'] = "Address saved";
		header('location: index.php');
	}
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
    
        $mysqli->query("UPDATE info SET name='$name', address='$address' WHERE id=$id");
        $_SESSION['message'] = "Address updated!"; 
        header('location: index.php');
    }
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $mysqli->query("DELETE FROM info WHERE id=$id");
        $_SESSION['message'] = "Address deleted!"; 
        header('location: index.php');
    }
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
        $update = true;
        $sql = "SELECT * FROM info WHERE id=$id";
		$record = $mysqli->query($sql);

		
			$n = $record->fetch_array();
			$name = $n['name'];
			$address = $n['address'];
		
	}


?>

