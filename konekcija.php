<?php
include "config.php";
try {
$konekcija = new
PDO("mysql:host=$serverBaze;dbname=$bazaPodataka", $username, $password);
$konekcija->setAttribute(PDO::ATTR_ERRMODE,
PDO::ERRMODE_EXCEPTION); // ispisivanje greske
$konekcija->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
PDO::FETCH_OBJ); // koristi se objekat
}
catch(PDOException $e) {
echo $e->getMessage();
}
?>