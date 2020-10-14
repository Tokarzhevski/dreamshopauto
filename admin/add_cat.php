<?php
require_once ("header.php");
if (isset($_SESSION['adminid']) && isset($_SESSION['adminlogin']) && isset($_SESSION['adminawatar']) && isset($_SESSION['admincont'])){
    ?>
    <!doctype html>
    <html lang="ru">
    <head>
        <title>Admin/D$A</title>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
        <link rel="stylesheet" href="/fonts/icomoon/style.css">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/css/aos.css">
        <link rel="stylesheet" href="/css/style.css">
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
    <div class="site-wrap">
        <header class="site-navbar" role="banner">
            <div class="site-navbar-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                            <form action="" class="site-block-top-search">
                                <span class="icon icon-search2"></span>
                                <input type="text" class="form-control border-0" placeholder="Search">
                            </form>
                        </div>
                        <div class="col-12 md-3 md-md-0 col-md-4 order-1 order-md-2 text-center">
                            <div class="site-logo">
                                <a href="/index.php" class="js-logo-clone">Admittance/Dream$hopAuto</a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                            <div class="site-top-icons">
                                <ul>
                                    <li><a href="#" id="click"><span class="icon icon-person"></span></a></li>
                                    <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                                    <li>
                                        <a href="basket.html" class="site-cart">
                                            <span class="icon icon-shopping-cart"></span>
                                            <span class="count">0</span>
                                        </a>
                                    </li>
                                    <li class="d-inline-block d-md-none ml-md--0">
                                        <a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="site-navigation text-right text-md-center" role="navigation">
                <div class="container">
                    <ul class="site-menu js-clone-nav d-none d-md-block">
                        <li class="has-children">
                            <a href="index.php">Home</a>
                            <ul class="dropdown">
                                <li><a href="login.php">Log in</a></li>
                                <li><a href="exit.php">Exit</a></li>
                                <li class="has-children">
                                    <a href="#">Sum Menu</a>
                                    <ul class="dropdown">
                                        <li><a href="add_admin.php">Add Admin</a></li>
                                        <li><a href="control_admin.php">Control Management</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#">Items</a>
                            <ul class="dropdown">
                                <li><a href="add_item.php">Add Items</a></li>
                                <li><a href="add_cat.php">Add Categories</a></li>
                                <li><a href="control_item.php">Control Items</a></li>
                            </ul>
                        </li>
                        <li><a href="messeges.php">Messeges from users</a></li>
                        <li><a href="#">Catalogue</a></li>
                        <li><a href="#">Service</a></li>
                        <li><a href="#">New Arrivals</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <?
        if (!isset($_POST['send'])){
        ?>
        <div class="col-md-6 ml-auto mr-auto mb-4 text-center forma">
            <h2 class="h3 mb-3 text-info text-center">Add new Categories </h2>
            <form action="add_cat.php" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-md-6 mr-auto ml-auto">
                        <label for="model" class="text-info">Enter Model<span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="model" placeholder="Enter model">
                    </div>
                </div>
                <div class="col-md-4 ml-auto mr-auto mt-4">
                    <input type="submit" class="btn btn-success form-control" name="send" value="Send">
                </div>
            </form>
            <?
            }else if (isset($_POST['send']) && !empty($_POST['model'])){
                $query="Insert into categories (cat) VALUE ('".$_POST['model']."')";
                mysqli_query($dbc, $query) or die ("error cat");
                echo "<h2 class='mb-2 text-success text-center'>New Categories <span class='text-danger'>".$_POST['model']."</span> successfully added!<br><span class='text-info'><a href='add_cat.php'>Add next one</a></span></h2>";
                mysqli_close($dbc);
            }else{
                echo "<h2 class='mb-2 text-warning text-center'>Error! No enough date</h2>";
                header("refresh:3; url=add_cat.php");
            }

            ?>
        </div>
    </div>
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/aos.js"></script>
    <script src="/js/main.js"></script>
    </body>
    </html>
    <?
}else{
    echo "page not found 404";
}