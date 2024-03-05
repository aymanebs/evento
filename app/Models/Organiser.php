<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organiser extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id'
    ];

    // relation with user model

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function events(){
        return $this->hasMany(Event::class);
    }
    
}
