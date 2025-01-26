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

<body class="">
    @include('layouts.navigation')

    @if (session('feedback'))
    <div id="feedback-popup" class="fixed inset-0 bg-blue-100 bg-opacity-50 flex items-center justify-center z-50">
        <div class="flex flex-col bg-white p-6 rounded-lg shadow-lg items-center">
            <h2 class="text-lg font-bold text-green-600">Feedback</h2>
            <p class="text-gray-700">{{ session('feedback') }}</p>
            <button id="close-feedback" class="font-semibold mt-4 px-4 py-2 bg-green-400 text-neutral-700 rounded hover:bg-green-600 hover:text-white">
                Close
            </button>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const feedbackPopup = document.getElementById('feedback-popup');
            const closeButton = document.getElementById('close-feedback');

            // Auto-hide the popup after 5 seconds
            setTimeout(() => {
                feedbackPopup.style.display = 'none';
            }, 5000);

            // Close the popup manually
            closeButton.addEventListener('click', () => {
                feedbackPopup.style.display = 'none';
            });
        });
    </script>
    @endif


    <section class="h-[500px] relative slider-container mb-[5%]">
        <!-- Background Image -->
        <div class="slider-img absolute top-0 left-0 w-full h-full bg-slate-200">
            <img src="{{asset('img/image.png')}}" alt="" class="relative w-full h-full object-cover">
        </div>

        <!-- Content Section (Text and Button) -->
        <div class="absolute top-[50%] left-[50%] transform -translate-x-[50%] -translate-y-1/2 bg-black bg-opacity-40 p-5 rounded-md z-10">
            <h1 class="text-white text-4xl font-bold text-center">Contact Us</h1>
            <h3 class="text-white text-2xl text-center mt-2">“We’re here to help! Reach out to us for inquiries, bookings, or feedback.”</h3>
        </div>
    </section>

    <section class="flex flex-row w-full h-[800px] justify-evenly">
        <div class="flex flex-col w-[40%] h-full p-10 rounded-xl border-2 border-black shadow-[20px_15px_60px_-15px_rgba(0,0,0,0.3)]">
            <h1 class="text-2xl font-bold">Get in Touch</h1>
            <p class="text-lg mb-[5%] mt-[1%]">Fill out the form and we'll get back to you as soon as possible</p>

            <form action="{{route('feedback')}}" method="POST" class="w-full">
                @csrf

                <label for="name" class="text-lg">Full Name</label>
                <input type="text" name="fullname" id="fullname" placeholder="@if (Auth::check()) {{Auth::user()->name}} @else Guest @endif" disabled class="w-full border-1 border-black rounded-lg px-4 mt-[1%] mb-[3%]">

                <label for="email" class="text-lg">Email Address</label>
                <input type="email" name="email" id="email" placeholder="@if (Auth::check()) {{Auth::user()->email}} @else guest@gmail.com @endif" disabled class="w-full border-1 border-black rounded-lg px-4 mt-[1%] mb-[3%]">

                <label for="phone" class="text-lg">Phone Number (Optional)</label>
                <input type="text" name="phone" id="phone" placeholder="@if (Auth::check()) {{Auth::user()->phone}} @else +959761369539 @endif" disabled class="w-full border-1 border-black rounded-lg px-4 mt-[1%] mb-[3%]">

                <label for="question" class="text-lg">Inquery Type</label>
                <select name="questions" id="questions" rows="5" class="w-full border-1 border-black rounded-lg px-4 mt-[1%] mb-[3%]">
                    <option value="general">General</option>
                    <option value="booking">Booking</option>
                    <option value="complaint">Complaint</option>
                    <option value="other">Other</option>
                </select>

                <label for="message" class="text-lg">Message</label>
                <textarea name="message" id="message" placeholder="How can we help you?" class="w-full border-1 border-black rounded-lg px-4 mt-[1%] mb-[3%]"></textarea>

                <button class="w-full text-xl text-center text-white font-bold bg-blue-700 p-4 rounded-lg mt-[3%] cursor-pointer">Send Message</button>
            </form>
        </div>

        <div class="flex flex-col w-[50%] h-full justify-between">
            <div class="flex flex-col justify-start w-full h-[50%] border-2 border-black rounded-xl p-4 shadow-[30px_15px_60px_-15px_rgba(0,0,0,0.3)]">
                <h1 class="text-2xl font-bold">Contact Information</h1>
                <div class="flex w-full mt-[3%]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="blue" class="bi bi-telephone mr-[2%]" viewBox="0 0 16 16">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                    </svg>
                    <p class="text-lg text-justify">
                        General Inquiries: +1-800-123-4567
                    </p>
                </div>

                <div class="flex w-full mt-[2%]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="blue" class="bi bi-telephone mr-[2%]" viewBox="0 0 16 16">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                    </svg>
                    <p class="text-lg text-justify">
                        Emergency Services: +1-800-765-4321
                    </p>
                </div>

                <div class="flex w-full mt-[2%]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="blue" class="bi bi-envelope  mr-[2%]" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                    </svg>
                    <p class="text-lg text-justify">
                        General: info@housekeepingco.com
                    </p>
                </div>

                <div class="flex w-full mt-[2%]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="blue" class="bi bi-envelope mr-[2%]" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                    </svg>
                    <p class="text-lg text-justify">
                        Bookings: bookings@housekeepingco.com
                    </p>
                </div>

                <div class="flex w-full mt-[2%]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="blue" class="bi bi-envelope mr-[2%]" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                    </svg>
                    <p class="text-lg text-justify">
                        Feedback/Complaints: feedback@housekeepingco.com
                    </p>
                </div>

                <div class="flex w-full mt-[2%]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="blue" class="bi bi-geo-alt mr-[2%]" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                    </svg>
                    <p class="text-lg text-justify">
                        Housekeeping Services Co.
                    </p>
                    <p class="text-lg text-justify">
                        Hachioji, Tokyo 192-0056, Japan
                    </p>
                </div>

                <div class="flex w-full mt-[2%] items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="blue" class="bi bi-clock-history mr-[2%]" viewBox="0 0 16 16">
                        <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z" />
                        <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z" />
                        <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5" />
                    </svg>
                    <div class="flex flex-col justify-start">
                        <p class="text-lg text-justify">
                            Monday to Friday: 8:00 AM – 8:00 PM
                        </p>
                        <p class="text-lg text-justify">
                            Saturday & Sunday: 9:00 AM – 6:00 PM
                        </p>
                    </div>
                </div>
            </div>

            <div class="w-full h-[48%] border-2 border-black rounded-xl shadow-[30px_15px_60px_-15px_rgba(0,0,0,0.3)]">
                <img src="{{asset('img/Map.png')}}" alt="Map" class="w-full h-full rounded-xl">
            </div>
        </div>
    </section>

    <section class="flex w-[40%] h-[50px] border-2 border-gray-600 mt-[5%] rounded-lg mx-auto items-center justify-center px-4  shadow-[20px_15px_60px_-15px_rgba(0,0,0,0.3)]">
        <h1>Found Us on:</h1>
        <div class="flex justify-evenly w-[50%] h-[80%]">
            <div class="flex w-[17%] h-full bg-white border-2 border-blue-400 rounded-md justify-center items-center hover:bg-blue-500 group">
                <svg
                    width="130%"
                    height="130%"
                    viewBox="-3.2 -3.2 38.40 38.40"
                    xmlns="http://www.w3.org/2000/svg"
                    class="fill-blue-500 group-hover:fill-white">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.128"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M21.95 5.005l-3.306-.004c-3.206 0-5.277 2.124-5.277 5.415v2.495H10.05v4.515h3.317l-.004 9.575h4.641l.004-9.575h3.806l-.003-4.514h-3.803v-2.117c0-1.018.241-1.533 1.566-1.533l2.366-.001.01-4.256z"></path>
                    </g>
                </svg>
            </div>

            <div class="flex w-[17%] h-full bg-white border-2 border-blue-400 rounded-md justify-center items-center hover:bg-blue-500 group">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24" id="instagram"
                    class="fill-blue-500 group-hover:fill-white"
                    width="100%"
                    height="100%">
                    <g>
                        <path d="M12.00039,6.86511A5.13489,5.13489,0,1,0,17.13528,12,5.13479,5.13479,0,0,0,12.00039,6.86511Zm0,8.46846A3.3336,3.3336,0,1,1,15.334,12,3.33317,3.33317,0,0,1,12.00039,15.33357Z"></path>
                        <path d="M21.93985,7.87719a7.33258,7.33258,0,0,0-.46447-2.42726,4.918,4.918,0,0,0-1.15346-1.77146A4.89358,4.89358,0,0,0,18.55129,2.525,7.32278,7.32278,0,0,0,16.124,2.06054C15.05775,2.012,14.7169,2,12.00122,2s-3.05681.01126-4.12365.06054A7.33317,7.33317,0,0,0,5.45032,2.525,4.90522,4.90522,0,0,0,3.67886,3.67847a4.88551,4.88551,0,0,0-1.1534,1.77146A7.33341,7.33341,0,0,0,2.061,7.87719C2.01171,8.94341,2.00039,9.28432,2.00039,12s.01132,3.05653.06059,4.12276a7.33352,7.33352,0,0,0,.46448,2.42731,4.888,4.888,0,0,0,1.1534,1.77146,4.9169,4.9169,0,0,0,1.77146,1.1534,7.33849,7.33849,0,0,0,2.42725.46448C8.94441,21.9879,9.28471,22,12.00039,22s3.05658-.01132,4.12281-.06059a7.33339,7.33339,0,0,0,2.42726-.46448,5.11251,5.11251,0,0,0,2.92492-2.92486,7.316,7.316,0,0,0,.46447-2.42731c.0485-1.067.05976-1.40708.05976-4.12276S21.98835,8.94341,21.93985,7.87719Zm-1.799,8.16406a5.54872,5.54872,0,0,1-.344,1.85708,3.31133,3.31133,0,0,1-1.89825,1.89741,5.52231,5.52231,0,0,1-1.85708.344c-1.05408.04844-1.37068.05815-4.04119.05815s-2.98623-.00971-4.04-.05815a5.5263,5.5263,0,0,1-1.85708-.344,3.10771,3.10771,0,0,1-1.15024-.748,3.085,3.085,0,0,1-.748-1.1494,5.52134,5.52134,0,0,1-.344-1.85708c-.0485-1.05408-.05815-1.37068-.05815-4.04119s.01049-2.98623.05815-4.0412a5.56308,5.56308,0,0,1,.344-1.857,3.1074,3.1074,0,0,1,.748-1.15024,3.08175,3.08175,0,0,1,1.15024-.748,5.52271,5.52271,0,0,1,1.85708-.344c1.05407-.04849,1.37068-.05815,4.04-.05815s2.98623.01049,4.04119.05815a5.5635,5.5635,0,0,1,1.85708.344,3.30957,3.30957,0,0,1,1.89825,1.89825,5.52254,5.52254,0,0,1,.344,1.857c.04849,1.055.05815,1.37074.05815,4.0412S20.18936,14.98628,20.14087,16.04125Z"></path>
                        <path d="M17.339,5.462h-.00044a1.19979,1.19979,0,1,0,.00044,0Z"></path>
                    </g>
                </svg>
            </div>

            <div class="flex w-[17%] h-full bg-white border-2 border-blue-400 rounded-md justify-center items-center hover:bg-blue-500 group">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    enable-background="new 0 0 24 24"
                    viewBox="0 0 24 24" id="tiktok"
                    class="fill-blue-500 group-hover:fill-white"
                    width="100%"
                    height="100%">
                    <path
                        d="M19.2,7.3c-1.9-0.4-3.3-2-3.4-3.9V3.1h-3.1v12.5c0,1.5-1.2,2.6-2.6,2.6c-0.8,0-1.6-0.4-2.1-1l0,0l0,0
                        C7,16,7.2,14.3,8.4,13.4C9,13,9.5,13,10.2,13V9.8c-3.2-0.4-5.5,1.8-6,4.9c-0.2,1.8,0.3,3.5,1.6,4.8c2.2,2.3,5.9,2.3,8.2,0.1
                        c1.1-1.1,1.7-2.6,1.7-4.1V9.2c1.3,0.9,2.8,1.4,4.4,1.4V7.4C19.8,7.4,19.5,7.4,19.2,7.3z">
                    </path>
                </svg>
            </div>

        </div>
    </section>

    <section class="flex flex-col w-full items-center justify-center mt-[3%]">
        <h1 class="text-4xl text-black text-center font-bold">Have Questions? Find Answers Here</h1>
        <p class="text-center text-lg px-[15%] mt-[1%]">
            Need quick answers? Check out our FAQs to find helpful information and answers to common questions
        </p>
        <a href="{{route('faq')}}" class="flex w-[5%] py-2 items-center justify-center text-center text-lg text-black font-bold rounded-lg border-2 border-blue-600 hover:text-white hover:bg-blue-600 mt-[1%]">FAQ</a>
    </section>

    @include('layouts.footer')
</body>

</html>
