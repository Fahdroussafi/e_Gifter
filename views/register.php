<?php
    if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true){
        Redirect::to("home");
    }
    if(isset($_POST["submit"])){
        $createUser = new UsersController();
        $createUser->register();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo BASE_URL;?>./public/css/login.css">
    <link rel="stylesheet" href="file:C:/Users/YC/Desktop/fontawesome/css/all.css">
    <link href="http://fonts.cdnfonts.com/css/proza-libre" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bc3854343b.js" crossorigin="anonymous"></script>

</head>

<body>

     <!-- form -->
    <div class="right">

        <div class="container">
        <h1>Create your account</h1>
        <form method="post">
        <div class="input-group">
                <input type="text" placeholder="Enter your full name" name="fullname">
        </div>     
        <div class="input-group">
				<input type="text" placeholder="Enter your username" name="username">
        </div>
        <div class="input-group">
				<input type="text" placeholder="Enter your email" name="email">
        </div>
        <div class="input-group">
				<input type="password" placeholder="Enter your password" name="password">
        </div>
        <button name="submit" class="btn-submit">Register</button>

        </div>
            </form>
            <h6>Have an account ? <a href="<?php echo BASE_URL;?>login">Login</a></h6>

        </div>
        <!-- end form -->
</body>

</html>