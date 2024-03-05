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
        'available_places',
        'status',
        'category_id'
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
