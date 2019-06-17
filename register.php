<?php
    session_start();

    //connect to database
    $db = mysqli_connect("localhost", "root", "", "brnch_authentication");

    if(isset($_POST['register_btn'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password2 = mysqli_real_escape_string($db, $_POST['password2']);
        
        if($password == $password2) {
            //proceed to create user
            $password = md5($password);
            $sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
            mysqli_query($db, $sql);
            $_SESSION['username'] = $username;
            header("location: profile.php");
        }else {
            $_SESSION['message'] = "The two passwords do not match.";
        }
    }
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create your account</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="css/styles.css">  
    <link rel="stylesheet" type="text/css" href="css/responsive-phone-portrait.css">
</head>
    
<body>
    <nav>
        <a href="index" class="logo">/brnch</a>

        <ul class="navlinks">
            <li><a href="login">Log in to your account</a></li> 
            <li><a href="help">FAQ</a></li>
            <li><a href="index">Return to home</a></li>            
        </ul>
        
        <div class="bars">
            <div class="l1"></div>
            <div class="l2"></div>
            <div class="l3"></div>
        </div>
    </nav>
    
    <!-- REGISTER INTRO -->
    <div class="intro-section">      
        <div class="container"> 
            <span class="back-in-register"></span>
            
            <div class="title-reglog">
                <span>Create your /brnch account</span>
            </div>
            
            <div class="reglog-form">                
                <form method="post" action="register.php" class="reglog">
                    <table>
                        <tr>
                            <td><input type="text" name="username" class="textInput" placeholder="Choose an username"></td>
                        </tr>

                        <tr>
                            <td><input type="text" name="email" placeholder="Your email"></td>
                        </tr>

                        <tr>
                            <td><input type="password" name="password" placeholder="Type your password"></td>
                        </tr>

                        <tr>
                            <td>
                                <input type="password" name="password2" placeholder="Re-type your password">
                                
                                <?php
                                    if (isset($_SESSION['message'])) {
                                        echo "<div id='error_msg'>".$_SESSION['message']."</div>";
                                        unset($_SESSION['message']);
                                    }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td><input type="submit" name="register_btn" value="Create account"></td>
                        </tr>
                    </table>
                    
                    <div class="red-login">Already have an account? <a href="login.php">Log in</a></div>
                </form>               
            </div> 
        </div>
    </div>
    
    <footer>
        <a href="privacy.html">Privacy Policy</a>
        <span>-</span>
        <a href="terms.html">Terms &amp; Conditions</a>
        <p>&copy; 2019 Tommy Vega. All rights reserved.</p>
    </footer>
    
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>