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
    <form method="POST" action="recovery_email_code.php" class="login">
        <?php if (!empty(Session::show_value("recovery_err"))) { ?>
            <span><?php echo Session::show_value("recovery_err"); ?></span>
        <?php } ?>

        <div class="login-block">
            <h1>Recovery Email</h1>
        </div>
        
        <div class="login-block">
            <input type="email" name="email" id="" placeholder="Email" class="login-text-field">
        </div>

        <?php if (!empty(Session::show_value("email"))) { ?>
            <span><?php echo Session::show_value("email"); ?></span>
        <?php } ?>

        <div class="login-block">
            <input type="submit" value="Send Email" class="login-btn">
        </div>

        <div class="login-block">
            <a href="login.php">Login now</a>
        </div>
    </form>
</body>
</html>

<?php 
    Session::remove_value('recovery_err');
    Session::remove_value('email');
?>