<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events=Event::all();
        return view('admin.events',compact('events'));
    }

    public function accept(Event $event){

        if($event-> status == 1){

            $event->update(['status'=>2]);
        }
        return redirect()->back();
    }
}
