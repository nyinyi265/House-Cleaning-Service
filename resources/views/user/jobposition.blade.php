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

    @if (session('success'))
    <div class="bg-green-400 text-center text-white p-4">
        {{ session('success') }}
    </div>
    @endif

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


                @foreach ($positions as $positionreq)
                @if ($positionreq->job_requirements > 0)
                <div class="flex my-[10px]">
                    <h1 class="text-lg font-medium">{{ $positionreq->position }} - </h1>
                    <h1 class="text-lg"> - ( {{$positionreq->job_requirements}} Posts ) </h1>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="flex flex-col w-[45%] border border-slate-400 rounded-lg">
            <div class="flex flex-col p-4">
                <h1 class="text-3xl">Why Work With Us?</h1>
                <p class="text-slate-500 mb-[10px]">Discover the benefits of joining our team</p>

                <div class="flex flex-col gap-3">
                    <form action="{{ route('job-application') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your full name" class="w-full border border-slate-400 rounded-lg p-2 mb-[10px]" required>

                        <label for="phone">Phone Number</label>
                        <input type="text" id="phone" name="phone" placeholder="Enter your phone number" class="w-full border border-slate-400 rounded-lg p-2 mb-[10px]" required>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" class="w-full border border-slate-400 rounded-lg p-2 mb-[10px]" required>

                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" placeholder="Enter your address" class="w-full border border-slate-400 rounded-lg p-2 mb-[10px]" required>

                        <div class="flex flex-col gap-3">
                            <label for="resume">Upload CV or Resume (pdf / doc / docx)</label>
                            <input type="file" id="resume" name="resume" class="w-full border border-slate-400 rounded-lg p-2 mb-[10px]" required>
                        </div>

                        <div class="flex flex-col gap-3">
                            @foreach ($positions as $positionreq)
                            @if ($positionreq->job_requirements > 0)
                            <div class="flex gap-3">
                                <input type="radio" name="position" id="position_{{ $positionreq->id }}" value="{{ $positionreq->id }}" class="mb-[10px]" required>
                                <label for="position_{{ $positionreq->id }}">{{ $positionreq->position }}</label>
                            </div>
                            @endif
                            @endforeach
                        </div>

                        <button type="submit" class="w-full border-2 border-slate-400 mt-[3%] py-2 rounded-lg text-center">Apply</button>
                    </form>

                </div>
            </div>
        </div>
    </section>
</body>

</html>