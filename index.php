<?php
 session_start();
 if(isset($_SESSION['greske'])){
 $greska = $_SESSION['greske'];
 echo "<script>alert('$greska')</script>";
 unset($_SESSION['greske']);
 }
?>
<!DOCTYPE html>
<html lang="sr">
<head>
 <title>Pocetna</title>
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
 <!-- PRE LOADER -->
 <!-- <section class="preloader">
 <div class="spinner">
 <span class="spinner-rotate"></span>

 </div>
 </section> -->
 <!-- MENU -->
 <?php
 include "meni2.php";
 ?>
 <!-- HOME -->
 <section id="home" class="slider" data-stellar-background-ratio="0.5">
 <div class="row">
 <div class="owl-carousel owl-theme">
 <div class="item item-first">
<!--<img src="images/slika1.jpg" alt="huawei"/>-->
 </div>
 <div class="item item-second">

 </div>
 <div class="item item-third">

 </div>
 </div>
 </div>
 </section>
 <!-- TEAM -->
 <section id="team" data-stellar-background-ratio="0.5">
 <div class="container">
 <div class="row">
 <div class="col-md-12 col-sm-12">
 <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
 <h2>Serije</h2>
 </div>
 </div>
 <?php
 include "konekcija.php";
 $aktivan = '1';
 $upit = 'SELECT * from proizvodi where aktivan = :aktivan limit 3';
 $priprema = $konekcija->prepare($upit);
 $priprema->bindParam(":aktivan", $aktivan);
 $rezultat = $priprema->execute();
 $rez = $priprema->fetchAll();
 foreach ($rez as $red) :
 ?>
 <div class="col-md-4 col-sm-4">
 <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
 <?php
 echo "<img src='".$red->slika."' alt='img' class='img-responsive'/>";
 ?>
 <div class="team-hover">
 <div class="team-item">
 <h4>
 <?php
 echo $red->opis;
 ?>
 </h4>
 </div>
 </div>
 </div>
 <div class="team-info">
 <h3><?php
 echo $red->naziv;
 ?></h3>
 <p><?php
 echo $red->cena;
 ?></p>
 </div>
 </div>
 <?php
 endforeach;
 ?> 
 </div>
 </div>
 </section>

 <!-- TESTIMONIAL -->
 <section id="testimonial" data-stellar-background-ratio="0.5">
 <div class="overlay"></div>
 <div class="container">
 <div class="row">
 <div class="col-md-12 col-sm-12">
 <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
 <a id="anketa" href="anketa.php">Pogledajte anketu</a>
 </div>
 </div>
 </div>
 </section> 
 <!-- CONTACT -->
 <section id="contact" data-stellar-background-ratio="0.5">
 <div class="container">
 <div class="row">
<!-- How to change your own map point
 1. Go to Google Maps
 2. Click on your location point
 3. Click "Share" and choose "Embed map" tab
 4. Copy only URL and paste it within the src="" field below
-->
 <div class="wow fadeInUp col-md-6 col-sm-12" data-wow-delay="0.4s">
 <div id="google-map">
 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1415.55399018485!2d20.427267658078197!3d44.798987994774656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDTCsDQ3JzU2LjQiTiAyMMKwMjUnNDIuMSJF!5e0!3m2!1ssr!2srs!4v1585187141071!5m2!1ssr!2srs" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
 </div>
 </div>
 <?php
 if(isset($_POST["submit"])){
 $greske2 = [];
 $ime = $_POST["name"];
 $email = $_POST["email"];
 $poruka = $_POST["message"];
 // reg
 $imeRi = "/^[A-Z][a-z]{2,25}$/";
 $emailRi = "/^(([a-z\d]+\.{1}){2}\d{1,3}\.\d{2}@ict.edu.rs)|(([az\d]+\.*)+@(gmail|hotmail|yahoo)\.com)$/";
 if(!preg_match($imeRi, $ime)){
 $greske2[] = "Ime nije ok";
 }
 if(!preg_match($emailRi, $email)){
 $greske2[] = "Email nije ok";
 }
 if($poruka == ""){
 $greske2[] = "Morate uneti poruku";
 }
if(count($greske2) > 0){
echo "Podaci nisu validni";
} 
}
?>
 <div class="col-md-6 col-sm-12">
 <div class="col-md-12 col-sm-12">
 <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
 <h2>Kontakt</h2>
 </div>
 </div>
 <!-- CONTACT FORM -->
 <form action="<?= $_SERVER['PHP_SELF']?>" onSubmit="return provera()" method="post" class="wow fadeInUp" id="contact-form" role="form" data-wowdelay="0.8s">
 <!-- IF MAIL SENT SUCCESSFUL // connect this with custom JS -->
 <h6 class="text-success">Your message has been sent successfully.</h6>
 <h6 class="text-danger">Podaci nisu validni</h6>
 <div class="col-md-6 col-sm-6">
 <input type="text" class="form-control" id="cf-name" name="name"
placeholder="Vase ime">
 </div>
 <div class="col-md-6 col-sm-6">
 <input type="email" class="form-control" id="cf-email"
name="email" placeholder="Email adresa">
 </div>
 <div class="col-md-12 col-sm-12">
 <input type="text" class="form-control" id="cf-subject"
name="subject" placeholder="Naslov">
 <textarea class="form-control" rows="6" id="cf-message"
name="message" placeholder="Vasa poruka"></textarea>
 <button type="submit" class="form-control" id="cf-submit"
name="submit">Posalji poruku</button>
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
 <script type="text/javascript" src="js/jquery-migrate-1.4.1.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="js/jquery.stellar.min.js"></script>
 <script src="js/wow.min.js"></script>
 <script src="js/owl.carousel.min.js"></script>
 <script src="js/jquery.magnific-popup.min.js"></script>
 <script src="js/smoothscroll.js"></script>
 <script src="js/custom.js"></script>
 <script src="js/index.js"></script>
 <script src="js/kontakt.js"></script>
</body>
</html>