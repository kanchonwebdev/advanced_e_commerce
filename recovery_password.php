<?php
    include 'lib/Session.php';
    Session::session_start();
    error_reporting(0);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = $_POST["password"];

        if ($_SESSION["rand_id"] != $password) {
            Session::set_value("recovery_err_msg", "Password doesn't match");
        }else {
            header("Location: reset_password.php");
        }
    }
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
    <form method="POST" action="" class="login">
        <?php if (!empty(Session::show_value("recovery_err_msg"))) { ?>
            <span><?php echo Session::show_value("recovery_err_msg"); ?></span>
        <?php } ?>

        <?php if (!empty(Session::show_value("recovery_err"))) { ?>
            <span><?php echo Session::show_value("recovery_err"); ?></span>
        <?php } ?>

        <div class="login-block">
            <h1>Recovery Password</h1>
        </div>

        <div href="#" class="login-block">
            <input type="number" name="password" id="" placeholder="Recovery Password Here" class="login-text-field">
        </div>

        <div class="login-block">
            <input type="submit" value="Recovery Password" class="login-btn">
        </div>
    </form>
</body>
</html>

<?php 
    Session::remove_value('recovery_err');
    Session::remove_value('recovery_err_msg');
?>