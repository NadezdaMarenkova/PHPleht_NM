
<?php
require("abifunktsioonid.php");
if(isSet($_REQUEST["grupilisamine"])){
    lisaGrupp($_REQUEST["uuegrupinimi"]);
    header("Location: kaubahaldus.php");
    exit();
}
if(isSet($_REQUEST["kaubalisamine"])){
    lisaKaup($_REQUEST["nimetus"], $_REQUEST["kaubagrupi_id"], $_REQUEST["hind"]);  header("Location: kaubahaldus.php");
    exit();
}
if(isSet($_REQUEST["kustutusid"])){
    kustutaKaup($_REQUEST["kustutusid"]);
}
if(isSet($_REQUEST["muutmine"])){
    muudaKaup($_REQUEST["muudetudid"], $_REQUEST["nimetus"], $_REQUEST["kaubagrupi_id"], $_REQUEST["hind"]);  }
$kaubad=kysiKaupadeAndmed();


?>
<!DOCTYPE html >
<html lang="et">
<head>
    <link rel="stylesheet" type="text/css" href="StyleForm.css">
    <title>Kaupade leht</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />  </head>
<body>
<h2>Kaubahaldus</h2>

<form action="kaubahaldus.php" class="stil" >
    <div class="form-inner">
    <h2>Kauba lisamine</h2>
    <div class="form-content">
    <dl>
        <dt>Nimetus:</dt>
        <dd><input type="text" placeholder="nimetus" /></dd>
        <dt>Kaubagrupp:</dt>
        <dd><?php
            echo looRippMenyy("SELECT id, grupinimi FROM kaubagrupid",   "kaubagrupi_id");
            ?>
        </dd>
        <dt>Hind:</dt>
        <dd><input type="text" placeholder="hind" /></dd>
    </dl>
    <input type="submit" name="kaubalisamine" value="Lisa kaup" />

    <h2>Grupi lisamine</h2>
    <input type="text" placeholder="uuegrupinimi" />
    <input type="submit" placeholder="grupilisamine" value="Lisa grupp" />
    </div>
    </div>

</form>


<form action="kaubahaldus.php">
    <h2>Kaupade loetelu</h2>
    <table>
        <tr>
            <th>Haldus</th>
            <th>Nimetus</th>
            <th>Kaubagrupp</th>
            <th>Hind</th>
        </tr>
        <?php foreach($kaubad as $kaup): ?>
            <tr>
                <?php if(isSet($_REQUEST["muutmisid"]) &&
                    intval($_REQUEST["muutmisid"])==$kaup->id): ?>  <td>
                    <input type="submit" name="muutmine" value="Muuda" />  <input type="submit" name="katkestus" value="Katkesta" />  <input type="hidden" name="muudetudid" value="<?=$kaup->id ?>" />  </td>
                    <td><input type="text" name="nimetus" value="<?=$kaup->nimetus ?>" /></td>  <td><?php
                        echo looRippMenyy("SELECT id, grupinimi FROM kaubagrupid",   "kaubagrupi_id");  ?></td>
                    <td><input type="text" name="hind" value="<?=$kaup->hind ?>" /></td>  <?php else: ?>
                    <td><a href="kaubahaldus.php?kustutusid=<?=$kaup->id ?>"  onclick="return confirm('Kas ikka soovid kustutada?')">x</a>  <a href="kaubahaldus.php?muutmisid=<?=$kaup->id ?>">m</a>  </td>
                    <td><?=$kaup->nimetus ?></td>
                    <td><?=$kaup->grupinimi ?></td>
                    <td><?=$kaup->hind ?></td>
                <?php endif ?>
            </tr>
        <?php endforeach; ?>
    </table>
</form>

</body>
</html>