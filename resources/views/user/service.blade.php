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

<body>
    @include('layouts.navigation')

    <section class="relative w-full h-[600px] bg-slate-400">
        <div class="slider-img absolute top-0 left-0 w-full h-full">
            <img src="{{asset('img/slider.jpg')}}" alt="" class="relative w-full h-full object-cover blur-sm">
        </div>

        <div class="absolute top-[50%] left-[23%] transform -translate-x-[40%] -translate-y-1/2 bg-black bg-opacity-30 p-5 rounded-md z-10">
            <h1 class="text-white text-2xl font-bold text-center">Clean Is Not Just a Look; It’s a Lifestyle</h1>
            <h3 class="text-white text-1.5xl mt-2">Professional cleaning services that leave your home sparkling. Book your cleaning today!</h3>
            <form action="#" method="POST" class="flex flex-row items-center justify-center space-x-4 mt-5">
                <button type="submit" class="bg-blue-700 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mr-[20px]">
                    Book Now
                </button>
                <button type="submit" class="border border-blue-800 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-lg ml-[10px]">
                    Learn More
                </button>
            </form>
        </div>
    </section>

    <section class="w-[70%] mx-auto my-[3%]">
        <h1 class="text-center text-2xl font-bold">Welcome to Crystal Clear</h1>
        <p class="text-center text-lg">At Crystal Clear, we specialize in creating clean, comfortable, and welcoming spaces tailored to your needs. Whether it’s routine cleaning, deep cleaning, or personalized housekeeping services, our skilled team ensures every detail is handled with care. Using eco-friendly products and the latest techniques, we deliver spotless results that leave your home or office fresh and inviting. Relax and let us take the stress out of cleaning, so you can focus on what matters most.</p>
    </section>

    <section class="flex w-full rounded-lg p-8 mx-auto">
        <div class="flex flex-col w-[30%] h-full bg-slate-100 py-10 px-4">
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
                <img src="{{asset( $service->service_image)}}" alt="" width="100px" height="100px" class="mr-8 rounded-s-lg">
                <div class="flex flex-col gap-3">
                    <h1 class="text-lg font-semibold">{{$service->service_name}}</h1>
                    <h1><strong>Description:</strong>{{Str::limit($service->description, 150, '...')}}</h1>
                    <h1><strong>Price:</strong> {{$service->cost}}</h1>
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
        function fetchServices(categoryId) {
            console.log('Service Categories: ', categoryId);
            fetch(`/service/${categoryId}`)
                .then(response => response.json()) // Fix missing parentheses
                .then(data => {
                    const serviceList = document.getElementById('service-list');
                    serviceList.innerHTML = ''; // Clear the existing services

                    // Loop through the services and generate HTML
                    data.forEach(service => {
                        const serviceItem = `
                        <div class="service-item p-4 mb-4 border-b border-gray-300">
                            <img src="${service.img_url}"  width="50px" height="50px">
                            <h3 class="text-xl font-semibold">${service.service_name}</h3>
                            <p class="text-gray-700">${service.description}</p>
                            <p class="text-gray-700">${service.cost}</p>
                            <a href="/service/details/${service.id}" class="mt-2 bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-400">
                                See Details
                            </a>
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