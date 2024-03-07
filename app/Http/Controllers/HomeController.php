<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Barryvdh\DomPDF\Facade\Pdf;
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


    // ticket reservation method

    public function reservation($eventId){

        $event=Event::findOrFail($eventId);

        if($event->status==2){

            if($event->reservation_method == 1){

                $user=Auth::user();
                $user->events()->attach($eventId,['status'=> 2]);
                $event->decrement('available_places');
                if($event->available_places == 0){
                    $event->update(['status'=> 3]);
                }

                $data=[
                    'eventTitle'=>$event -> title,
                    'eventLocation'=>$event->location,
                    'eventDate' => $event->date,
                    'userName' => $user->name,
                    'userEmail' => $user->email,
                    'eventId' => $event ->id,
                    'eventDescription' => $event->description,
                    'eventPrice' => $event->price
                ];


                $pdf = Pdf::loadView('ticket',$data);
                return $pdf->download('document.pdf');
        
               
                }
        
                if($event->reservation_method == 2){
        
                    $user=Auth::user();
                    $user->events()->attach($eventId);
                }
                
        }
      
        
        return redirect()->back();

    }

    public function requests(){
        return view('requests');
    }
    
}
