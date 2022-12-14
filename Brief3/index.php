<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('pages/head.php');
    ?>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body class="sign-body" style="overflow: hidden;">
    <div class="row img-contain">
        <div class="col-7 d-flex justify-content-center align-items-center form-contain">
            <div class="row col-12">
                <div class="col-2"></div>
                <div class="col-8 form-bg">
                    <h1 class="text-center mar welcome">Welcome to Origin Game</h1>
                    <form action="config/scripts.php" method="POST" data-parsley-validate>
                        <?php if (isset($_SESSION['message'])) : ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                                <strong>Oops!</strong>
                                <?php
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                                ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
                            </div>
                        <?php endif ?>
                        <div class="mar">
                            <label for="inputName" class="form-label">Full Name</label>
                            <input name="name" type="text" class="form-control" id="inputName" placeholder="Enter your Full Name" data-parsley-trigger="keyup" data-parsley-minlength="3" required>
                        </div>
                        <div class="mar">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Enter your Email here" data-parsley-trigger="keyup" data-parsley-type="email" required>
                        </div>
                        <div class="mar">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="inputPassword4" placeholder="Enter your Password" data-parsley-trigger="keyup" required>
                        </div>

                        <div class="text-center mar">
                            <button type="submit" name="save" class="login-button">Create Account</button>
                            <p>Already have an account?&nbsp;<a href="pages/logIn.php">Log in</a></p>
                        </div>
                    </form>

                </div>
                <div class="col-2"></div>
            </div>
        </div>
        <div class="col-5 log-image">
            <img class="w-100" src="assets/img/signUp.jpg" alt="">
        </div>
    </div>

    <script src="assets/main.js"></script>
</body>

</html>