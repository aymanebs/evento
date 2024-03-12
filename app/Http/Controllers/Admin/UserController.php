<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\Organiser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $totalUsers=User::count();
        $totalEvents=Event::count();
        $totalOrganisers=Organiser::count();
        $totalCategories=Category::count();
        $users=User::all();
        return view('admin.users',compact('users','totalUsers','totalEvents','totalOrganisers','totalCategories'));
    }

    public function ban(User $user){

        $user->update(['status'=> 2]);
        return redirect()->back();
    }

    public function unban(User $user){

        if($user->status == 2){
            $user->update(['status'=> 1]);
           
        }
        return redirect()->back();
    }
}
