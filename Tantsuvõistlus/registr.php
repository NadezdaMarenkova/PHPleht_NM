<?php if (isset($_GET['code'])) { die(highlight_file(__FILE__, 1)); } ?>

<?php
require_once("Conf.php");

//Проверка, была ли отправлена форма:
/*Эта строка проверяет, была ли отправлена форма.
Это делается путем проверки наличия параметра "sisestusnupp" в массиве $_REQUEST.
Если форма была отправлена, код выполняется.*/
//Как сделать, что можно было вводить только цифры?   preg_replace("/[^A-Za-z]/")
if(isSet($_REQUEST["sisestusnupp"])){
    if (preg_match('#[A-Z]#',$_REQUEST["paarinumber"]) //Проверка введенного значения "paarinumber":
        || empty ($_REQUEST["paarinumber"])){
        echo "Valesti sisestanud paarinumber !";
    }
    else {

//В случае корректного ввода номера пары:
        global $yhendus;
        $kask = $yhendus->prepare(
            "INSERT INTO tantsupaarid(paarinumber) VALUES (?)");
        $kask->bind_param("s", $_REQUEST["paarinumber"]);
        $kask->execute();
        $yhendus->close();
        header("Location: $_SERVER[PHP_SELF]?lisatudpaar=$_REQUEST[paarinumber]");
        header("Location:oskustetase.php");
        exit();
    }
}
?>
<!doctype html>
<html lang="et">
<head>
    <title>Tantsupaarid registreerimine</title>
    <link rel="stylesheet" href="style.css">
    <h1>Tantsupaarid registreerimine</h1>
</head>

<?php

include('nav.php')

?>
<body>
<h1>Registreerimine</h1>
<?php
if(isSet($_REQUEST["lisatudpaar"])){
    echo "Lisati $_REQUEST[lisatudpaar]";
}
?>
<form action="?">
    <dl>
        <dt>Paari number: </dt>
        <dd><input type="text" name="paarinumber" /></dd>
        <dt><input type="submit" name="sisestusnupp" value="sisesta" /></dt>  </dl>
</form>
</body>
</html>