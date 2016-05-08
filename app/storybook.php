<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class storybook extends Model {

    protected $fillable = [
        'title',
        'file',
        'description',
        'status',

    ];

}
