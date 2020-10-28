<?php
$servername = "localhost"; //////////////local Serve
$usern = "root"; ////////////// username
$pword = ""; ////////////// password = null
$dbname = "sidehustle";

// Create connection
echo "connecting to ". $dbname . " Database ...<br>";
try {
    $sonawap = new PDO("mysql:host=$servername;dbname=$dbname", $usern, $pword);
    $sonawap->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected to ". $dbname . " Database ...<br>";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?> 