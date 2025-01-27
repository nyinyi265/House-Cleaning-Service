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

    @if (session('success'))
        {{ session('success') }}
    @endif

    <section class="w-[50%] p-10 border-2 border-slate-400 mx-auto mt-[4%] rounded-lg">
        <h1 class="text-xl font-bold mb-[3%]">Add New Services</h1>
        <form
            action="{{ isset($serviceEdit) ? route('admin-service.update', $serviceEdit->id) : route('admin-service.store') }}"
            method="POST" enctype="multipart/form-data" class="flex flex-col">
            @csrf
            @if (isset($serviceEdit))
                {{ method_field('PUT') }}
            @endif

            <div class="flex flex-col gap-3">
                <label for="service-name">Service Name</label>
                <input type="text" name="service-name" id="service-name" class="px-4 rounded-lg"
                    value="{{ isset($serviceEdit) ? $serviceEdit->service_name : '' }}" required>
            </div>

            <div class="flex flex-col gap-3">
                <label for="service-description">Service Description</label>
                <textarea name="service-description" id="service-description" class="px-4 rounded-lg" required>{{ isset($serviceEdit) ? $serviceEdit->description : '' }}</textarea>
            </div>

            <div class="flex flex-col gap-3">
                <label for="service-cost">Service Cost</label>
                <input type="number" name="service-cost" id="service-cost" class="px-4 rounded-lg"
                    value="{{ isset($serviceEdit) ? $serviceEdit->cost : '' }}" required>
            </div>

            <div class="flex flex-col gap-3">
                <label for="service-image">Select an Image</label>
                <input type="file" name="service-image" id="service-image"
                    class="border-2 border-slate-400 px-4 py-2 rounded-lg" required>
                @if (isset($serviceEdit) && $serviceEdit->service_image)
                    <img src="{{ asset($serviceEdit->service_image) }}" alt="" width="50px" height="50px">
                @endif
            </div>

            <div class="flex flex-col gap-3">
                <label>Choose a Category</label>
                <select name="service-category" id="service-category" class="rounded-lg" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ isset($serviceEdit) && $serviceEdit->category_id === $category->id ? 'selected' : '' }}>
                            {{ $category->category }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex mt-[3%]">
                <div class="flex flex-col w-[50%] gap-3">
                    <label class="">Select Equipments</label>
                    <div class="">
                        <select name="category" id="category" onchange="filterEquipment()" required>
                            <option value="all">All</option>
                            <option value="tools">Tools</option>
                            <option value="machines">Machines</option>
                            <option value="chemicals">Chemicals</option>
                            <option value="personal protective equipments">Personal Protection Equipments</option>
                            <option value="cleaning supplies">Cleaning Supplies</option>
                            <option value="materials">Materials</option>
                        </select>
                    </div>
                </div>
                <div class="w-[50%] mt-[30px]">
                    @foreach ($equipments as $item)
                        <div class="equipment-items" data-category="{{ strtolower($item->equipment_category) }}"
                            class="w-full">
                            <input type="checkbox" name="equipments[]" value="{{ $item->id }}"
                                @if (isset($serviceEdit) && in_array($item->id, $serviceEdit->needEquipmentForServices->pluck('id')->toArray())) checked @endif>
                            <label for="">{{ $item->equipment_name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="border-2 border-slate-400 mt-[3%] py-2 rounded-lg">
                {{ isset($serviceEdit) ? 'Update Service' : 'Add Service' }}
            </button>
        </form>
    </section>

    <section class="w-[60%] mx-auto my-[5%] dataTables_length">
        <table id="table">
            <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-700">
                <tr class="border-2 border-white">
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Serivce ID
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Serivce Name
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Serivce Description
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Serivce Cost
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Serivce Category
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Serivce Image
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
                @foreach ($services as $service)
                    <tr class="border-2 border-white">
                        <td scope="row" class="border border-gray-400 px-4 py-2">
                            {{ $service->id }}
                        </td>
                        <td scope="row" class="border border-gray-400 px-4 py-2">
                            {{ $service->service_name }}
                        </td>
                        <td scope="row" class="border border-gray-400 px-4 py-2">
                            {{ $service->description }}
                        </td>
                        <td scope="row" class="border border-gray-400 px-4 py-2">
                            {{ $service->cost }}
                        </td>
                        <td scope="row" class="border border-gray-400 px-4 py-2">
                            {{ $service->category->category }}
                        </td>
                        <td scope="row" class="flex border border-gray-400 px-4 py-2 justify-center">
                            <img src="{{ asset($service->service_image) }}" alt="" width="50px"
                                height="50px">
                        </td>
                        <td scope="row" class="border border-gray-400 px-4 py-2">
                            <a href="{{ route('admin-service.edit', $service->id) }}"
                                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 cursor-pointer inline-block text-center">
                                Edit
                            </a>
                        </td>
                        <td scope="row" class="border border-gray-400 px-4 py-2">
                            <form action="/admin-service/<?php echo $service->id; ?>" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this service?');">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <input type="submit" value="Delete"
                                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 cursor-pointer">
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <script>
        function filterEquipment() {
            const category = document.getElementById('category').value;
            const equipmentItems = document.querySelectorAll('.equipment-items');

            equipmentItems.forEach(item => {
                if (category === 'all') {
                    item.style.display = 'block';
                } else if (item.getAttribute('data-category') === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            })
        }

        filterEquipment();
    </script>
    <script src="{{ asset('js/DataTable.js') }}"></script>
</body>

</html>
