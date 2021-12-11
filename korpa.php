<?php
session_start();
if(isset($_SESSION['korisnik'])){
 }
 else{
 // echo "Nema nista";
 header("Location: index.php");
 $_SESSION['greske'] = "Niste ulogovani";
 }

?>
<!DOCTYPE html>
<html lang="sr">
<head>
 <title>Korpa</title>
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
 <div id="ispisKorpe">

 <!-- ISPIS -->
 </div>
 <div id="dugme">
 <a href="korpa.php" id="dugme-baza">Kupi</a>
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
 <!-- <script type="text/javascript" src="js/proveraProizvod.js"></script> -->
 <script type="text/javascript" src="js/korpa.js"></script>
 </body>
 </html>