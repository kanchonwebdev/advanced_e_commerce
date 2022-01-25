<?php
    include_once 'lib/Session.php';
    Session::session_start();

    Session::remove_value("u_name");
    header("Location: index.php");
?>