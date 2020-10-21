<?php

$servername = 'localhost';
$username = 'root';
$password = "";
$database = "id14543830_mocussd";
//$dbport = 3306;

$db = new mysqli($servername, $username, $password, $database);

// Checks the Database Connection
if ($db->connect_error) {
    header('Content-type: text/plain');
    die("END An Error Occurred");
}
