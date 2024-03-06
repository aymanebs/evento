<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    use HasFactory;

    protected $fillable=[
        'status',
        'description',
        'user_id',
        'event_id'
    ];

   

    public static $statusOptions =[
        1 => 'pending',
        2 => 'accepted'
    ];

    public function getStatus(){
        return self::$statusOptions[$this->status];
    }


    // EventUser relations

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function event(){
        return $this->belongsTo(Event::class);
    }
}
