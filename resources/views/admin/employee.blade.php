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

    <section class="w-[50%] p-10 border-2 border-slate-400 mx-auto mt-[4%] rounded-lg">
        <h1 class="text-xl font-bold mb-[3%]">Employee Registration</h1>
        <form action="{{isset($empEdit) ? route('admin-employee.update', $empEdit->id) : route('admin-employee.store')}}" method="POST">
            @csrf
            @if (isset($empEdit))
            @method('PUT')
            @endif

            <div class="flex flex-col gap-3">
                <label for="name">Employee Name</label>
                <input type="text" name="employee-name" id="employee-name" value="{{isset($empEdit)? $empEdit->name : ''}}" class="px-4 rounded-lg">
            </div>

            <div class="flex flex-col gap-3">
                <label for="employee-phone">Employee Phone Number</label>
                <input type="number" name="employee-phone" id="employee-phone" value="{{isset($empEdit)? $empEdit->phone : ''}}" class="px-4 rounded-lg">
            </div>

            <div class="flex flex-col gap-3">
                <label for="employee-email">Employee Email</label>
                <input type="email" name="employee-email" id="employee-email" value="{{isset($empEdit)? $empEdit->email : ''}}" class="px-4 rounded-lg">
            </div>

            <div class="flex flex-col gap-3">
                <label for="employee-address">Employee Address</label>
                <input type="text" name="employee-address" id="employee-address" value="{{isset($empEdit)? $empEdit->address : ''}}" class="border-2 border-slate-400 px-4 py-2 rounded-lg">
            </div>

            <div class="flex flex-col gap-3">
                <label>Employee Position</label>
                <select name="employee-position" id="employee-position" class="rounded-lg">
                    @foreach ($positions as $position)
                    <option value="{{$position->id}}" {{isset($empEdit) && $empEdit->position_id === $position->id? 'selected' : ''}}>{{$position->position}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full border-2 border-slate-400 mt-[3%] py-2 rounded-lg">
                {{isset($empEdit) ? 'Update Employee' : 'Register Employee'}}
            </button>
        </form>
    </section>

    <section class="w-[80%] mx-auto my-[5%] dataTables_length">
        <table id="table">
            <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-700">
                <tr class="border-2 border-white">
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Employee ID
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Employee Name
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Employee phone
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Employee Email
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Employee Address
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Employee Position
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Employee Salary
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Edit
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Delete
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr class="border-2 border-gray-400">
                    <td scope="row" class="px-6 py-3 border border-gray-400">
                        {{$employee->id}}
                    </td>
                    <td scope="row" class="px-6 py-3 border border-gray-400">
                        {{$employee->name}}
                    </td>
                    <td scope="row" class="px-6 py-3 border border-gray-400">
                        {{$employee->phone}}
                    </td>
                    <td scope="row" class="px-6 py-3 border border-gray-400">
                        {{$employee->email}}
                    </td>
                    <td scope="row" class="px-6 py-3 border border-gray-400">
                        {{$employee->address}}
                    </td>
                    <td scope="row" class="px-6 py-3 border border-gray-400">
                        {{$employee->position ? $employee->position->position : 'No Position'}}
                    </td>
                    <td scope="row" class="px-6 py-3 border border-gray-400">
                        {{$employee->position ? $employee->position->salary : 'No salary'}}
                    </td>
                    <td scope="row" class="px-6 py-3 border border-gray-400">
                        <a href="{{route('admin-employee.edit', $employee->id)}}">
                            Edit
                        </a>
                    </td>
                    <td scope="row" class="px-6 py-3 border border-gray-400 hover:cursor-pointer">
                        <form action="/admin-employee/<?php echo $employee->id ?>" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="submit" value="Remove Employee">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    <script src="{{asset('js/DataTable.js')}}"></script>
</body>

</html>
