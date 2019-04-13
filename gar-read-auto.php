ww<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>gar-read-auto.php</title>
</head>
<body>
    <h1>garage read auto</h1>
    <p>
        Dit zijn alle gegevens uit de
        tabel autos van de database garage
    </p>

    <?php
    require_once "gar-connect.php";

    $autos = $conn->prepare("select autokenteken,
            automerk,
            autotype,
            autokmafstand,
            klantid
            from auto");

    $autos->execute();

    echo "<table>";
    foreach($autos as $auto)
    {
        echo "<tr>";
        echo "<td>" . $auto["autokenteken"]             . "</td>";
        echo "<td>" . $auto["automerk"]             . "</td>";
        echo "<td>" . $auto["autotype"]             . "</td>";
        echo "<td>" . $auto["autokmafstand"]             . "</td>";
        echo "<td>" . $auto["klantid"]             . "</td>";
        echo "</tr>";

    }
    echo "</table>";
    echo "<a href='gar-menu.php'> terug naar het menu </a>"
    ?>
</body>
</html>

