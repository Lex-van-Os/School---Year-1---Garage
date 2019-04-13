<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>gar-create-klant2.php</title>
</head>
<body>
<h1>garage create auto 2</h1>
<p>
    Een auto toevoegen aan de tabel
    auto in de database garage.
</p>
<?php
    // klantgegevens uit het formulier halen -----------------------
    $autokenteken          = $_POST["autokentekenvak"];
    $automerk         = $_POST["automerkvak"];
    $autotype      = $_POST["autotypevak"];
    $autokmafstand        = $_POST["autokmafstandvak"];
    $klantid        = $_POST["klantidvak"];

    // klantgegevens invoeren in de tabel ---------------------------
    require_once "gar-connect.php";

    $sql = $conn->prepare("
    insert into auto values
    (
    :autokenteken, :automerk,
    :autotype, :autokmafstand, :klantid
    )
    ");
    // manier 1 (of manier 2 gebruiken)-------------------------------
    // $sql->bindParam(":klantid",                  $klantid);
    // $sql->bindParam(":klantnaam",                $klantnaam);
    // $sql->bindParam(":klantadres",               $klantadres);
    // $sql->bindParam(":klantposcode",             $klantpostcode);
    // $sql->bindParam(":klantplaats",              $klantplaats);

    //$sql-> execute();

    // manier 2 --------------------------------------------------------
    $sql->execute([
        "autokenteken"           => $autokenteken,
        "automerk"           => $automerk,
        "autotype"           => $autotype,
        "autokmafstand"           => $autokmafstand,
        "klantid"           => $klantid,
    ]);

    echo "De auto is toegevoegd <br />";
    echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>