<title>Contact</title>

<body>
    <!-- navbar -->
    <section class="main">

        <?php
        include './views/includes/navbar.php';
        ?>

        <!-- end navbar -->

        <div class="flex items-center min-h-screen">
            <div class="container mx-auto">
                <div class="max-w-3xl mx-auto my-10 p-5 rounded-md shadow-sm bg-[#FBF8F3] ">
                    <div class="text-center">
                        <h1 class="my-3 text-5xl font-semibold text-[#080808] font-ink">Contact Us</h1>
                    </div>
                    <div class="m-7">
                        <form action="https://api.web3forms.com/submit" method="POST" id="form">

                            <input type="hidden" name="apikey" value="4b172a97-2657-44ba-bcd6-8c5dd3520125">
                            <input type="hidden" name="subject" value="Message from an eGifter customer">
                            <input type="checkbox" name="botcheck" id="" style="display: none;">

                            <div class="mb-6">
                                <label for="name" class="block mb-2 text-xl font-proza text-[#080808]">Full Name</label>
                                <input type="text" name="name" id="name" placeholder="Name" required class="w-full px-3 py-2 border border-[#080808] rounded-md focus:outline-none dark:bg-gray-700" />
                            </div>
                            <div class="mb-6">
                                <label for="email" class="block mb-2 text-xl font-proza text-[#080808]">Email Address</label>
                                <input type="email" name="email" id="email" placeholder="Email" required class="w-full px-3 py-2 border border-[#080808] rounded-md focus:outline-none dark:bg-gray-700" />
                            </div>
                            <div class="mb-6">
                                <label for="message" class="block mb-2 text-xl font-proza text-[#080808] ">Your Message</label>

                                <textarea rows="5" name="message" id="message" placeholder="Your Message" class="w-full px-3 py-2 border border-[#080808] rounded-md focus:outline-none dark:bg-gray-700" required></textarea>
                            </div>
                            <div class="mb-6">
                                <button type="submit" class="bg-[#CC0000] text-[#FBF8F3] rounded-full w-full text-center h-10 cursor-pointer font-bold font-proza duration-500 ease-in-out hover:scale-95">Send Message</button>
                            </div>
                            <p class="text-base text-center text-[#080808]" id="result">
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