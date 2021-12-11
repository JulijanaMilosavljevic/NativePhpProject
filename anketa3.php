<?php
session_start();
include "konekcija.php";
if(isset($_POST['idAnketa'])){
$idAnketa = $_POST['idAnketa']; // id ankete
// echo $idAnketa;
$korisnik = $_SESSION['korisnik'];
$id = $korisnik->id_korisnik; // id korisnika
// echo $id;
// provera da li je glasao
$upit = "SELECT * from anketa_korisnik where id_korisnik = :id and id_ankete = :idAnketa";
$priprema = $konekcija->prepare($upit);
$priprema->bindParam(":id", $id);
$priprema->bindParam(":idAnketa", $idAnketa);
$rezultat = $priprema->execute();
// var_dump($upit);
$rez = $priprema->fetch();
// var_dump($rez);
// http_response_code(200);
// header('Content-Type: application/json');
// echo json_encode($rez);
if($priprema->rowCount()== 1){
// echo "Greska";
// glasao
http_response_code(202);
header('Content-Type: application/json');
echo json_encode($rez);
}
else{
// nije glasao
// treba mi value iz cek polja
// upisujem za koji odgovor je glasao
$odgovor = $_POST['odgovor'];
// echo $odgovor;
$upit = "UPDATE rezultat set rezultat = rezultat + 1 where id_odgovor = :odgovor";
$priprema = $konekcija->prepare($upit);
$priprema->bindParam(":odgovor", $odgovor);
$rezultat = $priprema->execute();
// upis da je korisnik glasao
$upit = "INSERT INTO anketa_korisnik values(null, :idKorisnik,:idAnkete)";
$priprema = $konekcija->prepare($upit);
$priprema->bindParam(":idKorisnik", $id);
$priprema->bindParam(":idAnkete", $idAnketa);
$rezultat = $priprema->execute();
// slanje da je glasao
$poruka = "Uspesno ste glasali";
if($rezultat){
http_response_code(200);
header('Content-Type:application/json');
echo json_encode(['poruka' => $poruka]);
}
}
}
?>