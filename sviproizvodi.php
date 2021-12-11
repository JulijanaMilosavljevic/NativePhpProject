<?php
include "konekcija.php";
// var_dump($_POST['idProizvod'])
if(isset($_POST['idProizvod'])){
// $niz = $_POST['idProizvod'];
// echo $value;
$upit = "SELECT * from proizvodi";
$rezultat = $konekcija->query($upit);
$rez = $rezultat->fetchAll();
// var_dump($rez);
// $sviProizvodi[] = $rez;
$status = 200;
header('Content-Type: application/json');
echo json_encode($rez); 
}
?>