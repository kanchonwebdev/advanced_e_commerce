<?php
    include 'lib/Main_query.php';
    $mn_query = new Main_query();
    error_reporting(0);
    $data = $mn_query->select_product();
    $data_2 = $mn_query->select_product_2();
    $data_3 = $mn_query->select_product_3();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sunglass</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header">
        <div class="header-container">
            <div class="header-left">
                <p>Shop up to $300 and get <b>Coupon Code</b></p>
            </div>

            <div class="header-right">
                <div class="header-right-header">
                    <div><span class="fa fa-phone"></span>: +(1200) 987 118 765</div>

                    <div><span class="fa fa-bell"></span>: 08:30 – 17:30, mon – sat</div>
                </div>

                <div class="header-right-footer">
                    <?php if($_SESSION["u_name"] != ""){ ?>
                    <?php echo $_SESSION["u_name"] ?> <a href="log_out.php" style="color: blue">Log Out</a>
                    <?php }else{ ?>
                    <a href="login.php">Login</a>&nbsp;&nbsp;&nbsp;
                    <a href="sign.php">Sign Up</a>
                    <?php } ?>
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

    <div class="hero">
        <div class="hero-container">
            <div class="hero-text">
                <h1 class="hero-text-header">
                    Designer Summer <br>
                    Collection
                </h1>

                <div class="hero-text-small">
                    Shen an unknown printer took a galley of type and scrambled make <br>
                    type specimen book. It has survived not only five centuries
                </div>

                <div class="btn-block">
                    <a href="#" class="main-btn">Add Cart</a>
                    <a href="#" class="ghost-btn">Wishlist</a>
                </div>
            </div>
        </div>
    </div>

    <div class="show">
        <div class="show-container">
            <div class="show-block">
                <div class="show-text">Square Shape</div>
                <img src="img/2.png" width="100%" height="100%" alt="" class="show-img">
            </div>

            <div class="show-block">
                <div class="show-text">Round Shape</div>
                <img src="img/3.png" width="100%" height="100%" alt="" class="show-img">
            </div>

            <div class="show-block">
                <div class="show-text">Cats Shape</div>
                <img src="img/4.png" width="100%" height="100%" alt="" class="show-img">
            </div>
        </div>
    </div>

    <div class="product">
        <div class="product-container">
            <div class="product-header">
                <div onclick="filter_product('featured', this)" id="active_filter">Featured</div> / <div
                    onclick="filter_product('newest', this)" id="second_filter">New</div>
            </div>

            <div class="product-content">
                <?php
                    if (count($_SESSION["featured_arr"]) == 0) {
                        foreach($data as $result){
                            $id_check = $result['p_main_category'];

                            if ($id_check == "Featured" || $id_check == "Featured_2" || $id_check == "Featured_3") {
                                $featured_product_arr = array($result["p_name"], $result["p_image"], $result["p_price"], $result["p_id"], $result["p_discount"]);
                                $_SESSION["featured_arr"][] = $featured_product_arr;
                            }

                            if ($id_check == "Newest" || $id_check == "Newest_2" || $id_check == "Newest_3") {
                                $newest_product_arr = array($result["p_name"], $result["p_image"], $result["p_price"], $result["p_id"], $result["p_discount"]);
                                $_SESSION["newest_arr"][] = $newest_product_arr;
                            }
                        }
                    }
                ?>
                
                <?php
                    $featureProduct = array_chunk($_SESSION["featured_arr"], 6);
                    $newProduct = array_chunk($_SESSION["newest_arr"], 6);
                    
                ?>

                <?php for ($j=0; $j < count($featureProduct); $j++) { ?>
                    <?php for ($i=0; $i < count($featureProduct[$j]); $i++) { ?>
                        <div class="product-block <?php echo 'fet'.$j; ?>" id="Featured">
                            <div class="product-block-header">
                                <div class="product-img">
                                    <img src="admin/upload_image/<?php echo $_SESSION["featured_arr"][$i][1] ?>" width="100%"
                                        height="100%" alt="">
                                </div>

                                <h2 style="margin-bottom: unset;padding-bottom: unset">
                                    <?php echo $_SESSION["featured_arr"][$i][0]; ?></h2>

                                <div class="product-price"><?php echo '$'.$_SESSION["featured_arr"][$i][2]; ?></div>
                            </div>

                            <div class="product-btn-block">
                                <a href="single-product.php?product_id=<?php echo $_SESSION["featured_arr"][$i][3] ?>"
                                    class="cart-btn">Add Cart</a>

                                <a href="" class="search-btn">
                                    <span class="fa fa-search"></span>
                                </a>
                            </div>

                            <?php if($_SESSION["featured_arr"][$i][4] !== "0"){ ?>
                                <div class="off-text"><?php echo $_SESSION["featured_arr"][$i][4]; ?>% OFF</div>
                            <?php } ?>

                            <a href="" class="wish-btn">
                                <span class="fa fa-heart-o"></span>
                            </a>
                        </div>
                    <?php } ?>
                <?php } ?>


                <?php for ($j=0; $j < count($newProduct); $j++) { ?>
                    <?php for ($i=0; $i < count($newProduct[$j]); $i++) { ?>
                        <div class="product-block <?php echo 'new'.$j; ?>" id="Newest">
                            <div class="product-block-header">
                                <div class="product-img">
                                    <img src="admin/upload_image/<?php echo $_SESSION["newest_arr"][$i][1] ?>" width="100%"
                                        height="100%" alt="">
                                </div>

                                <div class="product-color-block">
                                    <a href="#" class="red"></a>
                                    <a href="#" class="green"></a>
                                    <a href="#" class="blue"></a>
                                </div>

                                <h2 style="margin-bottom: unset;padding-bottom: unset">
                                    <?php echo $_SESSION["newest_arr"][$i][0]; ?></h2>

                                <div class="product-price"><?php echo '$'.$_SESSION["newest_arr"][$i][2]; ?></div>
                            </div>

                            <div class="product-btn-block">
                                <a href="single-product.php?product_id=<?php echo $_SESSION["newest_arr"][$i][3] ?>"
                                    class="cart-btn">Add Cart</a>

                                <a href="" class="search-btn">
                                    <span class="fa fa-search"></span>
                                </a>
                            </div>

                            <?php if($_SESSION["newest_arr"][$i][4] !== "0"){ ?>
                                <div class="off-text"><?php echo $_SESSION["newest_arr"][$i][4]; ?>% OFF</div>
                            <?php } ?>

                            <a href="" class="wish-btn">
                                <span class="fa fa-heart-o"></span>
                            </a>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        
        <?php if(count($_SESSION["featured_arr"]) <= 6){ ?>
            <div id="featured_load_btn" class="load-btn"></div>
        <?php }else{ ?>
            <div id="featured_load_btn" class="load-btn">
                <span>1</span>
                <span>2</span>
                <span>3</span>
                <span>4</span>
            </div>
        <?php } ?>

        <?php if(count($_SESSION["newest_arr"]) <= 6){ ?>
            <div id="newest_load_btn" class="load-btn"></div>
        <?php }else{ ?>
            <div id="newest_load_btn" class="load-btn">
                <?php $a = 1; for($i = 0; $i < count($newProduct); $i++ ){ ?>
                    <span onclick="paginationFunc('<?php echo 'new'.$i; ?>')"><?php echo $a++; ?></span>
                <?php } ?>
            </div>
        <?php } ?>
    </div>

    <div class="trend">
        <div class="trend-container">
            <div class="trend-block">
                <div class="trend-text-header">
                    <div class="trend-text-header-small">Collection 2021</div>
                    <div class="trend-text-header-big">Now Trending</div>
                </div>

                <div class="trend-img">
                    <img src="img/6.png" width="100%" height="100%" alt="">
                </div>

                <div class="trend-text-details">Acetate Frame Sunglasses</div>

                <div class="trend-price">$80</div>
            </div>
        </div>


        <div class="trend-right-img">
            <img src="img/7.jpg" width="100%" height="100%" alt="">
        </div>
    </div>

    <div class="on-sell">
        <div class="on-sell-container">
            <div class="on-sell-header">On Selling Products</div>

            <div class="on-sell-content">
                <div class="on-sell-block">
                    <div class="on-sell-block-img">
                        <img src="img/8.jpg" width="100%" height="100%" alt="">
                    </div>
                </div>

                <div class="on-sell-block">
                    <?php foreach($data_2 as $result_2){ ?>
                    <a href="single-product.php?product_id=<?php echo $result_2['p_id'] ?>"
                        class="on-sell-block-content">
                        <div class="on-sell-block-content-left">
                            <img src="admin/upload_image/<?php echo $result_2['p_image'] ?>" width="100%" height="100%"
                                alt="">
                        </div>

                        <div class="on-sell-block-content-right">
                            <b><?php echo $result_2['p_name'] ?></b>

                            <span class="on-sell-price">$<?php echo $result_2['p_price'] ?></span>
                        </div>
                    </a>
                    <?php } ?>
                </div>

                <div class="on-sell-block">
                    <?php foreach($data_3 as $result_3){ ?>
                    <a href="single-product.php?product_id=<?php echo $result_3['p_id'] ?>"
                        class="on-sell-block-content">
                        <div class="on-sell-block-content-left">
                            <img src="admin/upload_image/<?php echo $result_3['p_image'] ?>" width="100%" height="100%"
                                alt="">
                        </div>

                        <div class="on-sell-block-content-right">
                            <b><?php echo $result_3['p_name'] ?></b>

                            <span class="on-sell-price">$<?php echo $result_3['p_price'] ?></span>
                        </div>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="support">
        <div class="support-container">
            <div class="support-block">
                <div class="support-left">
                    <div class="icon">
                        <img src="img/i1.png" width="100%" height="100%" alt="">
                    </div>
                </div>

                <div class="support-right">
                    <div class="support-right-header">Free Shipping</div>
                    <div class="support-right-footer">On All Orders</div>
                </div>
            </div>

            <div class="support-block">
                <div class="support-left">
                    <div class="icon">
                        <img src="img/i2.png" width="100%" height="100%" alt="">
                    </div>
                </div>

                <div class="support-right">
                    <div class="support-right-header">100% Money Back</div>
                    <div class="support-right-footer">Within 30 Days Guaranted</div>
                </div>
            </div>

            <div class="support-block">
                <div class="support-left">
                    <div class="icon">
                        <img src="img/i3.png" width="100%" height="100%" alt="">
                    </div>
                </div>

                <div class="support-right">
                    <div class="support-right-header">Secure Payment</div>
                    <div class="support-right-footer">100% secure payment</div>
                </div>
            </div>

            <div class="support-block">
                <div class="support-left">
                    <div class="icon">
                        <img src="img/i4.png" width="100%" height="100%" alt="">
                    </div>
                </div>

                <div class="support-right">
                    <div class="support-right-header">24/7 Live Support</div>
                    <div class="support-right-footer">Get Help When You Need</div>
                </div>
            </div>
        </div>
    </div>

    <div class="summer">
        <div class="summer-container">
            <div class="summer-left">
                <h1>New Summer</h1>
                <span>Collection</span>
                <a href="#" class="main-btn-2">Shop Now ></a>
            </div>

            <div class="summer-right">
                <h1>Winter</h1>
                <span>Collection</span>
                <a href="#" class="main-btn-2">Shop Now ></a>
            </div>
        </div>
    </div>

    <div class="shop">
        <div class="shop-container">
            <div class="shop-header">Why Shop From Us</div>

            <div class="shop-content">
                <div class="shop-block">
                    <div class="icon">
                        <img src="img/i1.png" width="100%" height="100%" alt="">
                    </div>

                    <div class="shop-text">
                        <div class="shop-text-header">FREE SHIPPING</div>

                        <div class="shop-text-content">
                            Lorem Ipsum hasbeen standard daand scrambled. Rimply dummy text of the printing and
                            typesetting industry
                        </div>
                    </div>
                </div>

                <div class="shop-block">
                    <div class="icon">
                        <img src="img/i4.png" width="100%" height="100%" alt="">
                    </div>

                    <div class="shop-text">
                        <div class="shop-text-header">24/7 SUPPORT</div>

                        <div class="shop-text-content">
                            Lorem Ipsum hasbeen standard daand scrambled. Rimply dummy text of the printing and
                            typesetting industry
                        </div>
                    </div>
                </div>

                <div class="shop-block">
                    <div class="icon">
                        <img src="img/i2.png" width="100%" height="100%" alt="">
                    </div>

                    <div class="shop-text">
                        <div class="shop-text-header">EASY RETURN</div>

                        <div class="shop-text-content">
                            Lorem Ipsum hasbeen standard daand scrambled. Rimply dummy text of the printing and
                            typesetting industry
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="newsletter">
        <div class="newsletter-container">
            <div class="newsletter-text">
                <div class="newsletter-text-header">We Deliver Quality Products</div>
                <div class="newsletter-text-footer">Stay connect for latest update</div>
            </div>

            <form action="#" class="newsletter-content">
                <input type="text" name="" placeholder="Email Address" id="" class="newsletter-text-field">
                <a href="#" class="newsletter-btn"><span class="fa fa-envelope-o"></span></a>
            </form>
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
    <script src="js/filter.js"></script>
    <script>
        function paginationFunc(pageVal){
            var product_id = document.getElementsByClassName('product-block');

            var page_id = document.getElementsByClassName(pageVal);
                    
            for (let i = 0; i < product_id.length; i++) {
                product_id[i].style.display = "none";  
            }
                   
            for (let i = 0; i < page_id.length; i++) {
                page_id[i].style.display = "block";  
            }
        }
    </script>
</body>

</html>