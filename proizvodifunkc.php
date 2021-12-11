<?php
session_start();
include "konekcija.php";
// ----------------------UPDATE--------------------------
if(isset($_POST['updateProizvod'])){
//
// dohvatanje iz forme
$id = $_POST['id'];
$naziv = $_POST['naziv'];
$opis = $_POST['opis'];
$slika = $_FILES['slika'];
$alt = $_POST['alt'];
$cena = $_POST['cena'];
$aktivan = $_POST['aktivan'];
// SLIKA
$tmp = $_FILES['slika']['tmp_name'];
$direktorijumSlika = 'images/products/';
$imeFajla = $_FILES['slika']['name'];
// echo $imeFajla;
$putanja = $direktorijumSlika.time().$imeFajla;
// echo $putanja;
$rezultat = move_uploaded_file($tmp, $putanja);
// regularni izrazi
$greske1 = [];
$nazivRi = "/^[A-Za-z0-9\s]+$/";
$opisRi = "/^[A-Za-z0-9\,\s]+$/";
$cenaRi = "/^[0-9]{4,7}$/";
$altRi = "/^[a-z0-9]+$/";
if(!preg_match($nazivRi, $naziv)){
$greske1[] = 'Naziv nije ok';
}
if(!preg_match($opisRi, $opis)){
$greske1[] = 'Opis nije ok';
}
if(!preg_match($cenaRi, $cena)){
$greske1[] = 'Cena nije ok';
}
if(!preg_match($altRi, $alt)){
$greske1[] = 'Alt nije ok';
}
// foreach ($greske1 as $value) {
// echo $value;
// }
if(count($greske1) > 0){
foreach ($greske1 as $value) {
echo $value."<br/>";
}
}
else{
$upit = 'UPDATE proizvodi set naziv = :naziv, opis = :opis, slika =:slika, alt = :alt, cena = :cena, aktivan = :aktivan where id = :id';
$priprema = $konekcija->prepare($upit);
$priprema->bindParam(":naziv", $naziv);
$priprema->bindParam(":opis", $opis);
$priprema->bindParam(":slika", $putanja);
$priprema->bindParam(":alt", $alt);
$priprema->bindParam(":cena", $cena);
$priprema->bindParam(":aktivan", $aktivan);
$priprema->bindParam(":id", $id);
$rezultat = $priprema->execute();
if($rezultat){
$_SESSION['porukaAdmin'] = "Uspesna izmena proizvoda";
header("Location: admin.php");
// echo "<script>alert('Uspesno izvrsena izmena')</script>";
}
else{
$_SESSION['porukaAdmin'] = "Nije uspela izmena";
header("Location: admin.php");
}
}
}
// ----------------------BRISANJE--------------------------
else if(isset($_POST['idBrisanje'])){
$id = $_POST['idBrisanje'];
$upit = 'DELETE from proizvodi where id = :id';
$priprema = $konekcija->prepare($upit);
$priprema->bindParam(":id", $id);
$rezultat = $priprema->execute();
if($rezultat){
http_response_code(200);
echo "Uspesno brisanje";
}
else{
echo "Ne postoji proizvod u bazi";
}
}
// ----------------------INSERT--------------------------
else if(isset($_POST['insertProizvod'])){
$greske = [];
// dohvatanje
$naziv = $_POST['naziv'];
$opis = $_POST['opis'];
$slika = $_FILES['slika'];
$alt = $_POST["alt"];
$cena = $_POST['cena'];
$aktivan = $_POST['aktivan'];
$brend = $_POST['brend'];
// var_dump($slika);
// echo $_FILES['slika']['name'];
// echo "<br/>";
// echo $_FILES['slika']['tmp_name'];
// echo "<br/>";
// echo $_FILES['slika']['type'];
// echo "<br/>";
// echo $_FILES['slika']['size'];
// echo "<br/>";
// echo $_FILES['slika']['error'];
$tmp = $_FILES['slika']['tmp_name'];
$direktorijumSlika = 'images/products/';
$imeFajla = $_FILES['slika']['name'];
// echo $imeFajla;
$putanja = $direktorijumSlika.time().$imeFajla;
// echo $putanja;
$rezultat = move_uploaded_file($tmp, $putanja);
// if($rezultat){
// echo "uspelo";
// }
// else{
// echo "Grreska";
// }
// regularni
$nazivRi = "/^[A-Za-z0-9\s]+$/";
$opisRi = "/^[A-Za-z0-9\,\s]+$/";
$cenaRi = "/^[0-9]{4,7}$/";
// test
if(!preg_match($nazivRi, $naziv)){
$greske[] = 'Naziv nije ok';
}
if(!preg_match($opisRi, $opis)){
$greske[] = 'Opis nije ok';
}
if(!preg_match($cenaRi, $cena)){
$greske[] = 'Cena nije ok';
}
// ukoliko je sve proslo salje se bazi
var_dump($greske);
if(count($greske) == 0){
echo "jeste";
$upit = 'INSERT INTO proizvodi values(null, :naziv, :opis, :slika, :alt, :cena, :aktivan, :brend)';
$priprema = $konekcija->prepare($upit);
$priprema->bindParam(":naziv", $naziv);
$priprema->bindParam(":opis", $opis);
$priprema->bindParam(":slika", $putanja);
$priprema->bindParam(":alt", $alt);
$priprema->bindParam(":cena", $cena);
$priprema->bindParam(":aktivan", $aktivan);
$priprema->bindParam(":brend", $brend);
$rezultat = $priprema->execute();
// var_dump($rezultat);
if($rezultat){
// RESI OVO
// http_response_code(201);
// echo 'Uspesno dodato';
// echo "<script>alert('Uspesno dodat proizvod')</script>";
// ostane na ovoj strani
$_SESSION['porukaAdmin'] = "Uspesno dodat proizvod";
header("Location: admin.php");
}
else{
echo "Nije ok";
http_response_code(409);
// echo "Podaci nisu validni";
}
}
}
else{
// echo "nema nista";
// redirekcija
header("Location: index.php");
}
?>