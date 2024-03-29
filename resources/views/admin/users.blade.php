@extends('layouts.dashboard')
@section('title')
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
            <h1 class="text-2xl font-semibold pt-2 pb-6">Users</h1>
        </div>
      
        <!-- STATISTICS -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 py-6">
            <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
                <div class="space-y-2">
                    <p class="text-xs text-gray-400 uppercase">Events</p>
                    <div class="flex items-center space-x-2">
                        <h1 class="text-xl font-semibold">{{$totalEvents}}</h1>
                  
                    </div>
                </div>
                <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5l0 2 M15 5l0 2 M15 11l0 2 M15 17l0 2 M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2"></path></svg>
            </div>

            <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
                <div class="space-y-2">
                    <p class="text-xs text-gray-400 uppercase">Users</p>
                    <div class="flex items-center space-x-2">
                        <h1 class="text-xl font-semibold">{{$totalUsers}}</h1>
                     
                    </div>
                </div>
                <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>                    
            </div>

            <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
                <div class="space-y-2">
                    <p class="text-xs text-gray-400 uppercase">Organisers</p>
                    <div class="flex items-center space-x-2">
                        <h1 class="text-xl font-semibold">{{$totalOrganisers}}</h1>
                    
                    </div>
                </div>
                <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0 M6 21v-2a4 4 0 0 1 4 -4h3.5 M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z"></path></svg>
            </div>

            <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
                <div class="space-y-2">
                    <p class="text-xs text-gray-400 uppercase">Categories</p>
                    <div class="flex items-center space-x-2">
                        <h1 class="text-xl font-semibold">{{$totalCategories}}</h1>
                     
                    </div>
                </div>
                <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h6v6h-6z M14 4h6v6h-6z M4 14h6v6h-6z M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 00"></path></svg>
            </div>
        </div>
        <!-- END OF STATISTICS -->

        

        {{-- table component --}}
        
        <x-table :headers="['Name'=>'text-left','Email'=>'text-left','Role'=>'text-left','Status'=>'text-center','Action'=>'text-center']" >
           
           
            @foreach ($users as $user)
                    

            <tr class="border-b border-gray-200 hover:bg-gray-100">

        <td class="py-3 px-6 text-left">
            <div class="flex items-center">
                <div class="mr-2">
                    {{-- <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg"/> --}}
                </div>
                <span>{{$user->name}}</span>
            </div>
        </td>

        <td class="py-3 px-6 text-left whitespace-nowrap">
            {{$user->email}}
        </td>
        @foreach($user->roles as $role)
        <td class="py-3 px-6 text-left whitespace-nowrap">
            
        
        @switch($role->id) 
        @case(1)
        <span class="bg-blue-200 text-blue-600 py-1 px-3 rounded-full text-xs">{{$role->name}}</span>
        @break
        @case(2)
        <span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">{{$role->name}}</span>
        @break
        @case(3)
        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{$role->name}}</span>
        @break
        @endswitch
       
        </td>
        @endforeach

        {{-- <td class="py-3 px-6 text-left whitespace-nowrap">
            {{$user->company->adress ?? '-'}}
        </td> --}}

     

        <td class="py-3 px-6 text-center">
            @switch($user->status)
            @case(1) 
            <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">{{$user->getStatus()}}</span>
            @break
            @case(2)
            <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">{{$user->getStatus()}}</span>
             @break
            @endswitch
        </td>

        {{-- Action icons start --}}

        <td class="py-3 px-6 text-center">
            <div class="flex item-center justify-center">
                

                {{-- banning user --}}

                <form action="{{ route('admin.users.ban', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ban"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M5.7 5.7l12.6 12.6" />
                          </svg>
                    </button>
                </form>
                

                {{-- unbanning user --}}

                <form action="{{ route('admin.users.unban', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-restore"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3.06 13a9 9 0 1 0 .49 -4.087" />
                            <path d="M3 4.001v5h5" />
                            <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                          </svg>
                    </button>
                </form>


            </div>
        </td>

        {{-- Action icons end --}}

     

    </tr>

    @endforeach
   
    </x-table>   
    </section>
    <!-- END OF PAGE CONTENT -->
</main>
@endsection
@section('user')