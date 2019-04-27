<?php
    session_start();
    $_SESSION["last"] = "contact.php" ;
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $mailName = $_POST['mailName'];
        $mailEmail = $_POST['mailEmail'];
        $mailMessage = $_POST['mailMessage'];
        $formcontent="From: $mailName \nSender Email: $mailEmail \nMessage: $mailMessage";
        $recipient = "mehedihasanjohnt@gmail.com";
        $subject = "Contact Form";
        $mailheader = "From: $mailEmail \r\n";
        mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
        
        $_SESSION['mailMessage'] = "Thank You! We got your response.";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>EzzyBzzy | An Online Practice Platform</title>
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    </head>
    <body style="background-image: url(images/bg2.jpg)">
        <?php
            if (isset($_SESSION['message'])) { ?>
            <div>
                <?php 
                    $mms = $_SESSION['message'];
                    echo "<script type='text/javascript'>alert('$mms');</script>";
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php } ?>
        <?php
            if (isset($_SESSION['mailMessage'])) { ?>
            <div>
                <?php 
                    $mailMessage = $_SESSION['mailMessage'];
                    echo "<script type='text/javascript'>alert('$mailMessage');</script>";
                    unset($_SESSION['mailMessage']);
                ?>
            </div>
        <?php } ?>
        <div id="main">
            <div id="header">
                <div id="logo">
                    <img src="images/logoT.png" alt="EzzyBzzy Logo" title="EzzyBzzy Logo" height="100px" width="330px">
                </div>
                <div id="headerRight">
                    <p>An Easy Practice Platform To <br><br><strong> &nbsp;"Be YOU-nique!"</strong></p>
                </div>
            </div>
            <div id="navBar">
                <div id="navLeft">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">Quiz</a></li>
                        <li><a href="rank.php">Rank</a></li>
                        <li><a href="links.php">Useful Links</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <div id="navRight">
                    <?php
                        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                        <div id="authentication">
                            <ul>
                                <li><a href="about.php">Profile</a></li>
                                <li><a href="about.php">Change Password</a></li>
                                <li><a href="logout.php"><i class="fa fa-user"></i>Logout</a></li>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <div id="authentication">
                            <ul>
                                <li><a href="login.php"><i class="fa fa-unlock-alt"></i>Login</a></li>
                                <li><a href="register.php"><i class="fa fa-user"></i>Register</a></li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div id="content">
                <div id="cInfo">
                    <div id="cInfoUp">
                        <form id="registrationForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <h1>Leave A Message</h1>
                            <p>*All fields are required.</p>
                            <div>
                                <label for="mailName">Name :</label>
                                <input type="text" id="mailName" name="mailName" required>
                            </div>
                            <div>
                                <label for="mailEmail">Email :</label>
                                <input type="email" id="mailEmail" name="mailEmail" required>
                            </div>
                            <div>
                                <label for="mailMessage">Message :</label>
                                <textarea id="mailMessage" name="mailMessage" required></textarea>
                            </div>
                            <div>
                                <input type="reset" name="reset" value="Clear">
                                <input type="submit" name="send" value="Send">
                            </div>
                        </form>
                    </div>
                    <div id="cInfoDown">
                        <p>Get In Touch</p>
                    </div>
                </div>
            </div>
            <div id="footer">
                <p><center>&copy; EzzyBzzy | All Right Reserved.</center></p>
            </div>
        </div>
        <script src="scripts/main.js"></script>
    </body>
</html>