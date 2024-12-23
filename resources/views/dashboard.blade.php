<style>
    /* Container for the sliding elements */
    .slider-container {
        position: relative;
        width: 100%;
        height: 700px;
        /* Full height */
        overflow: hidden;
    }

    /* Slide Divs */
    .slider {
        display: flex;
        width: 500%;
        /* The total width will be 500% (100% * 5 slides) */
        height: 100%;
        animation: slideAnimation 15s infinite ease-in-out;
    }

    .slide {
        position: relative;
        flex: 0 0 20%;
        /* Each slide takes up 20% of the container */
        height: 100%;
        background-color: gray;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2rem;
        color: white;
        border-radius: 15px;
    }

    /* Keyframe for the sliding animation */
    @keyframes slideAnimation {
        0% {
            transform: translateX(0);
        }

        20% {
            transform: translateX(-20%);
        }

        40% {
            transform: translateX(-40%);
        }

        60% {
            transform: translateX(-60%);
        }

        80% {
            transform: translateX(-80%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    /* Slider Image Styles */
    .slider-img img {
        object-fit: cover;
        width: 100%;
        height: 100%;
        filter: blur(5px);
        /* Apply blur effect */
    }

    /* Position content text and button */
    .slider-content {
        z-index: 10;
        position: absolute;
        top: 55%;
        left: 23%;
        transform: translateX(-50%) translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        padding: 16px;
        border-radius: 10px;
    }

    .service h1{
        text-align: center;
        margin: 30px 0px;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <section class="h-[700px] relative slider-container">
            <!-- Background Image -->
            <div class="slider-img absolute top-0 left-0 w-full h-full">
                <img src="{{asset('img/slider.jpg')}}" alt="" class="relative w-full h-full object-cover blur-sm">
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

            <!-- Slider Content Section -->
            <!-- <div class="absolute top-[15%] left-[25%] w-[350px] h-[400px]">
                <div class="slider">
                    <div class="slide bg-gray-500 rounded-lg">First Slide</div>
                    <div class="slide bg-blue-500 rounded-lg">Second Slide</div>
                    <div class="slide bg-red-500 rounded-lg">Third Slide</div>
                    <div class="slide bg-green-500 rounded-lg">Fourth Slide</div>
                    <div class="slide bg-yellow-500 rounded-lg">Fifth Slide</div>
                </div>
            </div> -->
        </section>
    </x-slot>
</x-app-layout>