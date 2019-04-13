<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>gar-search-auto2.php</title>
</head>
<body>
<h1> garage zoek op autokenteken 2</h1>
<p>
    Op autokenteken gegevens zoeken uit de
    tabel autos van de database garage.
</p>
<?php
// autokenteken uit het formulier halen -------------------------------------
$autokenteken = $_POST["autokentekenvak"];

// autogegevens uit de tabel halen ------------------------------------
require_once "gar-connect.php";

$autos = $conn->prepare("
select      autokenteken,
            automerk,
            autotype,
            autokmafstand,
            klantid
            from auto
            where autokenteken = :autokenteken");
$autos->execute(["autokenteken" => $autokenteken]);

// autogegevens laten zien ---------------------------------------------
echo "<table>";
foreach($autos as $auto)
{
    echo "<tr>";
    echo "<td>" . $auto["autokenteken"] . "</td>";
    echo "<td>" . $auto["automerk"]  . "</td>";
    echo "<td>" . $auto["autotype"]  . "</td>";
    echo "<td>" . $auto["autokmafstand"]  . "</td>";
    echo "<td>" . $auto["klantid"]  . "</td>";
    echo "</tr>";
}
echo "</table><br />";
echo "<a href='gar-menu.php'> terug naar het menu </a>"
?>
</body>
</html>