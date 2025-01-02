<style>
    nav {
        color: black;
    }

    .search {
        width: 200px;
        display: flex;
        opacity: 100%;
        position: relative;
        margin: 0 150px;
    }

    .search input {
        width: 100%;
        height: 30px;
        margin: 0 auto;
        border-radius: 10px;
        align-self: center;
        padding: 0 15px;
    }

    .search svg {
        position: absolute;
        right: 10px;
        top: 37%;
        transform: translate(-60%);
    }

    .service {
        margin-left: 15px;
    }

    .navlink {
        margin-left: 20px;
        margin: 0 auto;
    }

    .navlink a {
        color: black;
        margin: 0 auto;
        align-self: center;
    }

    .navlink a:hover {
        text-decoration: underline;
        text-underline-offset: 8px;
    }

    .logo a {
        display: flex;
        flex: 1;
        flex-direction: row;
    }

    .logo a h1 {
        color: black;
        margin-left: 10px;
        align-self: center;
        font-size: larger;
        font-weight: bold;
    }
</style>
<!-- bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 -->
<nav x-data='{ "open": false }' class="bg-[#FBF9F1]">
    <!-- Primary Navigation Menu -->
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center logo">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{asset('img/logo.png')}}" alt="" width="70px" height="70px">
                        <h1>Crystal Clear</h1>
                    </a>
                </div>

                <div class="p-2 search">
                    <input type="text" id="search" name="search" placeholder="Search...">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex navlink">
                    <a href="{{route('dashboard')}}" class="home">Home</a>
                    <a href="{{route('service')}}">Service</a>
                    <a href="{{route('aboutus')}}">About Us</a>
                    <a href="{{route('contactus')}}">Contact Us</a>
                    <a href="{{route('faq')}}">FAQ</a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                <div class="flex h-[50px] justify-center items-center mt-[5px] mr-[20px] p-2 rounded-lg">
                    <a href="{{route('booking-history')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                        </svg>
                    </a>
                </div>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white dark:text-white bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>
                                @if(Auth::check())
                                <div>{{ Auth::user()->name }}</div>
                                @else
                                <div>Guest</div>
                                @endif
                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            @if(Auth::check() && Auth::user())
                            {{ __('Profile') }}
                            @else
                            <div>Profile</div>
                            @endif
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="@if(Auth::check() && Auth::user())
                            {{ route('logout') }}
                            @else
                            {{ route('register') }}
                            @endif">
                            @csrf

                            @if(Auth::check() && Auth::user())
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                            @else
                            <x-dropdown-link :href="route('register')">
                                Register
                            </x-dropdown-link> 
                            @endif
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                    @if(Auth::check())
                    <div>{{ Auth::user()->name }}</div>
                    @else
                    <div>Guest</div>
                    @endif
                </div>
                <div class="font-medium text-sm text-gray-500">
                    @if(Auth::check())
                    <div>{{ Auth::user()->email }}</div>
                    @else
                    <div>Guest</div>
                    @endif
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>