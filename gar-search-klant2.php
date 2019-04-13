<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>gar-search-klant2.php</title>
</head>
<body>
<h1> garage zoek op klantid 2</h1>
<p>
    Op klantid gegevens zoeken uit de
    tabel klanten van de database garage.
</p>
<?php
// klantid uit het formulier halen -------------------------------------
$klantid = $_POST["klantidvak"];

// klantgegevens uit de tabel halen ------------------------------------
require_once "gar-connect.php";

$klanten = $conn->prepare("
select      klantid,
            klantnaam,
            klantadres,
            klantpostcode,
            klantplaats
            from klant
            where klantid = :klantid");
$klanten->execute(["klantid" => $klantid]);

// klantgegevens laten zien ---------------------------------------------
echo "<table>";
foreach($klanten as $klant)
{
    echo "<tr>";
    echo "<td>" . $klant["klantid"] . "</td>";
    echo "<td>" . $klant["klantnaam"]  . "</td>";
    echo "<td>" . $klant["klantadres"]  . "</td>";
    echo "<td>" . $klant["klantpostcode"]  . "</td>";
    echo "<td>" . $klant["klantplaats"]  . "</td>";
    echo "</tr>";
}
echo "</table><br />";
echo "<a href='gar-menu.php'> terug naar het menu </a>"
?>
</body>
</html>