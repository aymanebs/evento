<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Event extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable=[
        'title',
        'description',
        'location',
        'date',
        'time',
        'price',
        'available_places',
        'status',
        'category_id',
        'organiser_id',
        'reservation_method'
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


    // reservation_method

    public static $reservation_method =[
        1 => 'auto',
        2 => 'manual'
    ];



    // Event model relations

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function organiser(){
        return $this->belongsTo(Organiser::class);
    }

    public function reservations()
    {
        return $this->hasMany(EventUser::class);
    }
}
