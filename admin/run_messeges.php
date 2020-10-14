<?
require_once ("header.php");
if (isset($_GET['id']) && !empty($_GET['id'])){
    $query="Update messege set messege.status=1 WHERE id=".$_GET['id'];
    mysqli_query($dbc, $query) or die("error");
    mysqli_close($dbc);
}
header("location: messeges.php");
?>