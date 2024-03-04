<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'description',
        'location',
        'date',
        'available_places',
        'status'
    ];

    // Event status

    public static $statusOptions =[
        1=>'Pending',
        2=>'Available',
        3=>'Sold_out',
        4=>'Cancelled'
    ];

    public function getStatus(){
        return self::$statusOptions[$this->status];
    }

    // Event model relations

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function categories(){
        return $this->belongsTo(Category::class);
    }
}
