<?
session_start();
require_once ("header.php");
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                            <a href="/admin/index.php" class="js-logo-clone">Admittance/Dream$hopCar</a>
                        </div>
                    </div>
                </div>
            </div>
    </header>
<?
if (!isset($_POST['send'])){
    ?>
    <div class="col-md-6 ml-auto mr-auto mb-4 text-center forma">
        <h2 class="h3 mb-3 text-info text-center">Log in</h2>
        <form action="login.php" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="pass" class="text-info">Enter Login <span
                                class="text-danger">*</span></label>
                    <input type="text" class="form-control"  name="login" placeholder="Enter login">
                </div>
                <div class="col-md-6">
                    <label for="pass2" class="text-info">Enter Password<span class="text-danger">*</span></label>
                    <input type="password" class="form-control"  name="pass" placeholder="Enter Passward">
                </div>
            </div>
            <div class="col-md-4 ml-auto mr-auto mt-4">
                <input type="submit" class="btn btn-success form-control" name="send" value="Send">
            </div>
        </form>
    </div>
    <?
}else if (isset($_POST['send']) && !empty($_POST['login']) && !empty($_POST['pass'])){
    $query="Select id, login, awatar, contact from admin WHERE login='".$_POST['login']."' and pass='".$_POST['pass']."'";
    $rezult=mysqli_query($dbc, $query) or die ("error");
    if (mysqli_num_rows($rezult)==1){
        $next=mysqli_fetch_array($rezult);
        $id=$next['id'];
        $login=$next['login'];
        $awatar=$next['awatar'];
        if (empty($awatar)){
            $awatar="noo.jpg";
        }
        $contact=$next['contact'];

        setcookie("id", $id, time()+60*60*24*30);
        setcookie("login", $login, time()+60*60*24*30);
        setcookie("awatar", $awatar, time()+60*60*24*30);
        setcookie("cont", $contact, time()+30*30*24*30);
        $_SESSION['adminid']=$id;
        $_SESSION['adminlogin']=$login;
        $_SESSION['adminawatar']=$awatar;
        if(empty($awatar)){
            $awatar="noo.jpg";
        }
        $_SESSION['admincont']=$contact;
        echo "<h2 class='h3 mb-3 text-danger text-center'>Go to admin panel<br><a href='index.php' class='text-primary text-center'>Go</a></h2>";
    }
}else{
    echo "<h2 class='h3 mb-3 text-danger text-center'>No enough date<br><a href='login.php' class='text-primary text-center'>Back</a></h2>";
}
mysqli_close($dbc);
    ?>
</div>
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/aos.js"></script>
<script src="/js/main.js"></script>
</body>
</html>