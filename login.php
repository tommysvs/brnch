<?php
    session_start();

    //connect to database
    $db = mysqli_connect("localhost", "root", "", "brnch_authentication");

    if (isset($_POST['login_btn'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($db, $sql);

        if(mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            header("location: profile.php");
        }else {
            $_SESSION['message'] = "Username or password incorrect.";
        }
    }
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/responsive-phone-portrait.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    
<body>    
    <nav>
        <a href="index" class="logo">/brnch</a>

        <ul class="navlinks">
            <li><a href="register">Create an account</a></li> 
            <li><a href="help">FAQ</a></li>
            <li><a href="index">Return to home</a></li>            
        </ul>
        
        <div class="bars">
            <div class="l1"></div>
            <div class="l2"></div>
            <div class="l3"></div>
        </div>
    </nav>
    
    <!-- LOGIN INTRO -->
    <div class="intro-section">      
        <div class="container"> 
            <span class="back-in-login"></span>
            
            <div class="title-reglog">
                <span>Log in to your account</span>
            </div>
            
            <div class="reglog-cont">                
                <div class="reglog-form">
                    <form method="post" action="login.php" class="reglog">
                        <table>                        
                            <tr>
                                <td>
                                    <input type="text" name="username" class="textInput" placeholder="Your username">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="password" name="password" class="textInput" placeholder="Your passwords">
                                </td>
                            </tr>

                             <tr>
                                <td>
                                    <?php
                                        if (isset($_SESSION['message'])) {
                                            echo "<div id='error_msg'>".$_SESSION['message']."</div>";
                                            unset($_SESSION['message']);
                                        }
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td><input type="submit" name="login_btn" value="Login"></td>
                            </tr>
                        </table>
                        
                        <div class="red-login">Don't have an account? <a href="register.php">Sign up</a></div>
                    </form>
                </div>
                
                 <div class="sep"></div>

                <div class="social-login-cont">
                    <div class="login-insta"><i class="fa fa-instagram iLogin"></i>Login with Instagram</div>
                </div>
            </div>
        </div>
    </div>
    
    <footer><div></div>
        <a href="privacy.html">Privacy Policy</a>
        <span>-</span>
        <a href="terms.html">Terms &amp; Conditions</a>
        <p>&copy; 2019 Tommy Vega. All rights reserved.</p>
    </footer>
    
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>