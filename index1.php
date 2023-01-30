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

html,
body {
    height: 100%;
}
 
.global-container {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgb(238,174,202);
background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
}
 
form {
    padding-top: 10px;
    font-size: 14px;
    margin-top: -20px;
}
 
.card-title {
    font-weight: 300;
}
 
.btn {
    font-size: 14px;
    margin-top: 20px;
}
 
.login-form {
    width: 330px;
    margin: 20px;
}
 
.sign-up {
    text-align: center;
    padding: 20px 0 0;
}
 



    </style>
    <title>Document</title>
    

</head>
<body>
<?php include 'nav.php' ?>

<!-- form-->
<div class="global-container">
    <div class="card login-form">
        <div class="card-body">
            <h3 class="card-title text-center">Log in </h3>
            <div class="card-text">
                <!--
            <div class="alert alert-danger alert-dismissible fade show" 
             role="alert">Incorrect username or password.</div> -->


              <?php

                     if(isset($_POST['ajouter'])){
                        $name=$_POST['name'];
                        $pwd=$_POST['password'];


                        if(!empty($name) && !empty($pwd)){
                     //CONEXION PHP


                 

                     $user = "root";
                     $pass = "";
                     
                       $pdo = new PDO ("mysql:host=localhost;dbname=siteweb", $user, $pass);
                     //FIN CNX
                 
                   //INSCRIPTION POUR  UTILISATEUR
                   //date de creation 
                   $date = date ( 'Y-m-d');
                   $sqlState = $pdo->prepare( 'INSERT INTO user VALUES(null,?,?,?) ');
                   $sqlState->execute([$name,$pwd,$date]);

                  
                    //redircetion
                     header(  'location: connexion_user.php');
              

                     //fin de inscribtion POUR user
                        }
                        else{
                        ?>
                          <div class=" alert alert-danger" role="alert">
                         name , password sont obligatoires

                        </div>
                        <?php  
                        }
                     }           

                    


                   ?>

                <form method="post">
                    <!-- to error: add class "has-danger" -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nom utilisateur </label>
                        <input type="text" class="form-control form-control-sm"
                    id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        
                        <input type="password" class="form-control form-control-sm"
              id="exampleInputPassword1" name=" password">
                    
              <span style=" padding: 20px ;">vous etes déja inscrit ?<a href="connexion_user.php"> connexion</a></span>
                    <br>
                    <br>
                    <span style=" padding: 20px ;">vous etes admin  ?<a href="conadminst.php"> connexion_admin</a></span>
            

                
                    <button type="submit" class="btn btn-primary btn-block" name="ajouter">S'incrir</button>

                    
                </form>
            </div>
        </div>
    </div>
</div>

<!-- fin form-->

</body>
</html>