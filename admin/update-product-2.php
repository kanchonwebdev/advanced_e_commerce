<?php
    include_once 'lib/Main_query.php';
    include_once 'lib/Validate.php';
    Session::session_start();

    $main_query = new Main_query();


    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $p_name = Validate::empty_validation_2($_POST["u_name"], "u_name", "text");
        $p_price = Validate::empty_validation_2($_POST["u_price"], "u_price", "number");
        $p_quantity = Validate::empty_validation_2($_POST["u_quantity"], "u_quantity", "number");
        $p_description = Validate::empty_validation_2($_POST["u_description"], "u_description", "text");
        $product_id = $_POST["u_id"];
        Session::set_value("product_id", $product_id);

        if (Validate::$ok_alert_2 == "ok") {
            $main_query->update_product($product_id, $_POST["u_name"], $_POST["u_price"], $_POST["u_quantity"], $_POST["u_description"]);    
        }else {
            echo "Something is wrong";
        }
    }else{
        header("Location: 404.php");
    }
?>
