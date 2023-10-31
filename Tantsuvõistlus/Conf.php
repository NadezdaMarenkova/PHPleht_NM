<?php
//$servrinimi="localhost"; //d109463.mysql.zonevs.eu
$servrinimi="d109463.mysql.zonevs.eu";
//$kasutajanimi="nadezdamarenkova";
$kasutajanimi="d109463sa418708";
//$parool="123456";
$parool="4okolatka_Honey";
//$andmebaas="nadezdamarenkova";
$andmebaas="d109463_phpleht";
$yhendus=new mysqli($servrinimi, $kasutajanimi, $parool, $andmebaas);
$yhendus->set_charset('UTF8');
//ühenduse kontroll
if(!$yhendus){
    die('Ei saa ühendust andmebaasiga');
}
?>
