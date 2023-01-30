<?php
session_start();
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




   
    <title>home</title>
    

</head>
<body>
<?php include 'nav1.php' ?>


<div class="home-bg">
<!--home-->
 
<section class="home">



</section>

</div>









<h3>bonjour:</h3>








<section class="home-category" id="cat">
<br>
<br>

<br><br>

<?php




$user = "root";
$pass = "";

  $pdo = new PDO ("mysql:host=localhost;dbname=siteweb", $user, $pass);
  $categories = $pdo->query(" SELECT * FROM categori")->fetchAll(PDO ::FETCH_OBJ);
  


?>

   <div class="box-container">

      
        <?php

        ?>
       
    

  

    

  

</section>
</div>

<br><br>

<!--prod-->

<div id="prod"></div>

<br><br>
<?php 




$produits = $pdo->query(" SELECT * FROM produit")->fetchAll(PDO ::FETCH_OBJ);



























?>


        
</body>
</html>