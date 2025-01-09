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

    <section class="w-[70%] mx-auto my-[5%]">
        <table id="table">
            <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-700">
                <tr class="border-2 border-white">
                    <th scope="col" class="px-6 py-3 border border-gray-400">Name</th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">Phone Number</th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">Email</th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">Address</th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">Resume Form</th>
                    <th scope="col" class="px-6 py-3 border border-gray-400" colspan="2">Promote</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                @if ($job->application_form > 0 && $job->status === 'applying')
                <tr  class="border-2 border-gray-400">
                    <td scope="row" class="px-6 py-3 border border-gray-400">{{$job->name}}</td>
                    <td scope="row" class="px-6 py-3 border border-gray-400">{{$job->phone}}</td>
                    <td scope="row" class="px-6 py-3 border border-gray-400">{{$job->email}}</td>
                    <td scope="row" class="px-6 py-3 border border-gray-400">{{$job->address}}</td>
                    <td scope="row" class="px-6 py-3 border border-gray-400">{{$job->application_form}}</td>
                    <td scope="row" class="px-6 py-3 border border-gray-400">
                        <a href="{{route('job-promote', $job->id)}}">
                            Promote
                        </a>
                    </td>
                    <td scope="row" class="px-6 py-3 border border-gray-400">
                        <a href="{{route('job-reject', $job->id)}}">
                            Reject
                        </a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </section>
</body>

</html>