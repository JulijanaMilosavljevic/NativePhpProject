<?php
session_start();
if(isset($_SESSION['korisnik'])){
if($_SESSION['korisnik']->id_uloga != 1){
header("Location: index.php");
}
 else{
 if(isset($_SESSION['porukaAdmin'])){
 $poruka = $_SESSION['porukaAdmin'];
 echo "<script>alert('$poruka')</script>";
 unset($_SESSION['porukaAdmin']);
 }
 }
}
else{
header("Location: index.php");

}

?>
<!DOCTYPE html>
<html lang="sr">
<head>
 <title>Admin panel</title>
 <link rel="shortcut icon" href="images/favicon.ico"/>
<!--
Eatery Cafe Template
http://www.templatemo.com/tm-515-eatery
-->
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=Edge">
 <meta name="description" content="Prodavnica mobilnih telefona huawei">
 <meta name="keywords" content="huawei,mobile,phones">
 <meta name="author" content="Julijana Milosavljevic">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"/>
 <link rel="stylesheet" href="css/animate.css">
 <link rel="stylesheet" href="css/owl.carousel.css">
 <link rel="stylesheet" href="css/owl.theme.default.min.css">
 <link rel="stylesheet" href="css/magnific-popup.css">
 <link rel="stylesheet" href="css/style.css">
 <!-- MAIN CSS -->
 <link rel="stylesheet" href="css/templatemo-style.css">
</head>
<body>
 <!-- MENU -->
 <?php
 include "meni2.php";
 ?>
 <section id="" data-stellar-background-ratio="0.5">
 <div class="container">
 <div class="row">
 <div class="col-lg-3">
 <a href="#" id="sviKorisnici" data-id="1" class="admin-btn"
name="sviKorisnici">Prikazi sve korisnike</a>
 <a href="#" id="dodKor" class="admin-btn" name="dodKor">Dodaj
korisnika</a>
 <a href="#" id="sviProizvodi" data-id="3" class="admin-btn"
name="sviProizvodi">Prikazi sve proizvode</a>
 <a href="#" id="dodPro" class="admin-btn" name="dodPro">Dodaj
prozivod</a>
 </div>
 <div class="col-lg-9" id="ispis">
 <div id="test"></div>
 </div>
 </div>
 </div>
 </section>
 <!-- FOOTER -->
 <?php
 include "futer.php";
 ?>
 <script src="js/jquery.js"></script>
 <script type="text/javascript" src="js/jquery-migrate-1.4.1.min.js"></script>
 <!-- <script src="js/bootstrap.min.js"></script> -->
 <script src="js/jquery.stellar.min.js"></script>
 <script src="js/wow.min.js"></script>
 <script src="js/owl.carousel.min.js"></script>
 <script src="js/jquery.magnific-popup.min.js"></script>
 <script src="js/smoothscroll.js"></script>
 <script src="js/custom.js"></script>
 <!-- <script src="js/main.js"></script>
 <script src="js/index.js"></script> -->
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript" src="js/admin.js"></script>
 <script type="text/javascript" src="js/proveraProizvod.js"></script>

 </body>
 </html>