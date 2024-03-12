<?php

namespace App\Http\Controllers\Organiser;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\Organiser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function index(){

        $totalEvents = Organiser::find(Auth::user()->organiser->id)->events()->count();
        $totalReservations =EventUser::whereIn('event_id', function ($query) {
            $query->select('id')->from('events')->where('organiser_id', Auth::user()->organiser->id);
        }) ->where('status', 2)  ->count();
        $mostReservedEvent = Event::where('organiser_id', Auth::user()->organiser->id)->withCount('reservations')->orderByDesc('reservations_count')->first();

        return view('organiser.dashboard',compact('totalEvents','totalReservations','mostReservedEvent'));
    }
}
