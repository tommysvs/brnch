<?php
    session_start();
?>
    
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/responsive-phone-portrait.css">
</head>
    
<body>    
    <nav>
        <a href="index" class="logo">/brnch</a>

        <ul class="navlinks">
            <li><a href="logout">Links</a></li>
            <li><a href="index">Layout</a></li>
            <li><a href="index">Change URL</a></li>
            <li><a href="index">Logout</a></li>
        </ul>
        
        <div class="bars">
            <div class="l1"></div>
            <div class="l2"></div>
            <div class="l3"></div>
        </div>
    </nav>
    
    <!-- PROFILE -->
    <div class="profile-section">      
        <div class="container-profile">            
            <div class="intro">
                <div class="welcome_msg">Welcome <?php echo $_SESSION['username']; ?></div>
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