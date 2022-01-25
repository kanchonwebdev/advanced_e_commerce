<?php
    include 'lib/Validate.php';
    include 'lib/Main_query.php';
    $main_query = new Main_query();


    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $p_name = Validate::empty_validation($_POST["p_name"], "p_name", "text");
        $p_image = Validate::image_validation($_FILES["p_image"]["name"], "p_image", $_FILES["p_image"]["size"], $_FILES["p_image"]["tmp_name"]);
        $p_category = Validate::empty_validation($_POST["p_category"], "p_category", "select");
        $p_price = Validate::empty_validation($_POST["p_price"], "p_price", "number");
        $p_color = Validate::empty_validation($_POST["p_color"], "p_color", "select");
        $p_size = Validate::empty_validation($_POST["p_size"], "p_size", "select");
        $p_quantity = Validate::empty_validation($_POST["p_quantity"], "p_quantity", "number");
        $p_description = Validate::empty_validation($_POST["p_description"], "p_description", "text");
        $p_main_category = Validate::empty_validation($_POST["p_main_category"], "p_main_category", "select");
        
        if ($_POST["p_main_category"] == "Featured") {

            if ($_POST["p_featured_category"] == "Delivery") {
                $p_delivery = Validate::checkbox_validation($_POST["p_delivery"], "p_delivery");
            }

            if ($_POST["p_featured_category"] == "Discount") {
                $p_discount = Validate::empty_validation($_POST["p_discount"], "p_discount", "number");
            }
        }

        if (Validate::$ok_alert == "ok") {
            $main_query->add_product($_POST["p_collection"], $_POST["p_name"], $_FILES["p_image"]["name"], $_POST["p_category"], $_POST["p_price"], $_POST["p_color"], $_POST["p_size"], $_POST["p_quantity"], $_POST["p_description"], $_POST["p_main_category"], $_POST["p_featured_category"], $_POST["p_delivery"], $_POST["p_discount"]);
        }else {
            echo "Something is wrong";
        }
    }else{
        header("Location: 404.php");
    }
?>
