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
    <link rel="stylesheet" href="{{ asset('js/DataTable.css') }}">
</head>

<body>
    @include('admin.layouts.navigation')

    <section class="w-[50%] p-10 border-2 border-slate-400 mx-auto mt-[4%] rounded-lg">
        <h1 class="text-xl font-bold mb-[3%]">Insert Equipment</h1>
        <form action="{{isset($equipmentEdit)? route('equipment-upd', $equipmentEdit->id): route('equipment-store')}}" method="POST" class="flex flex-col">
            @csrf
            @if (isset($equipmentEdit))
                @method('PUT')
            @endif

            <div class="flex flex-col gap-3">
                <label for="name">Equipment Name</label>
                <input type="text" name="equipment" id="equipment"
                    value="{{ isset($equipmentEdit) ? $equipmentEdit->equipment_name : '' }}" class="px-4 rounded-lg">
            </div>

            <div class="flex flex-col gap-3">
                <label for="name">Maintenance Date</label>
                <input type="date" name="maintenance" id="maintenance"
                    value="{{ isset($equipmentEdit) ? $equipmentEdit->maintenance_date : '' }}" class="px-4 rounded-lg">
            </div>

            <div class="flex flex-col gap-3">
                <label for="category">Equipment Category</label>
                <select name="category" id="category" class="rounded-lg px-2">
                    <option value="Tools"
                        {{ isset($equipmentEdit) && $equipmentEdit->equipment_category == 'tools' ? 'selected' : '' }}>Tools
                    </option>
                    <option value="Machines"
                        {{ isset($equipmentEdit) && $equipmentEdit->equipment_category == 'machines' ? 'selected' : '' }}>Machines
                    </option>
                    <option value="Chemicals"
                        {{ isset($equipmentEdit) && $equipmentEdit->equipment_category == 'chemicals' ? 'selected' : '' }}>
                        Chemicals</option>
                    <option value="Personal Protective Equipment"
                        {{ isset($equipmentEdit) && $equipmentEdit->equipment_category == 'personal protective equipment' ? 'selected' : '' }}>
                        Personal Protective Equipment</option>
                    <option value="Cleaning Supplies"
                        {{ isset($equipmentEdit) && $equipmentEdit->equipment_category == 'cleaning supplies' ? 'selected' : '' }}>
                        Cleaning Supplies</option>
                    <option value="Materials"
                        {{ isset($equipmentEdit) && $equipmentEdit->equipment_category == 'materials' ? 'selected' : '' }}>
                        Materials</option>
                </select>
            </div>


            <div class="flex flex-col gap-3">
                <label for="name">Condition</label>
                <select name="condition" id="condition" class="rounded-lg px-2">
                    <option value="Good" {{isset($equipmentEdit) && $equipmentEdit->condition_status == 'good' ? 'selected' : ''}}>Good</option>
                    <option value="Need to Repair" {{isset($equipmentEdit) && $equipmentEdit->condition_status == 'need to repair' ? 'selected' : ''}}>Need to Repair</option>
                </select>
            </div>

            <button type="submit" class="w-full border-2 border-slate-400 mt-[3%] py-2 rounded-lg">
                {{ isset($equipmentEdit) ? 'Update Equipment' : 'Add Equipment' }}
            </button>
        </form>
    </section>

    <section class="w-[50%] mx-[250px] my-[5%] dataTables_length">
        <table id="table" class="cell-border compact stripe">
            <thead class="text-sm text-gray-100 uppercase bg-gray-50 dark:bg-gray-700">
                <tr class="border-2 border-white">
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Equipment ID
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Equipment Name
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Maintenance Date
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Equipment Category
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Condition
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
                @foreach ($equipments as $equipment)
                    <tr class="border-2 border-white">
                        <td scope="row" class="border border-gray-400 px-4 py-2">
                            {{ $equipment->id }}
                        </td>
                        <td scope="row" class="border border-gray-400 px-4 py-2">
                            {{ $equipment->equipment_name }}
                        </td>
                        <td class="border border-gray-400 px-4 py-2">
                            {{ \Carbon\Carbon::parse($equipment->maintenance_date)->toFormattedDateString() }}
                        </td>
                        <td scope="row" class="border border-gray-400 px-4 py-2">
                            {{ $equipment->equipment_category }}
                        </td>
                        <td scope="row" class="border border-gray-400 px-4 py-2">
                            {{ $equipment->condition_status }}
                        </td>
                        <td class="border border-gray-400 px-4 py-2">
                            <a href="{{ route('equipment-edit', $equipment->id) }}"
                                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 cursor-pointer inline-block text-center">
                                Edit
                            </a>
                        </td>
                        <td class="border border-gray-400 px-4 py-2">
                            <form action="{{route('equipment-delete', $equipment->id)}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <input type="submit" value="Delete Schedule"
                                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 cursor-pointer">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>

</html>
