<?php
session_start();
if (isset($_SESSION["id"])){
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="./includes/style.css">
</head>
<body>
    <div class="register-form">
        <form method="post">
        <div class="register-header">
            <h1><box-icon name='plus-medical'></box-icon> Laphasurgimed</h1>
        </div>
        <hr>
        <div class="name-container">
            <div class="nameField">
                <label for="firstname">First name</label>
                <input type="text" class="firstname" id="firstname" placeholder="First Name">
                <span id="firstnameSpan"></span>
            </div>
            <div class="nameField">
                <label for="lastname">Last name</label>
                <input type="text" class="lastname" id="lastname" placeholder="Last Name">
                <span id="lastnameSpan"></span>
            </div>
            </div>
                <label for="email">Email</label>
                <input type="email" class="email" id="email" placeholder="Email">
                <span id="emailSpan"></span>
                <label for="password">Password</label>
                <input type="password" class="password" id="password" placeholder="Password">
                <div class="passwordValidation">
                    <span id="lengthSpan" class="invalid">Minimum 8 characters</span>
                    <span id="uppercaseSpan" class="invalid">Atleast one uppercase letter</span>
                    <span id="specialSpan" class="invalid">Atleast one special character</span>
                    <span id="numberSpan" class="invalid">Atleast one number</span>
                </div>
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="cpassword" id="cpassword" placeholder="Confirm Password">
                <span id="cpasswordSpan"></span>
            <input type="button" value="Create Account" id="registerBtn" class="registerBtn">
            <div class="loginRedirect">
                <hr>
                <p>Already have an account?<a href="login.php">Login</a></p>
            </div>
        </form>
    </div>
    <script src="./includes/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script>
        //Registration Validation
        var firstnameValid = false;
        var lastnameValid = false;
        var emailValid = false;
        var passwordValid = false;
        var cpasswordValid = false;

        $(document).ready(
        $("#firstname").keyup(() => {
            const firstname = $("#firstname").val();
            if (firstname === "") {
            $("#firstnameSpan").html("First name required!");
            firstnameValid = false;
            } else {
            $("#firstnameSpan").html("");
            firstnameValid = true;
            }
        }),
        $("#lastname").keyup(() => {
            const lastname = $("#lastname").val();
            if (lastname === "") {
            $("#lastnameSpan").html("Last name required!");
            lastnameValid = false;
            } else {
            $("#lastnameSpan").html("");
            lastnameValid = true;
            }
        }),
        $("#email").keyup(() => {
            const email = $("#email").val();
            if (email === "") {
            $("#emailSpan").html("Email required!");
            emailValid = false;
            } else {
            if (email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
                $("#emailSpan").html("");
                emailValid = true;
            } else {
                $("#emailSpan").html("Invalid Email Format!");
                emailValid = false;
            }
            }
        }),
        $("#password").keyup(() => {
            const password = $("#password").val();
            if (password.match(/[A-Z]/)) {
            $("#uppercaseSpan").removeClass("invalid").addClass("valid");
            passwordValid = true;
            } else {
            $("#uppercaseSpan").removeClass("valid").addClass("invalid");
            passwordValid = false;
            }
            if (password.match(/[0-9]/)) {
            $("#numberSpan").removeClass("invalid").addClass("valid");
            passwordValid = true;
            } else {
            $("#numberSpan").removeClass("valid").addClass("invalid");
            passwordValid = false;
            }
            if (password.match(/[!@#$%^&*(),.?":{}|]/)) {
            $("#specialSpan").removeClass("invalid").addClass("valid");
            passwordValid = true;
            } else {
            $("#specialSpan").removeClass("valid").addClass("invalid");
            passwordValid = false;
            }
            if (password.length > 8) {
            $("#lengthSpan").removeClass("invalid").addClass("valid");
            passwordValid = true;
            } else {
            $("#lengthSpan").removeClass("valid").addClass("invalid");
            passwordValid = false;
            }
            $("#cpassword").keyup(() => {
            const cpassword = $("#cpassword").val();
            if (cpassword === password) {
                $("#cpasswordSpan").html("");
                cpasswordValid = true;
            } else {
                $("#cpasswordSpan").html("Password doesn't match.").css("color", "red");
                cpasswordValid = false;
            }
            });
        }),
        $("#registerBtn").click(() => {
            if (
            firstnameValid &&
            lastnameValid &&
            emailValid &&
            passwordValid &&
            cpasswordValid
            ) {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            var email = $("#email").val();
            var password = $("#password").val();
            $.ajax({
                url: "createUser.php",
                method: "POST",
                data: {
                firstname,
                lastname,
                email,
                password,
                },
                success: () => {
                alert("User Added")
                window.location.assign("login.php");
                }
            });
            }
            else{
                alert("Fill all the Details Correctly!")
            }
        })
        );
    </script>
</body>
</html>