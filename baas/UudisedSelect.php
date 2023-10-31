<?php
require ('conf.php');
global $yhendus;

//Uudise lisamine INSERT
if (isset($_REQUEST["lisavorm"])){
    $kask=$yhendus->prepare("INSERT INTO kalad (kalanimi, pilt, varv) VALUES (?,?,?)");
    $kask->bind_param("sss", $_REQUEST["teema"],$_REQUEST["kuupaev"],$_REQUEST["kirjeldus"],$_REQUEST["varv"]);
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
<table>
    <tr>
        <th>Teema</th>
        <th>Kirjeldus</th>
        <th>Kuupäev</th>
    </tr>
    <?php
    global $yhendus;
    $kask=$yhendus->prepare("SELECT id, teema, kirjeldus, kuupaev, varv FROM uudised");
    $kask->bind_result($id, $teema, $kirjeldus, $kuupaev, $varv);
    $kask->execute();

    while ($kask->fetch()){
        echo "<tr>";
        echo "<td bgcolor='$varv'>".htmlspecialchars($teema)."</td>";
        echo "<td>".htmlspecialchars($kirjeldus)."</td>";
        echo "<td>".htmlspecialchars($kuupaev)."</td>";
        echo "</tr>";

    }


    ?>
</table>
<?php
$yhendus->close();
?>
</body>
</html>