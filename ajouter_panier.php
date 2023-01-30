<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:index1.php');
}else{
$id=$_POST['id'];
$qty=$_POST['qty'];
$idUtilisateur = $_SESSION['user']['id'] ?? 0;
   
if($qty == 0){
    unset($_SESSION['cart'][$idUtilisateur][$id]);
}else{
    $_SESSION['cart'][$idUtilisateur][$id] = $qty;
}

header("location:".$_SERVER['HTTP_REFERER']);


}





?>