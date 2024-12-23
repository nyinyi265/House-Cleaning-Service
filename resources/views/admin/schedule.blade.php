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

    @if (session('failed') || session('success'))
    {{session('failed')}}
    {{session('success')}}
    @endif


    <section class="w-[52%] border-2 border-slate-400 mx-auto mt-[5%] rounded-lg p-10">
        <h1 class="text-xl font-bold mb-[3%]">Set Schedule for Employees</h1>
        <form action="{{isset($scheduleEdit)? route('schedule-update', $scheduleEdit->id) : route('schedule-store')}}" method="POST" class="flex flex-col">
            @csrf
            @if (isset($scheduleEdit))
            @method('PUT')
            @endif

            <div class="flex flex-col gap-3 mb-4">
                <label>Choose Booking :</label>
                <select name="bookings" id="bookings" onchange="filterSchedule()" {{isset($scheduleEdit)? 'disabled' : ''}}>
                    @foreach ($bookings as $booking)
                    @if ($scheduleEdit && $booking->status === 'scheduled')
                    <option value="{{$booking->id}}" {{isset($scheduleEdit) && $scheduleEdit->id == $booking->id ? 'selected' : ''}}>{{ \Carbon\Carbon::parse($booking->date)->toFormattedDateString() }}</option>
                    @elseif ($booking->status === 'pending')
                    <option value="{{$booking->id}}">{{ \Carbon\Carbon::parse(time: $booking->date)->toFormattedDateString() }}</option>
                    @endif
                    @endforeach
                </select>
                @if (isset($scheduleEdit))
                <input type="hidden" name="book" id="book" value="{{$scheduleEdit->id}}">
                @endif
            </div>

            <div class="flex flex-col gap-3 mb-4">
                <label>Assign Employee :</label>
                <select name="positions" id="positions" onchange="filterEmployee()">
                    @foreach ($positions as $position)
                    <option value="{{$position->id}}">{{$position->position}}</option>
                    @endforeach
                </select>

                @foreach ($employees as $employee)
                <div class="schedule-employees" employee-data="{{$employee->position_id}}">
                    <input type="checkbox" name="employees[]" value="{{$employee->id}}">
                    <label>{{$employee->name}}</label>
                </div>
                @endforeach
            </div>

            <div class="flex flex-col gap-3">
                <label>Select A Date</label>
                <input type="date" name="date" id="date" value="{{isset($scheduleEdit)? $scheduleDate : ''}}">
            </div>

            <button type="submit" class="border-2 border-slate-400 mt-[3%] py-2 rounded-lg">
                {{isset($scheduleEdit)? 'Update Schedule' : 'Set Schedule'}}
            </button>
        </form>
    </section>

    <section class="w-[51%] mx-auto my-[5%] dataTables_length">
        <table id="table" class="cell-border compact stripe">
            <thead class="text-sm text-gray-100 uppercase bg-gray-50 dark:bg-gray-700">
                <tr class="border-2 border-white">
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Booking ID
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Booking Date
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Schedule Date
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Employee Name
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
                @foreach ($schedules as $schedule)
                <tr class="border-2 border-white">
                    <td scope="row" class="border border-gray-400 px-4 py-2">
                        {{$schedule->id}}
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        {{ \Carbon\Carbon::parse($schedule->date)->toFormattedDateString() }}
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        {{$schedule->employees->first()->pivot->date}}
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        @foreach ($schedule->employees as $employee)
                        {{$employee->name}}@if (!$loop->last),@endif
                        @endforeach
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        <a href="{{route('schedule-edit', $schedule->id)}}" class="hover:text-gray-400">
                            Edit
                        </a>
                    </td>
                    <td class="border border-gray-400 px-4 py-2">
                        <form action="{{route('delete-schedule', $schedule->id)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="submit" value="Delete Schedule" class="cursor-pointer hover:text-gray-400">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <script>
        function filterEmployee() {
            const position = document.getElementById('positions').value; // Get selected position ID
            const employees = document.querySelectorAll('.schedule-employees'); // Get all employee divs

            employees.forEach(employee => {
                if (employee.getAttribute('employee-data') === position) {
                    employee.style.display = 'block';
                } else {
                    employee.style.display = 'none';
                }
            });
        }

        filterEmployee();
    </script>
    <script src="{{asset('js/DataTable.js')}}"></script>
</body>

</html>