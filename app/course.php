<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model {

    protected $fillable = [
        'grade',
        'subject',
        'title',
        'discription',
        'colour',
        'video',
        'quiz',
    ];

}
