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

    <section class="w-[90%] p-10 mx-auto mt-[4%] rounded-lg">
        <table id="table" class="w-[80%] table-auto border-2 border-gray-400 mt-[5%] mx-auto">
            <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-700">
                <tr class="border-2 border-white">
                    <th scope="col" class="px-6 py-3 border border-gray-400">User ID</th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">User Name</th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">User Email</th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">User Password</th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">Phone Number</th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">User Address</th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">User Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="border-2 border-gray-400">
                    <td class="border border-gray-400 px-4 py-2">{{$user->id}}</td>
                    <td class="border border-gray-400 px-4 py-2">{{$user->name}}</td>
                    <td class="border border-gray-400 px-4 py-2">{{$user->email}}</td>
                    <td class="border border-gray-400 px-4 py-2">{{$user->password}}</td>
                    <td class="border border-gray-400 px-4 py-2">{{$user->phone}}</td>
                    <td class="border border-gray-400 px-4 py-2">{{$user->address}}</td>
                    <td class="border border-gray-400 px-4 py-2">{{$user->user_role}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    <script src="{{asset('js/DataTable.js')}}"></script>
</body>

</html>