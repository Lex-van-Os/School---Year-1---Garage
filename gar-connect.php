<?php
// gar-connect.php
// makt een connectie met de database 'garage'
// Lex van Os

$servername = "localhost";
$dbname = "garage";
$username = "root";
$password = "";

try
{
    $conn = new PDO ("mysql:host=$servername;dbname=$dbname",
        $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connectie gelukt <br />";
}
catch(PDOException $e)
{
    echo "Connectie mislukt: " . $e->getMessage();
}
?>