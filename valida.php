<?php
session_start();

if(isset($_SESSION['user'])){
    $idUtilisateur = $_SESSION['user']['id'];
$conn=mysqli_connect('localhost','root','','siteweb') or die(mysqli_error());
require_once 'connexion.php';
$nom=$_POST['name'];
$ema=$_POST['email'];
$phone=$_POST['phone'];
$adre=$_POST['address'];
$pmode=$_POST['pmode'];

$req="INSERT INTO checkout(nom,email,phone,adress,pay,id_client) values ('$nom','$ema','$phone','$adre','$pmode',$idUtilisateur)";

$res=mysqli_query($conn,$req);
header('location:home.php');
}
?>