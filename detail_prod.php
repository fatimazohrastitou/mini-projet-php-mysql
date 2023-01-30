<?php

session_start(); 

require_once 'connexion.php';

$id=$_GET['id'];


 $sqlState = $pdo->prepare('SELECT * FROM produit WHERE id=?');
 $sqlState->execute([$id]);
 $produit = $sqlState->fetch( PDO::FETCH_ASSOC);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
    <link      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
       <style>


    </style>
    <title >produit |  <?php    echo $produit['libelle']?>   </title>
    
    
</head>
<body>
<?php include 'nav.php' ?>
<br>
<h4   ><?php    echo $produit['libelle']?> </h4>

<br><br>
<div class="container" >

<div class="row">

<div class="col-md-6">
    <img  class="img img-fluid w-50" src="upload/<?php echo $produit['image']?>">
</div>
<div class="col-md-6">
    <h1><?php echo $produit['libelle']  ?></h1>

    <h2>
    <span > <?php echo $produit['prix']  ?>MAD</span>


</h2>

   <?php
   if(!empty($produit['discount'])){
    ?>

<p>
<span class="badge text-bg-success"> -<?php echo $produit['discount']  ?></span>
   </p>

    <?php
   }

   ?>



<p>

<?php echo $produit['description']  ?>
</p>
<hr>
<?php 
$idProduit = $produit['id'];
include'counter.php' ?>

<hr>



<a class="btn btn-primary " href="#"> ajouter au panier</a>

</div>


</div>
















</div>
<script
  src="https://code.jquery.com/jquery-3.6.3.js"
  integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
  crossorigin="anonymous"></script>
<script src="qty.js"></script>
</body>

</html>