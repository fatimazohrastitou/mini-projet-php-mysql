<?php
ob_start();
session_start();
require_once 'connexion.php';
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


    </style>
    <title >cart </title>
    

</head>
<body>
<?php include 'nav.php' ?>
<h4>cart</h4>
<div class="container">
<div class="row">
<?php 
$idUtilisateur = $_SESSION['user']['id'] ?? 0;
$cart = $_SESSION['cart'][$idUtilisateur] ?? [];


if(empty($cart)){
?>
<div class="alert alert-warning"role="alert">
    Votre panier est vide 
 </div>
<?php
}else{
    $idProduits= array_keys($cart);
$idProduits =implode(',',$idProduits);
$idProduits='('.$idProduits.')';

$produits = $pdo->query("SELECT*FROM produit WHERE id IN $idProduits")->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Libelle</th>
                <th scope="col">   Quantité </th>
                <th scope="col">Prix</th>
                <th scope="col">Totale</th>
                
                
            </tr>
        </thead>
    <ul class="list-group list-group-flush w-25">
        <?php
        $total = 0;
    foreach($produits as $produit){
        $idProduit=$produit['id'];
        $tproduit=$produit['prix'] *$cart[$idProduit];
        $total+= $tproduit;
        ?>
        <tr>
        
                <td><?php echo $produit['id']?></td>
                <td><img  width="80px "src="upload/<?php echo $produit['image'] ?>"></td>
                <td><?php echo $produit['libelle']?></td>
                <td><?php include'counter.php' ?></td>
                <td><?php echo $produit['prix'] ?> DH</td>
                <td><?php echo $produit['prix'] *$cart[$idProduit] ?> DH</td>
                
            
    </tr>
        <?php
    }
    ?>
    <tfoot>
        <tr>
            <td colspan="5" align="right"><strong>Total</strong></td>
            <td><?php echo $total ?> DH </td>
        </tr>
        <tr>
            <td colspan="6" align="right">

                <?php
                
                if(isset($_POST['vider'])){
                 $_SESSION['cart'][$idUtilisateur] = [];
                 header("location:".$_SERVER['HTTP_REFERER']);
                 
                }?>
                <?php   if(isset($_POST['valider'])){
   
                    $sql ="INSERT INTO line_command (id_produit,id_command,prix,qty,total)VALUES";
                     $total=0;
                     $prixProduits = [];
                     foreach ($produits as $produit ){
                         $idProduit=$produit['id'];
                         $qty =  $cart[$idProduit];
                         $prix = $produit['prix'];
                         $total += $qty * $prix;
                 
                         $prixProduits[$idProduit] = [
                             'id' => $idProduit,
                             'prix' => $prix,
                             'total' => $qty * $prix,
                            'qty' => $qty
                         ];
                     }
                     $sqlStateCommand = $pdo->prepare('INSERT INTO command (id_client,total) VALUES(?,?)');
                     $sqlStateCommand->execute([$idUtilisateur, $total]);
                     $last_insert_id = $pdo->lastInsertId();
                     $args = [];
                     
                     foreach ($prixProduits as $produit) {
                         $id = $produit['id'];
                         $sql .= "(:id$id,'$last_insert_id',:prix$id,:qty$id,:total$id),";
                     }
                     $sql = substr($sql, 0, -1);
                     $sqlState = $pdo->prepare($sql);
                     foreach ($prixProduits as $produit){
                         $id = $produit['id'];
                         $sqlState->bindParam(  ':id' .$id,  $produit['id']);
                         $sqlState->bindParam( ':prix' .$id,  $produit['prix']);
                         $sqlState->bindParam(  ':qty' .$id,  $produit['qty']);
                         $sqlState->bindParam(  ':total' .$id, $produit['total']);
                 
                     }
                     $inserted = $sqlState->execute();

                     if ($inserted) {

                       

                        $inserted = $sqlState->execute();
                     $_SESSION['cart'][$idUtilisateur] = [];
                    header('location: checkout.php?success=true&total=' . $total);
                      } else { ?>
                     <div class="alert alert-error" role="alert">
                         Erreur (contactez l'administrateur).
                     </div>
                     <?php
                 }
            
                    }?>
            
<form method="post">
     <input  type="submit" class="btn btn-success"  name ="valider" value= "Valider la commande">
     <input onclick= "return confirm('voulez vous vraiment  vider tous le panier ?')" type="submit" class="btn btn-danger"  name ="vider" value= "Vider le panier">
</form>
            </td>
        
        </tr>
    </tfoot>
    </table>
    <?php
}
?>

  </div>
</div>
<script
  src="https://code.jquery.com/jquery-3.6.3.js"
  integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
  crossorigin="anonymous"></script>
<script src="qty.js"></script>
</body>
</html>