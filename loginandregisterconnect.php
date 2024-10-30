<?php

$host='localhost';
$user='root';
$pass='';
$db='realhome_loginandregister';
$conn= new mysqli($host,$user,$pass,$db);
if($conn->connect_error){
    die("Connection Failed: " .$conn->connect_error);
}

?>