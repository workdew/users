<?php
GLOBAL $conn;


$host = "localhost";
$username = "root";
$password = "";
$dbname = "data";

 
$host = 'localhost';
$db   = 'dbase';
$user = 'root';
$pass = '';

 
$dsn = "mysql:host=$host;dbname=$dbname; $username, $password";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$conn = new PDO($dsn, $user, $pass, $options);
 

function redirect($location)
{
    header('location:' . $location);
    exit();
}
?>