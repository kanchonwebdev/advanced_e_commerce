<?php
    include_once 'lib/Functions.php';
    error_reporting(0);

    if($_SESSION["u_name"] == ""){
        header("Location: login.php");
    }

    if(count(Session::show_value("cart_session_arr")) > 0){
        $cart_session_arr_key = array_keys(Session::show_value("cart_session_arr"));
        for($i = 0; $i < count($cart_session_arr_key); $i++){ 
            $j = $cart_session_arr_key[$i];
            if (empty($_SESSION["cart_session_arr"][$j])) {
                unset($_SESSION["cart_session_arr"][$j]);
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $b_name = $_POST['b_name'];
        $h_name = $_POST['h_name'];
        $store_name = $_POST['store_name'];
        $email = $_POST['email'];

        Functions::data_validation($f_name, 'f_name', 'text');
        Functions::data_validation($l_name, 'l_name', 'text');
        Functions::data_validation($b_name, 'b_name', 'text');
        Functions::data_validation($h_name, 'h_name', 'text');
        Functions::data_validation($store_name, 'store_name', 'select');
        Functions::data_validation($email, 'email', 'email');
        if (Functions::$ok_alert == "ok") {
            $_SESSION['success_msg'] = "Address save successfully";
            $_SESSION['address_arr'] = array($f_name, $l_name, $b_name, $h_name, $store_name, $email);
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
    <link rel="stylesheet" href="css/checkout.css">
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
                <a href="cart.php"><span class="fa fa-shopping-cart"></span> <sup><?php echo count($_SESSION["cart_session_arr"]) ?></sup></a>
                <a href="wishlist.php"><span class="fa fa-heart-o"></span> <sup><?php echo count($_SESSION["wish_session_arr"]) ?></sup></a>
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
            <a href="#">Home</a> > <a href="#">Shop</a> > <a href="#">Single Product</a> > <a href="#">Cart</a> > <a href="#">Checkout</a>
        </div>
    </div>

    <div class="checkout">
        <div class="checkout-container">
            <div class="checkout-left">
                <?php if(Functions::$ok_alert == "ok"){ ?>
                   <h1> <?php echo $_SESSION['success_msg']; ?></h1>
                <?php } ?>
                
                <div class="checkout-left-header">Billing Address</div>

                <form method="POST" action="" class="checkout-left-block">  
                    <div class="checkout-left-content">
                        <input type="text" name="f_name" id="" placeholder="First Name *" value="<?php echo $_SESSION['address_arr'][0]; ?>" class="checkout-text-field">
                        <input type="text" name="l_name" id="" placeholder="Last Name *" value="<?php echo $_SESSION['address_arr'][1]; ?>" class="checkout-text-field">
                    </div>
                    
                    <?php if (!empty(Session::show_value("f_name"))) { ?>
                        <span><?php echo Session::show_value("f_name"); ?></span>
                    <?php } ?>

                    
                    <?php if (!empty(Session::show_value("l_name"))) { ?>
                        <span><?php echo Session::show_value("l_name"); ?></span>
                    <?php } ?>

                    <div class="checkout-left-content">
                        <input type="text" name="b_name" value="<?php echo $_SESSION['address_arr'][2]; ?>" id="" placeholder="Business Name (Optional)" class="checkout-text-field">
                    </div>

                    <?php if (!empty(Session::show_value("b_name"))) { ?>
                        <span><?php echo Session::show_value("b_name"); ?></span>
                    <?php } ?>

                    <div class="checkout-left-content">
                        <input type="text" name="h_name" value="<?php echo $_SESSION['address_arr'][3]; ?>" id="" placeholder="House Name and Road Number *" class="checkout-text-field">
                    </div>

                    <?php if (!empty(Session::show_value("h_name"))) { ?>
                        <span><?php echo Session::show_value("h_name"); ?></span>
                    <?php } ?>

                    <div class="checkout-left-content"> 
                        <select name="store_name" id="" class="checkout-text-field">
                            <option value="none">--Select Nearest Store Locator--</option>
                            <option value="store one">Store One</option>
                            <option value="store two">Store Two</option>
                            <option value="store three">Store Three</option>

                            <?php if($_SESSION['address-_arr'][4] !== ""){ ?>
                                <option value="none" selected><?php echo $_SESSION['address_arr'][4]; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <?php if (!empty(Session::show_value("store_name"))) { ?>
                        <span><?php echo Session::show_value("store_name"); ?></span>
                    <?php } ?>

                    <div class="checkout-left-content">
                        <input type="email" name="email" value="<?php echo $_SESSION['address_arr'][5]; ?>" id="" placeholder="Email Address *" class="checkout-text-field">
                    </div>

                    <?php if (!empty(Session::show_value("email"))) { ?>
                        <span><?php echo Session::show_value("email"); ?></span>
                    <?php } ?>

                    <div class="checkout-left-content">
                        <input type="submit" class="place-btn" value="Save Address">
                    </div>
                </form>
            </div>

            <div class="checkout-right">
                <div class="checkout-right-header">Your Order</div>

                <div class="checkout-right-content">
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
                    ?>
                    
                    <div class="checkout-right-content-block">
                        <span><?php echo $_SESSION["cart_session_arr"][$j][1]; ?> x <?php echo $_SESSION["cart_session_arr"][$j][7]; ?></span>

                        <b>$<?php echo $total; ?></b>
                    </div>
                        <?php 
                            }

                            $delivery_count = array($count, "10");
                        ?>
                    <hr>

                    <div class="checkout-right-content-block">
                        <span>Total</span>

                        <b>$<?php echo ($sub_total + array_product($delivery_count)) ?></b>
                    </div>

                    <div class="checkout-right-content-block">
                        <a href="payment.php" class="place-btn">Place a Order</a>
                    </div>
                </div>
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
    Session::remove_value('f_name');
    Session::remove_value('l_name');
    Session::remove_value('b_name');
    Session::remove_value('h_name');
    Session::remove_value('store_name');
    Session::remove_value('email');
    Session::remove_value('success_msg');
?>