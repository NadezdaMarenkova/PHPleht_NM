<?php
require ('conf.php');
global $yhendus;
//kustutamine

if(isset($_REQUEST["kustuta"])){
    $kask=$yhendus->prepare("DELETE FROM uudised WHERE id=?");
    $kask->bind_result("i", $_REQUEST["kustuta"]);
    $kask->execute();
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
        <th>XXX</th>
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
        echo "<td><a href='?kustuta=$id'>Delete</a><td/>";
        echo "</tr>";

    }


    ?>
</table>
<?php
$yhendus->close();
?>
</body>
</html>