<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">


    <title>Document</title>
    
    <style>
 
        </style>

</head>
<body>
<?php include 'nav1.php' ?>
<div>


<h4>ajouter categorie</h4>
<br>
<?php
 if(isset($_POST['ajouter'])){
    $libelle=$_POST['libelle'];
    $description=$_POST['description'];
    $icone=$_POST['icone'];


    if(!empty( $libelle) && !empty($description)){

        $user = "root";
        $pass = "";
        
          $pdo = new PDO ("mysql:host=localhost;dbname=siteweb", $user, $pass);
          $sqlState = $pdo->prepare('INSERT INTO categori(libelle,description,icone) VALUES(?,?,?) ');
          $sqlState->execute([$libelle,$description,$icone]);
      header('location:listecat.php');
      
    }else{


        ?>
        <div class=" alert alert-danger" role="alert">
       libelle, description sont obligatoires

      </div>
      <?php

    }
}

?>




<form method="post">
    <div class="form-group">
        <label class="form-label">libelle</label>
        <input type="text" class="form-control"  name="libelle">
    </div>
   




    <label class="form-label">icone</label>
        <input type="text" class="form-control"  name="icone">



        <label>descriptioon</label>
        <textarea class="form-control" name="description"></textarea> 
    




        <input type="submit" value="add categories" class=" btn btn-primary my-2" name="ajouter">
  
</form>










</div>



</body>
</html>