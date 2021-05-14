<?php
include ('../queries.php');
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
    <title>Innovation hub and shopping Store</title>
    <style type="text/css">
        .ih-logo {
            color: #FFF!important; 
            padding: 5px; margin: 5px; 
            background-color: green; 
            border: 2px solid green; 
            text-align: center; 
            font-size: 40px; 
        }
    </style>

    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <!-- ../vendor CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">

        <div class="ih-logo">
            Innovation hub and shopping store
        </div>

        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">


                        <?php
                        if(!isset($_GET['sologin'])) {
                            if(isset($_POST['sysloginbtn'])) {
                                if($_POST['email']=='aimee@gmail.com' && $_POST['password']=='123') {
                                    echo "<script>alert('Welcome!');</script>";
                                    echo "<script>window.location='../dashboard.php'</script>";
                                } else {
                                    echo "<script>alert('Failed!');</script>";
                                    echo "<script>window.location='index.php'</script>";
                                }
                            }
                        ?>
                        <div class="login-logo">
                            <h2>System Owner login</h2>
                        </div>

                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div><hr><br>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="sysloginbtn">Sign in</button>
                            </form>
                            <hr>
                            <center><a href="index.php?sologin">Innovator(ShopOwner) Login</a></center><br>
                            <center><a href="../index.php" class="btn btn-danger">Exit Backend</a></center>
                            <hr>
                            
                        </div>
                    <?php  } ?>
                        







                        <?php if(isset($_GET['sologin'])) { ?>

                        <?php  
                        if(isset($_POST['sobtnlogin'])) {

                            $stmt = $obj->soLogin();
                            $row = $stmt->FETCH(PDO::FETCH_ASSOC);

                            if($_POST['email']==$row['email'] && $_POST['password']==$row['password']) {

                                $_SESSION['sowner'] = $row['firstname']."-".$row['lastname'];
                                $_SESSION['s_id'] = $row['user_id'];
                                echo "<script>window.location='../innovator.php?welcome'</script>";
                            } else {
                                echo "<script>alert('Incorrect')</script>";
                                echo "<script>window.location='index.php?sologin'</script>";
                            }
                        }
                        ?>

                        <div class="login-logo">
                            <h2>Shop owner Login</h2>
                        </div>

                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div><hr><br>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="sobtnlogin">sign in</button>
                            </form>
                            <div class="register-link">
                                &nbsp;&nbsp;
                                <p>
                                    <a href="?syslogin">Back home</a>
                                </p>
                            </div>
                        </div>
                        <?php } ?>                        















                        <?php if(isset($_GET['custlogin']) && !isset($_GET['sologin']) && !isset($_GET['syslogin'])) { 

                            if(isset($_POST['custloginbtn'])) {

                            $stmt = $obj->custLogin();
                            $row = $stmt->FETCH(PDO::FETCH_ASSOC);

                            if($_POST['email']==$row['email'] && $_POST['password']==$row['password']) {

                                $_SESSION['cowner'] = $row['firstname']." ".$row['lastname'];
                                $_SESSION['c_id'] = $row['client_id'];
                                echo "<script>window.location='../customer.php?welcome'</script>";
                            } else {
                                echo "<script>alert('Failed to login!')</script>";
                                echo "<script>window.location='../index.php?custlogin'</script>";
                            }
                        }
                        ?>
                        <div class="login-logo">
                            <h2>Customer Login</h2>
                        </div>

                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div><hr><br>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="custloginbtn">Sign in</button>

                                <a class="au-btn au-btn--block au-btn--green m-b-20" type="submit" href="regpage.php?customer"><center>Create Account</center></a>
                            </form>
                        </div>

                        <br><center><a href="index.php?syslogin">Back home</a></center>
                        <?php } ?>                        












                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="../vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- ../vendor JS       -->
    <script src="../vendor/slick/slick.min.js">
    </script>
    <script src="../vendor/wow/wow.min.js"></script>
    <script src="../vendor/animsition/animsition.min.js"></script>
    <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../js/main.js"></script>

</body>

</html>
<!-- end document-->