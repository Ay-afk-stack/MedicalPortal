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
        <form>
        <div class="register-header">
            <h2><box-icon name='plus-medical'></box-icon> Laphasurgimed</h2>
        </div>
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
    <script src="./includes/script.js"></script>
</body>
</html>