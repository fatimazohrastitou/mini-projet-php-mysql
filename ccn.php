<?php
    $user = "root";
    $pass = "";
    
      $pdo = new PDO ("mysql:host=localhost;dbname=siteweb", $user, $pass);
// Get data from form
$name = $_POST['name'];
$email= $_POST['email'];
$message= $_POST['message'];

$to = "sanaeben723@gmail.com";
$subject = "This is the subject line";

// The following text will be sent
// Name = user entered name
// Email = user entered email
// Message = user entered message
$txt ="Name = ". $name . "\r\n Email = "
	. $email . "\r\n Message =" . $message;

$headers = "From: noreply@demosite.com" . "\r\n" .
			"CC: somebodyelse@example.com";
if($email != NULL) {
	mail($to, $subject, $txt, $headers);
}
?>
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


<section id="last">
      <!-- heading -->
      <div class="full">
       <h3>YOUR MESSAGE IS SENT</h3>
       <h4> <a class="navbar-brand" href="home.php"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;ZARA Store</a></h4>
</div>
    </section>


    <style>
        #last{
width: 100%;
height: auto;
justify-content: center;
background-color: white;
}
.full{
width: 80%;
display: inline-block;
margin:2%;
margin-left: 10%;
text-align: center;
background-color: black;
color: white;
border:15px solid rgb(35, 61, 61);
border-radius: 5px;
margin-bottom: 8%;
margin-top: 8%;
}
.full h3{
font-size: 2rem;
display:block;
margin: 2%;
margin-bottom: 0;
}
.lt{
padding: 2%;
margin: 2%;
}
.rt{
padding: 2%;
margin: 2%;
}
.lt textarea{
width: 94%;
margin-left: 2.8%;
margin-right: 2.8%;
}
button{
margin: 2%;
}
.btn-primary{
background-color: black;
border: 2px solid white;
border-radius: 5%;
}
.list-item{
margin-bottom: 2%;
list-style-type: none;
}
.list-item span{
margin-left: 10px;
font-size: 1.4rem;
}
.list-item a{
color: white;
display: inline-block;
}
.list-item a:hover{
text-decoration: underline;
}
.form-control{
background-color: black;
}
	
@media screen and (min-width: 770px){
.full{
	width: 70%;
	margin-left: 15%;
}
.lt textarea{
width: 95%;
margin-left: 2.4%;
}
}
	
@media screen and (min-width: 1100px){
.full{
	width: 65%;
	margin-left: 17%;
	margin-top: 5%;
}
.lt{
	width: 55%;
	display: inline-block;
	float: left;
	margin-right: 0;
}
.rt{
	width: 35%;
	display: inline-block;
	margin-left: 0;
}
.list-item{
margin-bottom: 10%;
}
.contact-list{
	margin-top: 22%;
	padding-right: 8%;
}
.fa-envelope, .gmail{
	display: inline-block;
	width: auto;
}
}

    </style>
   

  </body>
</html>
