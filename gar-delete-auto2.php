<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>gar-delete-auto2.php</title>
</head>
<body>
<h1>garage delete auto 2</h1>
<p>
    op autokenteken gegevens zoeken uit de tabel klanten van de
    database garage zodat ze verwijderd kunnen worden.
</p>
<?php
//autoid uit het formulier halen ------------------------------------
$autokenteken = $_POST["autokentekenvak"];

//autogegevens uit de tabel halen -----------------------------------
require_once "gar-connect.php";

$autos = $conn->prepare("
                                select  autokenteken,
                                        automerk,
                                        autotype,
                                        autokmafstand,
                                        klantid
                                from    auto
                                where   autokenteken = :autokenteken
                                ");
$autos->execute(["autokenteken" => $autokenteken]);

//autogegevens laten zien ---------------------------------------
echo "<table>";
foreach($autos as $auto)
{
    echo "<tr>";
    echo "<td>" . $auto["autokenteken"]          . "</td>";
    echo "<td>" . $auto["automerk"]        . "</td>";
    echo "<td>" . $auto["autotype"]       . "</td>";
    echo "<td>" . $auto["autokmafstand"]    . "</td>";
    echo "<td>" . $auto["klantid"]      . "</td>";
    echo "</tr>";
}
echo "</table><br />";

echo "<form action='gar-delete-auto3.php' method='post'>";
//klantid mag niet gewijzigd worden
echo "<input type='hidden' name='autokentekenvak' value=$autokenteken>";
//waarde 0 doorgeven als er niet gecheckt word
echo "<input type='hidden' name='verwijdervak' value='0'>";
echo "<input type='checkbox' name='verwijdervak' value='1'>";
echo "Verwijder deze auto. <br />";
echo "<input type ='submit'>";
echo "</form>";
?>
</body>
</html>