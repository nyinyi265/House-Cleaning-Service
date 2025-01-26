<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans ">
    <div class="min-h-screen">
        @include('layouts.navigation')

        @if (isset($header))
            <header class="bg-white dark:bg-blue-400 shadow">
                <div class="mx-auto">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            <div class="w-full h-[500px]">
                <h1 class="text-black text-3xl font-bold text-center mt-[30px]">Our Services</h1>
                <div class="flex w-full h-[90%] justify-evenly p-10 card-container">
                    <a href="{{route('service')}}">
                        <div class="w-[400px] h-[350px] card group relative overflow-hidden rounded-lg">

                            <div class="w-full h-full">
                                <img src="{{asset('img/Regular Cleaning.jpg')}}" alt="" class="h-full w-full object-cover rounded-lg">
                            </div>

                            <h1 class="absolute bottom-[-50%] left-0 right-0 text-center text-2xl font-bold text-white bg-black bg-opacity-50 py-2 transition-all duration-500 group-hover:bottom-0">
                                Regular Cleaning
                            </h1>
                        </div>
                    </a>

                    <a href="{{route('service')}}">
                        <div class="w-[400px] h-[350px] card group relative overflow-hidden rounded-lg">
                            <!-- Image -->
                            <div class="w-full h-full">
                                <img src="{{asset('img/Deep Cleaning.jpg')}}" alt="" class="h-full w-full object-cover rounded-lg">
                            </div>
                            <!-- Text (hidden initially, appears on hover) -->
                            <h1 class="absolute bottom-[-50%] left-0 right-0 text-center text-2xl font-bold text-white bg-black bg-opacity-50 py-2 transition-all duration-500 group-hover:bottom-0">
                                Deep Cleaning
                            </h1>
                        </div>
                    </a>

                    <a href="{{route('service')}}">
                        <div class="w-[400px] h-[350px] card group relative overflow-hidden rounded-lg">
                            <!-- Image -->
                            <div class="w-full h-full">
                                <img src="{{asset('img/Move-in Move-out.jpg')}}" alt="" class="h-full w-full object-cover rounded-lg">
                            </div>
                            <!-- Text (hidden initially, appears on hover) -->
                            <h1 class="absolute bottom-[-50%] left-0 right-0 text-center text-2xl font-bold text-white bg-black bg-opacity-50 py-2 transition-all duration-500 group-hover:bottom-0">
                                Move-in Move-out
                            </h1>
                        </div>
                    </a>
                </div>
            </div>


            <div class="flex w-full h-[450px] mb-[80px]">
                <div class="w-[55%] p-2 text-white text-center self-center px-[20px]">
                    <h1 class="text-2xl text-black font-bold mt-[5%]">"Welcome to 'Crystal Clear' – Where Cleanliness Meets Comfort!"</h1>
                    <p class="text-black text-justify px-[8%] mt-[2%]">
                        At Crystal Clear, we believe that a clean and organized home is more than just a necessity; it’s the foundation of a healthier, happier lifestyle. We specialize in providing top-notch housekeeping services tailored to meet your unique needs, ensuring every corner of your home sparkles with perfection.</p>
                    <p class="text-black text-justify px-[8%] mt-[2%]">
                        Whether you need regular cleaning, a deep clean, or special event preparation, our dedicated team of professionals is here to transform your living spaces into a spotless sanctuary. With a commitment to excellence, attention to detail, and eco-friendly practices, we guarantee not just a clean home but peace of mind.
                    </p>
                </div>
                <div class="w-[45%] h-[500px] p-5 mr-[15px]">
                    <div class="relative">
                        <img src="{{asset('img/PCS.jpeg')}}" alt="" class="w-full h-full blur-sm rounded-xl opacity-70">
                    </div>
                    <div class="absolute z-10 -mt-[430px] ml-[70px]">
                        <img src="{{asset('img/PCS.jpeg')}}" alt="Benefit.jpg" class="w-[85%] h-[80%] rounded-xl">
                    </div>
                </div>
            </div>
            <hr>
            <div class="flex w-full h-[500px] mt-[80px]">
                <div class="w-[50%] h-full p-3">
                    <div class="relative">
                        <img src="{{asset('img/benefit.jpg')}}" alt="" class="w-full h-full blur-sm rounded-xl opacity-70">
                    </div>
                    <div class="absolute z-10 -mt-[440px] ml-[50px]">
                        <img src="{{asset('img/benefit.jpg')}}" alt="Benefit.jpg" class="rounded-xl">
                    </div>
                </div>
                <div class="w-[50%] p-5 text-black text-center">
                    <h1 class="text-2xl text-black font-bold mt-[3%]">Why Partner with Us for Your Cleaning Needs?</h1>
                    <p class="text-black text-justify px-[8%] mt-[2%]">
                        At Crystal Clear, we don’t just clean homes — we create healthier and happier environments. Our professional housekeeping services are designed to save you time, reduce stress, and provide unmatched convenience, all while ensuring your living spaces are immaculate. Here are the key benefits of choosing us for your housekeeping needs: </p>
                    <p>
                    <ul>
                        <li class="text-black text-justify px-[8%] mt-[2%]">Healthier Home: We eliminate dust, allergens, and bacteria, creating a safer, cleaner space for you and your family</li>

                        <li class="text-black text-justify px-[8%] mt-[2%]">More Free Time: Spend less time cleaning and more time doing what you love — let us handle the mess!</li>

                        <li class="text-black text-justify px-[8%] mt-[2%]">Reliable & Trustworthy Service: Our trained and professional team ensures your home is in safe, capable hands</li>

                        <li class="text-black text-justify px-[8%] mt-[2%]">Affordable & Flexible: Get quality cleaning at competitive rates with schedules that suit your lifestyle</li>
                    </ul>
                    </p>
                </div>
            </div>

            <section class="flex flex-col w-full h-[150px] items-center jusitfy-center mt-[5%]">
                <div>
                    <h1 class="text-4xl font-bold">Ready for a Cleaner Home?</h1>
                </div>
                <div class="mt-[1%]">
                    <h1 class="text-xl">Book your cleaning service today and experience the Crystal Clear difference.</h1>
                </div>
                <div class="mt-[1%]">
                    <a href="{{route('service')}}" class="text-white font-bold bg-blue-600 hover:bg-blue-300 hover:text-black p-2 px-4 rounded-lg">Book Your Cleaning</a>
                </div>
            </section>
        </main>
        @include('layouts.footer')
    </div>
</body>

</html>
