<?php

namespace App\Http\Controllers\Organiser;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function create(){

        $categories=Category::all();
        return view('organiser.create-event',compact('categories'));
    }

    public function store(Request $request){
        $event=Event::create($request->all());
        $event->addMediaFromRequest('image')->toMediaCollection('images');
        return redirect()->route('welcome');
    }
}
