<!DOCTYPE html>
<html lang="en">

<?php
    include 'lib/Main_query.php';
    $mn_query = new Main_query();
    error_reporting(0);
    $data = $mn_query->select_product();
    $p_categrory = $mn_query->select_category();

    if (empty($_SESSION['product_cart_arr'])) {
        foreach($p_categrory as $p_result){
            $_SESSION['product_cart_arr'][] = $p_result['p_category'];
        }
    }

    
    if (empty($_SESSION["cat_count_arr"])) {
        for ($i=0; $i < count($_SESSION["product_cart_arr"]); $i++) { 
            $product_cat_arr_data = $_SESSION["product_cart_arr"][$i];
            $product_cart_arr_result = $mn_query->count_category_product($product_cat_arr_data)->fetch_assoc();
            
            foreach($product_cart_arr_result as $arr){
                $_SESSION["cat_count_arr"][] = $arr;
            }
        }
    }



    $p_color = $mn_query->select_color();

    if (empty($_SESSION['product_color_arr'])) {
        foreach($p_color as $p_color_result){
            $_SESSION['product_color_arr'][] = $p_color_result['p_color'];
        }
    }

    
    if (empty($_SESSION["color_count_arr"])) {
        for ($i=0; $i < count($_SESSION["product_color_arr"]); $i++) { 
            $product_color_arr_data = $_SESSION["product_color_arr"][$i];
            $product_color_arr_result = $mn_query->count_color_product($product_color_arr_data)->fetch_assoc();
            
            foreach($product_color_arr_result as $color_arr){
                $_SESSION["color_count_arr"][] = $color_arr;
            }
        }
    }

    $p_price_high = $mn_query->select_product_price_high();
    $p_price_low = $mn_query->select_product_price_low();
