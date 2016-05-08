<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class share extends Model {

    protected $fillable = [
        'status',
        'username',
        'uid',
        'file',
        'published',
    ];

}
