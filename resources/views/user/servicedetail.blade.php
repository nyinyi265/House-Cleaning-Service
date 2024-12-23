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

    <section class="w-[80%] h-[500px] mx-auto my-[5%]">
        <form action="{{route('book.store', ['id' => $services->id])}}" method="POST">
            @csrf
            <div>
                <img src="{{asset($services->service_image)}}" alt="" width="200px" height="200px">
                <h1>{{$services->service_name}}</h1>
                <p>{{$services->description}}</p>
                <p>{{$services->cost}}</p>
            </div>

            <label>Please Choose a Date</label>
            <input type="date" name="book_date" id="book_date" required>
            <input type="hidden" name="serviceid" id="serviceid" value="{{$services->id}}">

            <button type="submit">Book</button>
        </form>

        
    </section>
</body>

</html>