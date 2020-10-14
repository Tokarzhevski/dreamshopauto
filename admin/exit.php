<?php
require_once ("header.php");
if (isset($_SESSION['adminid']) && isset($_SESSION['adminlogin']) && isset($_SESSION['adminawatar']) && isset($_SESSION['admincont'])){
?>
    <!doctype html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin/D$A</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
        <link rel="stylesheet" href="/fonts/icomoon/style.css">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/css/aos.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="site-wrap">
        <header class="site-navbar" role="banner">
            <div class="site-navbar-top">
                <div class="container">
                    <div class="col-12 md-3 ml-auto mr-auto col-md-4 order-1 order-md-2 text-center">
                        <div class="site-logo">
                            <a href="/index.html" class="js-logo-clone">Admittance/Dream$hopAuto</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?
        if (!isset($_POST['yes'])){
        ?>
        <div class="col-md-6 ml-auto mr-auto mb-4 text-center forma">
            <h2 class="h3 mb-3 text-info text-center">Do you really want to leave</h2>
            <form action="exit.php" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-md-6">
                        <input type="submit" class="form-control btn-success"  name="no" value="No">
                    </div>
                    <div class="col-md-6">
                        <input type="submit" class="form-control badge-danger"  name="yes" value="Yes">
                    </div>
                </div>
            </form>
        </div>
    </div>
        <?
        }
    if (isset($_POST['yes'])){
    if (isset($_COOKIE[session_name()])){
        setcookie(session_name(), "", time()-7200);
    }
    $_SESSION=array();
    session_destroy();
    echo " <h2 class='h3 mb-3 text-info text-center'>Successful exit<br><a href='login.php' class='text-primary text-center'>Back</a></h2>";
    }
    else if (isset($_POST['no'])){
            header("location:index.php");
        }
    ?>
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
?>