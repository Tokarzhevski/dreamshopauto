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
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <a href="cart.php">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
                <?
                require_once ("param.php");
                if(!isset($_POST['send'])){
                    ?>
            <form action="check_out.php" method="post">
                <div class="row">
                     <div class="col-md-6 mb-5 mb-md-0">
                        <h2 class="h3 mb-3 text-black">Billing Details</h2>
                        <div class="p-3 p-lg-5 border">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="fname" class="text-black">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="fname" name="fname">
                                </div>
                                <div class="col-md-6">
                                    <label for="lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lname" name="lname">
                                </div>
                            </div>
                            <div class="form-group row mb-5">
                                <div class="col-md-6">
                                    <label for="email" class="text-black">Email Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="text-black">Phone <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="c_create_account" class="text-black" data-toggle="collapse" href="#create_an_account" role="button" aria-expanded="false" aria-controls="create_an_account"><input type="checkbox" value="1" id="c_create_account"> Create an account?</label>
                                <div class="collapse" id="create_an_account">
                                    <div class="py-2">
                                        <p class="mb-3">Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                                        <div class="form-group">
                                            <label for="pass" class="text-black">Account Password</label>
                                            <input type="password" class="form-control" id="pass" name="pass">
                                            <label for="pass2" class="text-black">Account Password</label>
                                            <input type="password" class="form-control" id="pass2" name="pass2" placeholder="">
                                            <label for="login" class="text-black">Account Login</label>
                                            <input type="text" class="form-control" id="login" name="login">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="notes" class="text-black">Order Notes</label>
                                <textarea name="notes" id="notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h2 class="h3 mb-3 text-black">Your Order</h2>
                                <div class="p-3 p-lg-5 border">
                                    <table class="table site-block-order-table mb-5">
                                        <thead>
                                        <th>Product</th>
                                        <th>Total</th>
                                        </thead>
                                        <tbody>
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
                                            echo "<tr>
                                            <td>".$tmp['model']." / ".$tmp['cat']."<strong class=\"mx-2\">x</strong>".$tmp['count']."</td>
                                            <td>".$stoimost." $</td></tr>";
                                        }
                                        ?>
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                                            <td class="text-black"><?=$totalsum?> $</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                            <td class="text-black font-weight-bold"><strong><?=$totalsum?> $</strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="border p-3 mb-3">
                                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>
                                        <div class="collapse" id="collapsebank">
                                            <div class="py-2">
                                                <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border p-3 mb-3">
                                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>
                                        <div class="collapse" id="collapsecheque">
                                            <div class="py-2">
                                                <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border p-3 mb-5">
                                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>
                                        <div class="collapse" id="collapsepaypal">
                                            <div class="py-2">
                                                <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-lg py-3 btn-block"  name="send">Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
                    <!-- </form> -->
                <?
                }else if (isset($_POST['send']) && !empty($_POST['fname']) && !empty($_POST['email']) && !empty($_POST['phone']) && $_POST['pass']==$_POST['pass2']){
                 $query="Insert into client(fname, lname, phone, email, comment, login, pass) VALUE ('".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['phone']."', '".$_POST['email']."', '".$_POST['notes']."', '".$_POST['login']."', sha1('".$_POST['pass']."'))";
                 echo $query;
                 mysqli_query($dbc, $query) or die ("error");
                 $id_k=mysqli_insert_id($dbc);
                 foreach ($_SESSION['item'] as $tmp){
                     $queryr="Insert into relation(id_k, id_t, kolvo, data_zacaza) VALUE ($id_k, '".$tmp['id']."', '".$tmp['count']."', now())";
                     mysqli_query($dbc, $queryr) or die("errorr");
                 }
                 echo "<div class='col-md-12 text-center'>
            <span class='icon-check_circle display-3 text-success'></span>
            <h2 class='display-3 text-black'>Thank you!</h2>
            <p class='lead mb-5'>Your order has been successfully sent.</p>
               <p><a href='shop.php' class='btn btn-sm btn-primary'>Back to shop</a></p>
        </div>";
                    unset($_SESSION['item']);
                    $_SESSION['item']=array();
                    mysqli_close($dbc);
                }else{
                    echo "<div class='col-md-12 text-center'>
            <span class='icon-error display-3 text-danger'></span>
            <h2 class='display-3 text-warning'>Error 404</h2>
             <p class='lead mb-5'>Not enough data</p>
                <p><a href='cart.php' class='btn btn-sm btn-primary'>Back to cart</a></p>
        </div>";
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