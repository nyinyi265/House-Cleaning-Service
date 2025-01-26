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

<body>
    @include('layouts.navigation')

    @if(session('cancel'))
    <div id="feedback-popup" class="fixed inset-0 bg-blue-100 bg-opacity-50 flex items-center justify-center z-50">
        <div class="flex flex-col bg-white p-6 rounded-lg shadow-lg items-center">
            <h2 class="text-lg font-bold text-red-600">Booking Cancel!</h2>

            <p class="text-red-700">{{ session('cancel') }}</p>
            <button id="close-feedback" class="font-semibold mt-4 px-4 py-2 bg-blue-400 text-neutral-700 rounded hover:bg-blue-600 hover:text-white">
                Close
            </button>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const feedbackPopup = document.getElementById('feedback-popup');
            const closeButton = document.getElementById('close-feedback');

            setTimeout(() => {
                feedbackPopup.style.display = 'none';
            }, 5000);

            closeButton.addEventListener('click', () => {
                feedbackPopup.style.display = 'none';
            });
        });
    </script>
    @endif

    <a href="{{route('dashboard')}}">
        <div class="flex w-[75px] items-center mt-[15px] ml-[25px] border-2 border-slate-500 py-2 px-1 rounded-lg gap-1 hover:bg-slate-500 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left ml-[5px]" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
            </svg>
            <span>Back</span>
        </div>
    </a>

    <div id="service-list" class="w-[70%] p-4 rounded-lg mx-auto">
        @foreach ($bookings as $booking)
        <div class="w-full flex p-4 mb-4 border-2 border-gray-300 rounded-lg">
            <img src="{{ asset($booking->service->service_image) }}" alt="" class="w-[20%] mr-8 rounded-s-lg">

            <div class="flex flex-col w-full">
                <div class="flex justify-between items-start w-full">
                    <div class="flex flex-col gap-3">
                        <h1 class="text-lg font-semibold">{{ $booking->service->service_name }}</h1>
                        <h1><strong>Description:</strong> {{ $booking->service->description }}</h1>
                        <h1><strong>Price:</strong> {{ $booking->service->cost }} ¥</h1>
                        <h1><strong>Booking Date:</strong> {{ $booking->date }}</h1>
                        <h1><strong class="@if ($booking->status === 'pending') text-orange-600 @endif">
                                @if ($booking->status === 'finished')
                                <span>
                                    Finished Date:
                                </span>
                                @elseif($booking->status === 'scheduled')
                                <span>
                                    Scheduled Date:
                                </span>
                                @elseif($booking->status === 'cancelled')
                                <span class="text-lg text-red-600">
                                    Booking is cancelled
                                </span>
                                @elseif($booking->status === 'pending')
                                <span>
                                    Booking is pending
                                </span>
                                @endif
                            </strong>
                            @if ($booking->employees->first() || !$booking->status == 'pending')
                            {{$booking->employees->first()->pivot->date}}
                            @endif
                        </h1>
                        @if ($booking->status === 'pending')
                        <form action="{{route('cancel-booking', ['id' => $booking->id])}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" name="bookingid" id="bookingid" value="{{$booking->id}}">
                            <button type="submit" class="bg-red-600 p-2 text-white font-semibold rounded-lg hover:bg-red-400">Cancel Booking</button>
                        </form>
                        @endif
                    </div>
                    <div class="text-gray-600 font-semibold
                @if ($booking->status == 'finished') text-green-600 bg-green-100 p-2 rounded-md @endif
                @if ($booking->status == 'scheduled') text-blue-500 bg-blue-100 p-2 rounded-md @endif
                @if ($booking->status == 'pending') text-orange-500 bg-orange-100 p-2 rounded-md @endif
                @if ($booking->status == 'cancelled') text-red-500 bg-red-100 p-2 rounded-md @endif
                ">
                        {{ $booking->status }}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</body>

</html>
