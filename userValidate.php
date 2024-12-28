<?php
include("./database/dbConnection.php");

session_start();
if (isset($_SESSION["email"])){
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
    $firstname=$row['firstname'];
    $password=$row['password'];
    if(password_verify($p,$password)){
        if($rememberme=="true"){
            $_SESSION["email"]=$email;
            $_SESSION["password"]=$password;    
            setcookie("email",$email,time()+60,"/",secure:true);
        }
        else{
            $_SESSION["email"]=$email;
            $_SESSION["password"]=$password;
        }
    }
    else{
        exit();
        // header("Location:index.php?e=Invalid credentials");
    }
}

?>