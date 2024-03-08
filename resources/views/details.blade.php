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
    <title>Event details</title>
</head>
<body>



      {{-- navbar start --}}
        <x-navbar/>
      {{-- navbar end   --}}
  
    
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
          <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
              <h1 class="text-gray-900 text-3xl title-font font-medium mb-4">{{$event->title}}</h1>
              <div class="flex mb-4">
                <a class="flex-grow text-indigo-500 border-b-2 border-indigo-500 py-2 text-lg px-1">Details</a>
                <a class="flex-grow border-b-2 border-gray-300 py-2 text-lg px-1"></a>
                <a class="flex-grow border-b-2 border-gray-300 py-2 text-lg px-1"></a>
              </div>
              <p class="leading-relaxed mb-4">{{$event->description}}</p>

              <div class="flex border-t border-gray-200 py-2">
                <span class="text-gray-500">Location</span>
                <span class="ml-auto text-gray-900">{{$event->location}}</span>
              </div>
              <div class="flex border-t border-gray-200 py-2">
                <span class="text-gray-500">Date</span>
                <span class="ml-auto text-gray-900">{{$event->date}}</span>
              </div>
              <div class="flex border-t border-b  border-gray-200 py-2">
                <span class="text-gray-500">Time</span>
                <span class="ml-auto text-gray-900">{{$event->time}}</span>
              </div>
              <div class="flex border-t border-b mb-6 border-gray-200 py-2">
                <span class="text-gray-500">Avaible places</span>
                <span class="ml-auto text-gray-900">{{$event->available_places}}</span>
              </div>
           
              <div class="flex">
                <span class="title-font font-medium text-2xl text-gray-900">MAD {{$event->price}}</span>

                <form class="flex ml-auto" action="{{route('events.reservation',['event'=>$event->id])}}" method="POST">
                  @csrf
                <button class=" text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Buy ticket</button>
                </form>
              </div>
            </div>
            <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{$event->getFirstMediaUrl('images')}}">
          </div>
        </div>
      </section>


{{-- footer start --}}
<x-footer />
{{-- footer end --}}

{{-- flowbite script --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>