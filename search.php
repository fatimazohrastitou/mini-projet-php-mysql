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


</style>
 <title>home</title>
    

</head>
<body>
<?php include 'nav.php' ?>

<?php
$user = "root";
$pass = "";

  $pdo = new PDO ("mysql:host=localhost;dbname=siteweb", $user, $pass);
  $search=$_POST["search1"];
  $cate = $pdo->query('SELECT * FROM categori WHERE libelle LIKE "%'.$search.'%" OR description LIKE "%'.$search.'%"');

if(isset($search) AND !empty($search)){
  $see = htmlspecialchars($search);
}
 if($cate->rowCount() > 0){ ?>


    <section class="home-category" id="cat">
<br>
<br>
   <h3   style="text-align:center;"  class="title">achetez par categorie</h3>
<br><br>
<div class="box-container">
        <?php
foreach($cate as $cate){
    ?>  <div class="box">
   <p> <a class="btn" href="prod dune cat.php?id=<?php    echo $cate['id']?>      ">  
  <i class="<?php echo $cate['icone'] ?> "></i>  <?php    echo $cate['libelle']?> 
     </a> 
    </p>
      </div>
     <?php
}
        ?>
</section>
</div>

<?php
  }

 else{
     
   ?>
   <div class=" alert alert-danger" role="alert">
pas du categorie avec ce nom

 </div>
 <?php  
 }
  ?>