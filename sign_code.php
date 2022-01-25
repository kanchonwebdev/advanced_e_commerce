<?php
    include_once 'lib/Functions.php';
    include_once 'lib/Main_query.php';

    $mn = new Main_query();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $u_email = $_POST["u_email"];
        $u_pass = $_POST["u_pass"];

        Functions::data_validation($u_email, 'u_email', 'email');
        Functions::data_validation($u_pass, 'u_pass', 'pass');

        if (Functions::$ok_alert == "not ok") {
            header("Location: sign.php");
        }else {
            $mn->sign_up($u_email, $u_pass);
        }
    }
?>