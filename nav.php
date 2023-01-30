<!--nav-->

<?php


$con=false;
if(isset($_SESSION['user'])){
  $con=true; 
}



?>






<nav  class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="home.php"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;ZARA Store</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <form action="search.php" method="POST">

      
<input type="text" method="POST" name="search1" placeholder="cherche une categorie">
<input type="submit" name="search" value="search" >
</form>

<?php
if(isset($_POST["submit"])){

  $search=$_POST["search"];
  $sth=$pdo->prepare("SELECT * FROM `search` WHERE name='$str'");
  $sth->setfetchmode(PDO:: FETCH_OBJ);
  $sth->execute();
 } 
?>
  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link active" href="#prod">Products</a>
      </li>
  
      <li class="nav-item">
         <a class="nav-link dropdown-toggle" href="#cat" id="navbardrop" data-toggle="dropdown">
         <i class=" fa fa-light fa-list"></i>
        Category
       </a>
      
      </li>


      <?php

if($con){

  ?>

<li class="nav-item">
        <a class="nav-link" href="dex.php"><i class="fa-solid fa-user"></i> deconnexion</a>
      </li>

     

  <?php
}else{
  ?>
 <li class="nav-item">
        <a class="nav-link" href="index1.php"><i class="fa-solid fa-user"></i> Log in</a>
      </li>

  <?php
}

?>
     






      






      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
            <?php
            if($con){

?>
<?php


  
$idUtilisateur = $_SESSION['user']['id'] ;
define('PRODUCTS_COUNT', isset($_SESSION['cart'][$idUtilisateur]) ? count($_SESSION['cart'][$idUtilisateur]) : 0 );

  ?>
    <a href="cart.php" class="nav-item nav-link active">
       <h5 class="px-5 cart">
            <i class="fas fa-shopping-cart"></i> Cart <?php echo   PRODUCTS_COUNT;?>

        </h5>
    </a>





<?php
}else{
?>
    <a href="cart.php" class="nav-item nav-link active">
       <h5 class="px-5 cart">
            <i class="fas fa-shopping-cart"></i> Cart 

        </h5>
    </a>

<?php
}

?>
        
           
            </div>
        </div>
      
    </ul>
  </div>
</nav>

<!-- fin nav-->
