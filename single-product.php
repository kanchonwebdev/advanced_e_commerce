<?php
    include_once 'lib/Functions.php';
    include_once 'lib/Main_query.php';
    
    $mn_query = new Main_query();
    error_reporting(0);

    $ok = "ok";
    $product_id = $_GET['product_id'];
    $data = $mn_query->select_product_id($product_id)->fetch_assoc();
    $data_2 = $mn_query->select_product_2();

    $p_name = $data['p_name'];
    $p_image = $data['p_image'];
    $p_price = $data['p_price'];
    $p_category = $data['p_category'];
    $p_color = $data['p_color'];
    $p_size = $data['p_size'];
    $p_delivery = $data['p_delivery'];
    $p_quantity_2 = $data['p_quantity'];
    $cart_arr_data = array();

    $_SESSION["cart_session_arr"][] = array();
    
    if(count(Session::show_value("cart_session_arr")) > 0){
        $cart_session_arr_key = array_keys(Session::show_value("cart_session_arr"));
        for($i = 0; $i < count($cart_session_arr_key); $i++){ 
            $j = $cart_session_arr_key[$i];
            if (empty($_SESSION["cart_session_arr"][$j])) {
                unset($_SESSION["cart_session_arr"][$j]);
            }

            if(in_array($product_id, $_SESSION["cart_session_arr"][$j])){
                $ok = "not ok";
            }
        }
    }

    if(count(Session::show_value("wish_session_arr")) > 0){
        $wish_session_arr_key = array_keys(Session::show_value("wish_session_arr"));
        for($i = 0; $i < count($wish_session_arr_key); $i++){ 
            if(in_array($product_id, $_SESSION["wish_session_arr"][$j])){
                $ok = "not ok";
            }
        }
    }

    if ($ok == "ok") {
        if (isset($_POST["shop"])) {
            $p_quantity = $_POST['p_quantity'];
            Functions::data_validation($p_quantity, "p_quantity", "number");
            
            if ($p_quantity > $p_quantity_2) {
                Session::set_value("p_quantity","Product out of stock");
                Functions::$ok_alert = "not ok";
            }

            if (Functions::$ok_alert == "ok") {
                $cart_arr_data = array($product_id, $p_name, $p_image, $p_price, $p_category, $p_color, $p_size, $p_quantity,$p_delivery);
            }
            if (Functions::$ok_alert == "ok") {
                $_SESSION["cart_session_arr"][] = $cart_arr_data;
                header("Location: cart.php");
            }
        }
    
        if (isset($_POST["wishlist"])) {
            $p_quantity = $_POST['p_quantity'];
            Functions::data_validation($p_quantity, "p_quantity", "number", $product_id);
            
            if ($p_quantity > $p_quantity_2) {
                Session::set_value("p_quantity","Product out of stock");
                Functions::$ok_alert = "not ok";
            }

            if (Functions::$ok_alert == "ok") {
                $cart_arr_data = array($product_id, $p_name, $p_image, $p_price, $p_category, $p_color, $p_size, $p_quantity,$p_delivery);
            }
            if (Functions::$ok_alert == "ok") {
                $_SESSION["wish_session_arr"][] = $cart_arr_data;
                header("Location: wishlist.php");
            }
        }
    }

    if(count(Session::show_value("cart_session_arr")) > 0){
        $cart_session_arr_key = array_keys(Session::show_value("cart_session_arr"));
        for($i = 0; $i < count($cart_session_arr_key); $i++){ 
            $j = $cart_session_arr_key[$i];

            if (empty($_SESSION["cart_session_arr"][$j])) {
                unset($_SESSION["cart_session_arr"][$j]);
            }

            if (in_array($product_id, $_SESSION["cart_session_arr"][$j])) {
                $x = $_SESSION["cart_session_arr"][$j][7];
                $p_quantity_2 = ($p_quantity_2 - $x);
                break;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sunglass</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/single-product.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header">
        <div class="header-container">
            <div class="header-left">
                <p>Free shipping on all orders over $100</p>
            </div>

            <div class="header-right">
                <div class="header-right-header">
                    <div><span class="fa fa-phone"></span>: +(1200) 987 118 765</div>

                    <div><span class="fa fa-bell"></span>: 08:30 – 17:30, mon – sat</div>
                </div>

                <div class="header-right-footer">
                    <a href="#">Login</a>
                    <a href="#">Sign Up</a>
                </div>
            </div>
        </div>
    </div>

    <div class="menu" id="menu">
        <div class="menu-container">
            <div class="logo">Sung<span>Glass</span></div>

            <div class="menu-block">
                <a href="index.php" class="menu-active">Home</a>
                <a href="shop.php">Shop</a>
                <a href="about.php">About Us</a>
                <a href="contact.php">Contact Us</a>
            </div>

            <div class="menu-block-2">
                <a href="#" onclick="showSearchMenu()"><span class="fa fa-search"></span></a>
                <a href="cart.php"><span class="fa fa-shopping-cart"></span>
                    <sup><?php echo count($_SESSION["cart_session_arr"]) ?></sup></a>
                <a href="wishlist.php"><span class="fa fa-heart-o"></span>
                    <sup><?php echo count($_SESSION["wish_session_arr"]) ?></sup></a>
                <div class="menu_icon" onclick="show_menu()">
                    <span class="fa fa-bars"></span>
                </div>
            </div>

            <form action="#" method="post" class="search-box" id="search-box">
                <input type="text" name="" placeholder="Enter any word" id="" class="search-text">
            </form>
        </div>

        <div class="menu-container-2" id="menu-2">
            <a href="index.php" class="menu-active">Home</a>
            <a href="shop.php">Shop</a>
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact Us</a>
        </div>
    </div>

    <div class="link-show">
        <div class="link-show-container">
            <a href="#">Home</a> > <a href="#">Shop</a> > <a href="#">Single Product</a>
        </div>
    </div>

    <div class="single-product">
        <div class="single-product-container">
            <div class="single-product-header">
                <div class="single-product-left">
                    <img src="admin/upload_image/<?php echo $data['p_image']; ?>" width="100%" height="100%" alt=""
                        class="single-product-left-img">
                </div>

                <div class="single-product-right">
                    <form method="POST" action="" class="single-product-block">
                        <div class="single-product-header" id="single-product-header"><?php echo $data['p_name']; ?>
                        </div>

                        <div class="single-product-price">Price : <b>$<?php echo $data['p_price']; ?></b></div>

                        <div class="single-product-category">Categpry : <b><?php echo $data['p_category']; ?></b></div>

                        <div class="single-product-color">Color : <b><?php echo $data['p_color']; ?></b></div>

                        <div class="single-product-size">Product Size : <b><?php echo $data['p_size']; ?></b></div>

                        <div class="single-product-available">Availability : <b>In Stock</b></div>

                        <div class="single-product-share">Share : <b><a href="#"><span
                                        class="fa fa-facebook"></span></a> <a href="#"><span
                                        class="fa fa-twitter"></span></a> <a href="#"><span
                                        class="fa fa-linkedin"></span></a> <a href="#"><span
                                        class="fa fa-pinterest"></span></a> </b></div>

                        <div class="single-product-description">
                            <?php echo $data['p_description']; ?>
                        </div>

                        <?php if($ok == "ok"){ ?>
                        <div class="single-product-quantity">
                            Quantity: <input type="text" name="p_quantity" id="" placeholder="Quantity"
                                class="single-product-quantity-text-field"><br> <br>

                            <?php if (!empty(Session::show_value("p_quantity"))) { ?>
                            <span><?php echo Session::show_value("p_quantity"); ?></span>
                            <?php } ?>
                        </div>

                        <div class="single-product-btn-block">
                            <input type="submit" value="Add Cart" name="shop" class="shop-btn">
                            <input type="submit" value="Add Wishlist" name="wishlist" class="wish-btn-2">
                        </div>
                        <?php }else{ ?>
                        <h3><strong>Error!</strong> Product Already Added</h3>
                        <?php } ?>
                    </form>
                </div>
            </div>

            <div class="single-product-footer">
                <div class="single-product-footer-header">
                    <div onclick="singleProductDisplay('description',this)" id="default">Description</div>
                    <div onclick="singleProductDisplay('additional',this)" id="information">Additional Information</div>
                </div>

                <div class="single-product-footer-footer" id="description">
                    <div class="single-product-header" id="single-product-header"><?php echo $data['p_name']; ?></div>

                    <div class="single-product-price">Price : <b>$<?php echo $data['p_price']; ?></b></div>

                    <div class="single-product-category">Categpry : <b><?php echo $data['p_category']; ?></b></div>

                    <div class="single-product-color">Color : <b><?php echo $data['p_color']; ?></b> </div>

                    <div class="single-product-size">Product Size : <b><?php echo $data['p_size']; ?></b></div>

                    <?php if ($p_quantity_2 == '0') { ?>
                        <div class="single-product-available">Availability : <b>Out of Stock</b></div>
                    <?php }else{ ?>
                        <div class="single-product-available">Availability : <b>In Stock</b></div>
                    <?php } ?>
                </div>

                <div class="single-product-footer-footer" id="additional">
                    <div class="single-product-header" id="single-product-header"><?php echo $data['p_name'] ?></div>

                    <?php if($data['p_main_category'] == "Featured" || $data['p_main_category'] == "Featured_2" || $data['p_main_category'] == "Featured_3"){ ?>
                    <div class="single-product-offer">Special Offer : <b>YES</b></div>
                    <?php }else{ ?>
                    <div class="single-product-offer">Special Offer : <b>NO</b></div>
                    <?php } ?>

                    <?php if($data['p_delivery'] == "YES"){ ?>
                    <div class="single-product-Delivery">Delivery Charge : <b>FREE</b></div>
                    <?php }else{ ?>
                    <div class="single-product-Delivery">Delivery Charge : <b>$10</b></div>
                    <?php } ?>

                    <?php if(!empty($data['p_discount'])){ ?>
                    <div class="single-product-Delivery">Discount : <b><?php echo $data['p_discount'] ?></b></div>
                    <?php }else{ ?>
                    <div class="single-product-Delivery">Discount: <b>0%</b></div>
                    <?php } ?>

                    <div class="single-product-quantity">Quantity : <b><?php echo $p_quantity_2; ?></b></div>
                </div>
            </div>
        </div>
    </div>

    <div class="product">
        <div class="product-container">
            <div class="product-header">
                <div>Related Product</div>
            </div>

            <div class="product-content">
                <?php foreach($data_2 as $result_2){ ?>
                <div class="product-block">
                    <div class="product-block-header">
                        <div class="product-img">
                            <img src="admin/upload_image/<?php echo $result_2['p_image'] ?>" width="100%" height="100%"
                                alt="">
                        </div>

                        <h2 style="margin-bottom: unset;padding-bottom: unset"><?php echo $result_2['p_name']; ?></h2>

                        <div class="product-price">$<?php echo $result_2['p_price'] ?>.00</div>
                    </div>

                    <div class="product-btn-block">
                        <a href="single-product.php?product_id=<?php echo $result_2['p_id']; ?>" class="cart-btn">Add
                            Cart</a>

                        <a href="#" class="search-btn">
                            <span class="fa fa-search"></span>
                        </a>
                    </div>

                    <div class="off-text"><?php echo $result_2['p_discount']; ?>% OFF</div>

                    <a href="#" class="wish-btn">
                        <span class="fa fa-heart-o"></span>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <div class="fotoer-block">
                <div class="footer-header">
                    <div class="logo">Sung<span>Glass</span></div>
                </div>

                <div class="footer-content">
                    <a href="#">
                        <span class="fa fa-map-marker"></span>
                        <span>59 Street, Newyork City, Rose Town, 05 Rive House</span>
                    </a>

                    <a href="#">
                        <span class="fa fa-phone"></span>
                        <span>+123 456 7890</span>
                    </a>

                    <a href="#">
                        <span class="fa fa-envelope-o"></span>
                        <span>info@example.com</span>
                    </a>
                </div>
            </div>

            <div class="footer-block">
                <div class="footer-header">Information</div>

                <div class="footer-content">
                    <a href="#">About Us</a>
                    <a href="#">Contact Us</a>
                    <a href="#">Selling Tips</a>
                </div>
            </div>

            <div class="footer-block">
                <div class="footer-header">My Account</div>

                <div class="footer-content">
                    <a href="#">Login / Register</a>
                    <a href="#">My Cart</a>
                    <a href="#">Whishlist</a>
                    <a href="#">Order History</a>
                    <a href="#">Track Order</a>
                </div>
            </div>

            <div class="footer-block">
                <div class="footer-header">Help & Support</div>

                <div class="footer-content">
                    <a href="#">How To Shop</a>
                    <a href="#">Payment</a>
                    <a href="#">Returns</a>
                    <a href="#">Delivery</a>
                    <a href="#">Privacy & Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <div class="footer-last">
        <div class="footer-last-container">
            <div class="footer-last-header">
                <div class="footer-last-header-left">© Copyright Sunglass 2021. Designed and Developed</div>

                <div class="footer-last-header-right">
                    <div class="pay-img">
                        <img src="img/11.png" width="100%" height="100%" alt="">
                    </div>

                    <div class="pay-img">
                        <img src="img/12.png" width="100%" height="100%" alt="">
                    </div>

                    <div class="pay-img">
                        <img src="img/13.png" width="100%" height="100%" alt="">
                    </div>
                </div>
            </div>

            <div class="footer-last-footer">
                <a href="#"><span class="fa fa-facebook"></span></a>
                <a href="#"><span class="fa fa-twitter"></span></a>
                <a href="#"><span class="fa fa-linkedin"></span></a>
                <a href="#"><span class="fa fa-vimeo"></span></a>
                <a href="#"><span class="fa fa-youtube"></span></a>
            </div>
        </div>
    </div>

    <script src="js/main.js"></script>
    <script src="js/menu.js"></script>
</body>

</html>

<?php 
    Session::remove_value("p_quantity");
?>