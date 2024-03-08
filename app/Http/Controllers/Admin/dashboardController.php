<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){
        $this->authorize('access-organiser-dashboard');
        $users=User::all();
        return view('admin.dashboard',compact('users'));
    }
}
