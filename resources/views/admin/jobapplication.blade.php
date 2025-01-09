<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('admin.layouts.navigation')

    @if (session('success'))
    <div class="bg-green-500 text-white text-center py-3">
        {{ session('success') }}
    </div>
    @endif

    <section class="w-[50%] p-10 border-2 border-slate-400 mx-auto mt-[4%] rounded-lg">
        <form action="{{ route('job-requirement') }}" method="POST" class="flex flex-col gap-3">
            @csrf
            @method('PUT')

            <h1 class="text-2xl font-bold">Application of Employee</h1>

            <div class="flex flex-col gap-3">
                <label for="job-title"><strong>Job Title </strong></label>
                <select name="id" id="id" class="px-4 rounded-lg">
                    @foreach ($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->position }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col gap-3">
                <label for="job-requirement"><strong>Job Post</strong></label>
                <input type="number" name="job-requirement" id="job-requirement" required class="px-4 rounded-lg">
            </div>

            <button type="submit" class="border-2 border-slate-400 mt-[3%] py-2 rounded-lg text-center">Employ</button>
        </form>
    </section>

</body>

</html>