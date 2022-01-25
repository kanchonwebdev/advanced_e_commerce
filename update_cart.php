<?php
    include_once 'lib/Session.php';
    Session::session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $arr_p_quantity = $_POST["arr_p_quantity"];
        $arr_id = $_POST["arr_id"];
        $_SESSION["cart_session_arr"][$arr_id][7] = $arr_p_quantity;
        header("Location: cart.php");
    }
?>