<?php

// New task
// Connect to database using the mysqli method 
// by Sonawap for sidehustle
$servername = "localhost"; //////////////local Serve
$usern = "root"; ////////////// username
$pword = ""; ////////////// password = null
$dbname = "sidehustle";

// Create connection
echo "connecting to ". $dbname . " Database ...<br>";
$sonawap = new mysqli($servername, $usern, $pword, $dbname);

// Check connection
if ($sonawap->connect_error) {
    echo "Connection failed: " . $sonawap->connect_error;
}else{
    ///echo "connect";
    echo "connected to ". $dbname . " Database ...<br>";
}

?> 