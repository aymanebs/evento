<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- tailwind cdn --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- flowbite cdn  --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <title>Homepage</title>
</head>
<body>
    
</body>
</html>
    <body >

  {{-- navbar start --}}
  <x-navbar/>
  {{-- navbar end   --}}

  {{-- jumbotron  start --}}
  @if(session('reservation'))
  <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
      <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <span class="sr-only">Info</span>
      <div>
          <span class="font-medium">{{ session('reservation') }}</span> 
      </div>
  </div>
@endif
  

<section class="bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-700 bg-blend-multiply">
    <div class="px-4 mx-auto max-w-screen-xl text-center py-20 lg:py-30">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Evonto the biggest event booking platform</h1>
        <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Evento: Where Every Click Unlocks Your Next Unforgettable Experience! Book Your Tickets to Any Event in Just One Click!</p>
       @guest
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            <a href="{{route('login')}}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                Get started
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>  
        </div> 
        @endguest
    </div>   
</section>



  {{-- jumbotron  end --}}

  {{-- search form --}} 
  <form class="max-w-lg mx-auto py-10" action="{{ route('search') }}" method="GET">
    @csrf
    <div class="flex items-center">
        <label for="category" class="text-sm font-medium text-gray-900 sr-only">Category</label>
        <select name="category_id" id="category" class="block w-1/3 py-2.5 px-4 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-l-lg rounded-r-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:border-blue-500">
            <option value="" selected disabled>Select a category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <div class="relative flex-1">
            <input name="query" type="search" id="search-dropdown" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-r-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search Mockups, Logos, Design Templates..." required />
            <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </div>
    </div>
</form>





      <div class="max-w-7xl mx-auto my-8 px-2">
    
    <div class="flex justify-center text-2xl md:text-3xl font-bold mb-4">
        Read More
    </div>

  {{-- cards container start  --}}

    <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
      
        <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-10">

            {{-- card 1 start --}}

            @foreach( $events as $event)
            <div class="rounded overflow-hidden shadow-lg">
                <a href="{{route('events.details',['event'=>$event->id]) }}"></a>
                <div class="relative">
                    <a href="{{route('events.details',['event'=>$event->id]) }}">
                        <img class="w-full"
                            src="{{$event->getFirstMediaUrl('images')}}"
                            >
                        <div
                            class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                        </div>
                    </a>
                    <a href="#">
                        <div
                            class="absolute bottom-0 left-0 bg-indigo-600 px-4 py-2 text-white text-sm hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                          {{$event->category->name}}
                          
                        </div>
                    </a>
    
                    <a href="{{route('events.details',$event->id) }}">


                        <div
                            class="text-sm absolute top-0 right-0 bg-indigo-600 px-4 text-white rounded-full h-16 w-16 flex flex-col items-center justify-center mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                            <span class="">{{$event->getStatus()}}</span>
                            {{-- <small>March</small> --}}
                        </div>

                        @if($event->status==3 || $event->status==3  )
                        <div
                        class="text-sm absolute top-0 right-0 bg-red-600 px-4 text-white rounded-full h-16 w-16 flex flex-col items-center justify-center mt-3 mr-3 hover:bg-white hover:text-red-600 transition duration-500 ease-in-out">
                        <span class="">{{$event->getStatus()}}</span>
                        </div>
                        @endif

                    </a>
                </div>
                {{--title --}}
                <div class="px-6 py-3">
                
                    <a href="{{route('events.details',$event->id) }}"
                        class="font-semibold text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out">
                    {{$event->title}}
                    </a>
                    <p class="text-gray-500 text-sm">
                        The city that never sleeps     
                    </p>
                </div>
                     {{--location --}}
                  <div class="px-6 py-1">

                    <span href="#" class="py-1 text-sm font-regular text-gray-900 mr-1 flex flex-row items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                            <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                          </svg>
                        <span class="ml-1"> {{$event->location}}</span>
                    </span>         
                   </span>

                    </div>
                    {{--date --}}
                <div class="px-6 py-1 flex flex-row justify-between">
                    <span  class="py-1 text-sm font-regular text-gray-900 mr-1 flex flex-row items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                            <path d="M16 3v4" />
                            <path d="M8 3v4" />
                            <path d="M4 11h16" />
                            <path d="M11 15h1" />
                            <path d="M12 15v3" />
                          </svg>
                        <span class="ml-1"> {{$event->date}}</span>
                    </span>
                      {{-- time --}}

                      <span href="#" class="py-1 text-sm font-regular text-gray-900 mr-1 flex flex-row items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                            <path d="M12 7v5l3 3" />
                          </svg>
                        <span class="ml-1"> {{$event->time}}</span></span>
                </div>

                {{-- buy button --}}
                <div class="px-6 py-2 flex flex-row items-center">
                <form action="{{route('events.reservation',['event'=>$event->id])}}" method="POST">
                    @csrf
                <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Buy ticket</button>
                </form>
                </div>


                </div>


            @endforeach
              {{-- card 1 end  --}}
  
        </div>
    </div>

  {{-- cards container end --}}
    
        
</div>
    {{-- Pagination start --}}

    {{-- {{$events->links()}} --}}

    <div class="flex justify-center m-10 space-x-2">
        @if ($events->onFirstPage())
            <span class="px-2 py-1 sm:px-4 sm:py-2 ml-1 mt-2 text-gray-600 border rounded-lg focus:outline-none">&laquo;</span>
        @else
            <a href="{{ $events->previousPageUrl() }}" class="ring ring-primary bg-primary/20 px-2 py-1 sm:px-4 sm:py-2 ml-1 mt-2 text-gray-600 border rounded-lg focus:outline-none">&laquo;</a>
        @endif

        <!-- Display specific page links -->
        @foreach ($events->getUrlRange(1, $events->lastPage()) as $page => $url)
            <a href="{{ $url }}" class="hover:bg-gray-100 px-2 py-1 sm:px-4 sm:py-2 ml-1 mt-2 text-gray-600 border rounded-lg focus:outline-none">{{ $page }}</a>
        @endforeach

        @if ($events->hasMorePages())
            <a href="{{ $events->nextPageUrl() }}" class="px-2 py-1 sm:px-4 sm:py-2 mt-2 text-gray-600 border rounded-lg hover:bg-gray-100 focus:outline-none">&raquo;</a>
        @else
            <span class="px-2 py-1 sm:px-4 sm:py-2 mt-2 text-gray-600 rounded-lg focus:outline-none">&raquo;</span>
        @endif
    </div>
    {{-- pagination end --}}

{{-- footer start --}}
<x-footer />
{{-- footer end --}}

{{-- flowbite script --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
