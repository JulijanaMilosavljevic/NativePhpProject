<?php
 include "konekcija.php";
 if(isset($_POST['upis'])){
 $idKorisnik = $_POST['idKor'];
 $idProizvod = $_POST['idPro'];
 $kolicina = $_POST['kolicina'];
 // echo $idKorisnik. '/' . $idProizvod. "/" .$kolicina;
 $upit = 'INSERT INTO kupovina values(null, :idK, :idP, :kol)';
 $priprema = $konekcija->prepare($upit);
 $priprema->bindParam(":idK", $idKorisnik);
 $priprema->bindParam(":idP", $idProizvod);
 $priprema->bindParam(":kol", $kolicina);
 // var_dump($rez);
 try{
 $rezultat = $priprema->execute();
 if($rezultat){
 $status = 201;
 $poruka = "Stigao ".$idProizvod;
 }
 else{
 $status = 500;
 $poruka = "Greska";
 }
 }
 catch(PDOException $ex){
 $poruka = "Doslo je do greske u bazi";
 $status = 409;
 }
 http_response_code($status);
 echo json_encode($poruka);
 }
?>