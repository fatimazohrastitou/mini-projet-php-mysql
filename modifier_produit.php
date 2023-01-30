<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">


    <title>modifier produit</title>
    
   

</head>
<body>
<?php include 'nav1.php' ?>
<div>


<h4>modifier produit</h4>
<br>
<?php
  $id = $_GET['id'];
 require_once 'connexion.php';


 $sqlState = $pdo->prepare('SELECT * FROM produit WHERE id=?');
 
 $sqlState->execute([$id]);


 $produit = $sqlState->fetch(PDO::FETCH_ASSOC);



 if(isset($_POST['modifier'])){

    $libelle=$_POST['libelle'];
    $prix=$_POST['prix'];
    $discount=$_POST['discount'];
    $categories=$_POST['categories'];
    

    if(!empty( $libelle) && !empty($prix)   && !empty($categories)){

       
        
        $sqlState = $pdo->prepare('UPDATE produit 
                                    SET libelle=? ,
                                     prix=? ,
                                     discount= ?,
                                     id_categorie=?
                                     WHERE id = ? ');
        $sqlState->execute([ $libelle,$prix, $discount,$categories,$id]);
       
        header('location:listeprod.php');

    }else{

        ?>
        <div class=" alert alert-danger" role="alert">
       libelle, prix et categoriees  sont obligatoires

      </div>
      <?php
    }
   



 }






?>




<form method="post">
    <div class="form-group">
    <input type="hidden" class="form-control"   name="id" value="<?php echo $produit['id']?>">
        <label class="form-label">libelle</label>
        <input type="text" class="form-control"  name="libelle" value="<?php echo $produit['libelle']?>">
    </div>
   
        
    <label class="form-label">prix</label>
        <input type="number" step="0.1"  class="form-control" id="inputName"  name="prix" min="0"   value="<?php  echo  $produit['prix']  ?>">


        <label class="form-label">discount</label>
        <input type="range" class="form-control" id="inputName"  name="discount"  value="<?php  echo  $produit['discount']  ?>"   >

<pre>
<?php
$categories = $pdo->query('SELECT * FROM categori')->fetchAll(PDO::FETCH_ASSOC);



?>
</pre>
<label class="form-label">categorie</label>
      <select name="categories" class="form-control my-2">

      <option>choisissez une categorie</option>
      <?php

foreach($categories as $categories){
    if($produit['id_categorie']== $categories['id']){

echo"<option selected  value='".$categories['id']."'>".$categories['libelle']."</option>";

    }else{

        echo"<option  value='".$categories['id']."'>".$categories['libelle']."</option>";
    }

   


    
}

      ?>
        
     

</select>


        <input type="submit" value="modifier " class=" btn btn-primary my-2" name="modifier">
  
</form>










</div>



</body>
</html>