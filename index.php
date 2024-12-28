<?php 
session_start();
if(!isset($_SESSION["email"])){
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <p>Welcome <?php echo $_SESSION["email"]; ?><a href="logout.php">Logout</a></p>
</body>
</html>