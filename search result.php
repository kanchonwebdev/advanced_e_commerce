<?php
    include 'lib/Main_query.php';
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sunglass</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/shop.css">
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
            <a href="#">You search :</a> <a href="#"><h2>Trendy</h2></a>
        </div>
    </div>

    <div class="product">
        <div class="product-container">
            <div class="product-header-2">
                <div class="product-header-2-right">
                    <div class="product-header-2-right-block">Showing 1–9 of 83 results</div>
                </div>
            </div>

            <div class="product-header-2-tab">
                <div class="product-header-2-tab-block" id="category">
                    <div>
                        <a href="#">Categories (01)</a>
                        <a href="#">Categories (01)</a>
                        <a href="#">Categories (01)</a>
                        <a href="#">Categories (01)</a>
                    </div>

                    <div>
                        <a href="#">Categories (01)</a>
                        <a href="#">Categories (01)</a>
                        <a href="#">Categories (01)</a>
                        <a href="#">Categories (01)</a>
                    </div>

                    <div>
                        <a href="#">Categories (01)</a>
                        <a href="#">Categories (01)</a>
                        <a href="#">Categories (01)</a>
                        <a href="#">Categories (01)</a>
                    </div>
                </div>

                <div class="product-header-2-tab-block" id="color">
                    <a href="#">Red</a>

                    <a href="#">Green</a>

                    <a href="#">Blue</a>
                </div>

                <div class="product-header-2-tab-block" id="price">
                    <input type="text" name="" placeholder="Min price" id="" class="small-price">
                    <input type="text" name="" placeholder="Max price" id="" class="big-price">
                    <a href="#" class="shop-search">Search Now</a>
                </div>
            </div>

            <div class="product-content">
                <div class="product-block">
                    <div class="product-block-header">
                        <div class="product-img">
                            <img src="img/5.png" width="100%" height="100%" alt="">
                        </div>

                        <div class="product-color-block">
                            <a href="#" class="red"></a>
                            <a href="#" class="green"></a>
                            <a href="#" class="blue"></a>
                        </div>

                        <div class="product-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</div>

                        <div class="product-price">$70.00</div>
                    </div>

                    <div class="product-btn-block">
                        <a href="#" class="cart-btn">ADD CART</a>

                        <a href="#" class="search-btn">
                            <span class="fa fa-search"></span>
                        </a>
                    </div>

                    <div class="off-text">10% OFF</div>

                    <a href="#" class="wish-btn">
                        <span class="fa fa-heart-o"></span>
                    </a>
                </div>

                <div class="product-block">
                    <div class="product-block-header">
                        <div class="product-img">
                            <img src="img/5.png" width="100%" height="100%" alt="">
                        </div>

                        <div class="product-color-block">
                            <a href="#" class="red"></a>
                            <a href="#" class="green"></a>
                            <a href="#" class="blue"></a>
                        </div>

                        <div class="product-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</div>

                        <div class="product-price">$70.00</div>
                    </div>

                    <div class="product-btn-block">
                        <a href="#" class="cart-btn">ADD CART</a>

                        <a href="#" class="search-btn">
                            <span class="fa fa-search"></span>
                        </a>
                    </div>

                    <div class="off-text">10% OFF</div>

                    <a href="#" class="wish-btn">
                        <span class="fa fa-heart-o"></span>
                    </a>
                </div>

                <div class="product-block">
                    <div class="product-block-header">
                        <div class="product-img">
                            <img src="img/5.png" width="100%" height="100%" alt="">
                        </div>

                        <div class="product-color-block">
                            <a href="#" class="red"></a>
                            <a href="#" class="green"></a>
                            <a href="#" class="blue"></a>
                        </div>

                        <div class="product-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</div>

                        <div class="product-price">$70.00</div>
                    </div>

                    <div class="product-btn-block">
                        <a href="#" class="cart-btn">ADD CART</a>

                        <a href="#" class="search-btn">
                            <span class="fa fa-search"></span>
                        </a>
                    </div>

                    <div class="off-text">10% OFF</div>

                    <a href="#" class="wish-btn">
                        <span class="fa fa-heart-o"></span>
                    </a>
                </div>

                <div class="product-block">
                    <div class="product-block-header">
                        <div class="product-img">
                            <img src="img/5.png" width="100%" height="100%" alt="">
                        </div>

                        <div class="product-color-block">
                            <a href="#" class="red"></a>
                            <a href="#" class="green"></a>
                            <a href="#" class="blue"></a>
                        </div>

                        <div class="product-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</div>

                        <div class="product-price">$70.00</div>
                    </div>

                    <div class="product-btn-block">
                        <a href="#" class="cart-btn">ADD CART</a>

                        <a href="#" class="search-btn">
                            <span class="fa fa-search"></span>
                        </a>
                    </div>

                    <div class="off-text">10% OFF</div>

                    <a href="#" class="wish-btn">
                        <span class="fa fa-heart-o"></span>
                    </a>
                </div>

                <div class="product-block">
                    <div class="product-block-header">
                        <div class="product-img">
                            <img src="img/5.png" width="100%" height="100%" alt="">
                        </div>

                        <div class="product-color-block">
                            <a href="#" class="red"></a>
                            <a href="#" class="green"></a>
                            <a href="#" class="blue"></a>
                        </div>

                        <div class="product-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</div>

                        <div class="product-price">$70.00</div>
                    </div>

                    <div class="product-btn-block">
                        <a href="#" class="cart-btn">ADD CART</a>

                        <a href="#" class="search-btn">
                            <span class="fa fa-search"></span>
                        </a>
                    </div>

                    <div class="off-text">10% OFF</div>

                    <a href="#" class="wish-btn">
                        <span class="fa fa-heart-o"></span>
                    </a>
                </div>

                <div class="product-block">
                    <div class="product-block-header">
                        <div class="product-img">
                            <img src="img/5.png" width="100%" height="100%" alt="">
                        </div>

                        <div class="product-color-block">
                            <a href="#" class="red"></a>
                            <a href="#" class="green"></a>
                            <a href="#" class="blue"></a>
                        </div>

                        <div class="product-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</div>

                        <div class="product-price">$70.00</div>
                    </div>

                    <div class="product-btn-block">
                        <a href="#" class="cart-btn">ADD CART</a>

                        <a href="#" class="search-btn">
                            <span class="fa fa-search"></span>
                        </a>
                    </div>

                    <div class="off-text">10% OFF</div>

                    <a href="#" class="wish-btn">
                        <span class="fa fa-heart-o"></span>
                    </a>
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