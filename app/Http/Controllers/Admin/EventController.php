<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\Organiser;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $totalUsers=User::count();
        $totalEvents=Event::count();
        $totalOrganisers=Organiser::count();
        $totalCategories=Category::count();
        $events=Event::all();
        return view('admin.events',compact('events','totalUsers','totalEvents','totalOrganisers','totalCategories'));
    }

    public function accept(Event $event){

        if($event-> status == 1){

            $event->update(['status'=>2]);
        }
        return redirect()->back();
    }
}
