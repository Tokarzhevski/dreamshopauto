<?php
require_once ("header.php");
if (isset($_SESSION['adminid']) && isset($_SESSION['adminlogin']) && isset($_SESSION['adminawatar']) && isset($_SESSION['admincont'])) {
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
    <header class="site-navbar" id='image' role="banner">
        <div class="site-navbar-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                        <form action="" class="site-block-top-search">
                            <span class="icon icon-search2"></span>
                            <input type="text" class="form-control border-0" name="search" placeholder="Search">
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
                            <li><a href="control_item.php">Control Items</a></li>
                        </ul>
                    </li>
                    <li><a href="shop.html">Shop</a></li>
                    <li><a href="#">Catalogue</a></li>
                    <li><a href="#">Service</a></li>
                    <li><a href="#">New Arrivals</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class='col-md-10 ml-auto mr-auto mb-1 text-center forma'>
        <?
        if (!isset($_POST['send2']) && !empty($_GET['id']) && !empty($_GET['email'])){
            $id=$_GET['id'];
            ?>
            <div class="col-md-6 mr-auto ml-auto mb-3 text-center">
                <form action="messeges.php" method="post">
                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="email" class="form-control" id="email" name="email" value="<?=$_GET['email']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea name="messege" id="messege" cols="30" rows="7" class="form-control">Messege</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="hidden" name="id" value="<?=$_GET['id']?>">
                                <input type="submit" class="btn btn-primary btn-lg btn-block" name="send2" value="Send Messege">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?
        } else if (isset($_POST['send2']) && !empty($_POST['email']) && !empty($_POST['messege'])) {
            $id=$_POST['id'];
            $to = $_POST['email'];
            $from = "dremshopauto@mail.ru";
            $messege = $_POST['messege'];
            $headers = "From:" . $from;
            mail($to, $headers, $messege);
            echo "<h2 class='h3 mb-3 text-info text-center'>Messege has been sent!<br><a href='run_messeges.php?id=".$id."'>Back</a></h2>";
        }
    $query = "Select id, name, lname, mail, messege from messege WHERE status=0 ORDER BY id DESC";
    $rezult = mysqli_query($dbc, $query) or die ("error");
    echo "<table class='table table-light table-hover h4 table-responsive-sm'>
                <thead class='table-info'>
                <tr>
                    <th>№</th>
                    <th>Name</th>
                    <th>LName</th>
                    <th>Email</th>
                    <th>Messege</th>
                    <th>Answer</th>
                </tr>
                </thead>";
    $num = 1;
    while ($next = mysqli_fetch_array($rezult)) {
        $id = $next['id'];
        $name = $next['name'];
        $lname = $next['lname'];
        $email = $next['mail'];
        $messege = $next['messege'];
        echo "<tbody id='myTable' class=''>
                <tr class='text-dark'>
                    <td>$num</td>
                    <td>$name</td>
                    <td>$lname</td>
                    <td class='text-info'>$email</td>
                    <td class='text-info'>$messege</td>
                    <td><a href='messeges.php?id=".$id."&email=".$email."' class='h1 text-success'><span class='icon icon-reply2'></span></a></td>
                </tr>
                </tbody>";
        $num++;
    }
    echo "</table>";
    mysqli_close($dbc);
    ?>
        </div>
    </div>
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/aos.js"></script>
    <script src="/js/main.js"></script>
    <script src="script.js"></script>
    </body>
    </html>
<?
}else{
    echo "page not found 404";
}