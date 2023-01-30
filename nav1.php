<!--nav-->

<?php


$con=false;
if(isset($_SESSION['admin'])){
  $con=true; 
}



?>






<nav  class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="homeadmin.php"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;ZARA Store</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>




  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link active" href="listeprod.php"> list Products</a>
      </li>
  
      <li class="nav-item">
         <a class="nav-link dropdown-toggle" href="listecat.php" id="navbardrop" data-toggle="dropdown">
         <i class=" fa fa-light fa-list"></i>
       list Category
       </a>
      
      </li>
      <li class="nav-item">
        <a class="nav-link" href="commande.php"> commande</a>
      </li> 


      <?php



  ?>

<li class="nav-item">
        <a class="nav-link" href="dex.php"><i class="fa-solid fa-user"></i> deconnexion</a>
      </li>

      

  <?php


?>
     






      






      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
            <?php
           

?>



        
           
            </div>
        </div>
      
    </ul>
  </div>
</nav>

<!-- fin nav-->
