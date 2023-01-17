<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mechanic extends Model
{
    use HasFactory;


    public function car()
    {
        // return $this->hasOne(car::class);
    }

    public function owner()
    {
        return $this->hasOneThrough(owner::class,car::class);
    }
}
