<?php
//require_once("konf.php");
//include('Navigation.php');
//global $yhendus;
//
//session_start();
//if (!isset($_SESSION['tuvastamine'])) {
//    header('Location: 07_login.php');
//    exit();
//}
//
//if(!empty($_REQUEST["teooriatulemus"])){
//    $tulemus = $_REQUEST["teooriatulemus"];
//
//    if (!preg_match("#[A-z]#", $tulemus)){
//        $kask = $yhendus->prepare("UPDATE jalgratteksam SET teooriatulemus=? wWHERE id=?");
//        $kask->bind_param("ii", $tulemus, $_REQUEST["id"]);
//        $kask->execute();
//
//    }
//    //näitab ainult need õpilased kellel
//    $kask=$yhendus->prepare(
//        "UPDATE jalgrattaeksam SET teooriatulemus=? WHERE id=?");
//    $kask->bind_param("ii", $_REQUEST["teooriatulemus"], $_REQUEST["id"]); $kask->execute();
//}
//$kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi   FROM jalgrattaeksam WHERE teooriatulemus=-1");
//$kask->bind_result($id, $eesnimi, $perekonnanimi);
//$kask->execute();
//?>
<!--<!doctype html>-->
<!--<html lang="et">-->
<!--<link rel="stylesheet" href="style.css">-->
<!--<head>-->
<!--    <title>Teooriaeksam</title>-->
<!--</head>-->
<!--<body>-->
<!--<header>-->
<!--    <h1>TAR Eksam...</h1>-->
<!--    --><?php
//    if(isSet($_SESSION['kasutaja'])){
//
//    }
//    ?>
<!---->
<!--</header>-->
<!--<h1>Teooriaeksami tulemuste sisestamine</h1>-->
<!--<table>-->
<!--    --><?php
//    while($kask->fetch()){
//        echo "
// <tr>
// <td>$eesnimi</td>
// <td>$perekonnanimi</td>
// <td><form action=''>
// <input type='hidden' name='id' value='$id' />
// <input type='text' name='teooriatulemus' />
// <input type='submit' value='Sisesta tulemus' />
// </form>
// </td>
//</tr>
// ";
//    }
//    ?>
<!--</table>-->
<!--</body>-->
<!--</html>-->


<?php
require_once("konf.php");
$expr = '/^[1-9][0-9]*$/';
if(!empty($_REQUEST["teooriatulemus"])&& preg_match($expr, $_REQUEST["teooriatulemus"])){
    global $yhendus;
    $kask=$yhendus->prepare(
        "UPDATE jalgrattaeksam SET teooriatulemus=? WHERE id=?");
    $kask->bind_param("ii", $_REQUEST["teooriatulemus"], $_REQUEST["id"]);
    $kask->execute();
}

$kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi   FROM jalgrattaeksam WHERE teooriatulemus=-1");
$kask->bind_result($id, $eesnimi, $perekonnanimi);
$kask->execute();

?>
<!doctype html>
<html>
<head>
    <title>Teooriaeksam</title>
</head>
<body>
<header>

    <h1>TAR Eksem...</h1>
    <link rel="stylesheet" href="style.css">
    <?php
    if (isset($_SESSION['kasutaja'])){

        ?>
        <h2>
            <?=$_SESSION['kasutaja']?>on sisse logitud
            <a href="logout.php">logout</a>
        </h2>
        <?php
    }
    ?>
</header>

<?php

include('Navigation.php')

?>

<h1>Teoriaeksami tulemuste sisestamine</h1>
<table>
    <?php
    while($kask->fetch()){
        echo " 
 <tr> 
 <td>$eesnimi</td> 
 <td>$perekonnanimi</td> 
 
 <td><form action='?'> 
 <input type='hidden' name='id' value='$id' /> 
 <input type='text' name='teooriatulemus' />
 <input type='submit' value='Sisesta tulemus' /> 
 </form> 
 </td> 
</tr> 
 ";
    }
    ?>

    <?php
    if(isSet($_REQUEST["teooriatulemus"])){

        header("Location:Slaalom.php");
    }
    ?>
</table>
</body>
</html>