<?php
    include_once 'lib/Functions.php';
    include_once 'lib/Main_query.php';

    $mn = new Main_query();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = $_POST["password"];
        $email = $_SESSION["u_name"];

        Functions::data_validation($password, 'password', 'pass');

        if (Functions::$ok_alert == "not ok") {
            header("Location: reset_password.php");
        }else {
            $mn->update_password($password,$email);
        }
    }
?>
