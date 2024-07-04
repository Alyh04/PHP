<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="lorniot";

//creation d'une connexion
$conn = new mysqli($servername,$username,$password,$dbname);

//verification de la connexion
if($conn->connect_error) {
    die("Connection réussi :" . $conn->connect_error);
}
?>