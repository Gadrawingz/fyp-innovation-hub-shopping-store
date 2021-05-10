<?php

include ('queries.php');
$obj = new InnovQuery;

session_start();

if(!isset($_SESSION['c_id'])) {
    echo "<script>alert('ACCESS DENIED!')</script>";
    echo "<script>window.location='index.php'</script>";
}

$cust = $_SESSION['c_id'];
$fullname = $_SESSION['cowner'];

if(isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php?custlogin");
}

/*if(!isset($_GET['index'])) {
    session_destroy();
    header("Location: index.php?custlogin");
}*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <!-- Developed by Gad IRADUFASHA & Aimee -->
    <!-- At https://www.donnekt.com -->
    <!-- Github: https://github.com/Gadrawingz -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Customer - Innovation hub</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <h2 style="color: #FFF!important;">Customer</h2>
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">

                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
<!--                         <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>View
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="?viewshops">
                                        <i class="fas fa-tachometer-alt"></i>View shops</a>
                                </li>
                                <li>
                                    <a href="?viewinnov">
                                        <i class="fas fa-tachometer-alt"></i>View innovators</a>
                                </li>
                            </ul>
                        </li> -->

                        <li>
                            <a href="customer.php">
                                <i class="fas fa-home"></i>Home</a>
                            
                        </li>

                        <li>
                            <a href="#" data-toggle="modal" data-target="#mediumCart">
                                <i class="fas fa-shopping-basket"></i>My Cart</a>
                            <span class="inbox-num"><?php echo $obj->countCartItems($cust);?></span>            
                        </li>

                        <li>
                            <a href="#" data-toggle="modal" data-target="#ordersHistory">
                                <i class="fas fa-tachometer-alt"></i>Paid Orders</a>
                                <span class="inbox-num"><?php echo $obj->countOrdersHistoryPerCustomer($cust);?></span>
                        </li>

                        <li>
                            <a href="?trackorder">
                                <i class="fas fa-rocket"></i>Track Order</a>
                        </li>


                        <li>
                            <a href="#" data-toggle="modal" data-target="#myprofile">
                                <i class="fas fa-user"></i>My profile</a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->







        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="images/icon/logo-white.png" alt="Innovationhub" />
                                </a>
                            </div>

                            <div class="header-button2">
                            
                            <h4 style="color: #FFF;">Hi, <?php echo $fullname; ?></h4>&nbsp;&nbsp;&nbsp;


                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
<!--                                       <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                         <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div> -->

                                        <div class="account-dropdown__item btn-danger">
                                            <a href="?logout">
                                                <i class="zmdi zmdi-settings"></i>Logout</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>


            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">

                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="#" alt="<?php echo $fullname; ?>" />
                        </div>
                        <h4 class="name"><?php echo $fullname; ?></h4>
                        <a href="?logout">Sign out</a>
                    </div>
                   
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">






                        <?php
                        if(isset($_GET['innov']) && isset($_GET['addqty'])) {

                            $stmt30= $obj->returnProductDataFromId($_GET['innov']);
                            $row30= $stmt30->FETCH(PDO::FETCH_ASSOC);

                            if(isset($_POST['saveqtybtn'])) {
                            $innov_id = $_GET['innov'];
                            
                            $stmtX= $obj->returnProductDataFromId($innov_id);
                            $rowX= $stmtX->FETCH(PDO::FETCH_ASSOC);
                            
                            // Validating productQuantity not exceeding availableSize
                            if(strlen($_POST['prod_quantity'])> $row30['prod_quantity']) {
                                echo "<script>alert('Failure!')</script>";
                                echo "<script>window.location='customer.php'</script>";
                            } else {                                
                            $obj->addItemToCart($_SESSION['c_id'], $innov_id, $_POST['prod_quantityB'], $rowX['user_id']);
                            echo "<script>alert('INNOVATION ITEM IS ADDED TO CART!')</script>";
                            echo "<script>window.location='customer.php'</script>";
                            }
                        }
                        ?>

                            <div class="col-lg-9" style="margin-bottom: 80px!important;">
                                <div class="card" style="border: 3px solid green!important; border-radius: 10px; margin-top: 10px!important;  ">
                                    <form method="POST">
                                    <div class="card-body card-block">

                                        <center><h2><span style="color: blue;">Cart {</span><?php echo $row30['prod_name'];?> <span style="color: blue;">}</span></h2></center><br>

                                        <?php
                                        if(isset($_POST['qtyerror'])) { ?>
                                        <button type="button" class="btn btn-danger">
                                            <i class="fa fa-question-circle"></i>&nbsp; Danger
                                        </button>
                                        <?php } ?>

                                        <div class="row has-success form-group">
                                            <div class="col col-md-3">
                                                <label for="disabled-input" class=" form-control-label">Unit price</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="number" id="disabled-input" name="disabled-input" value="<?php echo $row30['prod_price'];?>" disabled="" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row has-success form-group">
                                            <div class="col col-md-3">
                                                <label for="disabled-input" class=" form-control-label">Available items</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="number" id="disabled-input" name="disabled-input" value="<?php echo $row30['prod_quantity'];?>" disabled="" class="form-control">
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row has-success form-group">
                                            <div class="col col-md-3">
                                                <label for="disabled-input" class=" form-control-label">Quantity: </label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="number" id="disabled-input" name="prod_quantityB" class="is-valid form-control-success form-control" id="inputIsValid">
                                            </div>
                                        </div>

                                    </div>

                                    <center><button class="au-btn au-btn--block au-btn--green m-b-20" style="width: 50%!important;" type="submit" name="saveqtybtn">Continue</button></center>
                                    </form>
                                </div>
                            </div><br><br><hr><br><br>
                        <?php } ?>















                        <?php
                        if(isset($_GET['checkout_stage_item'])) { ?>
                        <center>
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Product payment!</h2>
                                    </div>
                                    <form method="POST">
                                    <div class="card-body card-block">
                        <?php

                        $cart_id = $_GET['checkout_stage_item'];
                        $stmt60= $obj->returnCartDataByCartId($cart_id);
                        $row60= $stmt60->FETCH(PDO::FETCH_ASSOC);

                        $stmt90= $obj->returnProductDataFromId($row60['prod_id']);
                        $row90= $stmt90->FETCH(PDO::FETCH_ASSOC);

                        $stmt70= $obj->viewShopNameByShopOwner($row60['shop_owner']);
                        $row70= $stmt70->FETCH(PDO::FETCH_ASSOC);


                        if(isset($_POST['proceedfinal'])) {
                            if(!empty($_POST['paymentmode']) && $_POST['paymentmode']=='MoMoPayment') {

                                echo "<script>window.location='customer.php?finishpid=$_POST[prod_id]&fcust_id=$cust&cart_id=$cart_id'</script>";
                            }
                        }
                        ?>


                                        <input type="hidden" name="prod_id" value="<?php echo $row90['prod_id'];?>"class="form-control" readonly/>
                                        <input type="hidden" name="prod_quantity" value="<?php echo $row90['prod_quantity'];?>"class="form-control" readonly/>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="disabled-input" class=" form-control-label">Shop.Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="disabled-input" name="shop_name" value="<?php echo $row70['shop_name'];?>"class="form-control" readonly/>
                                                <input type="hidden" name="shop_id" value="<?php echo $row70['shop_id'];?>;?>"class="form-control" readonly/>
                                            </div>
                                        </div>


                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="disabled-input" class=" form-control-label">Product Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="disabled-input" name="prod_name" value="<?php echo $row90['prod_name'];?>" readonly class="form-control">
                                                <input type="hidden" name="innovator" value="<?php echo $row90['user_id'];?>" >
                                            </div>
                                        </div>



                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="disabled-input" class=" form-control-label">Quantity</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="disabled-input" name="prod_quantity" value="<?php echo $row60['prod_quantity']." items";?>" readonly class="form-control">
                                            </div>
                                        </div>



                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="disabled-input" class=" form-control-label">Price per item</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="disabled-input" name="unitprice" value="<?php echo number_format($row90['prod_price'])." rwf";?>"class="form-control" readonly/>
                                            </div>
                                        </div>



                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="disabled-input" class=" form-control-label">Total price</label>
                                            </div>
                                            <?php

                                            $price= (int)$row90['prod_price'];
                                            $quantity= (int)$row60['prod_quantity'];
                                            $mytotalprice = $price * $quantity;

                                            ?>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="disabled-input" name="totalprice" value="<?php echo number_format($mytotalprice)." rwf";?>"class="form-control" readonly style="font-weight: bolder!important;"/>
                                            </div>
                                        </div>
                                    

                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="selectLg" class=" form-control-label">Payment mode</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="paymentmode" id="selectLg" class="form-control-lg form-control">
                                                        <option value="">Select payment mode</option>
                                                        <!-- <option value="MoMoCloneApi">MoMoCloneApi</option> -->
                                                        <option value="MoMoPayment">MoMoPayment</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>

                                    <center><button class="au-btn au-btn--block au-btn--green m-b-20" style="width: 50%!important;" type="submit" name="proceedfinal">Proceed</button>

                                    <a href="#" class="btn btn-primary pay_cmd" data-url="customer.php?request_id=<?php $_GET['checkout_stage_item'] ?>" data-toggle="modal" data-target="#payPlace">Pay right now</a>
                                    </center>
                                    </form>
                                </div>
                            </div>
                        </center><br><br><hr><br><br>
                        <?php } ?>













                        <?php
                        if(isset($_GET['finishpid']) && isset($_GET['fcust_id']) && isset($_GET['cart_id'])) { ?>
                        <center>
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Finish payment with {MoMo}!</h2>
                                    </div>
                                    <form method="POST">
                                    <div class="card-body card-block">
                        <?php

                        $stmt900= $obj->returnProductDataFromId($_GET['finishpid']);
                        $row900= $stmt900->FETCH(PDO::FETCH_ASSOC);

                        $stmt100= $obj->returnCustomerDataById($_GET['fcust_id']);
                        $row100= $stmt100->FETCH(PDO::FETCH_ASSOC);

                        $stmt690= $obj->returnCartDataByCartId($_GET['cart_id']);
                        $row690= $stmt690->FETCH(PDO::FETCH_ASSOC);


                        if(isset($_POST['pyfinal'])) {

                            $obj->paymentInitialization($_GET['finishpid'], $cust, $_POST['shop_owner'], $_POST['totalpriceog'], $_GET['cart_id'], $_POST['taxrate']);

                            // Make and save order to db!
                            $obj->createOrderForCustomer($cust, $_GET['cart_id']);

                            // apres, kugura, upd current qty
                            $soldqty= intval($row900['prod_quantity']) - intval($_POST['sold_quantity']);
                            $obj->updateProductQuantity($_GET['finishpid'], $soldqty);

                            echo "<script>window.location='./MobileMoney/?finishpid=$_GET[finishpid]&fcust_id=$cust&cart_id=$_GET[cart_id]&custreq'</script>";
                            }

                        ?>


                                        <input type="hidden" name="prod_id" value="<?php echo $row900['prod_id'];?>"class="form-control" readonly/>

                                        <input type="hidden" name="sold_quantity" value="<?php echo $row690['prod_quantity'];?>"class="form-control" readonly/>
                                        <input type="hidden" name="prod_price" value="<?php echo $row690['prod_price'];?>"class="form-control" readonly/>


                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="disabled-input" class=" form-control-label">Your Tel.Number</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="disabled-input" name="telnumber" value="<?php echo $row100['telnumber'];?>"class="form-control text-success" style="font-weight: bolder!important; font-size: large;" readonly>

                                            </div>
                                        </div>



                                        <div style="border: 1px solid orange!important; padding: 3px!important; ">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="disabled-input" class=" form-control-label">Product Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="disabled-input" name="prod_name" value="<?php echo $row900['prod_name'];?>" readonly class="form-control">

                                                <input type="hidden" name="prod_id" value="<?php echo $row900['prod_id'];?>">
                                            </div>
                                        </div>





                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="disabled-input" class=" form-control-label">Shop owner</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="disabled-input"  value="<?php
                                                $stmt50= $obj->view_one_innovator($row900['user_id']);
                                                $row50= $stmt50->FETCH(PDO::FETCH_ASSOC);
                                                echo strtoupper($row50['firstname']." ".$row50['lastname']);?>"class="form-control" readonly/>
                                                <input type="hidden" name="shop_owner" value="<?php echo $row50['user_id'];?>">

                                                

                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="disabled-input" class=" form-control-label">Shop.Owner Tel.</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="disabled-input"  value="<?php
                                                $stmt50= $obj->view_one_innovator($row900['user_id']);
                                                $row50= $stmt50->FETCH(PDO::FETCH_ASSOC);
                                                echo "+25".$row50['telnumber'];?>"class="form-control text-success" style="font-weight: bolder!important; font-size: large;" readonly/>
                                            </div>
                                        </div>
                                    </div><!--Hold up -->




                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="disabled-input" class=" form-control-label">Payment status</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="disabled-input" name="prod_name" value="Pending" readonly class="form-control text-danger" style="font-weight: bolder!important;">
                                            </div>
                                        </div>

                                        <?php

                                        if($row900['prod_price']>='1000000') {
                                            $taxrate = 100;
                                        } else if($row900['prod_price']>=500000 || $row900['prod_price']<=250000) {
                                            $taxrate = 75;
                                        } else if($row900['prod_price']>=250000 || $row900['prod_price']<=100000) {
                                            $taxrate = 65;
                                        } else if($row900['prod_price']>=100000 || $row900['prod_price']<=50000) {
                                            $taxrate = 55;
                                        } else if($row900['prod_price']>=50000 || $row900['prod_price']<=25000) {
                                            $taxrate = 40;
                                        } else if($row900['prod_price']>=25000 || $row900['prod_price']<=10000) {
                                            $taxrate = 30;
                                        } else if($row900['prod_price']>=10000 || $row900['prod_price']<=5000) {
                                            $taxrate = 20;
                                        } else if($row900['prod_price']>=5000 || $row900['prod_price']<=2500) {
                                            $taxrate = 10;
                                        } else if($row900['prod_price']<=1000) {
                                            $taxrate = 5;
                                        }
                                        ?>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="disabled-input" class=" form-control-label">Tax rate</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="disabled-input" name="taxrate" value="<?php echo $taxrate; ?>" readonly class="form-control text-dark" style="font-weight: bolder!important;">
                                            </div>
                                        </div>


                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="disabled-input" class=" form-control-label">Total Amount+Tax</label>
                                            </div>

                                            <?php
                                            $totalpriceog = ($row900['prod_price']*$row690['prod_quantity'])+ $taxrate;
                                            ?>
                                            <input type="hidden" name="totalpriceog" value="<?php echo $totalpriceog;?>"/>

                                            <div class="col-12 col-md-9">
                                                <input type="text" id="disabled-input" name="totalprice" value="<?php echo number_format($totalpriceog)." rwf";?>" readonly class="form-control text-primary" style="font-weight: bolder!important;">
                                            </div>
                                        </div>



                                    </div>

                                    <center><button class="btn btn-primary m-b-20" style="width: 50%!important;" type="submit" name="pyfinal">Finish & Pay</button>
                                    </center>
                                    </form>
                                </div>
                            </div>
                        </center><br><br><hr><br><br>
                        <?php } ?>










                        <?php if(isset($_GET['trackorder'])) { ?>
                        <h2 class="text-center">Track your {orders}</h2>
                        <div class="table-responsive table-responsive-data2 col-md-12" style="border: 1px solid green; border-radius: 6px; padding: 4px;">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox" checked="">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </th>
                                                <th>Product Name</th>
                                                <th>Store Name</th>
                                                <th>Destination</th>
                                                <th>Status</th>
                                                <th class="text-center">Date</th>
                                            </tr>
                                        </thead>
                            <?php
                                if($obj->verify_customer_orders($cust)>0 ) {
                                $stmt999= $obj->getCustomerOrderData($cust);
                                while($row999= $stmt999->FETCH(PDO::FETCH_ASSOC)) {
                            ?>
                                        <tbody>

                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>
                                    <?php
                                    //Uno, Cart will give us p_ido
                                    $stmtcart= $obj->returnCartDataByCartId($row999['cart_id']);
                                    $rowcart= $stmtcart->FETCH(PDO::FETCH_ASSOC);

                                    //Dos, P_ido will give us p_data such as Name, Qty
                                    $stmtproduct= $obj->returnProductDataFromId($rowcart['prod_id']);
                                    $rowproduct= $stmtproduct->FETCH(PDO::FETCH_ASSOC);
                                    echo $rowproduct['prod_name'];

                                    $stmtshop= $obj->viewShopNameByShopOwner($rowcart['shop_owner']);
                                    $rowshop= $stmtshop->FETCH(PDO::FETCH_ASSOC);
                                    ?>  
                                                </td>

                                                <td>
                                                    <mark><?php echo $rowshop['shop_name']; ?></mark>
                                                </td>

                                                <td class="desc">
                                <?php 
                                $stmt= $obj->returnCustomerDataById($row999['orderedby']);
                                $row50= $stmt->FETCH(PDO::FETCH_ASSOC);
                                echo "<mark>Ship to&raquo;&nbsp;</mark>".$row50['district'];
                                ?>   
                                                </td>
                                        
                                                <td>
                                                    <!-- <span class="status--process">Processed</span> -->
                                                    <span class="status--pending"><?php echo $row999['ship_status']; ?></span>
                                                </td>
                                                <td class="text-center"><?php echo $row999['order_date']; ?></td>
                                            </tr>
                                        <?php }} else { ?>
                                            <tr>
                                                <td colspan="6" class="text-center bg-danger text-white">You currently have no order!</td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div><br><br><br><hr><br><br><br>
                            <?php } ?>
                        















                        <h2 class="text-secondary text-center">Latest innovations from all stores</h2><hr>
                        <div class="row">

                            <?php

                                $stmt= $obj->viewAllInnovations();
                                while($row= $stmt->FETCH(PDO::FETCH_ASSOC)) {
                            ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <form method="POST">

                                    <center>
                                        <a href="#" data-toggle="modal" data-target="#fullImageView">
                                        <img class="card-img-top" style=" height: 200px!important; max-height: 200px!important; width: auto!important;" src="innovations/<?php echo $row['prod_image'];?>" alt="Card image cap">
                                        </a>
                                    </center>
                                    <div class="card-body">
                                        <h4 class="card-title mb-3"><?php echo $row['prod_name'];?></h4><hr>
                                        <p class="card-text text-danger"><?php echo $row['prod_description'];?>
                                        </p>
                                        <p class="card-text">
                                        <span class="text-primary">
                                            <?php echo $row['prod_price']."rwf";?>
                                        </span> -
                                        <span class="card-text text-dark">
                                            <?php echo $row['prod_code'];?>
                                        </span>
                                        </p>
                                        <p class="card-text text-dark">
                                            <strong>Innov.By: &nbsp;</strong>
                                            <?php
                                            $stmtU= $obj->retrieveInnovatorName($row['user_id']);
                                            $rowU= $stmtU->FETCH(PDO::FETCH_ASSOC);
                                            echo $rowU['firstname']." ".$rowU['lastname'];?>
                                        </p>
                                        <span class="text-primary"><?php echo $row['prod_quantity'];?> Available in shop&nbsp;</span>
                                        
                                        
                                        <a href="?innov=<?php echo $row['prod_id'];?>&addqty" class="btn btn-primary btn-md btn-block" onclick="getProdId(<?php echo $row['prod_id'];?>)"><i class="fa fa-shopping-basket"></i>&nbsp;Add to cart</a>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <?php } ?>




                        </div>
                    </div>
                </div>
            </div>
            <!-- closed at the end line-->







            <!-- modal checkout -->
            <div class="modal fade" id="mediumCart" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">My shopping cart</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                        <?php
                        if(isset($_POST['checkoutBtn'])) {
                         
                        }
                        ?>
                            <form method="POST">
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Innov.Name</th>
                                                <th>Quantity</th>
                                                <!-- <th>Price</th> -->
                                                <th>Total Price</th>
                                                <th colspan="2"><center>Options</center></th>
                                            </tr>
                                        </thead>
                                    <?php
                                $stmt= $obj->viewCartItemsPerClient($cust);
                                while($row= $stmt->FETCH(PDO::FETCH_ASSOC)){
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['cart_id'];?></td>
                                                <td>
                                                    <?php
                                                    $stmtP=$obj->returnProductDataFromId($row['prod_id']);
                                                    $rowP=$stmtP->FETCH(PDO::FETCH_ASSOC);
                                                    echo $rowP['prod_name'];
                                                    ?>
                                                </td>
                                                <td><?php echo $row['prod_quantity'];?></td>
                                                <!-- <td> -->
                                                    <?php
                                                    $stmtSC=$obj->returnProductDataFromId($row['prod_id']);
                                                    $rowSC=$stmtSC->FETCH(PDO::FETCH_ASSOC);
                                                    //echo $rowSC['prod_price'];
                                                    ?>
                                                <!-- </td> -->
                                                <td><?php echo $row['prod_quantity'] *$rowSC['prod_price'];?></td>
                                                <td><a href="?checkout_stage_item=<?php echo $row['cart_id'];?>" class="btn btn-primary">Checkout</a></td>
                                                <td><a href="?delcartitem=<?php echo $row['cart_id'];?>" class="btn btn-danger">Remove</a></td>
                                            </tr>
                                        </tbody>
                                    <?php }
                                    // calculating sum here @oh my God
                                    //$sumStmt= $obj->getShCartItemsTotal($cust);
                                    //$sumCount= $sumStmt->FETCH(PDO::FETCH_ASSOC);
                                    ?>

                                        <!-- <tfoot>
                                            <tr>
                                                <td colspan="6">
                                                    <center><button disabled class="btn btn-success btn-sm" name="checkoutBtn">Total: <b><php
                                                        //echo $sumCount['TotalSum']; 
                                                        ?></b></button>&nbsp; 
                                                    </center>
                                                </td>
                                            </tr>
                                        </tfoot> -->
                                    </table>
                                </div>
                            </form><!-- END FORM -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal medium -->

            <?php

            if(isset($_GET['delcartitem'])) {
                $obj->deleteCartItem($_GET['delcartitem']);
                echo "<script>alert('ITEM IS REMOVED!')</script>";
                echo "<script>window.location='customer.php'</script>";
            }
            ?>




















            <!-- modal fullimageview -->
            <div class="modal fade" id="fullImageView" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center><h3 class="modal-title" id="mediumModalLabel">View in full size product</h3></center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                    <!--Image -->
                                <div class="card">
                                    <center><img class="card-img-top" style="max-width: 50%; max-height: 50%;" src="innovations/full-length-of-depressed-man-sitting-by-railing-in-royalty-free-image-726861591-1558013465.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">Innovation Product 50</h4>
                                        <p class="card-text">This innovation is about men at home
                                        </p>
                                    </div></center>
                                </div>
                    <!--Enf Image -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- end fullimageview medium -->













            <!-- modal checkout -->
            <div class="modal fade" id="payPlace" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center><h3 class="modal-title" id="mediumModalLabel">Pay Via Mobile Money</h3></center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                                    <form method="POST" action="paypage.php" id="payProduct">
                                    <div class="card-body card-block">
                                        
                                        <!-- <input type="hidden" name="request_id" value="<?= $_GETrequest_id ?>" /> -->
                                        <input type="hidden" name="request_id" value="1" />

                                        <input type="hidden" name="prod_quantity" value="<?php echo $row90['prod_quantity'];?>"class="form-control" readonly/>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="disabled-input" class=" form-control-label">Tel.Number</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="" name="phone_number" value="0784557411" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button><!-- <button type="submit" class="btn btn-primary" id="login_button">Pay Now</button> --></div><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal medium -->












            <!-- modal checkout -->
            <div class="modal fade" id="ordersHistory" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center><h3 class="modal-title" id="mediumModalLabel">My orders history (Paid orders)</h3></center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form method="POST">
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Product</th>
                                                <th>Amount</th>
                                                <th>Payment</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                    <?php
                                $stmt= $obj->viewOrdersHistoryPerCustomer($cust);
                                $num= 1;
                                while($row= $stmt->FETCH(PDO::FETCH_ASSOC)){
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $num; ?></td>
                                                <td>
                                                    <?php
                                                    $stmtP=$obj->returnProductDataFromId($row['prod_id']);
                                                    $rowP=$stmtP->FETCH(PDO::FETCH_ASSOC);
                                                    echo $rowP['prod_name'];
                                                    ?>
                                                </td>
                                                <td><?php echo $row['paid_amount'];?></td>
                                                <td><?php echo $row['payment_method'];?></td>
                                                <td>
                                                    <?php if($row['status']=='Pending') {?>
                                                    <center><a href="?confirmordr=<?php echo $row['payment_id'];?>" class="btn btn-primary">Confirm order</a></center>
                                                    <?php } else { ?>
                                                    <center><button class="btn btn-success" disabled>Received</button></center>
                                                    <?php } ?>
                                                    </button>
                                                </td>
                                                <td><?php echo $row['payment_date'];?></td>
                                            </tr>
                                        </tbody>
                                    <?php $num++; } ?>
                                    </table>
                                </div>
                            </form><!-- END FORM -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal medium -->

            <?php
            if(isset($_GET['confirmordr'])) {
                $obj->orderCustConfirmation($_GET['confirmordr']);
                echo "<script>alert('ORDER CONFIRMED & PRODUCT RECEIVED!')</script>";
                echo "<script>window.location='customer.php'</script>";
            }
            ?>














            <!-- modal messages -->
            <div class="modal fade" id="myMessages" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center><h3 class="modal-title" id="mediumModalLabel">Message center(inbox)</h3></center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form method="POST">
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>From:</th>
                                                <th>Messages</th>
                                                <th>Reply</th>
                                            </tr>
                                        </thead>
                                    <?php
                                /*$stmt= $obj->viewCartItemsPerClient($cust);
                                while($row= $stmt->FETCH(PDO::FETCH_ASSOC)){*/
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <?php
                                                    /*$stmtP=$obj->returnProductDataFromId($row['prod_id']);
                                                    $rowP=$stmtP->FETCH(PDO::FETCH_ASSOC);
                                                    echo $rowP['prod_name'];*/
                                                    ?>
                                                    Amazing Shop
                                                </td>
                                                <td>We wish you Merry X-mas thanks for buying with us!</td>
                                                <td><a class="btn btn-primary" href="#">Reply</a></td>
                                            </tr>
                                        </tbody>
                                    <?php /*}*/ ?>
                                    </table>
                                </div>
                            </form><!-- END FORM -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal medium -->









            <!-- Choose Payment method -->
            <div class="modal fade" id="paymentMethodModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="mediumModalLabel">Pay with MoMo Application</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                    <div class="card-header">
                                        <strong>Pay With MoMo Application</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="">
                                            <div class="form-group">
                                                <label for="nf-email" class=" form-control-label">Tel.Number</label>
                                                <input type="email" id="nf-email" name="nf-email" placeholder="Enter Email.." class="form-control">
                                                <span class="help-block">Please enter your number</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="nf-password" class=" form-control-label">Code</label>
                                                <input type="password" id="nf-password" name="nf-password" placeholder="Enter Password.." class="form-control">
                                                <span class="help-block">Please your momo code</span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end payment method -->








            <!-- modal profile -->
            <div class="modal fade" id="myprofile" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="mediumModalLabel" style="text-align: center!important;"><center>My Profile as Customer</center></h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form method="POST">
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3" style="width: 100%!important; overflow: hidden!important;">
                                    
                                    <?php
                                $stmt= $obj->returnCustomerNameById($cust);
                                $row50= $stmt->FETCH(PDO::FETCH_ASSOC);
                                    ?>                                        

                                        <thead>
                                            <tr>
                                                <th>Firstname</th>
                                                <th>Last name</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row50['firstname']; ?></td>
                                                <td><?php echo $row50['lastname']; ?></td>
                                                <td><?php echo $row50['username']; ?></td>
                                                <td><?php echo $row50['email']; ?></td>
                                            </tr>
                                        </tbody>


                                        <thead>
                                            <tr>
                                                <th>Email</th>
                                                <th>Tel.Number</th>
                                                <th>District</th>
                                                <th>Sector</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row50['email']; ?></td>
                                                <td><?php echo $row50['telnumber']; ?></td>
                                                <td><?php echo $row50['district']; ?></td>
                                                <td><?php echo $row50['sector']; ?></td>  
                                            </tr>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <!-- <td colspan="4"><center><a href="customer.php?changeprofile< echo $row50['client_id']; ?>" class="btn btn-primary">Change Profile</a></center></td> -->
                                            </tr>
                                        </tfoot>
                                    </table>







                                    
                                </div>
                            </form><!-- END FORM -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal medium -->























                        <?php if(isset($_GET['viewinnov'])) { ?>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <h2>List of innovators</h2>
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Tel.No</th>
                                            </tr>
                                        </thead>

                                    <?php
                                $stmt= $obj->view_innovators();
                                while($row= $stmt->FETCH(PDO::FETCH_ASSOC)){
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['user_id'];?></td>
                                                <td><?php echo $row['firstname'];?></td>
                                                <td><?php echo $row['lastname'];?></td>
                                                <td><?php echo $row['username'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['telnumber'];?></td>
                                                
                                            </tr>
                                        </tbody>
                                    <?php } ?>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        <?php } ?>



                    </div>
                </div>
            </div>

            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Innovation hub</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
    <script src="vendor/vector-map/jquery.vmap.js"></script>
    <script src="vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="vendor/vector-map/jquery.vmap.world.js"></script>
    <!-- Main JS-->
    <script src="js/main.js"></script>


<script type="text/javascript">
  $(document).ready(function(){
    $("#payProduct").submit(function(e){
      e.preventDefault();

      var oldData = $("#login_button").html();
        $("#login_button").html('<i class="fas fa-sync fa-spin"></i> Sending Request...');
        $("#login_button").attr("disabled", "disabled");

        $("#login_progess").hide();
      $("#out_put").html("");

      $.ajax({
          type: $(this).attr('method'),
          url: $(this).attr('action'),  
          data: $(this).serialize(),
          success: function(response){
              console.log(response.success);
              if(response.success){
                  // $("#request_operation_modal").modal("hide");
                  $("#out_put").html();
                  $("#out_put").html("<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>" + response.message + "</strong></div>");
              } else {
                  if(response.message){
                    $("#out_put").html("<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button><strong>" + response.message + "</strong></div>");
                  } else {
                    $("#out_put").html("<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button><strong>Invalid Response from the server</strong></div>");
                  }
              }

              $("#login_button").html(oldData);
              $("#login_button").removeAttr("disabled");
          },
          error: function(error){
              $("#login_button").html(oldData);
              $("#login_button").removeAttr("disabled");
              
              $("#login_progess").html(error);
          }
      });
    });


    $(".pay_cmd").click(function(e){
          e.preventDefault();

          $("#pay_modal").find('.modal-content').load($(this).data('url'), function(){
            $("#pay_modal").modal('show');
          });
    });


    $(".verify_payment").click(function(e){
          e.preventDefault();
          var clicked = $(this);
          var old = clicked.html();

          clicked.html("Checking...");

          $.ajax({
              type: "POST",
              url: clicked.attr('href'),  
              data: "payment_id=" + clicked.data('id'),
              success: function(response){
                  // console.log(response.success);
                  if(response.success){
                      clicked.html(response.status);
                  } else {
                      clicked.html(response.message);
                  }
              },
              error: function(error){
                  clicked.html(old);
              }
          });
        });
    });
        

</script>

</body>

</html>
<!-- end document-->
