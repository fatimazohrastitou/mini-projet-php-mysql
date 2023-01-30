<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">


    <title>ajouter produit</title>
    
   

</head>
<body>
<?php include 'nav1.php' ?>
<div>


<h4>ajouter produit</h4>
<br>
<?php
 
 require_once 'connexion.php';

 if(isset($_POST['ajouter'])){

    $libelle=$_POST['libelle'];
    $prix=$_POST['prix'];
    $discount=$_POST['discount'];
    
    $categories=$_POST['categories'];
    $description=$_POST['description'];
 
echo"<pre>";
print_r($_FILES);

$filename='prod.jpg';
if(!empty($_FILES['image']['name'])){
    $image=$_FILES['image']['name'];
    $filename=uniqid() . $image;
    move_uploaded_file($_FILES['image']['tmp_name'],'upload/'. $filename);
  


}





   /* print_r($_FILES);
    $image="";
   
    if(isset($_FILES['$image'])){

         $image=$_FILES['image']['name'];
         $filename=uniqid().$image;
         move_uploaded_file($_FILES['image']['tmp_name'],'upload/'. $filename);
         var_dump($image);
    }

  die();*/
    

    if(!empty( $libelle) && !empty($prix)   && !empty($categories)){

       
        
        $sqlState = $pdo->prepare('INSERT INTO produit VALUES (null,?,?,?,?,?,?)');
        $sqlState->execute([$libelle,$prix,$discount,$categories,$description, $filename]);
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




<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="form-label">libelle</label>
        <input type="text" class="form-control" id="inputName"  name="libelle">
    </div>
   
        
    <label class="form-label">prix</label>
        <input type="number" step="0.1"  class="form-control" id="inputName"  name="prix" min="0">


        <label class="form-label">discount</label>
        <input type="range" class="form-control" id="inputName"  name="discount">

        <label>descriptioon</label>
        <textarea class="form-control" name="description"></textarea> 


        <label class="form-label">image</label>
        <input type="file" class="form-control"   name="image">


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

echo"  <option value='".$categories['id']."'>".$categories['libelle']."</option>";
    
}

      ?>
        
     

</select>


        <input type="submit" value="add produit" class=" btn btn-primary my-2" name="ajouter">
  
</form>










</div>



</body>
</html>