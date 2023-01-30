<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:index1.php");
}
$idUtilisateur = $_SESSION['user']['id'];
$id=$_POST['id'];
unset($_SESSION['cart'][$idUtilisateur][$id]);
header("location:".$_SERVER['HTTP_REFERER']);