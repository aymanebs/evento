<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Flowbite CDN --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    {{-- TAILWIND CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>@yield('title', 'Admin Dashboard')</title>
</head>

<body class="antialiased bg-gray-100">
    <div class="flex relative" x-data="{ navOpen: false }">

                       <!-- NAV -->
                       <nav class="absolute md:relative w-64 transform -translate-x-full md:translate-x-0 h-screen overflow-y-scroll bg-black transition-all duration-300" :class="{'-translate-x-full': !navOpen}">
                        <div class="flex flex-col justify-between h-full">
                            <div class="p-4">
                                <!-- LOGO -->
                                <a class="flex items-center text-white space-x-4" href="{{route('welcome')}}">
                                    <img src="{{ asset('imgs/evento_logo.svg') }}" class="w-9 h-9 bg-white rounded-lg p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"></img>
                                    <span class="text-2xl font-bold">Evento</span>
                                </a>
            
                                <!-- SEARCH BAR -->
                                <div class="border-gray-700 py-5 text-white border-b rounded">
                                    <div class="relative">
                                        {{-- <div class="absolute inset-y-0 left-0 flex items-center pl-2">
                                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                        </div> --}}
                                        {{-- <form action="" method="GET">
                                            <input type="search" class="w-full py-2 rounded pl-10 bg-gray-800 border-none focus:outline-none focus:ring-0" placeholder="Search">
                                        </form> --}}
                                    </div>
                                    <!-- SEARCH RESULT -->
                                </div>
            
                                <!-- NAV LINKS -->
                                <div class="py-4 text-gray-400 space-y-1">
                                    <!-- BASIC LINK -->
                                    <a href="#" class="block py-2.5 px-4 flex items-center space-x-2 bg-gray-800 text-white hover:bg-gray-800 hover:text-white rounded">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <span>Dashboard</span>
                                    </a>
                                    <!-- DROPDOWN LINK -->
                                    <div class="block" x-data="{open: false}">
                                        <div @click="open = !open" class="flex items-center justify-between hover:bg-gray-800 hover:text-white cursor-pointer py-2.5 px-4 rounded">
                                            <div class="flex items-center space-x-2">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                                <span>Content</span>
                                            </div>
                                            <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                            <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>    
                                        </div>
                                        <div x-show="open" class="text-sm border-l-2 border-gray-800 mx-6 my-2.5 px-2.5 flex flex-col gap-y-1">
                                            <a href="{{route('organiser.events')}}" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                                                Events
                                            </a>
                                            <a href="{{route('organiser.reservations')}}" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                                               Reservations
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <!-- PROFILE -->
                            <div class="text-gray-200 border-gray-800 rounded flex items-center justify-between p-2">
                                <div class="flex items-center space-x-2">
                                    <!-- AVATAR IMAGE BY FIRST LETTER OF NAME -->
                                    <img src="https://ui-avatars.com/api/?name=Habib+Mhamadi&size=128&background=ff4433&color=fff" class="w-7 w-7 rounded-full" alt="Profile">
                                    @if(auth()->check())
                                    <h1>{{auth()->user()->name}}</h1>
                                    @endif
                                </div>
                             
                                    <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                        <button type="submit"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>  </button>          
                                    </form>
                               
                            </div>
                        
                        </div>
                    </nav>
                    <!-- END OF NAV -->

        @yield('content')

                </div>
               <!-- ALPINE JS -->
             <script src="{{asset('js/alpine.js')}}" defer></script>
                <!-- Flowbite JS -->
             <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
            </body>
        </html>

