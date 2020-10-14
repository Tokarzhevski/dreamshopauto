<?
session_start();
if (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['mode']) && $_GET['mode']=="add"){
    $exist=false;
    if (!isset($_SESSION['item'])){
        $_SESSION['item']=array();
    }
    for ($i=0; $i<count($_SESSION['item']); $i++){
        if ($_SESSION['item'][$i]['id']==$_GET['id']){
            $_SESSION['item'][$i]['count']++;
            $exist=true;
            break;
        }
    }
    if (!$exist){
        require_once ("param.php");
        $query="Select model, price, photo, cat from towar WHERE id=".$_GET['id'];
        $rezult=mysqli_query($dbc, $query) or die ("error");
        $next=mysqli_fetch_array($rezult);
        $query1="Select cat from categories WHERE id=".$next['cat'];
        $rezult1=mysqli_query($dbc, $query1) or die("error1");
        $next1=mysqli_fetch_array($rezult1);
        $_SESSION['item'][]=array("id"=>$_GET['id'], "model"=>$next['model'], "cat"=>$next1['cat'], "photo"=>$next['photo'], "price"=>$next['price'], "count"=>1);
    }
}//end if add
if (isset($_GET['mode']) && $_GET['mode']=="clear" && isset($_SESSION['item'])){
    unset($_SESSION['item']);
    $_SESSION['item']=array();
}//end if clear
if (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['mode']) && $_GET['mode']=="del"){
    for ($i=0; $i<count($_SESSION['item']); $i++){
        if ($_SESSION['item'][$i]['id']){
            unset($_SESSION['item'][$i]);
            break;
        }
    }
    $item=array();
    foreach ($_SESSION['item'] as $tmp){
        if (!empty($tmp)){
            array_push($item, $tmp);
            //$item[]=$tmp;
        }
    }
    unset($_SESSION['item']);
    $_SESSION['item']=array();
    $_SESSION['item']=$item;
    unset($item);
}//end if del
if (isset($_GET['script']) && !empty($_GET['script'])){
    header("location:cart.php");
}else{
    header("location:shop.php");
}
?>