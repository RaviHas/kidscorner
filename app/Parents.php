<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model {

    protected $fillable=[
        'email',
        'password',
        'name',
        'url'
    ];


}
