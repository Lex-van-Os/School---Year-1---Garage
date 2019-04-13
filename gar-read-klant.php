<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>gar-read-klant.php</title>
</head>
<body>
    <h1>garage read klant</h1>
    <p>
        Dit zijn alle gegevens uit de
        tabel klanten van de database garage
    </p>

    <?php
    require_once "gar-connect.php";

    $klanten = $conn->prepare("select klantid,
            klantnaam,
            klantadres,
            klantpostcode,
            klantplaats
            from klant");

    $klanten->execute();

    echo "<table>";
    foreach($klanten as $klant)
    {
        echo "<tr>";
        echo "<td>" . $klant["klantid"]             . "</td>";
        echo "<td>" . $klant["klantnaam"]             . "</td>";
        echo "<td>" . $klant["klantadres"]             . "</td>";
        echo "<td>" . $klant["klantpostcode"]             . "</td>";
        echo "<td>" . $klant["klantplaats"]             . "</td>";
        echo "</tr>";

    }
    echo "</table>";
    echo "<a href='gar-menu.php'> terug naar het menu </a>"
    ?>
</body>
</html>

