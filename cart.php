<?
session_start();
?>
<!doctype html>
<html lang="ru">
<head>
    <title>Dream$hopAuto</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/images/logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
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
                        <div>
                            <a href="index.php" class="js-logo-clone"><img src="images/logo.png" class="img-fluid"></a>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                        <div class="site-top-icons">
                            <ul>
                                <li><a href="#"><span class="icon icon-person"></span></a></li>
                                <li><a href="#" class="heartclick"><span class="icon icon-heart-o heartlike"></span></a></li>
                                <li>
                                    <a href="cart.php" class="site-cart">
                                        <span class="icon icon-shopping-cart"></span>
                                        <span class="count"><?=count($_SESSION['item'])?></span>
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
                            <li><a href="#">Menu One</a></li>
                            <li><a href="#">Menu Two</a></li>
                            <li><a href="#">Menu Three</a></li>
                            <li class="has-children">
                                <a href="#">Sum Menu</a>
                                <ul class="dropdown">
                                    <li><a href="#">Menu One</a></li>
                                    <li><a href="#">Menu Two</a></li>
                                    <li><a href="#">Menu Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <a href="about.php">About</a>
                        <ul class="dropdown">
                            <li><a href="#">Menu One</a></li>
                            <li><a href="#">Menu Two</a></li>
                            <li><a href="#">Menu Three</a></li>
                        </ul>
                    </li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="catalog.php">Catalogue</a></li>
                    <li><a href="#">Service</a></li>
                    <li><a href="#">New Arrivals</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
                            <?
                            require_once ("param.php");
                            if (isset($_SESSION['item']) && count($_SESSION['item'])>0){
                                if (isset($_POST['send'])){
                                    for ($i=0; $i<count($_SESSION['item']); $i++){
                                        $nameElement="count".$_SESSION['item'][$i]['id'];
                                        $_SESSION['item'][$i]['count']=$_POST[$nameElement];
                                    }
                                }
                                ?>
            <div class="row mb-5">
                <form class="col-md-12" method="post" action="cart.php">
                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                            </thead>
                            <?
                            $totalsum=0;
                            foreach ($_SESSION['item'] as $tmp){
                                $stoimost=$tmp['price']*$tmp['count'];
                                $totalsum=$totalsum+$stoimost;
                                if (empty($photo)){
                                    $photo="noo.jpg";
                                }else{
                                    $photo=$tmp['photo'];
                                }
                                $query="Select count from towar WHERE id=".$tmp['id'];
                                $rezult=mysqli_query($dbc, $query) or die ("error");
                                $next=mysqli_fetch_array($rezult);
                                $count=$next['count'];
                                ?>
                                <tbody>
                                <tr>
                                    <td class="product-thumbnail">
                                        <img src="images/towar/<?=$tmp['photo']?>" alt="Image" class="img-fluid">
                                    </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black"><?=$tmp['model']?></h2>
                                        <h2 class="h6 text-info"><?=$tmp['cat']?></h2>
                                    </td>
                                    <td><?=$tmp['price']?> $</td>
                                    <td>
                                        <div class="input-group mb-3" style="max-width: 120px;">

                                            <input type="number" min="1" max="<?=$count?>" name="count<?=$tmp['id']?>" class="form-control text-center" value="<?=$tmp['count']?>">

                                        </div>
                                    </td>
                                    <td><?=$stoimost?> $</td>
                                    <td><a href="basket.php?id=<?=$tmp['id']?>&mode=del&script=cart" class="btn btn-primary btn-sm">X</a></td>
                                </tr>
                                </tbody>
                                <?
                            }
                            ?>
                        </table>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <a href="basket.php?mode=clear"><button class="btn btn-primary btn-sm btn-block">Clear Cart</button></a>
                        </div>
                        <div class="col-md-6">
                            <a href="shop.php"><button class="btn btn-outline-primary btn-sm btn-block">Continue Shopping</button></a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="text-black h4" for="coupon">Coupon</label>
                            <p>Enter your coupon code if you have one.</p>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0">
                            <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-sm">Apply Coupon</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black"><?=$totalsum?> $</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='check_out.php'">Proceed To Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                            <?
                            }else{

                            }
                            ?>
        </div>
    </div>
    <footer class="site-footer border-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="footer-heading mb-4">Navigations</h3>
                        </div>
                        <div class="col-md-6 col-lg-8">
                            <ul class="list-unstyled">
                                <li><a href="#">Sell online</a></li>
                                <li><a href="#">Hardware</a></li>
                                <li><a href="#">Store builder</a></li>
                                <li><a href="#">Website development</a></li>
                                <li><a href="#">Shopping cart</a></li>
                                <li><a href="#">Software</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <h3 class="footer-heading mb-4">Promo</h3>
                    <a href="#" class="block-6">
                        <img src="images/home.jpg" alt="Image placeholder" class="img-fluid rounded mb-4">
                        <h3 class="font-weight-light  mb-0">Finding Your Perfect Car</h3>
                        <p>Promo from 2019</p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 ">
                    <h3 class="footer-heading mb-4">Map</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d273473.6587979325!2d30.421200857216107!3d50.44616471914666!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc3e5de4af0c34638!2z0KTQsNC60YPQu9GM0YLQtdGCINGN0LvQtdC60YLRgNC-0L3QuNC60Lg!5e0!3m2!1sru!2sua!4v1552233954219" width="230" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="block-5 mb-5">
                        <h3 class="footer-heading mb-4">Contact Info</h3>
                        <ul class="list-unstyled">
                            <li class="address">03 Fake St. Hostel 7 View, Soloma, Kyiv, UA</li>
                            <li class="phone"><a href="tel://23923929210">097-87-86-886</a></li>
                            <li class="email">j_snow@my.com</li>
                        </ul>
                    </div>

                    <div class="block-7">
                        <form action="#" method="post">
                            <label for="email_subscribe" class="footer-heading">Subscribe</label>
                            <div class="form-group">
                                <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                                <input type="submit" class="btn btn-sm btn-primary" value="Send">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <p>
                        Copyright&copy;This templates create by s_Tokarzhevsky
                    </p>
                </div>

            </div>
        </div>
    </footer>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/main.js"></script>
<script src="script.js"></script>
</body>
</html>