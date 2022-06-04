<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>./public/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>./public/css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/bc3854343b.js" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link href="./views/src/output.css" rel="stylesheet">
</head>

<body>
    <!-- navbar -->
    <section class="main">
        <header>
            <?php
            include './views/includes/navbar.php';
            ?>
        </header>

        <!-- end navbar -->

        <div class="flex items-center min-h-screen">
            <div class="container mx-auto">
                <div class="max-w-md mx-auto my-10 p-5 rounded-md shadow-sm bg-slate-100">
                    <div class="text-center">
                        <h1 class="my-3 text-4xl font-semibold text-black font-ink">Contact Us</h1>
                        <p class="text-black">Fill up the form below to send us a message.</p>
                    </div>
                    <div class="m-7">
                        <form action="https://api.web3forms.com/submit" method="POST" id="form">

                            <input type="hidden" name="apikey" value="7c7af9b3-cc19-4ede-a098-d8008687c31d">
                            <input type="hidden" name="subject" value="Message from eGifter customer">
                            <input type="checkbox" name="botcheck" id="" style="display: none;">

                            <div class="mb-6">
                                <label for="name" class="block mb-2 text-xl text-black">Full Name</label>
                                <input type="text" name="name" id="name" placeholder="Name" required class="w-full px-3 py-2 border border-black rounded-md focus:outline-none dark:bg-gray-700" />
                            </div>
                            <div class="mb-6">
                                <label for="email" class="block mb-2 text-xl text-black">Email Address</label>
                                <input type="email" name="email" id="email" placeholder="Email" required class="w-full px-3 py-2 border border-black rounded-md focus:outline-none dark:bg-gray-700" />
                             </div>
                            <div class="mb-6">
                                <label for="message" class="block mb-2 text-xl text-black ">Your Message</label>

                                <textarea rows="5" name="message" id="message" placeholder="Your Message" class="w-full px-3 py-2 border border-black rounded-md focus:outline-none dark:bg-gray-700" required></textarea>
                            </div>
                            <div class="mb-6">
                                <button type="submit" class="w-full px-3 py-4 text-black bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">Send Message</button>
                            </div>
                            <p class="text-base text-center text-gray-400" id="result">
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
</body>

<!-- footer -->
<div>
    <?php
    include './views/includes/footer.php';
    ?>
</div>
<!-- end footer -->

</html>

<script>
    const form = document.getElementById('form');
    const result = document.getElementById('result');

    form.addEventListener('submit', function(e) {
        const formData = new FormData(form);
        e.preventDefault();
        var object = {};
        formData.forEach((value, key) => {
            object[key] = value
        });
        var json = JSON.stringify(object);
        result.innerHTML = "Please wait..."

        fetch('https://api.web3forms.com/submit', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: json
            })
            .then(async (response) => {
                let json = await response.json();
                if (response.status == 200) {
                    result.innerHTML = json.message;
                    result.classList.remove('text-gray-500');
                    result.classList.add('text-green-500');
                } else {
                    console.log(response);
                    result.innerHTML = json.message;
                    result.classList.remove('text-gray-500');
                    result.classList.add('text-red-500');
                }
            })
            .catch(error => {
                console.log(error);
                result.innerHTML = "Something went wrong!";
            })
            .then(function() {
                form.reset();
                setTimeout(() => {
                    result.style.display = "none";
                }, 5000);
            });
    })
</script>