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
                <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-9 order-2">
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
                            <div class="d-flex">
                                <div class="dropdown mr-1 ml-md-auto">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Latest
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                        <a class="dropdown-item" href="#">Sport car</a>
                                        <a class="dropdown-item" href="#">Musle car</a>
                                        <a class="dropdown-item" href="#">Luxury</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
            <?
            require_once ("param.php");
            if (isset($_GET['asc'])) {
                $query="Select id, model, price, dat, probeg, photo from towar ORDER BY price asc";
            }else if (isset($_GET['desc'])){
                $query="Select id, model, price, dat, probeg, photo from towar ORDER BY price desc";
            }else{
                $query="Select id, model, price, dat, probeg, photo from towar";
            }
            switch ($sort){
                case"asc":
                    $sort="desc";
                    break;
                case"desc":
                    $sort="asc";
                    break;
                default:
                    $sort="asc";
                    break;
            }
            $rezult=mysqli_query($dbc, $query) or die("error");
            while($next=mysqli_fetch_array($rezult)){
                $photo=$next['photo'];
                if (empty($photo)){
                    $photo="noo.jpg";
                }
                echo "<div class='col-sm-6 col-lg-4 mb-4' data-aos='fade-u'>
                            <div class='block-4 text-center border'>
                                <figure class='block-4-image mb-3' style='height: 230px'>
                                    <a href='shop_single.php?id=".$next['id']."'><img src='images/towar/".$photo."' alt='Image placeholder' class='img-fluid'></a>
                                </figure>
                                <div class='block-4-text p-2 '>
                                    <h3><a href='shop_single.php?id=".$next['id']."'>".$next['model']."</a></h3>
                                    <p class='mb-0'>".$next['dat']." / ".$next['probeg']." km</p>
                                    <p class='text-primary font-weight-bold'>".$next['price']."</p>
                                </div>
                            </div>
                        </div>";
            }
            ?>
                    </div>
                    <div class="row" data-aos="fade-up">
                        <div class="col-md-12 text-center">
                            <div class="site-block-27">
                                <ul>
                                    <li><a href="#">&lt;</a></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&gt;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?
                require_once ("param.php");
                $query="Select cat from towar WHERE cat=1";
                $rezult=mysqli_query($dbc, $query) or die ("error");
                $sport=mysqli_num_rows($rezult);
                $query1="Select cat from towar WHERE cat=2";
                $rezult1=mysqli_query($dbc, $query1) or die("error1");
                $musle=mysqli_num_rows($rezult1);
                $query2="Select cat from towar WHERE cat=3";
                $rezult2=mysqli_query($dbc, $query2) or die("error2");
                $luxury=mysqli_num_rows($rezult2);
                ?>
                <div class="col-md-3 order-1 mb-5 mb-md-0">
                    <div class="border p-4 rounded mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"><a href="#" class="d-flex"><span>Sport car</span> <span class="text-black ml-auto">(<?=$sport?>)</span></a></li>
                            <li class="mb-1"><a href="#" class="d-flex"><span>Musle car</span> <span class="text-black ml-auto">(<?=$musle?>)</span></a></li>
                            <li class="mb-1"><a href="#" class="d-flex"><span>Luxury</span> <span class="text-black ml-auto">(<?=$luxury?>)</span></a></li>
                        </ul>
                    </div>


                    <div class="border p-4 rounded">
                        <div class="mb-2">
                            <h3 class="mb-3 h6  text-black d-block">Filter by Price</h3>
                            <div class="border-primary h3 text-primary ">
                                <a href="shop.php?asc"><span class="icon icon-sort-amount-asc"></span></a>
                                <a href="shop.php?desc"><span class="icon icon-sort-amount-desc ml-3"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <h3 class="footer-heading mb-4">Map</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d273473.6587979325!2d30.421200857216107!3d50.44616471914666!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc3e5de4af0c34638!2z0KTQsNC60YPQu9GM0YLQtdGCINGN0LvQtdC60YLRgNC-0L3QuNC60Lg!5e0!3m2!1sru!2sua!4v1552233954219" width="250" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
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