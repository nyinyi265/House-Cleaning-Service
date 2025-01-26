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
    <style>
        #payment-success-modal {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    @include('layouts.navigation')

    @if (session('success'))
    <div id="booking-popup" class="fixed inset-0 bg-blue-100 bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full text-center">
            <!-- Icon -->
            <div class="flex justify-center mb-6">
                <div class="bg-green-100 text-green-600 rounded-full p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-3-3a1 1 0 111.414-1.414L9 11.586l6.293-6.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

            <!-- Title -->
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Your booking was successfully processed!</h2>

            <!-- Description -->
            <p class="text-gray-600 mb-6">
                Thank you for booking our house cleaning service! We will review your request and confirm the details with you within 24 hours. An email with your booking confirmation will be sent shortly.
            </p>

            <!-- Details -->
            @if (session('success') && session('booking'))
            <div class="bg-gray-100 p-4 rounded-lg mb-6">
                <p class="text-gray-700 font-medium">{{session('booking')['service']}}</p>
                <p class="text-gray-500 text-sm">{{session('booking')['date']}}</p>
                <p class="text-gray-700 font-bold text-lg">{{session('booking')['price']}} ¥</p>
            </div>
            @endif

            <a href="{{route('service')}}" class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow hover:bg-blue-700 transition">Return Back</a>
        </div>
    </div>

    <div class="fixed top-[50%] right-[50%] bg-green-500 text-white px-4 py-3 rounded shadow-lg transition-opacity duration-300 opacity-100">
        {{ session('success') }}
    </div>
    @endif

    <section class="relative w-full h-[600px] bg-slate-400">
        <div class="absolute top-0 left-0 w-full h-full">
            <img src="{{asset('img/service.png')}}" alt="" class="relative w-full h-full object-cover">
        </div>

        <div class="absolute top-[50%] left-[45%] transform -translate-x-[40%] -translate-y-1/2 bg-black bg-opacity-40 p-6 rounded-md z-10">
            <h1 class="text-white text-2xl font-bold text-center">Your Partner for a Cleaner Tomorrow</h1>
            <h3 class="text-white text-1.5xl mt-2">Your partner in keeping a home you’re proud to live in, every day, every season</h3>
        </div>
    </section>

    <section class="w-[70%] mx-auto my-[3%]">
        <h1 class="text-center text-2xl font-bold">Welcome to Crystal Clear</h1>
        <p class="text-center text-lg">At Crystal Clear, we specialize in creating clean, comfortable, and welcoming spaces tailored to your needs. Whether it’s routine cleaning, deep cleaning, or personalized housekeeping services, our skilled team ensures every detail is handled with care. Using eco-friendly products and the latest techniques, we deliver spotless results that leave your home or office fresh and inviting. Relax and let us take the stress out of cleaning, so you can focus on what matters most.</p>
    </section>

    <section class="flex w-full rounded-lg p-8 mx-auto">
        <div class="flex flex-col w-[30%] h-full bg-slate-100 py-10 px-4 sticky top-0">
            <h1 class="mb-4 text-2xl font-bold">Choose A Categories</h1>
            @foreach ($categories as $category)
            <button onclick="fetchServices('{{ $category->id }}')" class="mb-4 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-500">
                {{ $category->category }}
            </button>
            @endforeach
        </div>

        <div id="service-list" class="w-[70%] p-4 rounded-lg">
            @foreach ($services as $service)
            <div class="flex service-item p-4 mb-4 border-2 border-gray-300 rounded-lg">
                <img src="{{asset( $service->service_image)}}" alt="" width="200px" class="mr-8 rounded-s-lg">
                <div class="flex flex-col gap-3">
                    <h1 class="text-lg font-semibold">{{$service->service_name}}</h1>
                    <h1><strong>Description: </strong>{{Str::limit($service->description, 150, '...')}}</h1>
                    <h1><strong>Price: </strong> {{$service->cost}} ¥</h1>
                    <a href="{{route('service-details', ['id' => $service->id]) }}" class="w-[120px] text-center mt-2 bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-400">
                        See Details
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    @include('layouts.footer')

    <script>
        function goback() {
            const popup = document.getElementById('booking-popup');
            popup.style.display = 'none';
        }

        function fetchServices(categoryId) {
            console.log('Service Categories: ', categoryId);
            fetch(`/service/${categoryId}`)
                .then(response => response.json()) // Fix missing parentheses
                .then(data => {
                    const serviceList = document.getElementById('service-list');
                    serviceList.innerHTML = '';

                    function truncateText (text, limit){
                        return text.length >limit ? text.substring(0, limit) + '...' : text;
                    }

                    data.forEach(service => {
                        const serviceItem = `
                        <div class="flex service-item p-4 mb-4 border-2 border-gray-300 rounded-lg">
                            <img src="${service.img_url}" alt="" width="200px" class="mr-8 rounded-s-lg">
                            <div class="flex flex-col gap-3">
                                <h1 class="text-lg font-semibold">${service.service_name}</h1>
                                <h1><strong>Description: </strong>${truncateText(service.description, 150)}</h1>
                                <h1><strong>Price: </strong>${service.cost} ¥</h1>
                                <a href="/service/details/${service.id}" class="w-[120px] text-center mt-2 bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-400">
                                    See Details
                                </a>
                            </div>
                        </div>
                    `;

                        serviceList.innerHTML += serviceItem; // Append to the service list
                    });
                })
                .catch(error => console.error('Error fetching services:', error));
        }
    </script>

</body>

</html>
