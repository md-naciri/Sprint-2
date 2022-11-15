<!DOCTYPE html>
<html lang="en">
<?php 
 include('head.php');
?>
<body>
    <div class="row">
        <div class="col-5 log-image">
            <img class="w-100" src="img/logIn.jpg" alt="">
        </div>
        <div class="col-7 d-flex justify-content-center align-items-center">
            <div class="row col-12">
                <div class="col-2"></div>
                <div class="col-8 ">
                    <h1 class="text-center mar">Welcome to Origin Gamer</h1>
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control mar" id="inputEmail4" placeholder="Enter your Email here">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control mar" id="inputPassword4" placeholder="Enter your Password">
                    <div class="text-center">
                        <button class="login-button">Log in</button>
                        <p>Or create account?&nbsp;<a href="signUp.php">Sign up</a></p>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>

        </div>
    </div>
</body>
</html>