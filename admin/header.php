<?php
session_start();
if (isset($_COOKIE['id']) && isset($_COOKIE['login']) && isset($_COOKIE['awatar'])){
    $_SESSION['adminid']=$_COOKIE['id'];
    $_SESSION['adminlogin']=$_COOKIE['login'];
    $_SESSION['adminawatar']=$_COOKIE['awatar'];
}
require_once ("param.php");
?>