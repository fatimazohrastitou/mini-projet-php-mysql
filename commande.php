<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">

    <link      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">



   
    <title>liste des commande </title>
    

</head>
<body>
<?php include 'nav1.php' ?>
<div>



<br>
<br>
<br>
<h3 style=" text-align:center">Liste des commande</h3>


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

$user = "root";
$pass = "";

  $pdo = new PDO ("mysql:host=localhost;dbname=siteweb", $user, $pass);
  $commandes= $pdo->query( 'SELECT command.*,user.login as "login" FROM command INNER JOIN user ON command.id_client=user.id ORDER BY command.date_creation DESC ')->fetchAll( PDO::FETCH_ASSOC);

foreach($commandes as $commandes){
    ?>
    
    <tr>



    <td> <?php echo $commandes['id']?></td>
    <td>    <?php echo $commandes['login']?> </td>
    <td>   <?php echo $commandes['total']?>MAD </td>
    <td>     <?php echo $commandes['date_creation']?> </td>
    <td> <a class="btn btn-primary btn sm" href="detaille_commande.php?id=<?php echo $commandes['id']?>">afficher les détaille</a></td>
   
    <td>    
</td>
    
        
        

  
    </tr>
    <?php
   
}

?>
</tbody>


</table>














</div>




</body>
</html>