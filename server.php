<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <?php
    $mysqli = new mysqli("localhost", "root", "", "viplab");
    
    if($mysqli === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }
    
    $name = $address = $salary = "";
    $name_err = $address_err = $salary_err = "";
    if(isset($_GET['del'])){
            $id=$_GET['del'];
            $mysqli->query("DELETE FROM lab WHERE id=$id");
            header('location:index.php');
        }else if(isset($_POST['save'])){
            $a=$_POST['name'];
            $b=$_POST['address'];
            $c=$_POST['number'];
            $mysqli->query("INSERT INTO lab(name,address,number)VALUES('$a','$b','$c')");
            header('location:index.php');
        }
    
    else if(isset($_POST["id"]) && !empty($_POST["id"])){
        $id = $_POST["id"];
        
        $input_name = trim($_POST["name"]);
        if(empty($input_name)){
            $name_err = "Please enter a name.";
        } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $name_err = "Please enter a valid name.";
        } else{
            $name = $input_name;
        }
        
        $input_address = trim($_POST["address"]);
        if(empty($input_address)){
            $address_err = "Please enter an address.";     
        } else{
            $address = $input_address;
        }
        
        $input_salary = trim($_POST["number"]);
        if(empty($input_salary)){
            $salary_err = "Please enter the salary amount.";     
        } elseif(!ctype_digit($input_salary)){
            $salary_err = "Please enter a positive integer value.";
        } else{
            $salary = $input_salary;
        }
        
        if(empty($name_err) && empty($address_err) && empty($salary_err)){
            $sql = "UPDATE lab SET name=?, address=?, number=? WHERE id=?";
    
            if($stmt = $mysqli->prepare($sql)){
                $stmt->bind_param("sssi", $param_name, $param_address, $param_salary, $param_id);
                
                $param_name = $name;
                $param_address = $address;
                $param_salary = $salary;
                $param_id = $id;
                
                if($stmt->execute()){
                    header("location: index.php");
                    exit();
                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }
            
            $stmt->close();
        }
    } else{
        if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
            $id =  trim($_GET["id"]);
            
            $sql = "SELECT * FROM lab WHERE id = ?";
            if($stmt = $mysqli->prepare($sql)){
                $stmt->bind_param("i", $param_id);
                
                $param_id = $id;
                if($stmt->execute()){
                    $result = $stmt->get_result();
                    
                    if($result->num_rows == 1){
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        $name = $row["name"];
                        $address = $row["address"];
                        $salary = $row["number"];
                    } else{
                        header("location: index.php");
                        exit();
                    }
                    
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            $stmt->close();
        }  else{
            header("location: index.php");
            exit();
        }
    }
    $mysqli->close();
    ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Phone</label>
                            <input type="text" name="number" class="form-control" value="<?php echo $salary; ?>">
                            <span class="help-block"><?php echo $salary_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>