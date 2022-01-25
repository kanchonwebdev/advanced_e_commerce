<?php
    include_once 'lib/Main_query.php';
    Session::session_start();
    
    error_reporting(0);
    $mn_query = new Main_query();
    $product_id = $_GET["product_id"];
    $data = $mn_query->select_product_by_is($product_id)->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/single-product.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <div class="admin">
        <div class="admin-container">
            <div class="admin-left">
                <div class="admin-left-header">
                    <div class="logo">Sun<span>Glass</span></div>
                </div>

                <div class="admin-left-profile">
                    <div class="admin-left-profile-img">
                        <img src="img/1.jpg" width="100%" height="100%" alt="">
                    </div>

                    <div class="admin-left-profile-text">
                        <b>MR. K K</b>
                        <span>Managing Director</span>
                    </div>
                </div>


                <div class="admin-left-content">
                    <div class="admin-left-content-block">
                        <div class="admin-left-content-block-header">--MAIN</div>

                        <div class="admin-left-content-block-content">
                            <div class="admin-left-content-block-content-header">Manage Product <span class="fa fa-angle-right"></span></div>

                            <a href="add-product.php" class="admin-left-product-block">
                                <span class="fa fa-product-hunt"></span>

                                <b>Add Product</b>
                            </a>

                            <a href="update-product.php" class="admin-left-product-block">
                                <span class="fa fa-product-hunt"></span>

                                <b>Update Product</b>
                            </a>

                            <a href="delete-product.php" class="admin-left-product-block">
                                <span class="fa fa-product-hunt"></span>

                                <b>Delete Product</b>
                            </a>
                        </div>
                    </div>

                    <div class="admin-left-content-block">
                        <div class="admin-left-content-block-header">--Order</div>

                        <div class="admin-left-content-block-content">
                            <div class="admin-left-content-block-content-header">Manage Order <span class="fa fa-angle-right"></span></div>

                            <div class="admin-left-product-block">
                                <span class="fa fa-product-hunt"></span>

                                <b>New Order</b>
                            </div>

                            <div class="admin-left-product-block">
                                <span class="fa fa-product-hunt"></span>

                                <b>Cancel Order</b>
                            </div>

                            <div class="admin-left-product-block">
                                <span class="fa fa-product-hunt"></span>

                                <b>Complete Order Product</b>
                            </div>
                        </div>
                    </div>

                    <div class="admin-left-content-block">
                        <div class="admin-left-content-block-header">--User</div>

                        <div class="admin-left-content-block-content">
                            <div class="admin-left-content-block-content-header">Manage Users <span class="fa fa-angle-right"></span></div>

                            <div class="admin-left-product-block">
                                <span class="fa fa-product-hunt"></span>

                                <b>New User</b>
                            </div>

                            <div class="admin-left-product-block">
                                <span class="fa fa-product-hunt"></span>

                                <b>Block User</b>
                            </div>
                        </div>
                    </div>

                    <div class="admin-left-content-block">
                        <div class="admin-left-content-block-header">--Complaint</div>

                        <div class="admin-left-content-block-content">
                            <div class="admin-left-content-block-content-header">Manage Complaint <span class="fa fa-angle-right"></span></div>

                            <div class="admin-left-product-block">
                                <span class="fa fa-product-hunt"></span>

                                <b>New Complaint</b>
                            </div>

                            <div class="admin-left-product-block">
                                <span class="fa fa-product-hunt"></span>

                                <b>Solved Complaint</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="admin-right">
                <div class="admin-right-header">
                    <div class="admin-right-header-left">
                        <form action="#" method="post" class="admin-right-header-left-block">
                            <input type="text" name="" placeholder="Search..." id="" class="admin-right-header-text-field">
                            <a href="#" class="admin-search-btn"><span class="fa fa-search"></span></a>
                        </form>
                    </div>

                    <div class="admin-right-header-right">
                        <a href="#"><span class="fa fa-bell "></span> <sup>01</sup></a>
                        <a href="#"><span class="fa fa-flag"></span> <sup>01</sup></a>
                        <a href="#"><span class="fa fa-power-off"></span> </a>
                    </div>
                </div>

                <div class="admin-right-content">
                    <div class="admin-right-content-left">
                        <b>New Order</b>
                        <span>Welcome to Sunglass</span>
                    </div>

                    <div class="admin-right-content-right">
                        <a href="#"><span class="fa fa-home"></span> Dashboard / Update Product</a>
                    </div>
                </div>

                <div class="single-product-block">
                    <div class="single-product-left">
                        <img src="upload_image/4.jpg" class="single-product-img" alt="">
                    </div>

                    <form method="POST" action="update-product-2.php" class="single-product-right">
                        <?php if (!empty(Session::show_value("update_msg"))) { ?>
                            <span><?php echo Session::show_value("update_msg"); ?></span>
                        <?php } ?>

                        <input type="text" name="u_name" placeholder="Product Name" value="<?php echo $data["p_name"] ?>" id="" class="single-product-text-field">
                        
                        <input type="hidden" name="u_id" value="<?php echo $product_id; ?>">
                        
                        <?php if (!empty(Session::show_value("u_name"))) { ?>
                            <span><?php echo Session::show_value("u_name"); ?></span>
                        <?php } ?>

                        <div class="single-product-text-field">Delivery Charge Free? <b><?php echo $data["p_delivery"] ?></b></div>
                        <div class="single-product-text-field">Delivery Do you add any discount? <b><?php echo $data["p_discount"] ?></b></div>
                        <input type="text" name="u_price" value="<?php echo $data["p_price"] ?>" id="" placeholder="Product Price" class="single-product-text-field">
                        
                        <?php if (!empty(Session::show_value("u_price"))) { ?>
                            <span><?php echo Session::show_value("u_price"); ?></span>
                        <?php } ?>

                        <input type="text" name="u_quantity" value="<?php echo $data["p_quantity"] ?>" id="" placeholder="Product Quantity" class="single-product-text-field">
                        
                        <?php if (!empty(Session::show_value("u_quantity"))) { ?>
                            <span><?php echo Session::show_value("u_quantity"); ?></span>
                        <?php } ?>

                        <textarea name="u_description" placeholder="Product Description" id="" cols="10" rows="5" class="single-product-text-field"><?php echo $data["p_description"] ?></textarea>
                        
                        <?php if (!empty(Session::show_value("u_description"))) { ?>
                            <span><?php echo Session::show_value("u_description"); ?></span>
                        <?php } ?>

                        <input type="submit" value="Update Product" class="single-product-btn">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
    Session::remove_value("u_name");
    Session::remove_value("u_price");
    Session::remove_value("u_quantity");
    Session::remove_value("u_description");
    Session::remove_value("update_msg");
?>