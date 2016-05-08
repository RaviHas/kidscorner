<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model {

    protected $fillable=[
        'username',
        'grade',
        'password',
        'parent_id',
        'childname',
        'childlastname',
        'url'

    ];

}
