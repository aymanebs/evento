<?php

namespace App\Http\Controllers\Organiser;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Models\Category;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\Organiser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function index(){
        //stats
        $totalEvents = Organiser::find(Auth::user()->organiser->id)->events()->count();
        $totalReservations =EventUser::whereIn('event_id', function ($query) {
            $query->select('id')->from('events')->where('organiser_id', Auth::user()->organiser->id);
        }) ->where('status', 2)  ->count();
        $mostReservedEvent = Event::where('organiser_id', Auth::user()->organiser->id)->withCount('reservations')->orderByDesc('reservations_count')->first();
        $pendingEvents=Event::where('organiser_id',Auth::user()->organiser->id)->where('status',1)->count();


        $events=auth()->user()->organiser->events;
        return view('organiser.events',compact('events','totalEvents','totalReservations','mostReservedEvent','pendingEvents'));

    }

    public function create(){

        $categories=Category::all();
        return view('organiser.create-event',compact('categories'));
    }

    public function store(EventStoreRequest $request){
        $event=Event::create($request->all());
        $event->addMediaFromRequest('image')->toMediaCollection('images');
        return redirect()->route('organiser.events')->with('success','Event submitted succesfully wait for admin approval !');
    }

    public function edit(Event $event){
        $categories=Category::all();
        return view('organiser.edit-event',compact('event','categories'));

    }

    public function update(EventUpdateRequest $request, Event $event){
        if($request->hasfile('image')){
            $event->clearMediaCollection('images');
            $event->addMediaFromRequest('image')->toMediaCollection('images');
        }
        $event->update($request->all());
     
        return redirect()->route('organiser.events');
    }

    public function destroy( Event $event){
        $event->delete();
        return redirect()->back()->with('deleted','The event was deleted');

    }
}
