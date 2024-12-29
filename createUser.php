<?php

include("./database/dbConnection.php");

session_start();
if (isset($_SESSION["id"])){
    header("Location:index.php");
}
else{
    header("Location:login.php");
}

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['password'];
$hashedPassword=password_hash($password,PASSWORD_DEFAULT);

global $conn;

try{
    $res=mysqli_query($conn,"INSERT INTO `users` (firstname,lastname,email,password,createdat) VALUES ('$firstname','$lastname','$email','$hashedPassword',NOW())");
    if($res){
        echo("Added Successfully!");
    }
}
catch(PDOException $e) {
    echo "". $e->getMessage();
}

?>