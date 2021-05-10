<?php


include ('queries.php');
$obj = new InnovQuery;
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
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
            Innovation hub shopping store
        </div>

        <div class="page-content">
            <div class="container">

                        <?php 
                        if(isset($_GET['customer'])) {

                            if(isset($_POST['custregbtn'])) {
                            if($obj->registerCustomer($_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['email'], $_POST['password'], $_POST['telnumber'], $_POST['district'], $_POST['sector'])) {

                            $stmt = $obj->custLogin();
                            $row = $stmt->FETCH(PDO::FETCH_ASSOC);

                            if($_POST['email']==$row['email'] && $_POST['password']==$row['password']) {
                                $_SESSION['cowner']= $row['firstname']." ".$row['lastname'];
                                $_SESSION['c_id'] = $row['client_id'];
                                echo "<script>alert('SUCCESS!')</script>";
                                echo "<script>window.location='customer.php?welcome'</script>";
                            }} else {
                                echo "<script>alert('FAILURE!')</script>";
                                echo "<script>window.location='?customer'</script>";
                            }
                        }
                        ?>

                        <div class="login-logo">
                            <h2>Customer Registration</h2>
                        </div>

                        <center>
                        <div class="card col-lg-6">
                                    <!-- <div class="card-header">
                                        <strong>Normal</strong> Form
                                    </div> -->
                            
                            <div class="card-body card-block">
                                        <!-- <form action="" method="post" class="">
                                            <div class="form-group">
                                                <label for="nf-email" class=" form-control-label">Email</label>
                                                <input type="email" id="nf-email" name="nf-email" placeholder="Enter Email.." class="form-control">
                                                <span class="help-block">Please enter your email</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="nf-password" class=" form-control-label">Password</label>
                                                <input type="password" id="nf-password" name="nf-password" placeholder="Enter Password.." class="form-control">
                                                <span class="help-block">Please enter your password</span>
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
                                </div>-->

                            <form action="" method="POST">
                                <div class="form-group">
                                    <label>Firstname</label>
                                    <input class="au-input au-input--full" type="text" name="firstname" placeholder="Firstname">
                                </div>

                                <div class="form-group">
                                    <label>Lastname</label>
                                    <input class="au-input au-input--full" type="text" name="lastname" placeholder="Lastname">
                                </div>

                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Username">
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <label>Tel.Number</label>
                                    <input class="au-input au-input--full" type="text" name="telnumber" placeholder="Tel.Number">
                                </div>
                                
                                <div class="form-group">
                                    <label>District</label>
                                    <input class="au-input au-input--full" type="text" name="district" placeholder="District...">
                                </div>

                                <div class="form-group">
                                    <label>Sector</label>
                                    <input class="au-input au-input--full" type="text" name="sector" placeholder="Sector...">
                                </div>

                                <button class="au-btn au-btn--block au-btn--blue m-b-20" type="submit" name="custregbtn">Register</button>
                            </form>
                            </div>

                        </div></center>

                        <br><center><a href="index.php?syslogin">Back home</a></center>
                        <?php } ?>                        






            </div>
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

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->