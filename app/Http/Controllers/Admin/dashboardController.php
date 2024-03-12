<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\Organiser;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){
        $this->authorize('access-admin-dashboard');
        $totalUsers=User::count();
        $totalEvents=Event::count();
        $totalOrganisers=Organiser::count();
        $totalCategories=Category::count();
        $activeOrganiser=Organiser::with('user')->withCount('events')->latest('events_count')->first();
        $pendingEvents=Event::Where('status','1')->count();
        $soldTickets=EventUser::Where('status','2')->count();
        
        
      


        $users=User::all();
        return view('admin.dashboard',compact('users','totalUsers','totalEvents','totalOrganisers','totalCategories','activeOrganiser','pendingEvents','soldTickets'));
    }
}
