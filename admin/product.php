<?php
    include 'lib/Main_query.php';
    $mn_query = new Main_query();
    $data = $mn_query->select_product();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
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
                    <b>Dashboard</b>
                    <span>Welcome to Sunglass</span>
                </div>

                <div class="admin-right-content-right">
                    <a href="#"><span class="fa fa-home"></span> Dashboard / Product</a>
                </div>
            </div>

            <div class="admin-product-content">
                <?php foreach ($data as $row) {?>
                    <div class="admin-product-block">
                        <div class="admin-right-product-img">
                            <img src="upload_image/<?php echo $row['p_image'] ?>" width="100%" height="100%" alt="">
                        </div>

                        <div class="admin-right-product-text">
                            <h4><?php echo $row['p_name'] ?></h4>
                            <strong>$<?php echo $row['p_price'] ?></strong>
                            <i>Quantity: <?php echo $row['p_quantity'] ?></i>
                            <a href="single-product.php?product_id=<?php echo $row['p_id'] ?>">View Product</a>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="admin-right-pagination">
                <a href="#">Prev</a>
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">Next</a>
            </div>
        </div>
    </div>
</body>
</html>