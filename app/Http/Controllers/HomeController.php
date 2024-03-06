<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $events=Event::whereNotIn('status',[1])->paginate(3);
        return view('welcome',compact('events'));
    }

    public function show(int $id){
        $event = Event::findOrFail($id);
        return view('details', compact('event'));
    }

    public function reservation($eventId){

        $event=Event::findOrFail($eventId);

        if($event->available_places>0){

            if($event->reservation_method == 1){

                $user=Auth::user();
                $user->events()->attach($eventId,['status'=> 2]);
        
                $event->decrement('available_places');
                }
        
                if($event->reservation_method == 2){
        
                    $user=Auth::user();
                    $user->events()->attach($eventId);
        
                }
                
        }
      
        
        return redirect()->back();

    }
    
}
