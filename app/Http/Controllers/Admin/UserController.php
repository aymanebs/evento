<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $buyers=User::buyers();
        return view('admin.users',compact('buyers'));
    }

    public function ban(User $buyer){

        $buyer->update(['status'=> 2]);
        return redirect()->back();
    }

    public function unban(User $buyer){

        if($buyer->status == 2){
            $buyer->update(['status'=> 1]);
           
        }
        return redirect()->back();
    }
}
