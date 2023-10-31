<?php
require_once("konf.php");
include('Navigation.php');
if(!empty($_REQUEST["korras_id"])){
    // uuendab tabeliandmed --> slaalom = 1
    global $yhendus;
    $kask=$yhendus->prepare(
        "UPDATE jalgrattaeksam SET slaalom=1 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["korras_id"]);
    $kask->execute();
}
if(!empty($_REQUEST["vigane_id"])){
    // uuendab tabeliandmed --> slaalom = 2 kui vajutakse ebaõnnestunud
    $kask=$yhendus->prepare(
        "UPDATE jalgrattaeksam SET slaalom=2 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["vigane_id"]);
    $kask->execute();
}
//veebileht kuvab ainult need kellel teooriatullemus > =9  and slaalom =-1
//ebaõnnestunud õpilane jääb sama lehel, aga tema tulemus fikseeritakse andmetabelis
$kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi   FROM jalgrattaeksam WHERE teooriatulemus>=9 AND slaalom=-1 OR slaalom=2");
$kask->bind_result($id, $eesnimi, $perekonnanimi);
$kask->execute();
?>
<!doctype html>
<html lang="et">
<link rel="stylesheet" href="style.css">
<head>
    <title>Slaalom</title>
</head>
<body>
<h1>Slaalom</h1>
<table>
    <?php
    while($kask->fetch()){
        echo " 
 <tr> 
 <td>$eesnimi</td> 
 <td>$perekonnanimi</td> 
 <td> 
 <a href='?korras_id=$id'>Korras</a>
 <a href='?vigane_id=$id'>Ebaõnnestunud</a> 
 </td> 
</tr> 
 ";
    }
    ?>
</table>
</body>
</html>