<?php
require  ('conf.php');

//uuendamine, punktide lisamine
if(isset($_REQUEST["healaul"])){
    $kask=$yhendus->prepare("UPDATE eestilaul set punktid=punktid+1 where id=?");
    $kask->bind_param("i", $_REQUEST["healaul"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
}
// update - minus 1 punkt
//uuendamine, punktide kustutamine
if(isset($_REQUEST["halblaul"])){
    $kask=$yhendus->prepare("UPDATE eestilaul set punktid=punktid-1 where id=?");
    $kask->bind_param("i", $_REQUEST["halblaul"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
}

//komentaaride lisamine
if(isset($_REQUEST["uuskomment"])){
    if (!empty($_REQUEST["komment"])) {
        $kask = $yhendus->prepare("UPDATE eestilaul set kommentaarid=CONCAT(IFNULL(kommentaarid, ''),?) where id=?");
        //IFNULL(kommentaarid, '') - tühi kommentivääli loeb ja lisab
        $lisakomment=$_REQUEST["komment"]."\n";
        $kask->bind_param("si", $lisakomment, $_REQUEST["uuskomment"]);
        $kask->execute();
        header("Location: $_SERVER[PHP_SELF]");
    }
}
// kustutamine - komment (kõik/viimane)
//komentaaride kustutamine
if(isset($_REQUEST["kustutakomment"])){
    //if (!empty($_REQUEST["komment"])) {
        //$kask = $yhendus->prepare("UPDATE eestilaul set kommentaarid=CONCAT(DELETE(kommentaarid, ''),?) where id=?");
        $kask = $yhendus->prepare("DELETE FROM eestilaul set kommentaarid=CONCAT(IFNULL(kommentaarid, ''),?) where id=?");
        $deletekomment=$_REQUEST["komment"]."\n";
        $kask->bind_param("si", $deletekomment, $_REQUEST["kustutakomment"]);
        $kask->execute();
        header("Location: $_SERVER[PHP_SELF]");
//    }
}

//if(isset($_REQUEST["kustuta"])){
//    $kask=$yhendus->prepare("DELETE FROM uudised WHERE id=?");
//    $kask->bind_result("i", $_REQUEST["kustuta"]);
//    $kask->execute();
//}


// lisa responsive zebra table css

?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Eesti TARgv22 laulukonkurss</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>

<h1>Eesti TARgv22 laulukonkurss</h1>
<table>
    <tr>
        <th>Laulunimi</th>
        <th>Laulja</th>
        <th>Punktid</th>
    </tr>

    <?php
    //andmete kuvamine ab-tabelist
    global $yhendus;
    $kask = $yhendus->prepare("SELECT id, laulunimi, laulja, punktid, kommentaarid FROM eestilaul");
    $kask->bind_result($id, $laulunimi, $laulja, $punktid, $kommentaarid);
    $kask->execute();

    while ($kask->fetch()){
        echo "<tr>";
        echo "<td>".$laulunimi."</td>";
        echo "<td>".$laulja."</td>";
        echo "<td>".$punktid."</td>";
        echo "<td><a href='?healaul=$id'>Lisa 1 punkt</a></td>";
        echo "<td><a href='?halblaul=$id'>Kustuta 1 punkt</a></td>";
        echo "<td>".nl2br(htmlspecialchars($kommentaarid))."</td>";
        echo "<td>
<form action='?'>
<input type='hidden' value='$id' name='uuskomment'>
<input type='text' name='komment'>
<input type='submit' value='ok'>
</form>
</td>";
        echo "<td><a href='?kustutakomment=$id'>Kustuta komment</a></td>";
        echo "</tr>";
    }

    ?>
</table>

<?php
    $yhendus->close();
?>


</body>
</html>