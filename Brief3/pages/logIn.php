<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    include('head.php');
    ?>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body style="overflow: hidden;">
    <div class="row">
        <div class="col-5 log-image">
            <img class="w-100" src="../assets/img/logIn.jpg" alt="">
        </div>
        <div class="col-7 d-flex justify-content-center align-items-center">
            <div class="row col-12">
                <div class="col-2"></div>
                <div class="col-8 ">
                    <h1 class="text-center mar">Welcome to Origin Gamer</h1>
                    <form action="scripts.php" method="POST">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control mar" id="inputEmail4" placeholder="Enter your Email here">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control mar" id="inputPassword4" placeholder="Enter your Password">
                        <div class="text-center">
                            <button type="submit" name="log-in" class="login-button">Log in</button>
                            <p>Or create account?&nbsp;<a href="../index.php">Sign up</a></p>
                        </div>
                    </form>

                </div>
                <div class="col-2"></div>
            </div>

        </div>
    </div>
</body>
</html>