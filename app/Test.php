<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
     protected $fillable = [
        'subjectName', 'numberOfQn', 'duration','testCode','instruction'
    ];

   
}
