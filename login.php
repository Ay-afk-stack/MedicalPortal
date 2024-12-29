<?php
session_start();
if (isset($_SESSION["id"])){
    header("Location:index.php");
}
$cookiename;
if(isset($_COOKIE["email"])){
    $cookiename = $_COOKIE["email"];
}else{
    $cookiename="";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./includes/style.css">
</head>
<body>
    <div class="login-container">
        <form method="POST">
                <h1><box-icon name='plus-medical'></box-icon> Laphasurgimed</h1>
                <hr>
                <div class="loginusing">  
                    <a href="#"><box-icon type='logo' name='google' color="white"></box-icon>Login with Google</a>
                    <a href="#"><box-icon type='logo' name='facebook' color="white"></box-icon>Login with Facebook</a>
                </div>
                    <div class="divider">
                    Or Login using Email
                </div>
                <input type="email" name="email" id="email" placeholder="Email" value=<?php echo $cookiename ?>>
                <span id="emailSpan"></span>
                <input type="password" name="password" id="password" placeholder="Password">
                <span id="passwordSpan"></span>
                <div class="rememberMeBox">
                    <div>
                        <input type="checkbox" class="rememberMe" id="rememberMe" checked>
                        <label for="rememberMe">Remember me?</label>
                    </div>
                    <div class="forgotme">
                        <a href="#">Forgot Password?</a>
                    </div>
                </div>
                <input type="button" class="loginBtn" id="loginBtn" value="Login">
                <hr>
                <div class="registerRedirect">
                    <p>Dont have an account? <a href="./registration.php">Create account</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="./includes/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script>
        $(document).ready(()=>{
            $("#email").keyup(()=>{
                var email=$("#email").val();
                if(email===""){
                    $("#emailSpan").html("*Email Required!")
                }
                else{
                    $("#emailSpan").html("")
                }
            }),
            $("#password").keyup(()=>{
                var password=$("#password").val();
                if(password===""){
                    $("#passwordSpan").html("*Password Required!")
                }
                else{
                    $("#passwordSpan").html("")
                }
            }),
            $("#loginBtn").click(()=>{
                var email=$("#email").val();
                var password=$("#password").val()
                var rememberMe=false;
                if(email&& password){
                    if($("#rememberMe").is(":checked")){
                        rememberMe=true;
                        alert(email+password+rememberMe)
                    }
                    else{
                        rememberMe=false
                        alert(email+password+rememberMe)
                    }

                    $.ajax({
                        url:"userValidate.php",
                        method:"POST",
                        data:{
                            email,
                            password,
                            rememberMe
                        },
                        success:()=>{
                            window.location.assign("index.php")
                        }
                    })
                }
                else{
                    alert("Invalid Credentials")
                }
            })
        })
    </script>

</body>
</html>