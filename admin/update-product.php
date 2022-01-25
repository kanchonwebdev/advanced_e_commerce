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
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/order.css">
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
                        <a href="#"><span class="fa fa-home"></span> Dashboard / New Order</a>
                    </div>
                </div>

                <div class="new-order">
                    <div class="new-order-header">
                        <div class="new-order-header-block">Product ID</div>

                        <div class="new-order-header-block">Last Modified Date</div>

                        <div class="new-order-header-block">Action</div>
                    </div>

                    <?php foreach ($data as $row) {?>
                        <div class="new-order-content">
                            <div class="new-order-block"><?php echo $row["p_id"] ?></div>

                            <div class="new-order-block"><?php echo $row["p_modify"] ?></div>

                            <div class="new-order-block"><a href="single_product.php?product_id=<?php echo $row['p_id'] ?>">VIEW</a></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>