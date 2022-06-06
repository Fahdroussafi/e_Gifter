<?php

    $loginUser = new UsersController();
    $loginUser->auth();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://fonts.cdnfonts.com/css/proza-libre" rel="stylesheet">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>./public/css/login.css">
</head>

<body>
<?php
include './views/includes/alerts.php';
?>

    <!-- form -->
    <div class="right">
        <div class="container">
            <h1>Sign into your account</h1>
            <form method="post">
                <div class="input-group">
                    <input type="text" class="text-[#080808]" placeholder="Enter your username" name="username">
                </div>
                <div class="input-group">
                    <input id="password"class="text-[#080808]" type="password" placeholder="Enter your password" name="password">

                </div>
                <button name="submit" class="btn-submit">LOGIN</button>
        </div>
        </form>
        <h6>Dont have an account ? <a href="<?php echo BASE_URL; ?>register">Register</a></h6>

        <!-- end form -->
</body>

</html>