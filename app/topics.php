<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class topics extends Model {

    protected $fillable = [
        'topic',
        'username',
        'uid',
        'published',
    ];

}
