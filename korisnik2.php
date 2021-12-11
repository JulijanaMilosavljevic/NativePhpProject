<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="sr">
<head>
 <title>Korisnik</title>
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
 <section class="preloader">
 <div class="spinner">
 <span class="spinner-rotate"></span>
 
 </div>
 </section>
 <!-- MENU -->
 <?php
 include "meni2.php";
 ?>
 <?php
 if(isset($_POST['izmeni'])){
 include "konekcija.php";
 $id = $_SESSION['korisnik']->id_korisnik;
 $ime = $_POST['ime'];
 $prezime = $_POST['prezime'];
 $email = $_POST['email'];
 $pass = md5($_POST['sifra']);
 $upit = 'UPDATE korisnici set ime = :ime, prezime = :prezime, email = :email,
password = :pass where id_korisnik = :id';
 $priprema = $konekcija->prepare($upit);
 $priprema->bindParam(":ime", $ime);
 $priprema->bindParam(":prezime", $prezime);
 $priprema->bindParam(":email", $email);
 $priprema->bindParam(":pass", $pass);
 $priprema->bindParam(":id", $id);
 $rezultat = $priprema->execute();
 if($rezultat){
 echo "<script>alert('Uspesno ste izmenili podatke')</script>";
 }
 else{
 echo "<script>alert('Doslo je do greske')</script>";
 }
 unset($_POST['izmeni']);
 }
 ?>


 <!-- CONTACT -->
 <section id="contact" data-stellar-background-ratio="0.5">
 <div class="container">
 <div class="row">

 <div class="col-md-6 col-sm-12 padding">
 <div class="col-md-12 col-sm-12">
 <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
 <h2>Izmenite podatke</h2>
 </div>
 </div>
 <?php
 include "konekcija.php";
 // var_dump($_SESSION['korisnik']);
 $korisnik = $_SESSION['korisnik'];
 // echo $korisnik->id_korisnik;
 ?>

 <!-- CONTACT FORM -->
 <form action="<?= $_SERVER['PHP_SELF']?>" onSubmit="return
proveraPodataka()" method="post" class="wow fadeInUp" id="contact-form"
role="form" data-wow-delay="0.8s">

 <div class="col-md-12 col-sm-12">
 <?php
 echo "<input type='text' value='".$korisnik->ime."'class='form-control'
id='cf-fname' name='ime' placeholder='Ime'>"
 ?>
 <!-- <input type="text" class="form-control" id="cf-fname"
name="fname" placeholder="Ime"> -->
 </div>
 <div class="col-md-12 col-sm-12">
 <?php
 echo "<input type='text' value='".$korisnik->prezime."'class='formcontrol' id='cf-lname' name='prezime' placeholder='Ime'>"
 ?>
 </div>
 <div class="col-md-12 col-sm-12">
 <?php
 echo "<input type='text' value='".$korisnik->email."'class='formcontrol' id='cf-lname' name='email' placeholder='Ime'>"
 ?>
 </div>
 <div class="col-md-12 col-sm-12">
 <input type="text" class="form-control" id="cf-sifra" name="sifra"
placeholder="Nova sifra">
 </div>

 <div class="col-md-12 col-sm-12"> 
 <input type="submit" name="izmeni" class="form-control prijava
izmena" id="cf-submit" value="Izmeni">
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
 <script type="text/javascript" src="js/registracija.js"></script>
</body>
</html>