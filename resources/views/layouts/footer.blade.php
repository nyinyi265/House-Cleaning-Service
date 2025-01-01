<style>
    .ftsearch {
        width: 200px;
        display: flex;
        opacity: 100%;
        position: relative;
        margin-top: 30px;
        justify-self: center;
    }

    .ftsearch input {
        width: 100%;
        height: 30px;
        margin: 0 auto;
        border-radius: 10px;
        align-self: center;
        padding: 0 15px;
    }

    .ftsearch svg {
        position: absolute;
        right: 10px;
        top: 32%;
        transform: translate(-60%);
    }
</style>

<footer class="mt-[50px] h-[500px] bg-[#F5F5DC]">
    <div class="flex flex-row w-full h-[87%] ">
        <div class="flex flex-col w-[35%] h-full">
            <div class="flex flex-col w-full h-full">
                <div class="flex w-[100%] h-[100px] mt-[50px] ml-[50px]">
                    <div class="w-[85px] h-[85px]">
                        <img src="{{asset('img/logo.png')}}" alt="">
                    </div>
                    <h1 class="text-black text-center text-3xl font-[1000] pt-[15px]">Crystal Clear</h1>
                </div>

                <div class="flex w-[50%] h-[50%] bg-white mt-[15%] ml-[20%] pb-[15%] justify-center items-center">
                    <div class="w-[100%] h-[100%]">
                        <img src="{{asset('img/Window Cleaning 1.jpg')}}" alt="" class="w-[70%] ml-[15%] mt-[10%]">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col w-[40%] h-full -ml-[5%]">
            <div class="w-full h-[25%]">
                <div class="p-2 ftsearch">
                    <input type="text" id="search" name="search" placeholder="Search...">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg>
                </div>
            </div>
            <div class="w-full h-[55%]">
                <p class="p-7 text-justify">Established in 2022 in Japan, Crystal Clear is committed to transforming homes and offices into spotless, welcoming spaces. As a trusted cleaning service provider, we take pride in our attention to detail, eco-friendly practices, and dedication to customer satisfaction. From regular cleanings to deep cleans, move-in/move-out services, and more, our professional team ensures every corner shines with perfection. Let us help you create a cleaner, healthier, and more comfortable environment</p>
            </div>
            <div class="flex w-full h-[20%] justify-around items-center">
                <p>© 2024 Crystal Clear. All rights reserved.</p>
                <a href="" class="hover:underline underline-offset-8 decoration-blue-600">
                    <p class="text-blue-600">Terms of Service</p>
                </a>
                <a href="" class="hover:underline underline-offset-8 decoration-blue-600">
                    <p class="text-blue-600">Privacy</p>
                </a>
            </div>
        </div>

        <div class="flex flex-col w-[25%] h-full ml-[5%] mt-[20px]">
            <div class="flex flex-col w-full h-[50%] mt-[25%]">
                <div class="flex items-start ml-[20%] mt-[3%]">
                    <a href="/dashboard">Home</a>
                </div>
                <div class="flex items-start ml-[20%] mt-[1%]">
                    <a href="{{route('service')}}">Service</a>
                </div>
                <div class="flex items-start ml-[20%] mt-[1%]">
                    <a href="{{route('aboutus')}}">About Us</a>
                </div>
                <div class="flex items-start ml-[20%] mt-[1%]">
                    <a href="{{route('contactus')}}">Contact Us</a>
                </div>
                <div class="flex items-start ml-[20%] mt-[1%]">
                    <a href="{{route('faq')}}">FAQ</a>
                </div>
            </div>

            <div class="flex w-full h-[50%] p-2 items-center justify-start ml-[15%] -mt-[20%]">
                <div class="w-[14%] h-[77%] rounded-full mx-3">
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="blue" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                        </svg>
                    </a>
                </div>
                <div class="w-[14%] h-[77%] rounded-full mx-3">
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 128 128" id="instagram">
                            <defs>
                                <clipPath id="b">
                                    <circle cx="64" cy="64" r="64" fill="none"></circle>
                                </clipPath>
                                <clipPath id="c">
                                    <path fill="none" d="M104-163H24a24.07 24.07 0 0 0-24 24v80a24.07 24.07 0 0 0 24 24h80a24.07 24.07 0 0 0 24-24v-80a24.07 24.07 0 0 0-24-24Zm16 104a16 16 0 0 1-16 16H24A16 16 0 0 1 8-59v-80a16 16 0 0 1 16-16h80a16 16 0 0 1 16 16Z"></path>
                                </clipPath>
                                <clipPath id="e">
                                    <circle cx="82" cy="209" r="5" fill="none"></circle>
                                </clipPath>
                                <clipPath id="g">
                                    <path fill="none" d="M64-115a16 16 0 0 0-16 16 16 16 0 0 0 16 16 16 16 0 0 0 16-16 16 16 0 0 0-16-16Zm0 24a8 8 0 0 1-8-8 8 8 0 0 1 8-8 8 8 0 0 1 8 8 8 8 0 0 1-8 8Z"></path>
                                </clipPath>
                                <clipPath id="h">
                                    <path fill="none" d="M84-63H44a16 16 0 0 1-16-16v-40a16 16 0 0 1 16-16h40a16 16 0 0 1 16 16v40a16 16 0 0 1-16 16Zm-40-64a8 8 0 0 0-8 8v40a8 8 0 0 0 8 8h40a8 8 0 0 0 8-8v-40a8 8 0 0 0-8-8Z"></path>
                                </clipPath>
                                <clipPath id="i">
                                    <circle cx="82" cy="-117" r="5" fill="none"></circle>
                                </clipPath>
                                <radialGradient id="a" cx="27.5" cy="121.5" r="137.5" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#ffd676"></stop>
                                    <stop offset=".25" stop-color="#f2a454"></stop>
                                    <stop offset=".38" stop-color="#f05c3c"></stop>
                                    <stop offset=".7" stop-color="#c22f86"></stop>
                                    <stop offset=".96" stop-color="#6666ad"></stop>
                                    <stop offset=".99" stop-color="#5c6cb2"></stop>
                                </radialGradient>
                                <radialGradient xlink:href="#a" id="d" cx="27.5" cy="-41.5" r="148.5"></radialGradient>
                                <radialGradient xlink:href="#a" id="f" cx="13.87" cy="303.38" r="185.63"></radialGradient>
                                <radialGradient xlink:href="#a" id="j" cx="13.87" cy="-22.62" r="185.63"></radialGradient>
                            </defs>
                            <g clip-path="url(#b)">
                                <circle cx="27.5" cy="121.5" r="137.5" fill="url(#a)"></circle>
                            </g>
                            <g clip-path="url(#c)">
                                <circle cx="27.5" cy="-41.5" r="148.5" fill="url(#d)"></circle>
                            </g>
                            <g clip-path="url(#e)">
                                <circle cx="13.87" cy="303.38" r="185.63" fill="url(#f)"></circle>
                            </g>
                            <g clip-path="url(#g)">
                                <circle cx="27.5" cy="-41.5" r="148.5" fill="url(#d)"></circle>
                            </g>
                            <g clip-path="url(#h)">
                                <circle cx="27.5" cy="-41.5" r="148.5" fill="url(#d)"></circle>
                            </g>
                            <g clip-path="url(#i)">
                                <circle cx="13.87" cy="-22.62" r="185.63" fill="url(#j)"></circle>
                            </g>
                            <circle cx="82" cy="46" r="5" fill="#fff"></circle>
                            <path fill="#fff" d="M64 48a16 16 0 1 0 16 16 16 16 0 0 0-16-16Zm0 24a8 8 0 1 1 8-8 8 8 0 0 1-8 8Z"></path>
                            <rect width="64" height="64" x="32" y="32" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="8" rx="12" ry="12"></rect>
                        </svg>
                    </a>
                </div>

                <div class="w-[14%] h-[77%] rounded-full p-1 mx-3">
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54 54" id="tiktok">
                            <g>
                                <path fill="#e71d40" d="M8.52,36.36a14.66,14.66,0,1,0,29.32.14l.08-16.41L40,21.23a18.22,18.22,0,0,0,8.67,2.21l0-7.72A10.81,10.81,0,0,1,38,4.86l-7.72,0-.15,31.64a6.95,6.95,0,1,1-6.92-7l0-7.71A14.67,14.67,0,0,0,8.52,36.36Z"></path>
                                <path fill="#40d8ff" d="M6.61,34.42a14.66,14.66,0,1,0,29.32.15L36,18.16l2.11,1.14a18.17,18.17,0,0,0,8.68,2.2l0-7.71A10.81,10.81,0,0,1,36.09,2.93l-7.72,0-.16,31.64a6.95,6.95,0,1,1-6.91-7l0-7.71A14.67,14.67,0,0,0,6.61,34.42Z"></path>
                                <path fill="#1c1c1c" d="M46.8,21.5l0-6a10.89,10.89,0,0,1-6.6-4,10.87,10.87,0,0,1-4-6.64l-6,0-.15,31.64a6.94,6.94,0,0,1-12.74,3.79,6.94,6.94,0,0,1,3.91-12.7l0-5.67a14.65,14.65,0,0,0-9.47,23.85A14.65,14.65,0,0,0,35.93,34.57L36,18.16l2.11,1.14A18.17,18.17,0,0,0,46.8,21.5Z"></path>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="flex w-full h-[13%] bg-white">
        <div class="flex w-[30%] justify-start">

        </div>

        <a href="{{route('contactus')}}" class="flex w-[23%] items-center justify-end -ml-[10px]">
            <div class="flex w-[15%] h-[75%] rounded-full bg-slate-700 mr-[10px] items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-telephone-inbound " viewBox="0 0 16 16">
                    <path d="M15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0m-12.2 1.182a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                </svg>
            </div>
            <div class="">
                <h1 class="text-center">+959 768 900 366</h1>
            </div>
        </a>

        <a href="{{route('contactus')}}" class="flex w-[21%] items-center justify-end -ml-[10px]">
            <div class="flex w-[15%] h-[75%] rounded-full bg-slate-700 mr-[10px] items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-envelope-at" viewBox="0 0 16 16">
                    <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z" />
                    <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648m-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                </svg>
            </div>
            <div class="">
                <h1 class="text-center">crystal.clear@gmail.com</h1>
            </div>
        </a>

        <a href="{{route('contactus')}}" class="flex w-[21%] items-center justify-end ml-[2%]">
            <div class="flex w-[15%] h-[75%] rounded-full bg-slate-700 mr-[10px] items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-geo-alt" viewBox="0 0 16 16">
                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg>
            </div>
            <div class="">
                <h1 class="text-center">Hachioji, Tokyo 192-0056, Japan</h1>
            </div>
        </a>
    </div>
</footer>