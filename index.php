<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Nadežda php töödeleht</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script src="js/joonisScript.js"></script>
</head>
<body>

<?php
include('header.php');
?>
<?php
include('navigation.php');
?>
<main>
    <?php
    if(isset($_GET["leht"])){
        include('content/'.$_GET["leht"]);
    } else {
        echo "Tere tulemast, ..... ";
    }
    ?>
</main>
<?php
include('footer.php');
?>

</body>
</html>


