<!DOCTYPE html>
<html lang="en">
<?php 
 include('head.php');
?>
<body>
    <div class="row">
        <div class="col-7 d-flex justify-content-center align-items-center">
            <div class="row col-12">
                <div class="col-2"></div>
                <div class="col-8 ">
                    <h1 class="text-center mar">Welcome to Origin Gamer</h1>
                    <label for="inputName" class="form-label">Full Name</label>
                    <input type="text" class="form-control mar" id="inputName" placeholder="Enter your Full Name">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control mar" id="inputEmail4" placeholder="Enter your Email here">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control mar" id="inputPassword4" placeholder="Enter your Password">
                    <div class="text-center">
                        <button class="login-button">Create Account</button>
                        <p>Already have an account?&nbsp;<a href="logIn.php">Log in</a></p>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
        <div class="col-5 log-image">
            <img class="w-100" src="img/signUp.jpg" alt="">
        </div>
    </div>
</body>
</html>