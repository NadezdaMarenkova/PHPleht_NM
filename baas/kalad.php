<?php
require ('conf.php');
global $yhendus;

//Kala lisamine INSERT
if (isset($_REQUEST["lisavorm"])){
    $kask=$yhendus->prepare("INSERT INTO kalad (kalanimi, pilt, varv) VALUES (?,?,?)");
    $kask->bind_param("sss", $_REQUEST["teema"],$_REQUEST["kuupaev"],$_REQUEST["kirjeldus"],$_REQUEST["varv"]);
    //s-string, i-inter, d-double
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
}

//kustutamine

if(isset($_REQUEST["kustuta"])){
    $kask=$yhendus->prepare("DELETE FROM uudised WHERE id=?");
    $kask->bind_result("i", $_REQUEST["kustuta"]);
    $kask->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kalade andmebaas</title>

</head>
<body>
    <h1>Kalade andmebaas</h1>
<div id="lingid">

    <?php
        global $yhendus;
        $kask = $yhendus->prepare("SELECT id, kalanimi FROM kalad");
        $kask->bind_result($id, $kalanimi);
        $kask->execute();
        echo "<ul>";

    while ($kask->fetch()){
        echo "<li><a href='?id=$id'> ".$kalanimi."</a></li>";

    }
    echo "</ul>";

    while ($kask->fetch()){
        echo"<li>><a href='?id=$id'>".$kalanimi."</a></li>";
    }
    echo "</ul>";
    echo "<a href='?lisa=jah'>Lisa...</a>";

    ?>

</div>
<div id="sisu">
    <?php
        if(isset($_REQUEST["id"])){
            $kask = $yhendus->prepare("SELECT id, kalanimi, pilt, varv FROM kalad WHERE id=?");
            $kask->bind_param("i", $_REQUEST["id"]);
            $kask->bind_result($id, $kalanimi, $pilt, $varv);
            $kask->execute();
            if($kask->fetch()){
                echo "<div style='background-color: $varv; width: 500px;'>";
                echo "<strong>".$id.", ".$kalanimi.", ".$varv."</strong></div>";
                echo "<img src='$pilt' alt='$kalanimi'>";
                echo "</div>";
            }

        }

    ?>

</div>
    <?php
    if(isset($_REQUEST["lisa"])){
    ?>
    <h2>Kala lisamine</h2>
    <form name="vorm" action="?">
        <input type="hidden" name="Lisamisvorm" value="jah">
        <label for="kalanimi">Kala nimi: </label>
        <input type="text" name="kalanimi" id="kalanimi">
        <br>
        <label for="pilt">Kirjeldus: </label>
        <input type="text" name="pilt" id="pilt">
        <br>
        <label for="varv">Värv: </label>
        <input type="text" name="varv" id="varv">
        <input type="submit" value="ok"
    </form>
    <?php
    }
    ?>
</body>
</html>