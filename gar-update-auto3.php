<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>gar-update-auto3.php</title>
</head>
<body>
<h1>garage update auto 3</h1>
<p>
    Autogegevens wijzigen in de tabel
    auto van de database garage.
</p>
<?php
    // autogegevens uit het formulier halen ----------------------------
    $autokenteken            = $_POST["autokentekenvak"];
    $automerk            = $_POST["automerkvak"];
    $autotype            = $_POST["autotypevak"];
    $autokmafstand            = $_POST["autokmafstandvak"];
    $klantid            = $_POST["klantidvak"];

    // updaten autogegevens --------------------------------------------
require_once "gar-connect.php";

$sql = $conn->prepare
("
update auto set    autokenteken     = :autokenteken,
                    automerk    = :automerk,
                    autotype = :autotype,
                    autokmafstand   = :autokmafstand
                    where   klantid = :klantid
                    ");

$sql->execute
([
    "autokenteken"        => $autokenteken,
    "automerk"        => $automerk,
    "autotype"        => $autotype,
    "autokmafstand"        => $autokmafstand,
    "klantid"        => $klantid
]);

echo "De auto is gewijzigd, <br />";
echo "<a href='gar-menu.php'> Terug naar het menu </a>";
?>
</body>
</html>