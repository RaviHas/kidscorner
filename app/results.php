<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class results extends Model {

    protected $fillable = [
        'child_name',
        'grade',
        'subject',
        'title',
        'result',
        'date',
    ];

}
