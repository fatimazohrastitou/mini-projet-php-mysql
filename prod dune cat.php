 
 <?php

session_start(); 


require_once 'connexion.php';

$id=$_GET['id'];

 $sqlState = $pdo->prepare('SELECT * FROM categori WHERE id=?');
 $sqlState->execute([$id]);
 $categories = $sqlState->fetch( PDO::FETCH_ASSOC);
 

 $sqlState = $pdo->prepare('SELECT * FROM produit WHERE id_categorie=?');

 $sqlState->execute([$id]);
 $produits = $sqlState->fetchAll( PDO::FETCH_OBJ);


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
    <link     href="css/produit.css" rel="stylesheet">
       <style>

body{

margin: 0;
font-family: sans-serif;

}



h5{
    text-align: center;
    font-size: 30px;
    margin: 0;
    padding-top: 10px;
}
a{
    text-decoration: none;
}

.gallery{


  display: block;
flex-wrap: wrap;
width: 100%;
justify-content: center;
align-items: center;
margin: 50px 0;
}

          .content{
                 

width:27%;
margin: 15px;
box-sizing: border-box;
float: left;
text-align: center;
border-radius: 20px;
cursor: pointer;
padding-top: 10px;
box-shadow: 0 14px 28px rgba(0,0,0,0.25);
transition: .4s;
background:white;
}



.content:hover{
    box-shadow:0 3px 6px rgba(0, 0, 0, 0.16),0, 3px, 6px rgba(0,0,0, 0.23);
    transform: translate(0px, -8px);}
img{


width: 200px;
height: 250px;
text-align: center;
margin: 0 auto;
display: block;

}
ul{
    list-style:none ;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-top: 0;
}
li{
    padding-top: 5px;

}

.fa{
    font-size: 26px;
    transition: .4s;
    margin: 3px;
}
.checked{
    color: #ff9f43;

}
.fa:hover{
    transform:scale(1.3);
    transition: .6s;
}
    </style>
    <title >categories |  <?php    echo $categories['libelle']?>   </title>
    

</head>
<body>
<?php include 'nav.php' ?>



<h4  style="text-align:center;" ><?php    echo $categories['libelle']?> <span class="<?php echo $categories['icone'] ?> "> </span> </h4>


<!-- les produit par cart-->

<div class="container">













<?php 
foreach($produits as $produits)
{
 
  $idProduit =$produits->id;
  ?>


<div    id="gallery" >
  <div class="content">
  <img src="upload/<?php echo $produits->image ?>" class="card-img-top w-75 mx-auto" style="width:100%; ">
  <div class="card-body">
  <a href="detail_prod.php?id=<?php echo $idProduit ?>" >afficher les details</a>
    <h5 class="card-title"><?php echo $produits->libelle ?></h5>
    <p class="card-text"><?php echo $produits->prix ?>MAD</p>
    <ul>

   <li><i class="fa fa-star checked"></i></li>
   <li><i class="fa fa-star checked"></i></li>
   <li><i class="fa fa-star checked"></i></li>
   <li><i class="fa fa-star checked"></i></li>
   <li><i class="fa fa-star "></i></li>

    </ul>
      
  </div>
                   <div class="card-footer" style="z-index: 10">

                       <?php include'counter.php' ?>
                     </div>
        </div>
</div>


<?php

}
















if(empty($produits)){

    ?>
    <div class=" alert alert-info" role="alert">
  pas de produit pour l'instant

  </div>
  <?php

}







?>




</div>


<script
  src="https://code.jquery.com/jquery-3.6.3.js"
  integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
  crossorigin="anonymous"></script>
<script src="qty.js"></script>


</script>
</body>
</html>