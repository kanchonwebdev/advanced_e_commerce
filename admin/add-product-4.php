<?php
    include 'lib/Validate.php';
    include 'lib/Main_query.php';
    $main_query = new Main_query();


    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $p_name = Validate::empty_validation($_POST["p_name_3"], "p_name_3", "text");
        $p_image = Validate::image_validation($_FILES["p_image_3"]["name"], "p_image_3", $_FILES["p_image_3"]["size"]);
        $p_category = Validate::empty_validation($_POST["p_category_3"], "p_category_3", "select");
        $p_price = Validate::empty_validation($_POST["p_price_3"], "p_price_3", "number");
        $p_color = Validate::empty_validation($_POST["p_color_3"], "p_color_3", "select");
        $p_size = Validate::empty_validation($_POST["p_size_3"], "p_size_3", "select");
        $p_quantity = Validate::empty_validation($_POST["p_quantity_3"], "p_quantity_3", "number");
        $p_description = Validate::empty_validation($_POST["p_description_3"], "p_description_3", "text");
        $p_main_category = Validate::empty_validation($_POST["p_main_category_3"], "p_main_category_3", "select");
        
        if ($_POST["p_main_category_3"] == "Featured_3") {

            if ($_POST["p_featured_category_3"] == "Delivery_3") {
                $p_delivery = Validate::checkbox_validation($_POST["p_delivery_3"], "p_delivery_3");
            }

            if ($_POST["p_featured_category_3"] == "Discount_3") {
                $p_discount = Validate::empty_validation($_POST["p_discount_3"], "p_discount_3", "number");
            }
        }

        if (Validate::$ok_alert == "ok") {
            $main_query->add_product($_POST["p_collection_3"], $_POST["p_name_3"], $_FILES["p_image_3"]["name"], $_POST["p_category_3"], $_POST["p_price_3"], $_POST["p_color_3"], $_POST["p_size_3"], $_POST["p_quantity_3"], $_POST["p_description_3"], $_POST["p_main_category_3"], $_POST["p_featured_category_3"], $_POST["p_delivery_3"], $_POST["p_discount_3"]);
        }else {
            echo "Something is wrong";
        }
    }else{
        header("Location: 404.php");
    }
?>
