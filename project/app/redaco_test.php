<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class redaco_test extends Model
{
    protected $table = 'redaco_test';
    
    protected $fillable = ['image','love_count'];
}
