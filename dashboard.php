<?php
include ('queries.php');
$obj = new InnovQuery;

session_start();

if(isset($_GET['logout'])) {
    session_destroy();
    header("Location: ./backend/?syslogin");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Shop owner - Innovation hub</title>
    <!-- Developed by Gad IRADUFASHA & Aimee -->
    <!-- At https://www.donnekt.com -->
    <!-- Github: https://github.com/Gadrawingz -->

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
                    <img src="media/white-logo.png" alt="Innovation Hub" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">

                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">

                        <li>
                            <a href="?addshop">
                                <i class="fas fa-plus-square"></i>Add new shop</a>
                        </li>

                        <li>
                            <a href="?viewshops">
                                <i class="fas fa-tachometer-alt"></i>View shops</a>
                                <span class="inbox-num"><?php echo $obj->countAllShops();?></span>
                        </li>

                        <li>
                            <a href="?addinnov">
                                <i class="fas fa-plus-square"></i>Add Innovator</a>
                        </li>


                        <li>
                            <a href="?viewinnov">
                                <i class="fas fa-shopping-basket"></i>View innovators</a>
                                <span class="inbox-num"><?php echo $obj->countAllinnovators();?></span>
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
                                    <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                                </a>
                            </div>
                            <div class="header-button2">
                                


                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <!-- <div class="account-dropdown__item">
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
                            <img src="images/icon/avatar-big-01.jpg" alt="John Doe" />
                        </div>
                        <h4 class="name">john doe</h4>
                        <a href="#">Sign out</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li class="active has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-tachometer-alt"></i>View
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-tachometer-alt"></i>Dashboard 1</a>
                                    </li>
                                </ul>
                            </li>
                
                            <li>
                                <a href="#">
                                    <i class="fas fa-shopping-basket"></i>eCommerce</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->











            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">You are here:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="#">Home</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="?addshop" class="au-btn au-btn-icon au-btn--green">
                                        <i class="zmdi zmdi-plus"></i>Add new shop</a>
                                    <a href="?addinnov" class="au-btn au-btn-icon au-btn--green">
                                        <i class="zmdi zmdi-plus"></i>Register innovator</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->












            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <?php if(isset($_GET['addshop'])) {  

                            if(isset($_POST['addshopbtn'])) {

                                if($obj->add_shop($_POST['shopname'], $_POST['shoploc'], $_POST['shopowner'])) {
                                echo "<script>alert('ADDED!')</script>";
                                echo "<script>window.location='?addshop'</script>";
                            } else {
                                echo "<script>alert('NOT SAVED!')</script>";
                                echo "<script>window.location='?addshop'</script>";
                            }
                        }

                        ?>
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Add new shop</h2>
                                    </div>

                                    <form method="POST" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="card-body card-block">
                                        
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Shop name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="shopname" placeholder="Shop name..." class="form-control">
                                                    <small class="form-text text-muted">Shop Name</small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Shop Location</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="email-input" name="shoploc" placeholder="Enter Location" class="form-control">
                                                    <small class="help-block form-text">Please enter location</small>
                                                </div>
                                            </div>

<!--                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Shop owner</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="password-input" name="shopowner" placeholder="Shop owner" class="form-control">
                                                    <small class="help-block form-text">Owner name</small>
                                                </div>
                                            </div> -->
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="addshopbtn" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i>&nbsp;Add
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Cancel
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php } ?>








                        <?php if(isset($_GET['addinnov'])) { 

                            if(isset($_POST['addinnovbtn'])) {

                                if($obj->addInnovator($_POST['fname'], $_POST['lname'], $_POST['username'], $_POST['email'], $_POST['telno'], $_POST['password'], $_POST['shop_id'])) {

                                    $stmt50 = $obj->getLastInsertedShopOwnerId();
                                    $row50 = $stmt50->FETCH(PDO::FETCH_ASSOC);

                                    // Update table
                                    $obj->updateShopTable($row50['user_id'], $_POST['shop_id']);



                                echo "<script>alert('ADDED!')</script>";
                                echo "<script>window.location='?addinnov'</script>";
                            } else {
                                echo "<script>alert('NOT SAVED!')</script>";
                                echo "<script>window.location='?addinnov'</script>";
                            }
                        }
                        ?>
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Add Innovator</h2>
                                    </div>

                                    <form method="POST" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Firstname</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="fname" placeholder="" class="form-control">
                                                    <small class="form-text text-muted">Firstname only</small>
                                                </div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Lastname</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="lname" placeholder="" class="form-control">
                                                    <small class="form-text text-muted">Lastname only</small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Username</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="username" placeholder="" class="form-control">
                                                    <small class="form-text text-muted">Username only</small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="email" id="email-input" name="email" placeholder="Enter Email" class="form-control">
                                                    <small class="help-block form-text">Please enter your email</small>
                                                </div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Tel.No</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="email-input" name="telno" placeholder="" class="form-control">
                                                    <small class="help-block form-text">Please enter your telephone</small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="password-input" name="password" placeholder="Password" class="form-control">
                                                    <small class="help-block form-text">Please enter a complex password</small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Select Shop</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="shop_id" class="form-control">
                                                    <?php
                                                    $stmt80= $obj->viewAvailableShops();
                                                    while($r80= $stmt80->FETCH(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                    <option value="<?php echo $r80['shop_id'];?>"><?php echo $r80['shop_name'];?></option>
                                                <?php } ?>
                                                    </select>
                                                </div>
                                            </div>


                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="addinnovbtn">
                                            <i class="fa fa-dot-circle-o"></i>Save
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php } ?>












                        <?php if(isset($_GET['updu'])) { 

                            if(isset($_POST['updateinnovbtn'])) {

                                if($obj->updateInnovator($_POST['fname'], $_POST['lname'], $_POST['username'], $_POST['email'], $_POST['telno'], $_GET['updu'])) {
                                echo "<script>alert('SUCCESSFULLY UPDATED!')</script>";
                                echo "<script>window.location='?viewinnov'</script>";
                            } else {
                                echo "<script>alert('NOT UPDATED!')</script>";
                                echo "<script>window.location='?viewinnov'</script>";
                            }
                        }

                        $stmt9= $obj->view_one_innovator($_GET['updu']);
                        $row9= $stmt9->FETCH(PDO::FETCH_ASSOC);

                        ?>
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Update Innovator</h2>
                                    </div>

                                    <form method="POST">
                                    <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Firstname</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="fname" value="<?php echo $row9['firstname'];?>" class="form-control">
                                                </div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Lastname</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="lname" value="<?php echo $row9['firstname'];?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Username</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="username"  value="<?php echo $row9['username'];?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="email" id="email-input" name="email" value="<?php echo $row9['email'];?>" class="form-control">
                                                </div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Tel.No</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="email-input" name="telno"  value="<?php echo $row9['telnumber'];?>" class="form-control">
                                                </div>
                                            </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="updateinnovbtn">
                                            <i class="fa fa-dot-circle-o"></i>Update
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i>Reset
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php } ?>








                        <?php if(isset($_GET['updsh'])) { 
                            if(isset($_POST['updateshopbtn'])) {

                            if($obj->updateOneShop($_POST['shop_name'], $_POST['shop_location'], $_GET['updsh'])) {
                                echo "<script>alert('SUCCESSFULLY UPDATED!')</script>";
                                echo "<script>window.location='?viewshops'</script>";
                            } else {
                                echo "<script>alert('IS NOT UPDATED!')</script>";
                                echo "<script>window.location='?viewshops'</script>";
                            }
                        }
                        $stmt9= $obj->viewOneShopById($_GET['updsh']);
                        $row9= $stmt9->FETCH(PDO::FETCH_ASSOC);
                        ?>
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Update One shop</h2>
                                    </div>

                                    <form method="POST">
                                    <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Shop Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="shop_name" value="<?php echo $row9['shop_name'];?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Shop Location</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="shop_location" value="<?php echo $row9['shop_location'];?>" class="form-control">
                                                </div>
                                            </div>


                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="updateshopbtn">
                                            <i class="fa fa-dot-circle-o"></i>Update
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i>Reset
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php } ?>





















                        <?php if(isset($_GET['viewshops'])) { ?>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <h2>All shops</h2>
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Shop Name</th>
                                                
                                                <th>Shop Location</th>
                                                <th>Shop Owner</th>
                                                <th colspan="2"><center>Actions</center></th>
                                            </tr>
                                        </thead>

                                    <?php
                                $stmt= $obj->view_all_shops();
                                while($row= $stmt->FETCH(PDO::FETCH_ASSOC)){
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['shop_id'];?></td>
                                                <td><?php echo $row['shop_name'];?></td>
                                                <td><?php echo $row['shop_location'];?></td>
                                                <td><?php 
                                                if($row['shop_owner']=='0') {
                                                    echo "<mark>No shop owner assigned</mark>";
                                                } else {
                                                    $stmt9= $obj->retrieveInnovatorName($row['shop_owner']);
                                                    $r9= $stmt9->FETCH(PDO::FETCH_ASSOC);
                                                    echo $r9['firstname']." ".$r9['lastname'];
                                                }
                                                ?></td>
                                                <td><center>
                                                <a href="?updsh=<?php echo $row['shop_id'];?>" class="btn btn-primary">Edit</a>
                                                <a href="?delsh=<?php echo $row['shop_id'];?>" onclick="return confirm('Are you sure u want to delete this?')" class="btn btn-danger">Remove</a>
                                                </center></td>
                                            </tr>
                                        </tbody>
                                    <?php } ?>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        <?php } ?>
                        <?php
                        if(isset($_GET['delsh'])) {
                            $obj->deleteOneShop($_GET['delsh']);
                            echo "<script>alert('IS REMOVED SUCCESSFULLY!')</script>";
                            echo "<script>window.location='?viewshops'</script>";
                        }
                        ?>





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
                                                <th>Shop</th>
                                                <th>Tel.No</th>
                                                <th colspan="2"><center>Action</center></th>
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
                                                <td>
                                                    <?php 
                                                    $stmt1= $obj->viewshopNameFromId($row['shop_id']);
                                                    $row1= $stmt1->FETCH(PDO::FETCH_ASSOC);
                                                    echo $row1['shop_name'];
                                                    ?>
                                                </td>
                                                <td><?php echo $row['telnumber'];?></td>
                                                <td><center><a href="?delu=<?php echo $row['user_id'];?>" onclick="return confirm('Are you sure u want to delete this?')" class="btn btn-danger">Delete</a>
                                                <a href="?updu=<?php echo $row['user_id'];?>" class="btn btn-primary">Edit</a></center></td>
                                                
                                            </tr>
                                        </tbody>
                                    <?php } ?>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        <?php } ?>

                        <?php
                        if(isset($_GET['delu'])) {
                            $obj->deleteInnovator($_GET['delu']);
                            echo "<script>alert('REMOVED!')</script>";
                            echo "<script>window.location='?viewinnov'</script>";
                        }
                        ?>










            <!-- STATISTIC-->
            <center><h2>General statistics</h2></center>
            <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <center><h2 class="number"><?php echo $obj->countAllShops();?></h2></center>
                                    <br><h4 class="mb-3"><b>Active shops</b></h4>
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <center><h2 class="number"><?php echo $obj->countAllInnovators();?></h2></center>
                                    <br><h4 class="mb-3"><b>All innovators</b></h4>
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number"><?php echo $obj->countAllInnovations();?></h2></center>
                                    <br><h4 class="mb-3"><b>All (products) innovations</b></h4>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number"><?php echo $obj->countAllCustomers();?></h2></center>
                                    <br><h4 class="mb-3"><b>Total customers</b></h4>
                                    <div class="icon">
                                        <i class="fa fa-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->












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

</body>

</html>
<!-- end document-->
