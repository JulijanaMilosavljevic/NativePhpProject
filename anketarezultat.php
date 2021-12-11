<?php
include "konekcija.php";
if(isset($_POST['idAnketaRezultat'])){
$idAnkete = $_POST["idAnketaRezultat"];
// upit
// include "konekcija.php";
//$upit = "SELECT * from rezultat where id_ankete = :id";
$upit = "SELECT r.rezultat, r.id_ankete, o.odgovor from rezultat r INNER JOIN odgovori o ON r.id_odgovor = o.id WHERE r.id_ankete = :id";
$priprema = $konekcija->prepare($upit);
$priprema->bindParam(":id", $idAnkete);
$rezultat = $priprema->execute();
if($rezultat){
$rez = $priprema->fetchAll();
// var_dump($rez);
http_response_code(200);
header('Content-Type: application/json');
echo json_encode($rez);
}
else{
echo "Nije se izvrsio upit";
}
}
else{
header("Location: index.php");
}
?>