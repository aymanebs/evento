<?php

namespace App\Http\Controllers\Organiser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function create(){

        return view('organiser.create-event');
    }
}
