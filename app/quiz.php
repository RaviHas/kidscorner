<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class quiz extends Model {

    protected $fillable = [
        'grade',
        'subject',
        'title',
        'questiontype',
        'questiontype',
        'questiontext',
        'questionimage',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'canswer'

    ];

}
