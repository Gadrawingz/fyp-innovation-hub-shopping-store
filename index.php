<?php
include ('queries.php');
$obj = new InnovQuery;

session_start();
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
    <meta name="author" content="Gadrawingz">
    <meta name="keywords" content="Gadrawingz template">
    <!-- Title Page-->
    <title>Innovation Hub Shopping Store</title>
    <link rel="stylesheet" type="text/css" href="css/innovhub.css">

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

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
</head>


<body class="animsition">
    <div class="page-wrapper">

        <div class="ih-logo">
            Innovation hub and shopping store
        </div>

        <div class="page-content">
            <div class="container">

                            <center>
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="text-align: center!important;">
                                <li class="nav-item" style="margin-right: 10px!important;">
                                <a class="nav-link btn-success" id="pills-home-tab" href="index.php" role="tab" aria-selected="true">All</a>
                                </li>

                                <?php
                                    $stmt = $obj->view_prodcategories();
                                    while($row = $stmt->FETCH(PDO::FETCH_ASSOC)) {
                                ?>
                                <center><li class="nav-item" style="margin-right: 10px!important;">
                                    <a class="nav-link btn-primary" id="pills-home-tab" href="?categ=<?php echo $row['cat_id'];?>" role="tab" aria-selected="true"><?php echo $row['cat_name'];?></a>
                                </li></center>
                                <?php } if(!isset($_SESSION['c_id'])) { ?>
                                <li><a href="#" data-toggle="modal" data-target="#notLoggedInPage" class="btn btn-warning">
                                <i class="fa fa-arrow-circle-right"></i>&nbsp; Sign in</a>
                                <?php } else { ?>
                                <li><b><a href="customer.php" class="btn btn-warning">
                                <i class="fa fa-star"></i>&nbsp; Home</a></b>
                                <?php } ?>
                            </ul>
                            </center>
                        </div>

                        <h2 class="text-secondary text-center">Latest innovations from all stores</h2><hr>

                        <div class="row">
                            <?php
                            if(isset($_GET['innov'])) {
                                $stmtX= $obj->returnProductDataFromId($_GET['innov']);
                                $rowX= $stmtX->FETCH(PDO::FETCH_ASSOC);

                                $obj->addItemToCart($_SESSION['c_id'], $_GET['innov'], $rowX['prod_price']);
                                echo "<script>alert('INNOVATION ITEM IS ADDED TO CART!')</script>";
                                echo "<script>window.location='customer.php?mycart'</script>";
                            }

                                // if is not isset(categ)
                                if(!isset($_GET['categ'])) {
                                    $stmt= $obj->viewAllInnovations();
                                } else {
                                    $stmt= $obj->viewInnovationsByCategories($_GET['categ']);
                                }
                                while($row= $stmt->FETCH(PDO::FETCH_ASSOC)) {
                            ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <img class="card-img-top" style=" height: 250px!important; max-height: 200px!important; width: auto!important;" src="innovations/<?php echo $row['prod_image'];?>" alt="Card image cap">
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
                                        <form method="POST">
                                        <span class="text-primary"><?php echo $row['prod_quantity'];?> Available in shop&nbsp;</span>
                                        <!-- <input type="number" class="input" name="quantity" value="1" style="border: 1px solid green; width: 50px; padding: 5px;"> -->
                                        </form>

                                        <?php if(isset($_SESSION['c_id'])) { ?>
                                        <a href="?innov=<?php echo $row['prod_id'];?>" class="btn btn-primary btn-md btn-block"><i class="fa fa-shopping-basket"></i>&nbsp;Add to cart</a>
                                        <?php } else { ?>

                                        <a href="#" data-toggle="modal" data-target="#notLoggedInPage" class="btn btn-danger btn-md btn-block"><i class="fa fa-shopping-basket"></i>&nbsp;Add to cart</a>
                                        <?php } ?>


                                    </div>
                                </div>
                            </div>
                            <?php } ?>


                        </div>
                    </div>
                </div>
            </div>





            <!-- modal medium -->
            <div class="modal fade" id="notLoggedInPage" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="mediumModalLabel">Customer Login Page</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        <?php
                            if(isset($_POST['custloginbtn'])) {

                            $stmt = $obj->custLogin();
                            $row = $stmt->FETCH(PDO::FETCH_ASSOC);

                            if($_POST['email']==$row['email'] && $_POST['password']==$row['password']) {

                                $_SESSION['cowner'] = $row['firstname']." ".$row['lastname'];
                                $_SESSION['c_id'] = $row['client_id'];
                                echo "<script>window.location='customer.php?welcome'</script>";
                            } else {
                                echo "<script>alert('Failed to login!')</script>";
                                echo "<script>window.location='index.php?custlogin'</script>";
                            }
                        }
                        ?>

                        <div class="login-form">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div><hr><br>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="custloginbtn">Sign in</button>

                                <a class="au-btn au-btn--block au-btn--blue m-b-20" type="submit" href="regpage.php?customer"><center>Create Account</center></a>
                            </form>
                        </div>

                        <br><center><a href="index.php?syslogin">Back home</a></center>                        


                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal medium -->






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

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->