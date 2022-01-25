<?php
    include_once 'lib/Session.php';
    Session::session_start();
    
    $arr_id = $_GET["arr_id"];
    
    if($_SESSION["cart_session_arr"][$arr_id] != ""){
        unset($_SESSION["cart_session_arr"][$arr_id]);
    }

    header("Location: cart.php");
?>