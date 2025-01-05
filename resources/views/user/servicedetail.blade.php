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

    <section class="w-[55%] mx-auto my-[5%] border-2 border-gray-300 p-5 rounded-lg">
        <form action="{{route('book.store', ['id' => $services->id])}}" method="POST">

            @csrf
            <input type="hidden" name="serviceid" id="serviceid" value="{{$services->id}}">

            <div class="flex">
                <img src="{{asset($services->service_image)}}" alt="" width="150px" height="auto" class="rounded-s-lg">
                <div class="flex flex-col ml-5 gap-5">
                    <h1 class="text-xl font-bold">{{$services->service_name}}</h1>
                    <p><strong>Description: </strong> {{$services->description}}</p>
                    <p><strong>Price</strong> {{$services->cost}}</p>
                    <div class="">
                        <label><strong>Please Choose a Date: </strong></label>
                        <input type="date" name="book_date" id="book_date" required />
                    </div>
                    <button type="submit" class="text-white text-center font-bold bg-blue-600 hover:bg-blue-300 hover:text-black py-2 px-4 rounded-lg">Book</button>
                </div>
            </div>
        </form>
    </section>

    @include('layouts.footer')

</body>

</html>