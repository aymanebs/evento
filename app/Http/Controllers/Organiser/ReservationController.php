<?php

namespace App\Http\Controllers\Organiser;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index(){
        $this->authorize('access-organiser-dashboard');
        $organiser = auth()->user()->organiser;
        $events = $organiser->events()->pluck('id') ;
        $reservations = EventUser::whereIn('event_id',$events )->get();
        return view('organiser.reservations',compact('reservations'));
    }

    public function accept(EventUser $reservation){

        if($reservation-> status == 1){

            $reservation->update(['status'=>2]);
        }
        return redirect()->back();

    }
}
