<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class replies extends Model {

    protected $fillable = [
        'id',
        'tid',
        'uid',
        'uname',
        'reply',
        'published',
    ];

}
