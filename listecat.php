<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">

    <link      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">



   
    <title>liste des categories </title>
    

</head>
<body>
<?php include 'nav1.php' ?>
<div>



<br>
<br>
<br>
<h3 style=" text-align:center">Liste des categories</h3>

<a  style=" text-align:center"  href="ajoutercat.php" class="btn btn-primary" >ajouter votre propre catégorie</a>
<br>
<br>
<table class="table table-hover">


<thead>
    <tr>

    <th>ID</th>
<th>libelle</th>

<th>description</th>


<th>date</th>
<th>icone</th>
<th>operation</th>



</tr>
</thead>
<tbody>
<?php

$user = "root";
$pass = "";

  $pdo = new PDO ("mysql:host=localhost;dbname=siteweb", $user, $pass);
  $categories = $pdo->query( 'SELECT * FROM categori')->fetchAll( PDO::FETCH_ASSOC);

foreach($categories as $categories){
    ?>
    
    <tr>



    <td> <?php echo $categories['id']?></td>
    <td>    <?php echo $categories['libelle']?> </td>
    <td>   <?php echo $categories['description']?> </td>
    <td>     <?php echo $categories['date']?> </td>
    <td>     <i class=" fa<?php  echo  $categories['icone'] ?>"></i> </td>
    <td>    
       <a href="modifier_categorie.php?id= <?php echo $categories['id']?>" class=" btn btn-primary">modifier</a>
       <a href="supprimer_categorie.php?id= <?php echo $categories['id']?>" onclick="return confirm(' voulez vous vraiment supprimer lacategorie <?php echo $categories['libelle']?> ')" class=" btn btn-danger">delete</a>
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