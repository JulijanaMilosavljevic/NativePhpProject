<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="sr">
<head>
 <title>Prijava</title>
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
 <meta name="viewport" content="width=device-width, initial-scale=1, maximumscale=1">
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
 <!-- PRE LOADER -->
 <section class="preloader">
 <div class="spinner">
 <span class="spinner-rotate"></span>
 
 </div>
 </section>
 <!-- MENU -->
 <?php
 include "meni2.php";
 ?>

 <!-- CONTACT -->
 <section id="contact" data-stellar-background-ratio="0.5">
 <div class="container">
 <div class="row">
 <div class="col-md-6 col-sm-12 padding">
 <div class="col-md-12 col-sm-12">
 <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
 <h2>Prijava</h2>
 </div>
 </div>
 <?php
 if(isset($_POST["dugme"])){
 $greske = [];
 $email = $_POST["email"];
 $pass = $_POST["pass"];
 // reg
 $emailRi = "/^(([a-z\d]+\.{1}){2}\d{1,3}\.\d{2}@ict.edu.rs)|(([az\d]+\.*)+@(gmail|hotmail|yahoo)\.com)$/";
 $passRi = "/^[\w\d\S]{4,25}$/"; // promeni na osam
 if(!preg_match($emailRi, $email)){
 $greske[] = "Email nije ok";
 }
 // if(!preg_match($passRi, $pass)){
 // $greske[] = "Password nije ok";
 // }
 if(count($greske) > 0){
 echo "<script>alert('Podaci nisu validni')</script>";
 }
 else{
 // upit baza
 include "konekcija.php";
 if($konekcija){
 $upit = "SELECT * FROM korisnici WHERE email =:email AND password =:pass";
 $priprema = $konekcija->prepare($upit);
 $priprema->bindParam(":email", $email);
 $priprema->bindParam(":pass", $pass);
 $rezultat = $priprema->execute();
 // var_dump($rezultat);

 if($rezultat){
 if($priprema->rowCount() == 1){
 $rez = $priprema->fetch();
 // var_dump($rez);
 $_SESSION['korisnik'] = $rez;
 if(($_SESSION['korisnik']->id_uloga) == 1){
 header("Location: admin.php");
 }
 else{
 header("Location: index.php");
 }
 }
 }
 else{
 echo "Greska";
 }
 }
 else{
 echo "Nema konekcije";
 }
 }
 }
 ?>
 <!-- CONTACT FORM -->
 <form action="<?= $_SERVER['PHP_SELF']?>" onSubmit="return proveraPodataka()" method="post" class="wow fadeInUp" id="contact-form" role="form" data-wow-delay="0.8s">
 <!-- IF MAIL SENT SUCCESSFUL // connect this with custom JS -->
 <h6 class="text-success">Your message has been sent
successfully.</h6>

 <!-- IF MAIL NOT SENT -->
 <h6 class="text-danger">E-mail must be valid and message must be
longer than 1 character.</h6>
 <input type="text" class="form-control" id="email" name="email"
placeholder="Email">

 <input type="text" class="form-control" id="pass" name="pass"
placeholder="Lozinka">
 <div class="col-md-12 col-sm-12">
 <input type="submit" name="dugme" class="form-control prijava"
id="cf-submit" value="Prijava">
 <a href="registracija.php" id="registracija">Kreirajte nalog</a>
 </div>
 </form>
 </div>
 </div>
 </div>
 </section>
 <!-- FOOTER -->
 <?php
 include "futer.php";
 ?>
 <!-- SCRIPTS -->
 <script src="js/jquery.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="js/jquery.stellar.min.js"></script>
 <script src="js/wow.min.js"></script>
 <script src="js/owl.carousel.min.js"></script>
 <script src="js/jquery.magnific-popup.min.js"></script>
 <script src="js/smoothscroll.js"></script>
 <script src="js/custom.js"></script>
 <script type="text/javascript" src="js/prijava.js"></script>
</body>
</html>