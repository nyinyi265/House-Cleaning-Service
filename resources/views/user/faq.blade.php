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

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.navigation')

    <section class="h-[500px] relative mb-[5%]">
        <div class="absolute top-0 left-0 w-full h-full bg-blue-400">
            <img src="{{asset('img/faq.jpeg')}}" alt="" class="relative w-full h-full object-cover blur-sm">
        </div>

        <div class="absolute top-[50%] left-[50%] transform -translate-x-[50%] -translate-y-1/2 bg-black bg-opacity-50 p-5 rounded-md z-10">
            <h1 class="text-white text-3xl font-bold text-center">Frequently Asked Questions</h1>
            <h3 class="text-white text-xl mt-2">Find answers to common questions about our house keeping services!</h3>
        </div>
    </section>

    <section class="flex flex-col border-2 border-black py-6 px-8 m-[5%] rounded-xl">
        <div class="flex flex-col w-full h-[10%] justify-start gap-2 mb-[3%]">
            <h1 class="text-2xl font-bold">FAQ Categories</h1>
            <p class="text-lg">Select a category to view related questions and answers</p>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden border-2 border-slate-400">
            <div class="p-6">
                <div class="mb-6">
                    <div class="flex flex-wrap -mx-2">
                        @foreach($faqCategories as $category)
                        <div class="w-full sm:w-1/2 md:w-1/4 px-2">
                            <button
                                class="w-full py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                                onclick="showCategory('{{ $category['id'] }}')">
                                {{ $category['title'] }}
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>

                @foreach($faqCategories as $category)
                <div id="{{ $category['id'] }}" class="faq-category hidden">
                    <h3 class="text-xl font-semibold mb-4">{{ $category['title'] }}</h3>
                    <div class="space-y-4">
                        @foreach($category['items'] as $item)
                        <div class="border-b border-gray-200 pb-4 mb-4">
                            <button
                                class="flex justify-between items-center w-full text-left font-semibold focus:outline-none"
                                onclick="toggleAnswer('{{ $category['id'] }}-{{ $loop->index }}')">
                                <span>{{ $item['question'] }}</span>
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="{{ $category['id'] }}-{{ $loop->index }}" class="mt-2 hidden text-gray-600">
                                {{ $item['answer'] }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="flex flex-col py-6 px-8 mx-[5%] my-[2%] border-2 border-black rounded-xl">
        <div class="flex flex-col w-full justify-start gap-2">
            <h1 class="text-2xl font-bold">Still Have Questions?</h1>
            <p class="text-lg">
                We're here to help. Contact our customer support team for more information
            </p>
        </div>
        <div class="flex flex-col justify-start gap-3">
            <p class="text-lg">
                You can reach us through the following methods:
            </p>
            <div class="flex flex-col justify-start px-5">
                <ol>
                    <li class="list-disc mb-[5px]">Phone: +1 (800) 123-4567</li>
                    <li class="list-disc">Email: support@crystalclearhousekeeping.com</li>
                </ol>
            </div>
            <div class="flex">
                <form action="{{route('contactus')}}" method="GET" class="space-x-4 mt-5">
                    <button type="submit" class="w-[200px] bg-blue-700 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mr-[20px]">
                        Contact Us
                    </button>
                </form>
            </div>
        </div>
    </section>



    @include('layouts.footer')

    <script>
        function showCategory(categoryId) {
            document.querySelectorAll('.faq-category').forEach(el => el.classList.add('hidden'));
            document.getElementById(categoryId).classList.remove('hidden');
        }

        function toggleAnswer(answerId) {
            const answerElement = document.getElementById(answerId);
            answerElement.classList.toggle('hidden');
        }

        showCategory("{{$faqCategories[0]['id']}}");
    </script>

</body>

</html>
