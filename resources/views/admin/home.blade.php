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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        hr {
            height: 15px;
        }
    </style>
</head>

<body>
    @include('admin.layouts.navigation')

    <div class="w-[90%] h-[20px] items-center mx-auto mt-[5%]">
        <h1 class="text-start text-2xl font-bold">Admin Dashboard</h1>
        <hr class="h-0.5 bg-gray-300">
    </div>

    <section class="flex flex-col w-full h-[600px] items-center mt-[5%]">
        <div class="flex w-full h-[30%] px-4 mx-auto">
            <div
                class="flex flex-col w-[25%] mx-[1%] rounded-lg border-2 border-[#001F3F] shadow-[5px_5px_15px_#B9E5E8] p-4">
                <div class="flex w-full justify-start items-center mb-4">
                    <h1 class="mr-[60%] text-lg"><strong>Revenue</strong></h1>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-currency-yen" viewBox="0 0 16 16">
                        <path
                            d="M8.75 14v-2.629h2.446v-.967H8.75v-1.31h2.445v-.967H9.128L12.5 2h-1.699L8.047 7.327h-.086L5.207 2H3.5l3.363 6.127H4.778v.968H7.25v1.31H4.78v.966h2.47V14h1.502z" />
                    </svg>
                </div>
                <div class="flex w-full justify-start items-center">
                    <h1 class="mr-[50%]">Total Price</h1>
                    @if ($revenue)
                        <p>{{ $revenue }}</p>
                    @endif
                </div>
            </div>
            <div
                class="flex flex-col w-[25%] h-full mx-[1%] rounded-lg border-2 border-[#001F3F] shadow-[5px_5px_15px_#B9E5E8] p-4">
                <div class="flex w-full h-[25px] justify-start items-center mb-4">
                    <h1 class="mr-[57%] text-lg"><strong>Customers</strong></h1>
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor"
                        class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        <path fill-rule="evenodd"
                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                    </svg>
                </div>
                <div class="flex w-full justify-start items-center">
                    <h1 class="mr-[50%]">Total Customers</h1>
                    @if ($customer)
                        <p>{{ $customer }}</p>
                    @endif
                </div>
            </div>
            <div
                class="flex flex-col w-[25%] h-full mx-[1%] rounded-lg border-2 border-[#001F3F] shadow-[5px_5px_15px_#B9E5E8] p-4">
                <div class="flex w-full h-[25px] justify-start items-center mb-4">
                    <h1 class="mr-[63%] text-lg"><strong>Bookings</strong></h1>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-journals" viewBox="0 0 16 16">
                        <path
                            d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2" />
                        <path
                            d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0" />
                    </svg>
                </div>
                <div class="flex w-full justify-start items-center">
                    <h1 class="mr-[49.5%]">Finished Bookings</h1>
                    @if ($booking)
                        <p>{{ $booking->where('status', 'finished')->count() }}</p>
                    @endif
                </div>
                <div class="flex w-full justify-start items-center">
                    <h1 class="mr-[44.5%]">Scheduled Bookings</h1>
                    @if ($booking)
                        <p>{{ $booking->where('status', 'scheduled')->count() }}</p>
                    @endif
                </div>
                <div class="flex w-full justify-start items-center">
                    <h1 class="mr-[50%]">Pending Bookings</h1>
                    @if ($booking)
                        <p>{{ $booking->where('status', 'pending')->count() }}</p>
                    @endif
                </div>
                <div class="flex w-full justify-start items-center">
                    <h1 class="mr-[47%]">Canceled Bookings</h1>
                    @if ($booking)
                        <p>{{ $booking->where('status', 'cancelled')->count() }}</p>
                    @endif
                </div>
            </div>
            <div
                class="flex flex-col w-[25%] h-full mx-[1%] rounded-lg border-2 border-[#001F3F] shadow-[5px_5px_15px_#B9E5E8] p-4">
                <div class="flex w-full h-[25px] justify-start items-center mb-4">
                    <h1 class="mr-[51%] text-lg"><strong>Active Staffs</strong></h1>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-person" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                </div>
                <div class="flex w-full justify-start items-center">
                    <h1 class="mr-[50%]">Total Employees</h1>
                    @if ($employee)
                        <p>{{ $employee }}</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
</body>

</html>
