<?php
if (isset($_SESSION["logged"]) && $_SESSION["logged"] === true) {
  Redirect::to("home");
}
if (isset($_POST["submit"])) {
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
  <title>Register</title>
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>./public/css/login.css">
  <link rel="stylesheet" href="file:C:/Users/YC/Desktop/fontawesome/css/all.css">
  <link href="http://fonts.cdnfonts.com/css/proza-libre" rel="stylesheet">
  <script src="https://kit.fontawesome.com/bc3854343b.js" crossorigin="anonymous"></script>

</head>

<body class="flex items-center justify-center flex-col text-center">
  <?php
  include './views/includes/alerts.php';
  ?>
  <!-- form -->

  <h1 class="text-3xl md:text-5xl font-ink text-[#FBF8F3] text-center m-3">Create your account</h1>
  <form method="post" class="md:flex justify-center flex-col">
    <div class="form-control w-96 xl:w-96">
      <input type="text" placeholder="Enter your full name" name="fullname" class="text-[#080808] md:w-96 p-3 m-3 border-2 border-black text-base font-proza rounded-full ">
    </div>
    <div class="form-control w-96 xl:w-96">
      <input type="text" placeholder="Enter your username" name="username" class="text-[#080808] md:w-96 p-3 m-3 border-2 border-black text-base font-proza rounded-full">
    </div>
    <div class="form-control w-96 xl:w-96">
      <input type="text" placeholder="Enter your email" name="email" class="text-[#080808] md:w-96 p-3 m-3 border-2 border-black text-base font-proza rounded-full">
    </div>
    <div class="form-control w-96 xl:w-96">
      <input type="password" placeholder="Enter your password" name="password" min="6" class="text-[#080808] md:w-96 p-3 m-3 border-2 border-black text-base font-proza rounded-full">
    </div>
    <button name="submit" class="bg-[#CC0000] text-[#FBF8F3] rounded-full md:w-96 w-1/2 text-center h-auto p-3 m-3 cursor-pointer font-bold font-proza duration-500">Register</button>
    </div>
  </form>
  <h6 class="font-proza text-[#FBF8F3] text-xl p-4">Have an account ? <a href="<?php echo BASE_URL; ?>login" class="text-[#CC0000] underline">Login</a></h6>

  </div>
  <!-- end form -->
</body>

</html>