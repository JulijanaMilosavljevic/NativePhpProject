<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="sr">
<head>
 <title>Proizvodi</title>
 <link rel="shortcut icon" href="images/favicon.ico"/>
<!--
Eatery Cafe Template
http://www.templatemo.com/tm-515-eatery
-->
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=Edge">
 <meta name="description" content="Najsiriji asortiman origrinalnih parfema">
 <meta name="keywords" content="parfimerija, miris, beograd, lana">
 <meta name="author" content="">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"/>
 <link rel="stylesheet" href="css/animate.css">
 <link rel="stylesheet" href="css/owl.carousel.css">
 <link rel="stylesheet" href="css/owl.theme.default.min.css">
 <link rel="stylesheet" href="css/magnific-popup.css">
 <link rel="stylesheet" href="css/style.css"/>
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
 <section id="portfolio" class="light-bg">
 <div class="container">
 <!-- <div class="row">
 <div class="col-lg-3 brend">
 <?php
 $upit3 = "SELECT * from brendovi";
 $rezultat3 = $konekcija->query($upit3);
 $rez3 = $rezultat3->fetchAll();
 $ispis = "<select id='lista'><option value='0'>Izaberite...</option>";
 foreach ($rez3 as $red) {
 $ispis.="<option value='".$red->id."'>".$red->naziv."</option>";
 }
 $ispis.="</select>";
 echo $ispis;
 ?>
 </div>
 </div> -->

 <div class="row row-0-gutter">
 <!-- start portfolio item -->
 <?php
 include "konekcija.php";
 $aktivan = '1';
 if(isset($_POST['idBrenda'])){
 echo $_POST['idBrenda'];
 }
 $upit = 'SELECT * from proizvodi where aktivan = :aktivan';
 $priprema = $konekcija->prepare($upit);
 $priprema->bindParam(":aktivan", $aktivan);
 $rezultat = $priprema->execute();
 $rez = $priprema->fetchAll();
 // broj redova koji vraca baza
 $brojRedova = $priprema->rowCount();
 // echo $brojRedova;
 // promeniti ukoliko se zeli drugaciji broj po stranici
 $brojArtikalaPoStranici = 3;
 // na veci jer moze da se javi decimalni broj
 $brojStranica = ceil($brojRedova/$brojArtikalaPoStranici);
 // echo $brojStranica;
 if(!isset($_GET["page"])){
 $strana = 1;
 }
 else{
 $strana = $_GET['page'];
 }
 $rezulatNaStranici = ($strana - 1) * $brojArtikalaPoStranici;
 $upit2 = "SELECT * from proizvodi where aktivan = '1' limit ".$rezulatNaStranici.",".$brojArtikalaPoStranici."";
 $rezultat2 = $konekcija->query($upit2);
 $rez2 = $rezultat2->fetchAll();
 foreach ($rez2 as $red) :
 ?>
 <div class="col-md-4 col-0-gutter">
 <div class="ot-portfolio-item">
 <figure class="effect-bubba">
 <?php
 echo "<img src='".$red->slika."' alt='img' class='imgresponsive'/>";
 ?>
 <figcaption>
 <?php
 echo "<h2>".$red->naziv."</h2>";
 echo "<p>".$red->opis."</p>";
 echo "<a href='#' data-toggle='modal' data-target='#Modal-".$red->id."'>Vise</a>";
 ?>
 <!-- <a href="#" data-toggle="modal" data-target="#Modal1">View more</a> -->
 </figcaption>
 </figure>
 </div>
 </div>
 <?php
 endforeach
 ?>
 <!-- end portfolio item -->

 </div><!-- end container -->
 </section>
 <section id="paginacija">
 <div class="container">
 <?php
 // ispis linkova
 for ($strana=1; $strana <= $brojStranica; $strana++) {
 echo "<a href='proizvodi.php?page=".$strana."'>".$strana."</a>";
 }
 ?>
 </div>
 </section>
 <?php
 foreach ($rez as $red) :
 ?>
 <!-- Modal for portfolio item 1 -->
 <?php
 echo "<div class='modal fade' id='Modal-".$red->id."' tabindex='-1' role='dialog'
aria-labelledby='Modal-label-".$red->id."'>";
 ?>
 <!-- <div class="modal fade" id="Modal-1" tabindex="-1" role="dialog" arialabelledby="Modal-label-1"> -->
 <div class="modal-dialog" role="document">
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal" arialabel="Close"><span aria-hidden="true">&times;</span></button>
 <?php
 echo "<h4 class='modal-title' id='Modal-label-".$red->id."'>".$red->naziv."</h4>";
 ?>
 <!-- <h4 class="modal-title" id="Modal-label-1">Black seduction</h4> -->
 </div>
 <div class="modal-body">
 <?php
 echo "<img src='".$red->slika."' alt='img01' class='img-responsive sredina'/>";
 ?>
 <!-- <img src="images/demo/1.jpg" alt="img01" class="img-responsive"
/> -->
<!-- <div class="modal-works"><span>Branding</span><span>Web
Design</span></div>
--> <?php
 echo "<p>Note: ".$red->opis."</p>";
 ?>
 <!-- <p>Moderan i dinamičan muškarac sada ima još jedno tajno oružje
nepobedivog šarma.</p> -->
 </div>
 <div class="modal-footer">
 <?php
 if(isset($_SESSION['korisnik'])) :
 echo "<button type='button' class='btn btn-default btn-left dodaj-u-korpu' data-dismiss='modal' data-id='".$red->id."'>Dodaj u korpu</button>";
 else :
 echo "<button type='button' disabled title='Morate se ulogovati'
class='btn btn-default btn-left dodaj-u-korpu' data-dismiss='modal' data-id='".$red->id."'>Dodaj u korpu</button>";
 endif
 ?>
 <!-- <button type="button" class="btn btn-default btn-left" datadismiss="modal">Dodaj u korpu</button> -->
 <button type="button" class="btn btn-default" datadismiss="modal">Close</button>
 </div>
 </div>
 </div>
 </div>
 <?php
 endforeach;
 ?>
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
 <script src="js/korpaslanje.js"></script>
</body>
</html>