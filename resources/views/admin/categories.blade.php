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
            <h1 class="text-2xl font-semibold pt-2 pb-6">Categories</h1>
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

         {{-- Add button --}}
            <div class="flex justify-end">
                 <button type="button" class="flex items-center justify-center text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-6 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 " data-modal-target="create-modal" data-modal-toggle="create-modal"  > 
                  <span>Add</span>
                   <svg class="w-5 h-5 ml-2 align-baseline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 5v14M5 12h14"/>
                   </svg>
                    </button>
             </div>
             
        {{-- create modal component --}}
            
         <x-admin.create-modal  :route="route('admin.categories.store')"/>
        

        {{-- table component --}}
        
        <x-table :headers="['Id'=>'text-left','Name'=>'text-left','Action'=>'text-center']" >
           
           
            @foreach ($categories as $category)
                    

            <tr class="border-b border-gray-200 hover:bg-gray-100">

        <td class="py-3 px-6 text-left">
            <div class="flex items-center">
                <div class="mr-2">
                    {{-- <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg"/> --}}
                </div>
                <span>{{$category->id}}</span>
            </div>
        </td>

        <td class="py-3 px-6 text-left whitespace-nowrap">
            {{$category->name}}
        </td>


     


        {{-- edit button --}}
        <td class="py-3 px-6 text-center">
            <div class="flex item-center justify-center">

        <a type="button" data-modal-target="update-modal-{{$category->id}}" data-modal-toggle="update-modal-{{$category->id}}" >
            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer cursor-pointer" >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </div>
            </a>

            {{-- update modal component --}}

            <x-admin.update-modal  :entity="$category" :route="route('admin.categories.update',['category'=>$category->id])" />

            {{-- delete button --}}

            <form action="{{ route('admin.categories.delete', ['category' => $category->id]) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer cursor-pointer" aria-label="Delete Category">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /> 
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