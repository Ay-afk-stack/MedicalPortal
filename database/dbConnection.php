<?php 
$server="localhost";
$username= "root";
$password="";
$database= "medicalportal";

$conn = new mysqli($server, $username, $password, $database);
if($conn->connect_error){
    echo "Database Error";
    exit();
}
?>