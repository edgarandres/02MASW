<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Director extends Model
{
    use SoftDeletes;
    public function serie(){
        return $this->hasMany(Serie::class)->withTrashed();
    }
}
