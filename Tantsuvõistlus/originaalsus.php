<?php if (isset($_GET['code'])) { die(highlight_file(__FILE__, 1)); } ?>
<?php
require_once("Conf.php");
$expr = '/^[1-9][0-9]*$/';
if(!empty($_REQUEST["originaalsus"])&& preg_match($expr, $_REQUEST["originaalsus"])){
    global $yhendus;
    $kask=$yhendus->prepare(
        "UPDATE tantsupaarid SET originaalsus=? WHERE id=?");
    $kask->bind_param("ii", $_REQUEST["originaalsus"], $_REQUEST["id"]);
    $kask->execute();
}
$kask=$yhendus->prepare("SELECT id, paarinumber, originaalsus  FROM tantsupaarid WHERE originaalsus=-1");
$kask->bind_result($id, $paarinumber, $originaalsus);
$kask->execute();

// Оцифровка оценок от 1 до 5
$ratings = range(1, 5);

// Проверяем, был ли отправлен POST-запрос
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем выбранную оценку от пользователя
    $oskustetase = $_POST["oskustetase"];

    // Проверяем, что выбранная оценка находится в списке валидных оценок
    if (in_array($oskustetase, $ratings)) {
        // Обновляем столбик oskustetase в таблице tantsupaarid с выбранной оценкой
        $updateSql = "UPDATE tantsupaarid SET oskustetase = $oskustetase";

        echo "Оценка успешно записана в базу данных.";
    } else {
        echo "Невалидная оценка. Пожалуйста, выберите оценку от 1 до 5.";
    }
}
?>
<!doctype html>
<html>
<head>
    <title>Originaalsus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>

    <h1>Originaalsus</h1>
</header>

<?php

include('nav.php')

?>

<h1>Originaalsus tulemuste sisestamine</h1>

<h2>Выберите оценку для танцевальной пары:</h2>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <select name="oskustetase">
        <?php
        foreach ($ratings as $rating) {
            echo "<option value=\"$rating\">$rating</option>";
        }
        ?>
    </select>
    <br><br>
    <input type="submit" value="Отправить">
</form>


<table>
    <?php
    while($kask->fetch()){
        echo " 
 <tr> 
 <td>$paarinumber</td> 
 <td>$originaalsus</td> 
 
 <td><form action='?'> 
 <input type='hidden' name='id' value='$id' /> 
 <input type='text' name='originaalsus' />
 <input type='submit' value='Sisesta tulemus' /> 
 </form> 
 </td> 
</tr> 
 ";
    }
    ?>

    <?php
    if(isSet($_REQUEST["originaalsus"])){

        header("Location:valimus.php");
    }
    ?>
</table>
</body>
</html>