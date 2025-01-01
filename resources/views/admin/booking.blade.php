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


    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

    <!-- jQuery (Required by DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('js/DataTable.css')}}">
</head>

<body>
    @include('admin.layouts.navigation')

    <section class="w-[50%] mx-auto my-[5%] dataTables_length">
        <h1 class="text-xl font-bold mb-4">Finished Booking</h1>
        <table id="table">
            <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-700">
                <tr class="border-2 border-white">
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Booking ID
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Booking Date
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Service
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Customer Name
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Delete Booking
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                @if ($booking->status === 'finished')
                <tr class="border-2 border-white">
                    <td class="border border-gray-400 px-4 py-2">
                        {{$booking->id}}
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        {{$booking->date}}
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        {{$booking->service->service_name ?? 'N/A'}}
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        {{$booking->status}}
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        {{$booking->user->name ?? 'N/A'}}
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        <form action="{{route('booking-delete', $booking->id)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="submit" value="Delete" class="text-red-500 font-semibold cursor-pointer">
                        </form>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </section>

    <hr>

    <section class="w-[50%] mx-auto my-[5%] dataTables_length">
        <h1 class="text-xl font-bold mb-4">Scheduled Booking</h1>
        <table id="table1" class="w-full">
            <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-700">
                <tr class="border-2 border-white">
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Booking ID
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Booking Date
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Service
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Customer Name
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Delete Booking
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                @if ($booking->status === 'scheduled')
                <tr class="border-2 border-white">
                    <td class="border border-gray-400 px-4 py-2">
                        {{$booking->id}}
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        {{$booking->date}}
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        {{$booking->service->service_name ?? 'N/A'}}
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        {{$booking->status}}
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        {{$booking->user->name ?? 'N/A'}}
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        <form action="{{route('change-status', $booking->id)}}" method="POST">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="submit" value="Done" class="text-green-500 font-semibold cursor-pointer">
                        </form>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </section>

    <hr>

    <section class="w-[50%] mx-auto my-[5%] dataTables_length">
        <h1 class="text-xl font-bold mb-4">Cancelled Booking</h1>
        <table id="table2" class="w-full">
            <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-700">
                <tr class="border-2 border-white">
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Booking ID
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Booking Date
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Service
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Customer Name
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                @if ($booking->status === 'cancelled')
                <tr class="border-2 border-white">
                    <td class="border border-gray-400 px-4 py-2">
                        {{$booking->id}}
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        {{$booking->date}}
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        {{$booking->service->service_name ?? 'N/A'}}
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        {{$booking->status}}
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        {{$booking->user->name ?? 'N/A'}}
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </section>

    <hr>

    <section class="w-[50%] mx-auto my-[5%] dataTables_length">
        <h1 class="text-xl font-bold mb-4">Pending Booking</h1>
        <table id="table2" class="w-full">
            <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-700">
                <tr class="border-2 border-white">
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Booking ID
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Booking Date
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Service
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Customer Name
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                @if ($booking->status === 'pending')
                <tr class="border-2 border-white">
                    <td class="border border-gray-400 px-4 py-2">
                        {{$booking->id}}
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        {{$booking->date}}
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        {{$booking->service->service_name ?? 'N/A'}}
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        {{$booking->status}}
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        {{$booking->user->name ?? 'N/A'}}
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </section>
    <script src="{{asset('js/DataTable.js')}}"></script>
</body>

</html>