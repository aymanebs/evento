<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users=User::all();
        return view('admin.users',compact('users'));
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
