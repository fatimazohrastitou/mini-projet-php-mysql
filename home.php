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

html{
   height:100%;
}


.home-bg{
   background: url(images/shop3.webp) no-repeat;
   background-size: cover;
   background-position: center;
   padding:200px;
   margin-left:30px;
   margin-right:30px;
}

.home-bg .home{
   display: flex;
   align-items: center;
   min-height: 60vh;
}

.home-bg .home .content{
   width: 50rem;
}

.home-bg .home .content span{
   color:var(--orange);
   font-size: 2.5rem;
}

.home-bg .home .content h3{
   font-size: 3rem;
   text-transform: uppercase;
   margin-top: 1.5rem;
   color:var(--black);

}

.home-bg .home .content p{
   font-size: 1.6rem;
   padding:1rem 0;
   line-height: 2;
   color:var(--light-color);
}

.home-bg .home .content a{
   display: inline-block;
   width: auto;
}

.home-category .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 27rem);
   gap:1.5rem;
   justify-content: center;
   align-items: flex-start;
}

.home-category .box-container .box{
   padding:0.5rem;
   text-align: center;
   border:var(--border);
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   border-radius: .5rem;
   background-color:beige;
   margin-left:30px;
   margin-right:30px;
}

.home-category .box-container .box img{
   width: 100%;
   margin-bottom: 1rem;
}

.home-category .box-container .box h3{
   text-transform: uppercase;
   color:var(--black);
   padding:1rem 0;
   font-size: 2rem;
}

.home-category .box-container .box p{
   line-height: 2;
   font-size: 1.5rem;
   color:var(--light-color);
   padding:.5rem 0;
}

.home-category{
   padding-bottom: 0;
}





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
                 

                 width:22%;
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






footer li{
   list-style:none;
   display:inline-block;
   margin:10px;
}
.footer-icons a{
   background:;
  border-radius:100px;
}



</style>




   
    <title>home</title>
    

</head>
<body>
<?php include 'nav.php' ?>


<div class="home-bg">
<!--home-->
 
<section class="home">



</section>


</div>


















<section class="home-category" id="cat">
<br>
<br>
   <h3   style="text-align:center;"  class="title">achetez par categorie</h3>
<!--
   <button >
          <a   href="listecat.php">proposer des categories</a>
</button>-->
<br><br>

<?php




$user = "root";
$pass = "";

  $pdo = new PDO ("mysql:host=localhost;dbname=siteweb", $user, $pass);
  $categories = $pdo->query(" SELECT * FROM categori")->fetchAll(PDO ::FETCH_OBJ);
  


?>

   <div class="box-container">

      
        <?php
foreach($categories as $categories){
    ?>  <div class="box">
    <p> <a class="btn" href="prod dune cat.php?id=<?php    echo $categories-> id ?>      ">  
  <i class="<?php echo $categories->icone ?> "></i>  <?php    echo $categories-> libelle?> 
     </a> 
    </p>
      </div>
     <?php
}
        ?>
       
    

  

    

  

</section>
</div>

<br><br>

<!--prod-->

<div id="prod"></div>
<h3 style="text-align:center;"   class="title"> achetez des produit </h3>





<!--
   <button >
          <a  href="listeprod.php">proposer des produits</a>
</button>
<br><br>-->
<?php 




$produits = $pdo->query(" SELECT * FROM produit")->fetchAll(PDO ::FETCH_OBJ);

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























?>

<script
  src="https://code.jquery.com/jquery-3.6.3.js"
  integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
  crossorigin="anonymous"></script>
<script src="qty.js"></script>

<?php include 'footer.php' ?>
</body>
</html>