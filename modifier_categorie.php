<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">


    <title>modifier categorie</title>
    
    <style>
 




        </style>

</head>
<body>
<?php include 'nav1.php' ?>
<div>


<h4>modifier categorie</h4>
<br>
<?php

require_once 'connexion.php';







 $sqlState = $pdo->prepare('SELECT * FROM categori WHERE id=?');
 $id = $_GET['id'];
 $sqlState->execute([$id]);

 $categories = $sqlState->fetch(PDO::FETCH_ASSOC);

if(isset ($_POST['modifier'])){



    $libelle=$_POST['libelle'];
    $description=$_POST['description'];
    $icone=$_POST['icone'];


    if(!empty( $libelle) && !empty($description)){

       
          $sqlState = $pdo->prepare('UPDATE categori
                                       SET  libelle=? ,
                                       description=?,
                                       icone=?
                                       WHERE id = ?
                                       ');    
          $sqlState->execute([$libelle,$description,$icone,$id]);
   
         header( 'location:listecat.php');
      
         
    } else{


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


   
        <input type="hidden" class="form-control"  value="<?php  echo  $categories['id']  ?>" name="id">

        <label class="form-label">libelle</label>
        <input type="text" class="form-control"  value="<?php  echo  $categories['libelle']  ?>"  name="libelle">


        <label class="form-label">icone</label>
        <input type="text" class="form-control"  value="<?php  echo  $categories['icone']  ?>"  name="icone">
    </div>
   
        <label>descriptioon</label>
        <textarea class="form-control" name="description"> <?php  echo  $categories['description']  ?></textarea> 
    




        <input type="submit" value="modifier" class=" btn btn-primary my-2" name="modifier">
  
</form>










</div>



</body>
</html>