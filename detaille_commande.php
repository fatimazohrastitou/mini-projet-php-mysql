
<?php

require_once 'connexion.php';
$idcommande = $_GET['id'];
  $sqlStatet= $pdo->prepare( 'SELECT command.*,user.login as "login" FROM command 
  INNER JOIN user ON command.id_client=user.id 

  WHERE command.id = ?
  ORDER BY command.date_creation DESC ');
  $sqlStatet->execute([$idcommande]);

$commandes=$sqlStatet->fetch(PDO::FETCH_ASSOC);


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



   
    <title>commande|num:<?= $commandes['id']?> </title>
    

</head>
<body>
<?php include 'nav1.php' ?>
<div>



<br>
<br>
<br>
<h3 style=" text-align:center">Liste des dettailes</h3>


<br>
<br>
<table class="table table-hover">


<thead>
    <tr>

    <th>ID</th>
<th>client</th>

<th>total</th>


<th>date</th>

<th>operation</th>



</tr>
</thead>
<tbody>
<?php

$sqlstatelignecommande = $pdo->prepare( 'SELECT line_command.*,produit.libelle,produit.image FROM line_command
                                           INNER JOIN produit ON line_command.id_produit = produit.id
                                            WHERE id_command = ?
                                            ');
      
      $sqlstatelignecommande->execute([$idcommande]);
      $lignecommande = $sqlstatelignecommande->fetchAll(PDO::FETCH_OBJ);
     

    ?>
    <a class="btn btn-primary btn sm" href="commande.php"> revenir au listes des commande</a>
    <br><br>
    
    <tr>



    <td> <?php echo $commandes['id']?></td>
    <td>    <?php echo $commandes['login']?> </td>
    <td>   <?php echo $commandes['total']?>MAD </td>
    <td>     <?php echo $commandes['date_creation']?> </td>
    <td>    
         <?php if( $commandes['valide']==0) : ?> 
            <a class="btn btn-success btn sm" href="valider_commande.php?id=<?=$commandes['id']?>&etat=1 "> valider la commande</a>
            <?php else: ?>
               
                <a class="btn btn-danger btn sm" href="valider_commande.php?id=<?=$commandes['id']?>&etat=0"> annuler la commande</a>
                <?php endif; ?>
            </td>
    <td> 



   



    
    </td>
   
    <td>    
</td>
    
        
        

  
    </tr>
    <?php
   


?>
</tbody>


</table>


<hr>

<h3> produits commandés:</h3>

<table class="table table-hover">


<thead>
    <tr>

    <th>ID</th>
<th>Produit</th>

<th>Prix unitaire</th>


<th>quantité</th>

<th>total</th>



</tr>
</thead>
<tbody>

<?php foreach($lignecommande as $lignecommande): ?>


    <tr>
        <td><?php echo $lignecommande->id ?></td>
        <td><?php echo $lignecommande->libelle ?></td>
        <td><?php echo $lignecommande->prix ?> MAD</td>
        <td>x <?php echo $lignecommande->qty ?></td>
        <td><?php echo $lignecommande->total ?> MAD</td>
</tr>
    
    <?php endforeach; ?>







</tbody>
</table>







</div>




</body>
</html>