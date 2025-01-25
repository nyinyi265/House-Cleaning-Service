<x-app-layout>
    <x-slot name="header">
        <section class="h-[700px] relative slider-container">
            <!-- Background Image -->
            <div class="slider-img absolute top-0 left-0 w-full h-full">
                <img src="{{asset('img/slider.jpg')}}" alt="" class="relative w-full h-full">
            </div>

            <!-- Content Section (Text and Button) -->
            <div class="absolute top-[50%] left-[23%] transform -translate-x-[40%] -translate-y-1/2 bg-black bg-opacity-30 p-5 rounded-md z-10">
                <h1 class="text-white text-2xl font-bold text-center">Clean Is Not Just a Look; It’s a Lifestyle</h1>
                <h3 class="text-white text-1.5xl mt-2">Professional cleaning services that leave your home sparkling. Book your cleaning today!</h3>
                <form action="{{route('service')}}" method="POST" class="flex flex-row items-center justify-center space-x-4 mt-5">
                    <a href="{{route('service')}}" class="bg-blue-700 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mr-[20px]">
                        Book Now
                    </a>
                    <button type="submit" class="border border-blue-800 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-lg ml-[10px]">
                        Learn More
                    </button>
                </form>
            </div>
            
        </section>
    </x-slot>
</x-app-layout>