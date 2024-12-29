<?php
include("./database/dbConnection.php");

session_start();
if (isset($_SESSION["id"])){
    header("Location:index.php");
}
else{
    header("Location:login.php");
}

global $conn;

$email=$_POST['email'];
$p=$_POST['password'];
$rememberme=$_POST['rememberMe'];

$select_query="SELECT * FROM `users` WHERE email='$email'";
$result=mysqli_query($conn,$select_query);

if(mysqli_num_rows($result)> 0){
    $row=mysqli_fetch_array($result);
    $id=$row['id'];
    $password=$row['password'];
    if(password_verify($p,$password)){
        if($rememberme=="true"){
            $_SESSION["id"]=$id;   
            setcookie("email",$email,time()+1800,"/",secure:true);
        }
        else{
            $_SESSION["id"]=$id;
        }
    }
    else{
        exit();
        // header("Location:index.php?e=Invalid credentials");
    }
}

?>