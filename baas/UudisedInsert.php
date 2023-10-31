<?php
require ('conf.php');
global $yhendus;
//Uudise lisamine INSERT
if (isset($_REQUEST["teema"])){
    $kask=$yhendus->prepare("INSERT INTO uudised (`teema`, `kuupaev`, `kirjeldus`, `varv`) VALUES (?,?,?,?)");
    $kask->bind_param("ssss", $_REQUEST["teema"],$_REQUEST["kuupaev"],$_REQUEST["kirjeldus"],$_REQUEST["varv"]);
    //s-string, i-inter, d-double
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
}


?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Uudiste leht</title>
</head>
<body>
<h1>Uudiste leht</h1>
<h2>Uudise lisamine</h2>
<form name="vorm" action="">
    <label for="teema">Teema: </label>
    <input type="text" name="teema" id="teema">
    <br>
    <label for="kirjeldus">Kirjeldus: </label>
    <input type="text" name="kirjeldus" id="kirjeldus">
    <br>
    <label for="kuupaev">Kuupäev: </label>
    <input type="date" name="kuupaev" id="kuupaev">
    <br>
    <label for="varv">Värv: </label>
    <input type="text" name="varv" id="varv">
    <input type="submit" value="ok"
</form>
</body>
</html>