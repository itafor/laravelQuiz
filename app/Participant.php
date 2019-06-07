<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
   protected $fillable = [
        'name', 'email', 'score','TimeSpent','testCode',
    ];
}
