<?php 
    include_once 'lib/Main_query.php';
    error_reporting(0);
    if(count(Session::show_value("cart_session_arr")) > 0){
        $cart_session_arr_key = array_keys(Session::show_value("cart_session_arr"));
        for($i = 0; $i < count($cart_session_arr_key); $i++){ 
            $j = $cart_session_arr_key[$i];
            if (empty($_SESSION["cart_session_arr"][$j])) {
                unset($_SESSION["cart_session_arr"][$j]);
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
    <link rel="stylesheet" href="css/cart.css">
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
            <a href="#">Home</a> > <a href="#">Shop</a> > <a href="#">Single Product</a> > <a href="#">Cart</a>
        </div>
    </div>

    <div class="cart">
        <div class="cart-container">
            <?php 
                if(count(Session::show_value("cart_session_arr")) > 0){
                $cart_session_arr_key = array_keys(Session::show_value("cart_session_arr"));
            ?>

            <div class="cart-header">
                <div class="cart-header-header">
                    <div class="cart-header-header-block">Product</div>
                    <div class="cart-header-header-block">Price</div>
                    <div class="cart-header-header-block">Quantity</div>
                    <div class="cart-header-header-block">Total</div>
                    <div class="cart-header-header-block">Action</div>
                </div>

                <?php 
                    for($i = 0; $i < count($cart_session_arr_key); $i++){ 
                        $j = $cart_session_arr_key[$i];
                ?>

                <form action="update_cart.php" method="post" class="cart-header-footer">
                    <div class="cart-header-footer-block"><?php echo $_SESSION["cart_session_arr"][$j][1] ?></div>

                    <div class="cart-header-footer-block"><?php echo $_SESSION["cart_session_arr"][$j][3] ?></div>

                    <div class="cart-header-footer-block"><input type="text" name="arr_p_quantity"
                            value="<?php echo $_SESSION["cart_session_arr"][$j][7] ?>" class="cart-text-field"></div>

                    <div class="cart-header-footer-block">$<?php echo $_SESSION["cart_session_arr"][$j][3] ?> X
                        <?php echo $_SESSION["cart_session_arr"][$j][7] ?></div>

                    <input type="hidden" name="arr_id" value="<?php echo $j; ?>">

                    <div class="cart-header-footer-block"><a href="remove_cart_2.php?arr_id=<?php echo $j ?>"
                            class="remove-btn">Remove</a> <input type="submit" value="Update Cart" class="update-btn">
                    </div>
                </form>

                <?php } ?>
            </div>

            <?php 
                $sub_total = 0;
                $count = 0;

                for($i = 0; $i < count($cart_session_arr_key); $i++){ 
                    $j = $cart_session_arr_key[$i];
                    $price = $_SESSION["cart_session_arr"][$j][3];
                    $quantity = $_SESSION["cart_session_arr"][$j][7];

                    if (empty($_SESSION["cart_session_arr"][$j][8])) {
                        $count++;
                    }

                    $array_product = array($_SESSION["cart_session_arr"][$j][3], $_SESSION["cart_session_arr"][$j][7]);
                    $total = array_product($array_product);
                    $sub_total = ($sub_total + $total);
                }

                $delivery_count = array($count, "10");
            ?>

            <div class="cart-footer">
                <form action="" method="POST" class="cart-footer-left">
                    <?php if($sub_total > 200){ ?>
                        <input type="text" name="coupon_id" placeholder="Apply coupon code" id=""
                            class="cart-footer-left-text-field">
                        <input type="submit" value="Apply Coupon" class="apply-btn">
                        
                        <?php 
                            if ($_SESSION['coupon_id'] == null) {
                                $_SESSION['coupon_id'] = rand();
                            }
                        ?>

                        <section>
                            Your Coupon Code <b> : <?php echo $_SESSION['coupon_id']; ?></b>
                        </section>

                        <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $coupon_id = $_POST['coupon_id'];

                                if ($_SESSION['coupon_id'] == $coupon_id) {
                                    if ($_SESSION['rand_discount'] == null) {
                                        $_SESSION['rand_discount'] = rand(5, 25);
                                    }
                                }
                            }
                        ?>

                    <?php } ?>
                    <br>

                    <?php
                        if ($sub_total < 200) {
                            $_SESSION['coupon_id'] = null;
                            $_SESSION['rand_discount'] = 0;
                        }
                    ?>

                    <a href="shop.php" class="continue-btn">Countinue Shopping</a>
                </form>

                <div class="cart-footer-right">
                    <div class="cart-footer-right-block">
                        <b>Total</b>

                        <span>$<?php echo $sub_total; ?></span>
                    </div>

                    <div class="cart-footer-right-block">
                        <b>Delivery charge</b>

                        <span>$<?php echo array_product($delivery_count); ?></span>
                    </div>
                    <hr>

                    <div class="cart-footer-right-block">
                        <?php if($sub_total < 200){ ?>
                            <b>Total</b>

                            <span>$<?php echo ($sub_total + array_product($delivery_count)) ?></span>
                        <?php }else { ?>
                            <?php if($_SESSION['rand_discount'] != null){ ?>
                                <span>Your Discount <b><?php echo $_SESSION['rand_discount'].'%'; ?></b></span>

                                <span>
                                    $<?php 
                                        $total_2 = ($sub_total + array_product($delivery_count));
                                        $dis = ceil($sub_total / $_SESSION['rand_discount']);
                                        echo $sub_total = $sub_total - $dis;
                                    ?>
                                </span>
                            <?php } ?>
                        <?php } ?>
                    </div>

                    <a href="checkout.php" class="checkout-btn">Checkout Now</a>
                </div>
            </div>

            <?php }else{ ?>
            <b>Cart is empty</b>
            <?php }?>
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