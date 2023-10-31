<?php
$tekst='Tsau! Kas sulle meeldib programeerimine?';

echo $tekst;
echo "<br>";

echo strtolower($tekst);
echo '<br>';

echo strtoupper($tekst);
echo '<br>';

echo strlen($tekst);
echo '<br>';
//sõnade arv tekstis
echo str_word_count($tekst);
echo '<br>';
//eraldab lauses alates 4 kokku viis tähte
echo substr($tekst, 3, 5);		//thin
echo '<br>';
//esimesed neli tähte
echo substr($tekst, 0, 4);	//thinking men
echo '<br>';


// esimese tühiku asukoht tekstis
echo '<br>';
echo "esimese tühiku asukoht tekstis ", strpos($tekst, " ");
echo '<br>';
$otsitav='on';
//leia on asukoht lauses
echo strpos($tekst, $otsitav, 0);
//näita kõik sõnad peale esimest
echo substr($tekst, strpos($tekst,""), strlen($tekst)-strpos($tekst,""));
echo '<br>';

// mõisatatus - zagadka
//Eeti linn.
//5 podskazok pri pomos4i tekstov6h funktsi. proverka - polzovatel vvodit gorod i stranitsa pokaz6vaet verno ili net

?>
<!doctype html>
<html lang="et">
<link rel="stylesheet" type="text/css" href="style/style.css">

<head>
    <title>Tekstifunktsioonid</title>
</head>
<body>
<hr>
<h1>Mõistatus. Eesti linn</h1>

<form method="post">
    Sisesta oma vastus: <input type="text" name="answer">
    <input type="submit" value="Kontrollima">
</form>

<?php
$linn='Viljandi';
echo "<ol><li>Linnanimi pikkus on - ".strlen($linn)." tähte</li>";
echo '<br>';
echo "<li>Esimene täht on - ".substr($linn, 0, 1)."</li>";
echo '<br>';
echo "<li>Viimane 3 tähe on - ".substr($linn, 5, 8)."</li>";
echo '<br>';
echo "<li>See on ".str_word_count($linn)." sõna</li>";
echo '<br>';
echo "<li>Linnanimi tagurpidi - ".strrev($linn)."</li>";
echo '<br></ol>';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем ответ пользователя
    $userAnswer = $_POST['answer'];

    // Проверяем, совпадает ли ответ пользователя с загаданным городом
    if (strcasecmp($userAnswer, $linn) === 0) {
        // Если ответ правильный, меняем цвет фона на зеленый
        //echo '<style>body { background-color: lightgreen; }</style>';
        echo "<body style='color: lightgreen'>";
        echo '<p>-*  Vastus on õige!</p>  *-';
    } else {
        // Если ответ неправильный, меняем цвет фона на красный и обновляем страницу
        //echo '<style>body { background-color: lightcoral; }</style>';
        echo "<body style='color: lightcoral'>";
        echo '<p>-*  Vastus on vale. Proovi uuesti.  *-</p>';
        //echo '<script>setTimeout(function(){ location.reload(); }, 2000);</script>';
    }
}
highlight_file('tekstifunktsioonid.php');
?>
</body>
</html>
