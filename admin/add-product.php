<?php
    include 'lib/Session.php';
    Session::session_start();
    error_reporting(0);
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
    <link rel="stylesheet" href="css/add-product.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="header-left">
            Sunglass
        </div>

        <div class="header-right">
            <form action="#" method="POST" class="header-right-left">
                <input type="text" name="" placeholder="Search here..." id="" class="header-right-left-text-field">
                <button type="submit" class="header-right-left-btn"><span class="fa fa-search"></span></button>
            </form>

            <div class="header-right-right">
                <div class="header-right-right-block">
                    <a href="#" class="header-right-right-block-header"><span class="fa fa-bell"></span> <sup>01</sup></a>
                    
                    <div class="header-right-right-block-content">
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                    </div>
                </div>

                <div class="header-right-right-block">
                    <a href="#" class="header-right-right-block-header"><span class="fa fa-flag"></span> <sup>01</sup></a>
                    
                    <div class="header-right-right-block-content">
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                    </div>
                </div>

                <div class="header-right-right-block">
                    <a href="#" class="header-right-right-block-header"><span class="fa fa-power-off"></span></a>
                </div>
            </div>
        </div>
    </header>

    <div class="admin">
        <div class="admin-left">
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
                    <div class="admin-left-content-block-content">
                        <div class="admin-left-content-block-content-header"><div><span class="fa fa-shopping-cart"></span>&nbsp; Product</div> <span class="fa fa-angle-right"></span></div>

                        <div class="admin-left-product-block">
                            <span>&#8594;</span>

                            <b><a href="add-product.php">Add Product</a></b>
                        </div>

                        <div class="admin-left-product-block">
                            <span><span>&#8594;</span></span>

                            <b><a href="product.php">Product</a></b>
                        </div>

                        <div class="admin-left-product-block">
                            <span><span>&#8594;</span></span>

                            <b><a href="product-list.php">Product List</a></b>
                        </div>
                    </div>
                </div>

                <div class="admin-left-content-block">
                    <div class="admin-left-content-block-content">
                        <div class="admin-left-content-block-content-header"><div><span class="fa fa-shopping-bag"></span>&nbsp; Order</div> <span class="fa fa-angle-right"></span></div>

                        <div class="admin-left-product-block">
                            <span><span>&#8594;</span></span>

                            <b><a href="new-order.php">New Order</a></b>
                        </div>

                        <div class="admin-left-product-block">
                            <span><span>&#8594;</span></span>

                            <b><a href="cancel-order.php">Cancel Order</a></b>
                        </div>

                        <div class="admin-left-product-block">
                            <span><span>&#8594;</span></span>

                            <b><a href="complete-order.php">Complete Order</a></b>
                        </div>
                    </div>
                </div>

                <div class="admin-left-content-block">
                    <div class="admin-left-content-block-content">
                        <div class="admin-left-content-block-content-header"><div><span class="fa fa-users"></span>&nbsp; Users</div> <span class="fa fa-angle-right"></span></div>

                        <div class="admin-left-product-block">
                            <span><span>&#8594;</span></span>

                            <b><a href="new-user.php">New User</a></b>
                        </div>

                        <div class="admin-left-product-block">
                            <span><span>&#8594;</span></span>

                            <b><a href="block-user.php">Block User</a></b>
                        </div>

                        <div class="admin-left-product-block">
                            <span><span>&#8594;</span></span>

                            <b><a href="active-user.php">Active User</a></b>
                        </div>
                    </div>
                </div>

                <div class="admin-left-content-block">
                    <div class="admin-left-content-block-content">
                        <div class="admin-left-content-block-content-header"><div><span class="fa fa-gavel"></span>&nbsp; Complaint</div> <span class="fa fa-angle-right"></span></div>

                        <div class="admin-left-product-block">
                            <span><span>&#8594;</span></span>

                            <b><a href="new-complaint.php">New Complaint</a></b>
                        </div>

                        <div class="admin-left-product-block">
                            <span><span>&#8594;</span></span>

                            <b><a href="solved-complaint.php">Solved Complaint</a></b>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="admin-right">
            <div class="admin-right-content">
                <div class="admin-right-content-left">
                    <b>Add Product</b>
                    <span>Welcome to Sunglass</span>
                </div>

                <div class="admin-right-content-right">
                    <a href="#"><span class="fa fa-home"></span> Dashboard / Add Product</a>
                </div>
            </div>

            <div class="add-product">
                <?php if (!empty(Session::show_value("success_msg"))) { ?>
                    <span><?php echo Session::show_value("success_msg"); ?></span>
                <?php } ?>

                <select name="" id="" class="product-text-field" onchange="show_season_menu(this.value)">
                    <option>--Select Season Collection--</option>
                    <option value="Default">Default Collection</option>
                    <option value="Summer">Summer Collection</option>
                    <option value="Winter">Winter Collection</option>
                </select>
                
                <form action="add-product-2.php" id="Default" method="post" enctype="multipart/form-data" class="add-product-season">
                    <input type="text" name="p_name" placeholder="Product Name" id="" class="product-text-field">
                    
                    <input type="hidden" name="p_collection" value="Default">

                    <?php if (!empty(Session::show_value("p_name"))) { ?>
                        <span><?php echo Session::show_value("p_name"); ?></span>
                    <?php } ?>

                    <input type="file" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" name="p_image" placeholder="Product Image" id="" class="product-text-field">

                    <img id="output" alt="">

                    <?php if (!empty(Session::show_value("p_image"))) { ?>
                        <span><?php echo Session::show_value("p_image"); ?></span>
                    <?php } ?>

                    <select name="p_category" id="" class="product-text-field">
                        <option value="NONE">--Product Category--</option>
                        <option value="Trendy">Trendy</option>
                        <option value="Classic">Classic</option>
                        <option value="Vintage">Vintage</option>
                        <option value="Fashoniate">Fashoniate</option>
                    </select>

                    <?php if (!empty(Session::show_value("p_category"))) { ?>
                        <span><?php echo Session::show_value("p_category"); ?></span>
                    <?php } ?>

                    <input type="text" name="p_price" placeholder="Product Price" id="" class="product-text-field">

                    <?php if (!empty(Session::show_value("p_price"))) { ?>
                        <span><?php echo Session::show_value("p_price"); ?></span>
                    <?php } ?>

                    <select name="p_color" id="" class="product-text-field">
                        <option value="NONE">-- Product Color --</option>
                        <option value="Red">Red</option>
                        <option value="Green">Green</option>
                        <option value="Blue">Blue</option>
                        <option value="Yellow">Yellow</option>
                        <option value="Black">Black</option>
                    </select>

                    <?php if (!empty(Session::show_value("p_color"))) { ?>
                        <span><?php echo Session::show_value("p_color"); ?></span>
                    <?php } ?>

                    <select name="p_size" id="" class="product-text-field">
                        <option value="NONE">-- Product Size --</option>
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Large">Large</option>
                    </select>

                    <?php if (!empty(Session::show_value("p_size"))) { ?>
                        <span><?php echo Session::show_value("p_size"); ?></span>
                    <?php } ?>

                    <input type="text" name="p_quantity" placeholder="Product Quantity" id="" class="product-text-field">

                    <?php if (!empty(Session::show_value("p_quantity"))) { ?>
                        <span><?php echo Session::show_value("p_quantity"); ?></span>
                    <?php } ?>

                    <textarea name="p_description" id="" cols="10" rows="5" placeholder="Product Description" class="product-text-field"></textarea>

                    <?php if (!empty(Session::show_value("p_description"))) { ?>
                        <span><?php echo Session::show_value("p_description"); ?></span>
                    <?php } ?>

                    <select name="p_main_category" onchange="show_main_category_block(this.value)" id="" class="product-text-field">
                        <option value="NONE">-- Main Category --</option>
                        <option value="Featured">Featured</option>
                        <option value="Newest">Newest</option>
                    </select>

                    <div class="main-category-block" id="Featured">
                        <select name="p_featured_category" id="" onchange="show_feature_category(this.value)"class="product-text-field">
                            <option value="NONE">-- Featured Category --</option>
                            <option value="Delivery">Delivery</option>
                            <option value="Discount">Discount</option>
                        </select>          
                        
                        <div class="feature-category-block" id="Delivery">
                            <div class="feature-category-delivery-block">Do you want to delivery charge free? <input type="checkbox" name="p_delivery" value="YES" id=""></div>

                            <?php if (!empty(Session::show_value("p_delivery"))) { ?>
                                <span><?php echo Session::show_value("p_delivery"); ?></span>
                            <?php } ?>

                            <div class="feature-category-delivery-block">
                                <input type="submit" value="Add Product" class="product-txt-btn">    
                            </div>   
                        </div>

                        <div class="feature-category-block" id="Discount">
                            <input type="text" name="p_discount" placeholder="Add Discount" id="" class="product-text-field">   
                            
                            <?php if (!empty(Session::show_value("p_discount"))) { ?>
                                <span><?php echo Session::show_value("p_discount"); ?></span>
                            <?php } ?>
                            
                            <input type="submit" value="Add Product" class="product-txt-btn">
                        </div>
                    </div>

                    <div class="main-category-block" id="Newest">
                        <input type="submit" value="Add Product" class="product-txt-btn">
                    </div>
                </form>

                <form action="add-product-3.php" id="Summer" method="post" enctype="multipart/form-data" class="add-product-season">
                    <input type="text" name="p_name_2" placeholder="Product Name" id="" class="product-text-field">
                    
                    <input type="hidden" name="p_collection_2" value="Summer">

                    <?php if (!empty(Session::show_value("p_name_2"))) { ?>
                        <span><?php echo Session::show_value("p_name_2"); ?></span>
                    <?php } ?>

                    <input type="file" onchange="document.getElementById('output_2').src = window.URL.createObjectURL(this.files[0])" name="p_image_2" placeholder="Product Image" id="" class="product-text-field">

                    <img id="output_2" alt="">

                    <?php if (!empty(Session::show_value("p_image_2"))) { ?>
                        <span><?php echo Session::show_value("p_image_2"); ?></span>
                    <?php } ?>

                    <select name="p_category_2" id="" class="product-text-field">
                        <option value="NONE">--Product Category--</option>
                        <option value="Trendy">Trendy</option>
                        <option value="Classic">Classic</option>
                        <option value="Vintage">Vintage</option>
                        <option value="Fashoniate">Fashoniate</option>
                    </select>

                    <?php if (!empty(Session::show_value("p_category_2"))) { ?>
                        <span><?php echo Session::show_value("p_category_2"); ?></span>
                    <?php } ?>

                    <input type="text" name="p_price_2" placeholder="Product Price" id="" class="product-text-field">

                    <?php if (!empty(Session::show_value("p_price_2"))) { ?>
                        <span><?php echo Session::show_value("p_price_2"); ?></span>
                    <?php } ?>

                    <select name="p_color_2" id="" class="product-text-field">
                        <option value="NONE">-- Product Color --</option>
                        <option value="Red">Red</option>
                        <option value="Green">Green</option>
                        <option value="Blue">Blue</option>
                        <option value="Yellow">Yellow</option>
                        <option value="Black">Black</option>
                    </select>

                    <?php if (!empty(Session::show_value("p_color_2"))) { ?>
                        <span><?php echo Session::show_value("p_color_2"); ?></span>
                    <?php } ?>

                    <select name="p_size_2" id="" class="product-text-field">
                        <option value="NONE">-- Product Size --</option>
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Large">Large</option>
                    </select>

                    <?php if (!empty(Session::show_value("p_size_2"))) { ?>
                        <span><?php echo Session::show_value("p_size_2"); ?></span>
                    <?php } ?>

                    <input type="text" name="p_quantity_2" placeholder="Product Quantity" id="" class="product-text-field">

                    <?php if (!empty(Session::show_value("p_quantity_2"))) { ?>
                        <span><?php echo Session::show_value("p_quantity_2"); ?></span>
                    <?php } ?>

                    <textarea name="p_description_2" id="" cols="10" rows="5" placeholder="Product Description" class="product-text-field"></textarea>

                    <?php if (!empty(Session::show_value("p_description_2"))) { ?>
                        <span><?php echo Session::show_value("p_description_2"); ?></span>
                    <?php } ?>

                    <select name="p_main_category_2" onchange="show_main_category_block(this.value)" id="" class="product-text-field">
                        <option value="NONE">-- Main Category --</option>
                        <option value="Featured_2">Featured</option>
                        <option value="Newest_2">Newest</option>
                    </select>

                    <div class="main-category-block" id="Featured_2">
                        <select name="p_featured_category_2" id="" onchange="show_feature_category(this.value)"class="product-text-field">
                            <option value="NONE">-- Featured Category --</option>
                            <option value="Delivery_2">Delivery</option>
                            <option value="Discount_2">Discount</option>
                        </select>          
                        
                        <div class="feature-category-block" id="Delivery_2">
                            <div class="feature-category-delivery-block">Do you want to delivery charge free? <input type="checkbox" name="p_delivery_2" value="YES" id=""></div>

                            <?php if (!empty(Session::show_value("p_delivery_2"))) { ?>
                                <span><?php echo Session::show_value("p_delivery_2"); ?></span>
                            <?php } ?>

                            <div class="feature-category-delivery-block">
                                <input type="submit" value="Add Product" class="product-txt-btn">    
                            </div>   
                        </div>

                        <div class="feature-category-block" id="Discount_2">
                            <input type="text" name="p_discount_2" placeholder="Add Discount" id="" class="product-text-field">   
                            
                            <?php if (!empty(Session::show_value("p_discount_2"))) { ?>
                                <span><?php echo Session::show_value("p_discount_2"); ?></span>
                            <?php } ?>
                            
                            <input type="submit" value="Add Product" class="product-txt-btn">
                        </div>
                    </div>

                    <div class="main-category-block" id="Newest_2">
                        <input type="submit" value="Add Product" class="product-txt-btn">
                    </div>
                </form>

                <form action="add-product-4.php" id="Winter" method="post" enctype="multipart/form-data" class="add-product-season">
                    <input type="text" name="p_name_3" placeholder="Product Name" id="" class="product-text-field">
                    
                    <input type="hidden" name="p_collection_3" value="Winter">

                    <?php if (!empty(Session::show_value("p_name_3"))) { ?>
                        <span><?php echo Session::show_value("p_name_3"); ?></span>
                    <?php } ?>

                    <input type="file" onchange="document.getElementById('output_3').src = window.URL.createObjectURL(this.files[0])" name="p_image_3" placeholder="Product Image" id="" class="product-text-field">

                    <img id="output_3" alt="">

                    <?php if (!empty(Session::show_value("p_image_3"))) { ?>
                        <span><?php echo Session::show_value("p_image_3"); ?></span>
                    <?php } ?>

                    <select name="p_category_3" id="" class="product-text-field">
                        <option value="NONE">--Product Category--</option>
                        <option value="Trendy">Trendy</option>
                        <option value="Classic">Classic</option>
                        <option value="Vintage">Vintage</option>
                        <option value="Fashoniate">Fashoniate</option>
                    </select>

                    <?php if (!empty(Session::show_value("p_category_3"))) { ?>
                        <span><?php echo Session::show_value("p_category_3"); ?></span>
                    <?php } ?>

                    <input type="text" name="p_price_3" placeholder="Product Price" id="" class="product-text-field">

                    <?php if (!empty(Session::show_value("p_price_3"))) { ?>
                        <span><?php echo Session::show_value("p_price_3"); ?></span>
                    <?php } ?>

                    <select name="p_color_3" id="" class="product-text-field">
                        <option value="NONE">-- Product Color --</option>
                        <option value="Red">Red</option>
                        <option value="Green">Green</option>
                        <option value="Blue">Blue</option>
                        <option value="Yellow">Yellow</option>
                        <option value="Black">Black</option>
                    </select>

                    <?php if (!empty(Session::show_value("p_color_3"))) { ?>
                        <span><?php echo Session::show_value("p_color_3"); ?></span>
                    <?php } ?>

                    <select name="p_size_3" id="" class="product-text-field">
                        <option value="NONE">-- Product Size --</option>
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Large">Large</option>
                    </select>

                    <?php if (!empty(Session::show_value("p_size_3"))) { ?>
                        <span><?php echo Session::show_value("p_size_3"); ?></span>
                    <?php } ?>

                    <input type="text" name="p_quantity_3" placeholder="Product Quantity" id="" class="product-text-field">

                    <?php if (!empty(Session::show_value("p_quantity_3"))) { ?>
                        <span><?php echo Session::show_value("p_quantity_3"); ?></span>
                    <?php } ?>

                    <textarea name="p_description_3" id="" cols="10" rows="5" placeholder="Product Description" class="product-text-field"></textarea>

                    <?php if (!empty(Session::show_value("p_description_3"))) { ?>
                        <span><?php echo Session::show_value("p_description_3"); ?></span>
                    <?php } ?>

                    <select name="p_main_category_3" onchange="show_main_category_block(this.value)" id="" class="product-text-field">
                        <option value="NONE">-- Main Category --</option>
                        <option value="Featured_3">Featured</option>
                        <option value="Newest_3">Newest</option>
                    </select>

                    <div class="main-category-block" id="Featured_3">
                        <select name="p_featured_category_3" id="" onchange="show_feature_category(this.value)"class="product-text-field">
                            <option value="NONE">-- Featured Category --</option>
                            <option value="Delivery_3">Delivery</option>
                            <option value="Discount_3">Discount</option>
                        </select>          
                        
                        <div class="feature-category-block" id="Delivery_3">
                            <div class="feature-category-delivery-block">Do you want to delivery charge free? <input type="checkbox" name="p_delivery_3" value="YES" id=""></div>

                            <?php if (!empty(Session::show_value("p_delivery_3"))) { ?>
                                <span><?php echo Session::show_value("p_delivery_3"); ?></span>
                            <?php } ?>

                            <div class="feature-category-delivery-block">
                                <input type="submit" value="Add Product" class="product-txt-btn">    
                            </div>   
                        </div>

                        <div class="feature-category-block" id="Discount_3">
                            <input type="text" name="p_discount_3" placeholder="Add Discount" id="" class="product-text-field">   
                            
                            <?php if (!empty(Session::show_value("p_discount_3"))) { ?>
                                <span><?php echo Session::show_value("p_discount_3"); ?></span>
                            <?php } ?>
                            
                            <input type="submit" value="Add Product" class="product-txt-btn">
                        </div>
                    </div>

                    <div class="main-category-block" id="Newest_3">
                        <input type="submit" value="Add Product" class="product-txt-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/main.js"></script>
    <script src="js/preview_image.js"></script>
</body>
</html>

<?php
    
    Session::remove_value("p_name");
    Session::remove_value("p_image");
    Session::remove_value("p_category");
    Session::remove_value("p_price");
    Session::remove_value("p_color");
    Session::remove_value("p_size");
    Session::remove_value("p_quantity");
    Session::remove_value("p_description");
    Session::remove_value("p_delivery");
    Session::remove_value("p_discount");

    Session::remove_value("p_name_2");
    Session::remove_value("p_image_2");
    Session::remove_value("p_category_2");
    Session::remove_value("p_price_2");
    Session::remove_value("p_color_2");
    Session::remove_value("p_size_2");
    Session::remove_value("p_quantity_2");
    Session::remove_value("p_description_2");
    Session::remove_value("p_delivery_2");
    Session::remove_value("p_discount_2");

    Session::remove_value("p_name_3");
    Session::remove_value("p_image_3");
    Session::remove_value("p_category_3");
    Session::remove_value("p_price_3");
    Session::remove_value("p_color_3");
    Session::remove_value("p_size_3");
    Session::remove_value("p_quantity_3");
    Session::remove_value("p_description_3");
    Session::remove_value("p_delivery_3");
    Session::remove_value("p_discount_3");
    Session::remove_value("success_msg");
?>
