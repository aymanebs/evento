@extends('layouts.organiser-dashboard')
@section('title','dashboard')
@section('content')
 <!-- PAGE CONTENT -->
 <main class="flex-1 h-screen overflow-y-scroll overflow-x-hidden">
    <div class="md:hidden justify-between items-center bg-black text-white flex">
        <h1 class="text-2xl font-bold px-4">Evento</h1>
        <button @click="navOpen = !navOpen" class="btn p-4 focus:outline-none hover:bg-gray-800">
            <svg class="w-6 h-6 fill-current" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
        </button>
    </div>
    <section class="max-w-7xl mx-auto py-4 px-5">
        <div class="flex justify-between items-center border-b border-gray-300">
            <h1 class="text-2xl font-semibold pt-2 pb-6">Dashboard</h1>
        </div>
      
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 py-6">
          
            <div class="bg-blue-500 text-white shadow-lg rounded-xl flex justify-between items-center py-6 px-6">
                <div class="space-y-2">
                    <p class="text-xs uppercase">Events total</p>
                    <div class="flex items-center space-x-2">
                        <h1 class="text-3xl font-semibold">{{$totalEvents}}</h1>
                        <p class="text-xs bg-blue-50 text-blue-500 px-2 rounded">+4.5</p>
                    </div>
                </div>
                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5l0 2 M15 5l0 2 M15 11l0 2 M15 17l0 2 M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2"></path></svg>
            </div>
        
       
            <div class="bg-green-500 text-white shadow-lg rounded-xl flex justify-between items-center py-6 px-6">
                <div class="space-y-2">
                    <p class="text-xs uppercase">Users total</p>
                    <div class="flex items-center space-x-2">
                        <h1 class="text-3xl font-semibold">{{$totalUsers}}</h1>
                        <p class="text-xs bg-green-50 text-green-500 px-2 rounded">+7.4</p>
                    </div>
                </div>
                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
        
      
            <div class="bg-red-500 text-white shadow-lg rounded-xl flex justify-between items-center py-6 px-6">
                <div class="space-y-2">
                    <p class="text-xs uppercase">Organisers total</p>
                    <div class="flex items-center space-x-2">
                        <h1 class="text-3xl font-semibold">{{$totalOrganisers}}</h1>
                        <p class="text-xs bg-red-50 text-red-500 px-2 rounded">-2.9</p>
                    </div>
                </div>
                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0 M6 21v-2a4 4 0 0 1 4 -4h3.5 M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z"></path></svg>
            </div>
        
          
            <div class="bg-yellow-500 text-white shadow-lg rounded-xl flex justify-between items-center py-6 px-6">
                <div class="space-y-2">
                    <p class="text-xs uppercase">Categories total</p>
                    <div class="flex items-center space-x-2">
                        <h1 class="text-3xl font-semibold">{{$totalCategories}}</h1>
                        <p class="text-xs bg-yellow-50 text-yellow-500 px-2 rounded">+3.1</p>
                    </div>
                </div>
                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h6v6h-6z M14 4h6v6h-6z M4 14h6v6h-6z M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 00"></path></svg>
            </div>
        
         
            <div class="bg-pink-500 text-white shadow-lg rounded-xl flex justify-between items-center py-6 px-6">
                <div class="space-y-2">
                    <p class="text-xs uppercase">Revenue</p>
                    <div class="flex items-center space-x-2">
                        <h1 class="text-3xl font-semibold">{{$revenue}}</h1>
                        <p class="text-xs bg-pink-50 text-pink-500 px-2 rounded">+12,345</p>
                    </div>
                </div>
                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h6v6h-6z M14 4h6v6h-6z M4 14h6v6h-6z M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 00"></path></svg>
            </div>
        
       
            <div class="bg-indigo-500 text-white shadow-lg rounded-xl flex justify-between items-center py-6 px-6">
                <div class="space-y-2">
                    <p class="text-xs uppercase">Tickets Sold</p>
                    <div class="flex items-center space-x-2">
                        <h1 class="text-3xl font-semibold">{{$soldTickets}}</h1>
                        <p class="text-xs bg-indigo-50 text-indigo-500 px-2 rounded">+987</p>
                    </div>
                </div>
                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h6v6h-6z M14 4h6v6h-6z M4 14h6v6h-6z M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 00"></path></svg>
            </div>
        
            
            <div class="bg-purple-500 text-white shadow-lg rounded-xl flex justify-between items-center py-6 px-6">
                <div class="space-y-2">
                    <p class="text-xs uppercase">Pending events</p>
                    <div class="flex items-center space-x-2">
                        <h1 class="text-3xl font-semibold">{{$pendingEvents}}</h1>
                        <p class="text-xs bg-purple-50 text-purple-500 px-2 rounded">+23</p>
                    </div>
                </div>
                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h6v6h-6z M14 4h6v6h-6z M4 14h6v6h-6z M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 00"></path></svg>
            </div>
        
        
            <div class="bg-teal-500 text-white shadow-lg rounded-xl flex justify-between items-center py-6 px-6">
                <div class="space-y-2">
                    <p class="text-xs uppercase">Most active organisers</p>
                    <div class="flex items-center space-x-2">
                        <h1 class="text-3xl font-semibold">{{$activeOrganiser->user->name}}</h1>
                       
                    </div>
                </div>
                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h6v6h-6z M14 4h6v6h-6z M4 14h6v6h-6z M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 00"></path></svg>
            </div>
        
        
            <div class="bg-orange-500 text-white shadow-lg rounded-xl flex justify-between items-center py-6 px-6">
                <div class="space-y-2">
                    <p class="text-xs uppercase">Most sold event</p>
                    <div class="flex items-center space-x-2">
                        <h1 class="text-3xl font-semibold">{{$mostSoldEvent->title}}</h1>
                        <p class="text-xs bg-orange-50 text-orange-500 px-2 rounded"></p>
                    </div>
                </div>
                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h6v6h-6z M14 4h6v6h-6z M4 14h6v6h-6z M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 00"></path></svg>
            </div>
    
        
      
        <!-- END OF STATISTICS -->
        



  
    </section>
    <!-- END OF PAGE CONTENT -->
</main>
@endsection
@section('user')