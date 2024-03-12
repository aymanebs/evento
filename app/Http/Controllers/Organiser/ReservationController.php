<?php

namespace App\Http\Controllers\Organiser;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\Organiser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index(){
        $this->authorize('access-organiser-dashboard');
        // stats
        $totalEvents = Organiser::find(Auth::user()->organiser->id)->events()->count();
        $totalReservations =EventUser::whereIn('event_id', function ($query) {
            $query->select('id')->from('events')->where('organiser_id', Auth::user()->organiser->id);
        }) ->where('status', 2)  ->count();
        $mostReservedEvent = Event::where('organiser_id', Auth::user()->organiser->id)->withCount('reservations')->orderByDesc('reservations_count')->first();




        $organiser = auth()->user()->organiser;
        $events = $organiser->events()->pluck('id') ;
        $reservations = EventUser::whereIn('event_id',$events )->get();
        return view('organiser.reservations',compact('reservations','totalEvents','totalReservations','mostReservedEvent'));
    }

    public function accept(EventUser $reservation){

        if($reservation-> status == 1){

            $reservation->update(['status'=>2]);
        }
        return redirect()->back();

    }
}
