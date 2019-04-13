<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>gar-read-klantauto.php</title>
</head>
<body>
<h1>garage read klant & auto</h1>
<p>
    Dit zijn de gevens van klanten met hun auto's erbij
</p>

<?php
require_once "gar-connect.php";

$klantauto = $conn->prepare("select klant.klantid,
            klantnaam,
            klantplaats,
            klantadres,
            klantpostcode,
            autokenteken,
            automerk,
            autotype,
            autokmafstand,
            auto.klantid
            from klant, auto
            where klant.klantid = auto.klantid");

$klantauto->execute();

echo "<table>";
foreach($klantauto as $autoklant)
{
    echo "<tr>";
    echo "<td>" . $autoklant["klantid"]             . "</td>";
    echo "<td>" . $autoklant["klantnaam"]             . "</td>";
    echo "<td>" . $autoklant["klantplaats"]             . "</td>";
    echo "<td>" . $autoklant["klantpostcode"]             . "</td>";
    echo "<td>" . $autoklant["autokenteken"]             . "</td>";
    echo "<td>" . $autoklant["automerk"]             . "</td>";
    echo "<td>" . $autoklant["autotype"]             . "</td>";
    echo "<td>" . $autoklant["autokmafstand"]             . "</td>";
    echo "</tr>";

}
echo "</table>";
echo "<a href='gar-menu.php'> terug naar het menu </a>"
?>
</body>
</html>

