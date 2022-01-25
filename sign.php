<?php
    include 'lib/Session.php';
    Session::session_start();
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <form action="sign_code.php" method="POST" class="login">
        <div class="login-block">
            <h1>Sign up Now</h1>
        </div>
        
        <div class="login-block">
            <input type="email" name="u_email" id="" placeholder="Email" class="login-text-field">
        </div>

        <?php if (!empty(Session::show_value("u_email"))) { ?>
            <span><?php echo Session::show_value("u_email"); ?></span>
        <?php } ?>
        
        <div class="login-block">
            <input type="password" name="u_pass" id="" placeholder="Password" class="login-text-field">
        </div>

        <?php if (!empty(Session::show_value("u_pass"))) { ?>
            <span><?php echo Session::show_value("u_pass"); ?></span>
        <?php } ?>

        <div class="login-block">
            <input type="submit" value="Sign Up" class="login-btn">
        </div>

        <div class="login-block">
            <a href="login.php">Already Sign up?</a>
        </div>
    </form>
</body>
</html>

<?php 
    Session::remove_value("u_email");
    Session::remove_value("u_pass");
?>