<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $events=Event::whereNotIn('status',[1])->paginate(3);
        return view('welcome',compact('events'));
    }
}
