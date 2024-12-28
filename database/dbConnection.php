<?php 
$server="localhost";
$hostname= "root";
$password="";
$database= "medicalportal";

try{
    $conn = new mysqli($hostname, $username, $password, $database);
    if($conn->connect_error){
        echo "Database Error";
        exit();
    }
    echo "Database connected Successfully!";
}
catch(mysqli_sql_exception $e){
    echo "Database Error:$e";
}
?>