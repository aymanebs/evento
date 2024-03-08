<?php

namespace App\Http\Controllers\Organiser;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index(){

        $events=auth()->user()->organiser->events;
        return view('organiser.events',compact('events'));

    }

    public function create(){

        $categories=Category::all();
        return view('organiser.create-event',compact('categories'));
    }

    public function store(Request $request){
        $event=Event::create($request->all());
        $event->addMediaFromRequest('image')->toMediaCollection('images');
        return redirect()->route('welcome');
    }

    public function edit(Event $event){
        $categories=Category::all();
        return view('organiser.edit-event',compact('event','categories'));

    }

    public function update(Request $request, Event $event){

        if($request->hasfile('image')){
            $event->clearMediaCollection('images');
            $event->addMediaFromRequest('image')->toMediaCollection('images');
        }
        $event->update($request->all());
     
        return redirect()->back();
    }

    public function destroy( Event $event){
        $event->delete();
        return redirect()->back();

    }
}