?>

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
                    <a href="login.php">Login</a>
                    <a href="sing.php">Sign Up</a>
                </div>
            </div>
        </div>
    </div>

    <div class="menu" id="menu">
        <div class="menu-container">
            <div class="logo">Sung<span>Glass</span></div>

            <div class="menu-block">
                <a href="index.php">Home</a>
                <a href="shop.php" class="menu-active">Shop</a>
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
            <a href="index.php">Home</a>
            <a href="shop.php" class="menu-active">Shop</a>
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact Us</a>
        </div>
    </div>

    <div class="link-show">
        <div class="link-show-container">
            <a href="#">Home</a> > <a href="#">Shop</a>
        </div>
    </div>

    <div class="product">
        <div class="product-container">
            <div class="product-header-2">
                <div class="product-header-2-left">
                    <div class="product-header-2-left-block">Filter by:</div>
                    <div class="product-header-2-left-block" id="left_block" onclick="showProductHeaderTab('category',this)">Categories <div class="down"><span class="fa fa-angle-down"></span></div> <div class="up"><span class="fa fa-angle-up"></span></div></div>
                    <div class="product-header-2-left-block" id="left_block" onclick="showProductHeaderTab('color',this)">Color <div class="down"><span class="fa fa-angle-down"></span></div> <div class="up"><span class="fa fa-angle-up"></span></div></div>
                    <div class="product-header-2-left-block" id="left_block" onclick="showProductHeaderTab('price',this)">Price <div class="down"><span class="fa fa-angle-down"></span></div> <div class="up"><span class="fa fa-angle-up"></span></div></div>
                </div>

                <div class="product-header-2-right">
                    <div class="product-header-2-right-block">Showing 1–9 of 83 results</div>
                    
                    <div class="product-header-2-right-block">
                        <select name="#" id="" onchange="show_product_by_featured(this.value)">
                            <option value="none">Default</option>
                            <option value="newest">Newest</option>
                            <option value="featured">Featured</option>
                            <option value="low_price">Price: Low to High</option>
                            <option value="high_price">Price: High to Low</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="product-header-2-tab">
                <div class="product-header-2-tab-block" id="category">
                    <?php for($i = 0; $i < count($_SESSION['product_cart_arr']); $i++){ ?>
                        <div onclick="show_product_by_category('<?php echo $_SESSION['product_cart_arr'][$i] ?>')">
                            <p>
                                <?php echo $_SESSION['product_cart_arr'][$i] ?> (<?php echo $_SESSION["cat_count_arr"][$i] ?>)
                            </p>
                        </div>
                    <?php } ?>
                </div>

                <div class="product-header-2-tab-block" id="color">
                    <?php for($i = 0; $i < count($_SESSION['product_color_arr']); $i++){ ?>
                        <p onclick="show_product_by_color('<?php echo $_SESSION['product_color_arr'][$i] ?>')">
                            <?php echo $_SESSION['product_color_arr'][$i] ?> (<?php echo $_SESSION["color_count_arr"][$i] ?>)
                        </p>
                    <?php } ?>
                </div>

                <form method="POST" action="#" class="product-header-2-tab-block" id="price">
                    <input type="number" name="min_value" placeholder="Min price" id="" class="small-price" maxlength="2" required>
                    <input type="number" name="max_value" placeholder="Max price" id="" class="big-price" maxlength="4" required>
                    <input type="submit" value="Search Now" class="shop-search">
                    <div onclick="submit_forms()">Show Result</div>
                </form>
            </div>

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $min_value = $_POST["min_value"];
                    $max_value = $_POST["max_value"];

                    if ($max_value == "0") {
                        $max_value = 500;
                    }

                    unset($_SESSION["price_data_arr"]);

                    foreach($data as $price_data){
                        if ($price_data['p_price'] > $min_value && $price_data['p_price'] < $max_value) {
                            $price_arr = array($price_data['p_image'], $price_data['p_name'], $price_data['p_price'], $price_data['p_id'], $price_data['p_discount']);
                            $_SESSION["price_data_arr"][] = $price_arr;
                        }
                    }
                    
                    if ($min_value > $max_value) {
            ?>

            <p><b>Something is wrong</b></p>

            <?php }} ?>

            <div class="product-content">
                <?php for ($i=0; $i < count($_SESSION["price_data_arr"]); $i++) { ?>
                    <div class="product-block" id="price_arr_data">
                        <div class="product-block-header">
                            <div class="product-img">
                                <img src="admin/upload_image/<?php echo $_SESSION["price_data_arr"][$i][0] ?>" width="100%" height="100%" alt="">
                            </div>

                            <h2 style="margin-bottom: unset;padding-bottom: unset"><?php echo $_SESSION["price_data_arr"][$i][1] ?></h2>

                            <div class="product-price"><?php echo '$'.$_SESSION["price_data_arr"][$i][2] ?></div>
                        </div>

                        <div class="product-btn-block">
                            <a href="single-product.php?product_id=<?php echo $_SESSION["price_data_arr"][$i][3] ?>" class="cart-btn">Add Cart</a>

                            <a href="#" class="search-btn">
                                <span class="fa fa-search"></span>
                            </a>
                        </div>
                        
                        <?php if($_SESSION["price_data_arr"][$i][4] != "0"){ ?>
                            <div class="off-text"><?php echo $_SESSION["price_data_arr"][$i][4]; ?>% OFF</div>
                        <?php } ?>

                        <a href="#" class="wish-btn">
                            <span class="fa fa-heart-o"></span>
                        </a>
                    </div>
                <?php } ?>
            </div>   

            <div class="product-content">
                <?php foreach($data as $result){ ?>
                    <div class="product-block" id="<?php echo $result['p_main_category'] ?>">
                        <div class="product-block-header">
                            <div class="product-img">
                                <img src="admin/upload_image/<?php echo $result['p_image'] ?>" width="100%" height="100%" alt="">
                            </div>

                            <h2 style="margin-bottom: unset;padding-bottom: unset"><?php echo $result['p_name']; ?></h2>

                            <div class="product-price"><?php echo '$'.$result['p_price']; ?></div>
                        </div>

                        <div class="product-btn-block">
                            <a href="single-product.php?product_id=<?php echo $result['p_id'] ?>" class="cart-btn">Add Cart</a>

                            <a href="#" class="search-btn">
                                <span class="fa fa-search"></span>
                            </a>
                        </div>
                        
                        <?php if($result['p_discount'] != "0"){ ?>
                            <div class="off-text"><?php echo $result['p_discount']; ?>% OFF</div>
                        <?php } ?>

                        <a href="#" class="wish-btn">
                            <span class="fa fa-heart-o"></span>
                        </a>
                    </div>
                <?php } ?>
            </div>

            <div class="product-content">
                <?php foreach($data as $result){ ?>
                    <div class="product-block" id="<?php echo $result['p_category'] ?>">
                        <div class="product-block-header">
                            <div class="product-img">
                                <img src="admin/upload_image/<?php echo $result['p_image'] ?>" width="100%" height="100%" alt="">
                            </div>

                            <h2 style="margin-bottom: unset;padding-bottom: unset"><?php echo $result['p_name']; ?></h2>

                            <div class="product-price"><?php echo '$'.$result['p_price']; ?></div>
                        </div>

                        <div class="product-btn-block">
                            <a href="single-product.php?product_id=<?php echo $result['p_id'] ?>" class="cart-btn">Add Cart</a>

                            <a href="#" class="search-btn">
                                <span class="fa fa-search"></span>
                            </a>
                        </div>

                        <?php if($result['p_discount'] != "0"){ ?>
                            <div class="off-text"><?php echo $result['p_discount']; ?>% OFF</div>
                        <?php } ?>

                        <a href="#" class="wish-btn">
                            <span class="fa fa-heart-o"></span>
                        </a>
                    </div>
                <?php } ?>
            </div>

            <div class="product-content">
                <?php foreach($data as $result){ ?>
                    <div class="product-block" id="<?php echo $result['p_color'] ?>">
                        <div class="product-block-header">
                            <div class="product-img">
                                <img src="admin/upload_image/<?php echo $result['p_image'] ?>" width="100%" height="100%" alt="">
                            </div>

                            <h2 style="margin-bottom: unset;padding-bottom: unset"><?php echo $result['p_name']; ?></h2>

                            <div class="product-price"><?php echo '$'.$result['p_price']; ?></div>
                        </div>

                        <div class="product-btn-block">
                            <a href="single-product.php?product_id=<?php echo $result['p_id'] ?>" class="cart-btn">Add Cart</a>

                            <a href="#" class="search-btn">
                                <span class="fa fa-search"></span>
                            </a>
                        </div>

                        <?php if($result['p_discount'] != "0"){ ?>
                            <div class="off-text"><?php echo $result['p_discount']; ?>% OFF</div>
                        <?php } ?>

                        <a href="#" class="wish-btn">
                            <span class="fa fa-heart-o"></span>
                        </a>
                    </div>
                <?php } ?>
            </div>

            <div class="product-content">
                <?php 
                    $x = 0;
                    $xx = 0; 
                ?>

                <?php foreach($data as $result){ ?>
                    <?php
                        if ($x >= 6) {
                            $xx++;
                            $x = 0;
                        }

                        $x++;
                    ?>

                    <div class="product-block <?php echo 'def'.$xx; ?>" id="default_id">
                        <div class="product-block-header">
                            <div class="product-img">
                                <img src="admin/upload_image/<?php echo $result['p_image'] ?>" width="100%" height="100%" alt="">
                            </div>

                            <h2 style="margin-bottom: unset;padding-bottom: unset"><?php echo $result['p_name']; ?></h2>

                            <div class="product-price"><?php echo '$'.$result['p_price']; ?></div>
                        </div>

                        <div class="product-btn-block">
                            <a href="single-product.php?product_id=<?php echo $result['p_id'] ?>" class="cart-btn">Add Cart</a>

                            <a href="#" class="search-btn">
                                <span class="fa fa-search"></span>
                            </a>
                        </div>

                        <?php if($result['p_discount'] != "0"){ ?>
                            <div class="off-text"><?php echo $result['p_discount']; ?>% OFF</div>
                        <?php } ?>

                        <a href="#" class="wish-btn">
                            <span class="fa fa-heart-o"></span>
                        </a>
                    </div>
                <?php } ?>
            </div>

            <?php 
                $x = 0;
                $xx = 0; 
                $xa = 2;
            ?>

            <div id="def_load_btn" class="load-btn">
                <span onclick="defPagination('<?php echo 'def0' ?>')">1</span>

                <?php foreach($data as $result){ ?>
                    <?php
                        if ($x > 6) {
                            $xx++;
                            $x = 0;
                    ?>    
                        <span onclick="defPagination('<?php echo 'def'.$xx; ?>')"><?php echo $xa++; ?></span>
                    <?php } $x++; ?>
                <?php } ?>
            </div>
            
            <div class="product-content">
                <?php foreach($p_price_high as $result){ ?>
                    <div class="product-block" id="high_price">
                        <div class="product-block-header">
                            <div class="product-img">
                                <img src="admin/upload_image/<?php echo $result['p_image'] ?>" width="100%" height="100%" alt="">
                            </div>

                            <h2 style="margin-bottom: unset;padding-bottom: unset"><?php echo $result['p_name']; ?></h2>

                            <div class="product-price"><?php echo '$'.$result['p_price']; ?></div>
                        </div>

                        <div class="product-btn-block">
                            <a href="single-product.php?product_id=<?php echo $result['p_id'] ?>" class="cart-btn">Add Cart</a>

                            <a href="#" class="search-btn">
                                <span class="fa fa-search"></span>
                            </a>
                        </div>

                        <?php if($result['p_discount'] != "0"){ ?>
                            <div class="off-text"><?php echo $result['p_discount']; ?>% OFF</div>
                        <?php } ?>

                        <a href="#" class="wish-btn">
                            <span class="fa fa-heart-o"></span>
                        </a>
                    </div>
                <?php } ?>
            </div>

            <div class="product-content">
                <?php foreach($p_price_low as $result){ ?>
                    <div class="product-block" id="low_price">
                        <div class="product-block-header">
                            <div class="product-img">
                                <img src="admin/upload_image/<?php echo $result['p_image'] ?>" width="100%" height="100%" alt="">
                            </div>

                            <h2 style="margin-bottom: unset;padding-bottom: unset"><?php echo $result['p_name']; ?></h2>

                            <div class="product-price"><?php echo '$'.$result['p_price']; ?></div>
                        </div>

                        <div class="product-btn-block">
                            <a href="single-product.php?product_id=<?php echo $result['p_id'] ?>" class="cart-btn">Add Cart</a>

                            <a href="#" class="search-btn">
                                <span class="fa fa-search"></span>
                            </a>
                        </div>

                        <?php if($result['p_discount'] != "0"){ ?>
                            <div class="off-text"><?php echo $result['p_discount']; ?>% OFF</div>
                        <?php } ?>

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
    <script src="js/filter_2.js"></script>
    <script>
        function defPagination(defPageVal){
            var product_id = document.getElementsByClassName('product-block');

            var page_id = document.getElementsByClassName(defPageVal);
                    
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