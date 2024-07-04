<?php

// $con = new mysqli('localhost','root','','lorniot');

// if(!$con){
//     die(mysqli_error($con));
// }
try{
$con = new PDO("mysql:host=localhost;dbname=lorniot","root","");
} catch(Exception $e){
    $e->getMessage();
}
?>