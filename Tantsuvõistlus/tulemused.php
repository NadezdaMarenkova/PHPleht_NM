<?php if (isset($_GET['code'])) { die(highlight_file(__FILE__, 1)); } ?>
<?php
require_once("Conf.php");

// Обработка запроса на обновление разрешения
if (!empty($_REQUEST["vormistamine_id"])) {
    global $yhendus;
    $kask = $yhendus->prepare(
        "UPDATE tantsupaarid SET luba=1 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["vormistamine_id"]);
    $kask->execute();
}

// Запрос для получения данных из базы
$kask = $yhendus->prepare(
    "SELECT id, paarinumber, oskustetase, originaalsus, valimus, tulemus FROM tantsupaarid;");
$kask->bind_result($id, $paarinumber, $oskustetase, $originaalsus, $valimus, $tulemus);
$kask->execute();

// Функция для замены числовых значений на текстовые
//function asenda($nr) {
//    if ($nr == -1) { return "."; } // Не выполнено
//    if ($nr == 1) { return "корректно"; }
//    if ($nr == 2) { return "неудачно"; }
//    return "Неизвестное значение";
//}

// Функция для вычисления средней оценки
function calculateAverage($oskustetase, $originaalsus, $valimus) {
    return round(($oskustetase + $originaalsus + $valimus) / 3, 2); // Среднее арифметическое
}

?>
<!doctype html>
<html>
<head>
    <title>Tulemused</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>

    <h1>Tulemused</h1>
</header>

<?php

include('nav.php')

?>

<h1>Keskmine punktisumma iga paari kohta</h1>
<!-- Таблица для отображения средних оценок -->
<table>
    <tr>
        <th>ID</th>
        <th>Paarinumber</th>
        <th>Oskuste таsе</th>
        <th>Originaalsus</th>
        <th>Välimus</th>
        <th>Keskmine tulemus</th>
    </tr>
    <?php
    // Повторно выполняем запрос для получения данных
    $kask->execute();

 //   while ($kask->fetch()) {
 //       $asendatud_oskustetase = asenda($oskustetase);
 //       $asendatud_originaalsus = asenda($originaalsus);
 //       $asendatud_valimus = asenda($valimus);
 //       $loalahter = ".";
 //       if ($tulemus == 1) {
//            $loalahter = "Väljastatud";
//        }
//        if ($tulemus == -1 and $valimus == 1) {
//            $loalahter = "<a href='?vormistamine_id=$id'>Vormista load</a>";
//        }

        // Вычисляем среднюю оценку для каждой пары
        $averageScore = calculateAverage($oskustetase, $originaalsus, $valimus);

echo "
        <tr>
        <td>$id</td>
        <td>$paarinumber</td>
        <td>$oskustetase</td>
        <td>$originaalsus</td>
        <td>$valimus</td>
        <td>$averageScore</td>
        </tr>
        ";
        ?>

//        echo "
//        <tr>
//        <td>$id</td>
//        <td>$paarinumber</td>
//        <td>$asendatud_oskustetase</td>
//        <td>$asendatud_originaalsus</td>
//        <td>$asendatud_valimus</td>
//        <td>$averageScore</td>
//        </tr>
//        ";
//    }
//    ?>
</table>

</body>
</html>
