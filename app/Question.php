<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'Qn', 'ImageName', 'Option1','Option2','Option3','Option4','answer','testCode'
    ];
}
