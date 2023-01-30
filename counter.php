<div >
    <?php  
      
    $idUtilisateur =$_SESSION['user']['id'] ?? 0;
    $qty = $_SESSION['cart'][$idUtilisateur][$idProduit] ?? 0;
    if ($qty == 0) {
      $color = 'btn-primary';
      $button = '<i class="fa-solid fa-cart-shopping"></i>';
  } else {
      $button = '<i class="fa-solid fa-pen"></i>';
  }
    ?>
    <form method="post" action="ajouter_panier.php" class="counter d-flex ">
    <butoon onclick="return false;" class="btn btn-primary mx-2 counter-moins">-</butoon>
 <input  type ="hidden" name="id"  value="<?php echo $idProduit ?>">
 <input class="form-control"value="<?php echo $qty ?>" type="number" name="qty" id="qty" max="99">
 <butoon  onclick="return false;" class="btn btn-primary mx-2 counter-plus">+</butoon>
 <button class="btn btn-success" type="submit"  name="ajouter">
 <?=  $button ?>
</button>
 <?php 
  if($qty != 0){
    ?>
    <button formaction="sup.php" class="btn btn-danger" type="submit"  name="supprimer">
    <i class="fa-solid fa-trash-can"></i>
  </button>
    <?php  
  } 
 ?>
</form>
</div>