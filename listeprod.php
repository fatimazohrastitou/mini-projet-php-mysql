<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">

 



   
    <title>liste des categories </title>
    

</head>
<body>
<?php include 'nav1.php' ?>
<div>



<br>
<br>
<br>
<h3 style=" text-align:center">Liste des produits</h3>

<a  style=" text-align:center"  href="ajouterprod.php" class="btn btn-primary" >ajouter votre propre produit</a>
<br>
<br>
<table class="table table-hover">


<thead>
    <tr>

    <th>ID</th>
<th>libelle</th>
<th>prix</th>
<th>discount</th>

<th>categories</th>

<th>operation</th>



</tr>
</thead>
<tbody>
<?php

$user = "root";
$pass = "";

  $pdo = new PDO ("mysql:host=localhost;dbname=siteweb", $user, $pass);
  $categories = $pdo->query( 'SELECT produit.* , categori.libelle as CL FROM produit INNER JOIN categori ON produit.id_categorie=categori.id')->fetchAll( PDO::FETCH_ASSOC);

foreach($categories as $categories){
    ?>
    
    <tr>



    <td> <?php echo $categories['id']?></td>
    <td>    <?php echo $categories['libelle']?> </td>
    <td>    <?php echo $categories['prix']?> MAD</td>
    <td>    <?php echo $categories['discount']?> </td>
   
  
    <td>    <?php echo $categories['CL']?> </td>
   
    <td>    
       <a href="modifier_produit.php?id= <?php echo $categories['id']?>" class=" btn btn-primary">modifier</a>
       <a href="supprimer_produit.php?id= <?php echo $categories['id']?>" onclick="return confirm(' voulez vous vraiment supprimer le produit <?php echo $categories['libelle']?> ')" class=" btn btn-danger">delete</a>
    </td>
    
        
        

  
    </tr>
    <?php
   
}

?>
</tbody>


</table>














</div>




</body>
</html>