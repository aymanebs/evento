<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\EventUser;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $categories=Category::all();
        $events=Event::whereNotIn('status',[1])->paginate(8);
        return view('welcome',compact('events','categories'));
    }

    public function show(Event $event){
        // $event = Event::findOrFail($id);
        return view('details', compact('event'));
    }


    // ticket reservation method

    public function reservation(Event $event){

        // $event=Event::findOrFail($eventId);

        if($event->status==2){

            if($event->reservation_method == 1){

                $user=Auth::user();
                $user->events()->attach($event->id,['status'=> 2]);
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
                    $user->events()->attach($event->id);
                }
                
        }
      
        
        return redirect()->back();

    }

    public function requests(){
        $user=Auth::id();
        $reservations=EventUser::where('user_id',$user)->orderBy('created_at', 'desc')->get();
        return view('requests',compact('reservations'));
    }


    public function ticketDownload(EventUser $reservation){

        if($reservation->status == 2){

            $event=$reservation->event;
            $user=$reservation->user;

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

    }

    public function search(Request $request){

        $categories=Category::all();
        $query=$request->input('query');
        $categoryId=$request->input('category_id');
       
        $eventsQuery = Event::where('title', 'like', '%' . $query . '%')->whereNotIn('status', [1]);
        if($categoryId){
           $eventsQuery->where('category_id',$categoryId);
          
        }
        $events=$eventsQuery->paginate(8);
      
        return view('welcome', compact('events','categories'));
    }
    
}
