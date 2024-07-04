<?php

try{
$bd = new PDO("mysql:host=localhost;dbname=lorniot","root","");
} catch(Exception $e){
    $e->getMessage();
}

?>