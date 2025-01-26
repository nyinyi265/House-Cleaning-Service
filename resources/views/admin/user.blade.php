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

    @if (Auth::user()->email == 'yoonme26@gmail.com')
    <section class="w-[50%] p-10 border-2 border-slate-400 mx-auto mt-[4%] rounded-lg">
        <h1 class="text-xl font-bold mb-[3%]">Assign Admin</h1>
        <form action="{{route('admin-user-store')}}" method="POST" class="flex flex-col">
            @csrf

            <div class="flex flex-col gap-3">
                <label for="user-name">Admin Name</label>
                <input type="text" name="admin-name" id="admin-name" class="px-4 rounded-lg" required>
            </div>

            <div class="flex flex-col gap-3">
                <label for="user-email">Admin Email</label>
                <input type="email" name="admin-email" id="admin-email" class="px-4 rounded-lg" required>
            </div>

            <div class="flex flex-col gap-3">
                <label for="user-password">Admin Password</label>
                <input type="password" name="admin-password" id="admin-password" class="px-4 rounded-lg" required>
            </div>

            <div class="flex flex-col gap-3">
                <label for="phone-number">Phone Number</label>
                <input type="text" name="phone-number" id="phone-number" class="px-4 rounded-lg" required>
            </div>

            <div class="flex flex-col gap-3">
                <label for="user-address">Admin Address</label>
                <input type="text" name="admin-address" id="admin-address" class="px-4 rounded-lg" required>
            </div>

            <div class="flex flex-col gap-3">
                <button type="submit"  class="border-2 border-slate-400 mt-[3%] py-2 rounded-lg">Add Admin</button>
            </div>
        </form>
    </section>
    @endif

    <section class="w-[95%] p-10 mx-auto mt-[4%] rounded-lg">
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
