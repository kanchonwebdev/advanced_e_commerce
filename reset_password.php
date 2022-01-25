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
    <form method="POST" action="reset_code.php" class="login">

        <div class="login-block">
            <h1>Reset Password</h1>
        </div>

        <div href="#" class="login-block">
            <input type="password" name="password" id="" placeholder="New Password" class="login-text-field">
        </div>

        <?php if (!empty(Session::show_value("password"))) { ?>
            <span><?php echo Session::show_value("password"); ?></span>
        <?php } ?>

        <div class="login-block">
            <input type="submit" value="Reset Password" class="login-btn">
        </div>
    </form>
</body>
</html>

<?php 
    Session::remove_value('password');
?>