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
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>./public/css/login.css">
</head>

<body class="flex items-center justify-center flex-col text-center">
    <?php
    include './views/includes/alerts.php';
    ?>

    <!-- form -->
    <h1 class="text-3xl md:text-5xl font-ink text-[#FBF8F3] text-center m-3">Sign into your account</h1>
    <form method="post" class="md:flex justify-center flex-col">
        <div class="form-control w-96 xl:w-96">
            <input type="text" class="text-[#080808] md:w-96 p-3 m-3 border-2 border-black text-base font-proza rounded-full " placeholder="Enter your username" name="username">
        </div>
        <div class="form-control xl:w-96">
            <input id="password" class="md:w-96 p-3 m-3 rounded-full border-2 border-black text-base font-proza" type="password" placeholder="Enter your password" name="password">
        </div>
        <button name="submit" class="bg-[#CC0000] text-[#FBF8F3] rounded-full md:w-96 w-1/2 text-center h-auto p-3 m-3 cursor-pointer font-bold font-proza duration-500">LOGIN</button>
    </form>
    <h6 class="font-proza text-[#FBF8F3] text-xl p-4">Dont have an account ? <a href="<?php echo BASE_URL; ?>register" class="text-[#CC0000] underline">Register</a></h6>
    <!-- end form -->
</body>

</html>