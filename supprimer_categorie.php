<?php 




$user = "root";
$pass = "";

  $pdo = new PDO ("mysql:host=localhost;dbname=siteweb", $user, $pass);

$id=$_GET['id'];
 $sqlState = $pdo->prepare('DELETE FROM categori WHERE id=?');
 $supprimer = $sqlState->execute([$id]);

 header('location: listecat.php');


?>