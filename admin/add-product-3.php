<?php
    include 'lib/Validate.php';
    include 'lib/Main_query.php';
    $main_query = new Main_query();


    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $p_name = Validate::empty_validation($_POST["p_name_2"], "p_name_2", "text");
        $p_image = Validate::image_validation($_FILES["p_image_2"]["name"], "p_image_2", $_FILES["p_image_2"]["size"]);
        $p_category = Validate::empty_validation($_POST["p_category_2"], "p_category_2", "select");
        $p_price = Validate::empty_validation($_POST["p_price_2"], "p_price_2", "number");
        $p_color = Validate::empty_validation($_POST["p_color_2"], "p_color_2", "select");
        $p_size = Validate::empty_validation($_POST["p_size_2"], "p_size_2", "select");
        $p_quantity = Validate::empty_validation($_POST["p_quantity_2"], "p_quantity_2", "number");
        $p_description = Validate::empty_validation($_POST["p_description_2"], "p_description_2", "text");
        $p_main_category = Validate::empty_validation($_POST["p_main_category_2"], "p_main_category_2", "select");
        
        if ($_POST["p_main_category_2"] == "Featured_2") {

            if ($_POST["p_featured_category_2"] == "Delivery_2") {
                $p_delivery = Validate::checkbox_validation($_POST["p_delivery_2"], "p_delivery_2");
            }

            if ($_POST["p_featured_category_2"] == "Discount_2") {
                $p_discount = Validate::empty_validation($_POST["p_discount_2"], "p_discount_2", "number");
            }
        }

        if (Validate::$ok_alert == "ok") {
            $main_query->add_product($_POST["p_collection_2"], $_POST["p_name_2"], $_FILES["p_image_2"]["name"], $_POST["p_category_2"], $_POST["p_price_2"], $_POST["p_color_2"], $_POST["p_size_2"], $_POST["p_quantity_2"], $_POST["p_description_2"], $_POST["p_main_category_2"], $_POST["p_featured_category_2"], $_POST["p_delivery_2"], $_POST["p_discount_2"]);
        }else {
            echo "Something is wrong";
        }
    }else{
        header("Location: 404.php");
    }
?>
