<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cteate event</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <!-- component -->


    <div class="relative min-h-screen flex items-center justify-center bg-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center"
    style="background-image: url('{{asset('imgs/add_event_background.jpg')}}');">
	<div class="absolute bg-black opacity-60 inset-0 z-0"></div>
	<div class="max-w-md w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
        


<div class="grid  gap-8 grid-cols-1">
	<div class="flex flex-col ">
			<div class="flex flex-col sm:flex-row items-center">
				<h2 class="font-semibold text-lg mr-auto">Add an event  </h2>
				<div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
			</div>


			<div class="mt-5">

                {{-- form start --}}
				<form action="{{route('organiser.events.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
					<div class="md:space-y-2 mb-3">
						<label class="text-xs font-semibold text-gray-600 py-2">Event picture</label>
						<div class="flex items-center py-6">
                            
							<div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
								<img class="w-12 h-12 mr-4 object-cover" src="{{asset('imgs/upload_icon.png')}}" alt="image Upload">
                            </div>
								<label class="cursor-pointer ">
                                    <label for="upload" class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-sky-400 hover:bg-sky-500 hover:shadow-lg cursor-pointer">
                                        Upload image
                                      </label>
                                      <input id="upload" type="file" name="image" class="hidden">
                                      
                </label>
							</div>
						</div>
						<div class="md:flex flex-row md:space-x-4 w-full text-xs">
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2"> Event title</label>
								<input placeholder="Event title" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="text" name="title" id="title">
								<p class="text-red text-xs hidden">Please fill out this field.</p>
							</div>
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">Event location</label>
								<input placeholder="Event location" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="text" name="location" id="location">
								<p class="text-red text-xs hidden">Please fill out this field.</p>
							</div>
						</div>
	
							<div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
								<div class="w-full flex flex-col mb-3">
									<label class="font-semibold text-gray-600 py-2">Avaible places</label>
									<input placeholder="Avaible places" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="number" name="available_places" id="available_places">
                             </div>
									<div class="w-full flex flex-col mb-3">
										<label class="font-semibold text-gray-600 py-2">Category</label>
										<select class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full " required="required" name="category_id" id="category">
                                            <option value="" >Seleted category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                            </select>
										<p class="text-sm text-red-500 hidden mt-3" id="error">Please fill out this field.</p>
									</div>
								</div>

                                <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                    <div class="mb-3 space-y-2 w-full text-xs">
                                        <label class="font-semibold text-gray-600 py-2"> Date</label>
                                        <input placeholder="Event title" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="date" name="date" id="date">
                                        <p class="text-red text-xs hidden">Please fill out this field.</p>
                                    </div>
                                    <div class="mb-3 space-y-2 w-full text-xs">
                                        <label class="font-semibold text-gray-600 py-2">Time</label>
                                        <input placeholder="Event location" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="time" name="time" id="time">
                                        <p class="text-red text-xs hidden">Please fill out this field.</p>
                                    </div>
                                </div>

                                <div class="md:flex flex-row md:space-x-4 w-full text-xs">

                                    <div class="mb-3 space-y-2 w-full text-xs">
                                        <label class="font-semibold text-gray-600 py-2"> Price</label>
                                        <input placeholder="Ticket price" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" required="required" type="number" name="price" id="price">
                                        <p class="text-red text-xs hidden">Please fill out this field.</p>
                                    </div>
                                
                                </div>

								<div class="flex-auto w-full mb-3 text-xs space-y-2">
									<label class="font-semibold text-gray-600 py-2">Description</label>
									<textarea required=""  class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="Enter your event description" spellcheck="false" name="description" id="description"></textarea>
								</div>

                                <div class="mb-5 text-xs">
                                    <label class="font-semibold text-gray-600 py-2">
                                        Reservation acceptance method:
                                    </label>
                                    <div class="flex items-center space-x-6">
                                        <div class="flex items-center pt-3">
                                            <input type="radio" name="reservation_method" id="radioButton1" class="h-4 w-4" value="1" />
                                            <label for="radioButton1" class="font-semibold text-gray-600 ">
                                                auto 
                                            </label>
                                        </div>
                                        <div class="flex items-center pt-3">
                                            <input type="radio" name="reservation_method" id="radioButton2" class="h-4 w-4" value="2" />
                                            <label for="radioButton2" class="font-semibold text-gray-600 ">
                                                manual
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                {{-- hidden input --}}

                                <input type="hidden" name="user_id" value="{{auth()->id()}}">


								<p class="text-xs text-red-500 text-right my-3">Required fields are marked with an
									asterisk <abbr title="Required field">*</abbr></p>
								<div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
									<a href="{{route('welcome')}}" class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100"> Cancel </a>
									<button class="mb-2 md:mb-0 bg-sky-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-sky-500" type="submit">Save</button>
								</div>
							</div>
						</div>
					</div>
				</div>
            </form>
            {{-- form end --}}

			</div>
    
</body>
</html>