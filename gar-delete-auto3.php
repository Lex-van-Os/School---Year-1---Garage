<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>gar-delete-auto3.php</title>
</head>
<body>
<h1>garage delete auto 3</h1>
<p>
    op autokenteken gegevens zoeken uit de tabel autos van de database garage
    zodat ze verwijderd kunnen worden.
</p>
<?php
//gegevens uit het formulier halen --------------------------------
$autokenteken        = $_POST["autokentekenvak"];
$verwijderen    = $_POST["verwijdervak"];

// autogegevens verwijderen --------------------------------------
if($verwijderen)
{
    require_once "gar-connect.php";

    $sql = $conn->prepare("
                                        delete from auto
                                        where   autokenteken = :autokenteken
                                        ");
    $sql->execute(["autokenteken" => $autokenteken]);

    echo "de gegevens zijn verwijderd. <br />";
}
else
{
    echo "de gegevens zijn niet verwijderd. <br />";
}

echo "<a href='gar-menu.php'>Terug naar het menu. </a>";
?>

</body>
</html>