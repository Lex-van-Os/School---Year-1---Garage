<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>gar-delete-klant3.php</title>
</head>
<body>
<h1>garage delete klant 3</h1>
<p>
    op klantid gegevens zoeken uit de tabel klanten van de database garage
    zodat ze verwijderd kunnen worden.
</p>
<?php
//gegevens uit het formulier halen --------------------------------
$klantid        = $_POST["klantidvak"];
$verwijderen    = $_POST["verwijdervak"];

// klantgegevsn verwijderen --------------------------------------
if($verwijderen)
{
    require_once "gar-connect.php";

    $sql = $conn->prepare("
                                        delete from klant
                                        where   klantid = :klantid
                                        ");
    $sql->execute(["klantid" => $klantid]);

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