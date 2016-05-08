<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCal extends Model {


    protected $fillable = [
        'title',
        'venue',
        'time',
        'eventDate',
        'type',
        'photo',
        'color',
        'endDate'
    ];

}
