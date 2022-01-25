<?php
    include_once 'lib/Functions.php';
    include_once 'lib/Main_query.php';

    $mn = new Main_query();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $u_email = $_POST["email"];
        $u_pass = $_POST["password"];

        Functions::data_validation($u_email, 'email', 'email');
        Functions::data_validation($u_pass, 'password', 'pass');

        if (Functions::$ok_alert == "not ok") {
            header("Location: login.php");
        }else {
            $mn->login($u_email, $u_pass);
        }
    }
?>
