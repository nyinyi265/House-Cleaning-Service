<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
    <header class="h-[700px] bg-white dark:bg-blue-800 shadow"> <!-- to change the background color -->
        <div class="h-full">
            {{ $header }}
        </div>
    </header>
    @endif

    <section class="h-[400px] relative slider-container mb-[5%]">
        <!-- Background Image -->
        <div class="slider-img absolute top-0 left-0 w-full h-full bg-slate-200">
            <img src="{{asset('img/Window Cleaning.jpg')}}" alt="" class="relative w-full h-full object-cover">
        </div>

        <div class="absolute top-[50%] left-[50%] transform -translate-x-[50%] -translate-y-1/2 bg-black bg-opacity-40 p-5 rounded-md z-10">
            <h1 class="text-white text-4xl font-bold text-center">About Crystal Clear</h1>
            <h3 class="text-white text-1xl mt-2">Bringing sparkle and shine to homes since 2022</h3>
        </div>
    </section>

    <div class="w-[70%] mx-auto mb-[3%]">
        <div class="flex flex-col items-center p3 mt-[5%]">
            <h1 class="text-black text-4xl text-justify font-bold">Our Story</h1>

            <p class="text-lg mt-[2%]">
                Crystal Clear was founded in 2010 with one simple goal: to provide high-quality cleaning services that make homes shine. What started as a small team of passionate cleaners has grown into a trusted name in housekeeping across the region. </p>

            <p class="text-lg mt-[2%]">
                We take pride in our attention to detail, use of eco-friendly products, and our commitment to customer satisfaction. Our team of professionals is trained to handle all aspects of home cleaning, ensuring that every corner of your home sparkles.
            </p>

            <h2 class="text-black text-2xl text-justify font-bold mt-[3%]">Our Journey</h2>

            <p class="text-lg mt-[2%] text-justify">
                Over the years, we’ve built our reputation by focusing on what matters most—attention to detail, using eco-friendly cleaning products, and ensuring every customer is happy with our service. From cleaning every corner to removing tough stains, we treat each home with care and respect.
            </p>

            <h2 class="text-black text-2xl text-justify font-bold mt-[3%]">What We Promise</h2>

            <ul class="w-[95%]">
                <li class="flex items-center justify-start mt-[2%]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="green" class="bi bi-check2-circle mr-[1%]" viewBox="0 0 16 16">
                        <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                        <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                    </svg>
                    <p class="text-lg text-justify">
                        Eco-Friendly Cleaning: We use safe, environmentally friendly products that are good for your home and the planet.
                    </p>
                </li>

                <li class="flex items-center justify-start mt-[1%]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="green" class="bi bi-check2-circle mr-[1%]" viewBox="0 0 16 16">
                        <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                        <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                    </svg>
                    <p class="text-lg text-justify">
                        Customer Satisfaction: We listen to your needs and customize our services to make sure you’re happy every time.
                    </p>
                </li>

                <li class="flex items-center justify-start mt-[1%]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="green" class="bi bi-check2-circle mr-[1%]" viewBox="0 0 16 16">
                        <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                        <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                    </svg>
                    <p class="text-lg text-justify">
                        Trustworthy Team: Our cleaners are trained, experienced, and background-checked, so you can trust us in your home.
                    </p>
                </li>
            </ul>

            <h2 class="text-black text-2xl text-justify font-bold mt-[3%]">Why Choose Us?</h2>

            <p class="text-lg mt-[2%] text-justify">
                Crystal Clear is more than just a cleaning service; we aim to make your home feel fresh and inviting. Whether you need a one-time clean or regular housekeeping, we’re here to help.
            </p>

            <h2 class="text-black text-2xl text-justify font-bold mt-[3%]">Looking Ahead</h2>

            <p class="text-lg mt-[2%] text-justify">
                We’re always working to improve, whether by using new cleaning technology, offering even more eco-friendly options, or continuing to provide the best service we can.
            </p>

            <p class="text-xl mt-[2%] text-center">
                Thank you for trusting Crystal Clear to keep your home sparkling since 2010.
            </p>
        </div>
    </div>

    <hr>

    <div class="w-full h-[500px] my-[3%]">
        <h1 class="text-center text-4xl text-black font-bold px-20px">Our Values</h1>

        <div class="flex w-full h-full items-center justify-evenly">
            <div class="flex flex-col w-[30%] h-[80%] bg-white rounded-xl p-5 items-center shadow-[15px_30px_40px_-10px_rgba(0,0,0,0.3)] shadow-balck border-[3px] border-[#14C38E]">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="green" class="bi bi-patch-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                    <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z" />
                </svg>
                <h1 class="text-2xl font-bold text-center mt-5">Quality</h1>
                <p class="text-lg text-justify mt-5">
                    "We deliver excellence in every detail, from deep cleaning to everyday tasks. Every job, big or small, is handled with care, precision, and a focus on perfection. Our team is dedicated to leaving your home spotless, fresh, and welcoming, ensuring your satisfaction with consistent and outstanding results every time."
                </p>
            </div>

            <div class="flex flex-col w-[30%] h-[80%] bg-white rounded-xl p-5 items-center shadow-[15px_30px_40px_-10px_rgba(0,0,0,0.3)] shadow-balck border-[3px] border-[#000000]">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                </svg>
                <h1 class="text-2xl font-bold text-center mt-5">Trust</h1>
                <p class="text-lg text-justify mt-5">
                    "Your trust is our top priority. We are committed to building strong, lasting relationships by delivering reliable, transparent, and consistent services. Our team values your confidence and works diligently to meet your expectations with professionalism and integrity." </p>
            </div>

            <div class="flex flex-col w-[30%] h-[80%] bg-white rounded-xl p-5 items-center shadow-[15px_30px_40px_-10px_rgba(0,0,0,0.3)] shadow-balck border-[3px] border-[#14C38E]">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="green" class="bi bi-globe-americas" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484q-.121.12-.242.234c-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z" />
                </svg>
                <h1 class="text-2xl font-bold text-center mt-5">Eco-Friendly</h1>
                <p class="text-lg text-justify mt-5">
                    "We care for your home and the planet. That’s why we use eco-friendly products and sustainable practices, ensuring a safe, healthy environment for your family. Our commitment to green cleaning helps protect future generations while delivering the same spotless results you expect."
                </p>
            </div>

        </div>
    </div>

    @include('layouts.footer')
</body>

</html>
