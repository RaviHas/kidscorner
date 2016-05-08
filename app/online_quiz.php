<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class online_quiz extends Model {

    protected $fillable = [
        'grade',
        'subject',
        'title',
        'noOfQuestions',
        'time'
    ];


}
