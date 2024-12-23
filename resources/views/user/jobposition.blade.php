<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.navigation')

    <section class="flex flex-col items-center justify-center mt-[3%]">
        <h1 class="text-3xl font-bold mb-[5px]">Join Our Team</h1>
        <p class="text-xl">Become a part of Crystal Clear House Keeping and help us make homes sparkle!</p>
    </section>

    <section class="flex w-[90%] mx-auto my-[25px]">
        <div class="flex flex-col w-[45%]">
            <div class="flex flex-col border border-slate-400 rounded-lg mr-[15px] p-4">
                <h1 class="text-3xl">Why Work With Us?</h1>
                <p class="text-slate-500">Discover the benefits of joining our team</p>
                <div class="flex flex-col my-[10px]">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="green" class="bi bi-check2-circle" viewBox="0 0 16 16">
                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                        </svg>
                        <h1 class="text-xl font-medium ml-[10px]">Competitive Pay</h1>
                    </div>
                    <p class="ml-[35px] text-slate-500">Earn a fair wage for your hard work and dedication</p>
                </div>

                <div class="flex flex-col my-[10px]">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="green" class="bi bi-check2-circle" viewBox="0 0 16 16">
                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                        </svg>
                        <h1 class="text-xl font-medium ml-[10px]">Flexible Schedules</h1>
                    </div>
                    <p class="ml-[35px] text-slate-500">Work hours that fit your lifestyle and commitments</p>
                </div>

                <div class="flex flex-col my-[10px]">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="green" class="bi bi-check2-circle" viewBox="0 0 16 16">
                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                        </svg>
                        <h1 class="text-xl font-medium ml-[10px]">Career Growth</h1>
                    </div>
                    <p class="ml-[35px] text-slate-500">Opportunities for advancement and skill development</p>
                </div>

                <div class="flex flex-col my-[10px]">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="green" class="bi bi-check2-circle" viewBox="0 0 16 16">
                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                        </svg>
                        <h1 class="text-xl font-medium ml-[10px]">Supportive Team</h1>
                    </div>
                    <p class="ml-[35px] text-slate-500">Join a friendly and collaborative work environment</p>
                </div>
            </div>
            <div class="flex flex-col border border-slate-400 rounded-lg mr-[15px] p-4 mt-[20px]">
                <h1 class="text-3xl">Current Openings</h1>
                <p class="text-slate-500">Explore our available positions</p>
            </div>
        </div>
        <div class="flex flex-col w-[45%] border border-slate-400 rounded-lg">
            <div class="flex flex-col p-4">
                <h1 class="text-3xl">Why Work With Us?</h1>
                <p class="text-slate-500">Discover the benefits of joining our team</p>
            </div>
        </div>
    </section>
</body>

</html>