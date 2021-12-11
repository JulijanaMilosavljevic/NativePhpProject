<?php 
if(!isset($_SESSION['korisnik'])){
header("Location: index.php");
}
else{
include "konekcija.php";
$pitanje = "SELECT * from ankete where aktivna = 1";
$rezultat = $konekcija->query($pitanje);
$rez1 = $rezultat->fetchAll();
// var_dump($rez);
}
?>
<?php foreach ($rez1 as $red1) : ?>
 <div class="col-lg-5">
 <?php echo "<h3>".$red1->pitanje."</h3>" ?>
<?php 
$odgovori = "SELECT o.odgovor, o.id from odgovori o inner join ankete a on o.id_ankete = a.id where a.id = 1";
$rezultat = $konekcija->query($odgovori);
$rez2 = $rezultat->fetchAll();
// var_dump($rez);
foreach ($rez2 as $red2) :
?>

 <?php
 echo "<input type='radio' name='odg' value='".$red2->id."'/>".$red2->odgovor."<br/>";
 ?>
 <?php endforeach ?>
 <?php
 echo "<br/><input type='button' name='glasaj' class='glasaj' value='Glasaj' data-id='".$red1->id."'><br/><br/>";
 echo "<input type='button' id='rez' name='rezultat' value='Rezultati' data-id='".$red1->id."'>";
 echo "<div id='ispisRezultata'></div>";
 ?>
<!-- <br/><input type="submit" id='gla' name="glasaj"
values='Glasaj' data-id=''><br/><br/> -->
 <!-- <input type="submit" name="rezultat" value="Rezultati"> -->
 
</div>
<?php endforeach ?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/anketa.js"></script>