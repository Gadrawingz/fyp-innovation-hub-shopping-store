<?php
include ('queries.php');
$obj = new InnovQuery;

session_start();

if(!isset($_SESSION['s_id'])) {
    echo "<script>alert('ACCESS DENIED!')</script>";
    echo "<script>window.location='backend/?sologin'</script>";
}

/*var_dump($_SESSION);
return;*/
if(isset($_GET['logout'])) {
    session_destroy();
    header("Location: backend/?sologin");
}

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
    <title>Innovator - Innovation hub</title>

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
                    <span style="color: white; font-size: 20px;">Shop owner Home</span>
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
                            <a href="?myshop">
                                <i class="fas fa-toggle-down"></i>My shop</a>
                        </li>

                        <li>
                            <a href="?addinnov">
                                <i class="fas fa-toggle-down"></i>Add new innovation</a>
                        </li>

                        <li>
                            <a href="?myinnovs">
                                <i class="fas fa-tachometer-alt"></i>My innovations</a>
                                <span class="inbox-num"><?php echo $obj->countInnovationsPerOwner($_SESSION['s_id']);?></span>
                        </li>

                        <li>
                            <a href="?allorders">
                                <i class="fas fa-chart-bar"></i>View all orders</a>
                                <span class="inbox-num bg-success"><?php echo $obj->countOrdersHistoryPerInnovator($_SESSION['s_id']);?></span>
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
                                
                                <center><h3>Innovation hub</h3></center>&nbsp;&nbsp;&nbsp;

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
                                        <span class="au-breadcrumb-span">Hi, <strong><?php echo $_SESSION['sowner'];?></strong></span>
                                    </div>
                                    <a href="?addinnov" class="au-btn au-btn-icon au-btn--green">
                                        <i class="zmdi zmdi-plus"></i>Add innovation</a>
                                    
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
                                        <h2>Add shops</h2>
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

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Shop owner</label>
                                                </div>
                                                <div class="col-12 col-md-9">

                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="addshopbtn" class="btn btn-primary btn-sm">
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








                        <?php if(isset($_GET['addinnov'])) { 

                            if(isset($_POST['uploadInnovbtn'])) {

                                if($obj->uploadInnovation($_POST['prod_name'], $_FILES['prod_photo']['name'], $_FILES['prod_photo']['tmp_name'], $_POST['category'], $_POST['description'], $_POST['prod_price'], $_POST['prod_quantity'], $_SESSION['s_id'])) {

                                echo "<script>alert('INNOVATION IS ADDED!')</script>";
                                echo "<script>window.location='?addinnov'</script>";

                            } else {
                                echo "<script>alert('INNOVATION IS NOT SAVED!')</script>";
                                echo "<script>window.location='?addinnov'</script>";
                            }
                        }
                        ?>

                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Add new innovation</h2>
                                    </div>

                                    <form method="POST" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="card-body card-block">

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Product name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="prod_name" placeholder="" class="form-control" required>
                                                    <small class="form-text text-muted">Product name only</small>
                                                </div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Browse photo</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="email-input" name="prod_photo" placeholder="Enter Email" class="form-control" required>
                                                    <small class="help-block form-text">Upload a photo only</small>
                                                </div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="selectLg" class=" form-control-label">Select category</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="category" id="selectLg" class="form-control-md form-control" required>
                                                    <option value="">Please select</option>
                                                    <?php
                                                    $stmt = $obj->view_prodcategories();
                                                    while($row = $stmt->FETCH(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                    <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Description</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="description" placeholder="" class="form-control" required>
                                                    <small class="form-text text-muted">Full Description</small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Set a price</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="text-input" name="prod_price" class="form-control" required>
                                                    <small class="form-text text-muted">Exact price</small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Quantity</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="text-input" name="prod_quantity" class="form-control" required>
                                                    <small class="form-text text-muted">Available products</small>
                                                </div>
                                            </div>


                                    </div>


                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-md" name="uploadInnovbtn">
                                            <i class="fa fa-dot-circle-o"></i> Save
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-md">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php } ?>





                        <?php if(isset($_GET['myshop'])) { ?>

                            <div class="col-md-9">
                                <center><h2>View of Innovator shop</h2></center><br>
                                <div class="card">
                                    <div class="card-header bg-dark">
                                        <strong class="card-title text-light">My shop</strong>
                                    </div>
                                <?php
                                $stmt= $obj->view_one_shop($_SESSION['s_id']);
                                $row= $stmt->FETCH(PDO::FETCH_ASSOC);
                                ?>
                                    <div class="card-body text-white bg-danger">
                                        <p class="card-text text-light">Shop Name:&nbsp;<b><?php echo $row['shop_name'];?></b></p>
                                    
                                        <p class="card-text text-light">Shop Location:&nbsp;<b><?php echo $row['shop_location'];?></b></p>
                                        <p class="card-text text-light">Available Innovations:&nbsp;<?php echo $obj->countInnovationsPerOwner($_SESSION['s_id']);?></b></p>
                                        
                                    </div>
                                </div>
                            </div>
                        <?php } ?>




                        <?php if(isset($_GET['viewcust'])) { ?>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <h2>View Customers</h2>
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Names</th>
                                                <th>Username</th>
                                                <th>Tel.No</th>
                                                <th>Email</th>
                                                <th>District</th>
                                            </tr>
                                        </thead>

                                    <?php
                                $stmt= $obj->view_customers();
                                while($row= $stmt->FETCH(PDO::FETCH_ASSOC)){
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['client_id'];?></td>
                                                <td><?php echo $row['firstname']." ".$row['lastname'];?></td>
                                                <td><?php echo $row['username'];?></td>
                                                <td><?php echo $row['telnumber'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['district'];?></td>
                                            </tr>
                                            </tr>
                                        </tbody>
                                    <?php } ?>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        <?php } ?>






                        <?php if(isset($_GET['allorders'])) { ?>
                        <div class="row m-t-30" style="margin-top: 5px!important;">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <center><h2>View orders from Customers</h2></center>
                                <div class="table-responsive m-b-40">
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Order No.</th>
                                                <th>Product.Name</th>
                                                <th>Paid amount</th>
                                                <th>Payment method</th>
                                                <th>Paid by</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                    <?php
                                $stmt= $obj->viewOrdersHistoryPerInnovator($_SESSION['s_id']);
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
                                                    <?php
                                                    $stmtC=$obj->returnCustomerNameById($row['cust_id']);
                                                    $rowC=$stmtC->FETCH(PDO::FETCH_ASSOC);
                                                    echo $rowC['firstname']." ".$rowC['lastname'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php if($row['status']=='Pending') { ?>
                                                    <button class="btn btn-danger" disabled>Not delivered</button>
                                                    <?php } else { ?>
                                                    <button class="btn btn-primary" disabled>Delivered</button>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $row['payment_date'];?></td>
                                            </tr>
                                        </tbody>
                                    <?php $num++; } ?>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        <?php } ?>










                        <?php if(isset($_GET['myinnovs'])) { ?>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <center><h2>My innovations</h2></center><br>
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                    <?php
                                $stmt= $obj->viewInnovationsPerOwner($_SESSION['s_id']);
                                while($row= $stmt->FETCH(PDO::FETCH_ASSOC)) {
                                    ?>     
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['prod_id'];?></td>
                                                <td><?php echo $row['prod_name'];?></td>
                                                <td><center><img src="innovations/<?php echo $row['prod_image'];?>" style="height: auto; max-height: 150px; max-width: 100%;"></td></center>
                                                <td>
                                                    <?php 
                                                    $stmt0 = $obj->viewOneCategory($row['prod_category']);
                                                    $row0 = $stmt0->FETCH(PDO::FETCH_ASSOC);
                                                    echo $row0['cat_name'];
                                                    ?>    
                                                    </td>
                                                <td><?php echo $row['prod_quantity'];?></td>
                                                <td><?php echo number_format($row['prod_price']);?>rwf</td>
                                                <td><center>
                                                    <a href="?editprod=<?php echo $row['prod_id']; ?>" class="btn btn-primary">Update</a>
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



                       <?php if(isset($_GET['editprod'])) { 

                            if(isset($_POST['updateinnovbtn'])) {

                                if($obj->updateInnovation($_POST['prod_name'], $_POST['description'], $_POST['prod_price'], $_POST['prod_quantity'], $_GET['editprod'])) {
                                echo "<script>alert('INNOVATION IS UPDATED!')</script>";
                                echo "<script>window.location='?myinnovs'</script>";
                            } else {
                                echo "<script>alert('INNOVATION NOT UPDATED!')</script>";
                                echo "<script>window.location='?myinnovs'</script>";
                            }
                        }

                        $stmt9= $obj->viewOneInnovationById($_GET['editprod']);
                        $row9= $stmt9->FETCH(PDO::FETCH_ASSOC);
                        ?>

                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Update innovation(product)</h2>
                                    </div>

                                    <form method="POST" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="card-body card-block">

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Product name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="prod_name" value="<?php echo $row9['prod_name'];?>" class="form-control">
                                                </div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Description</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="description" value="<?php echo $row9['prod_description'];?>" class="form-control">
                                                    <small class="form-text text-muted">Full Description</small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Update a price</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="prod_price" value="<?php echo $row9['prod_price'];?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Quantity</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="prod_quantity" value="<?php echo $row9['prod_quantity'];?>" class="form-control" value="">
                                                </div>
                                            </div>
                                    </div>


                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-md" name="updateinnovbtn">
                                            <i class="fa fa-dot-circle-o"></i> Update
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-md">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php } ?>














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

</body>

</html>
<!-- end document-->
